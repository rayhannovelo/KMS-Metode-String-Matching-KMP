            <?php 
                function KMPSearch($p,$t) {
                    $hasil = array();

                    // pattern dan text dijadikan array
                    $pattern = str_split(strip_tags($p)); 
                    $text    = str_split(strip_tags($t));
                 
                    // hitung tabel lompatan dengan preKMP()
                    $lompat = preKMP($pattern);
                    //print_r($lompat);
                 
                    // perhitungan KMP
                    $i = $j = 0;
                    $num=0;
                    while($j < count($text)) {
                        if(isset($pattern[$i]) && isset($lompat[$i])) {
                            while($i > -1 && $pattern[$i] != $text[$j]){
                                // jika tidak cocok, maka lompat sesuai tabel lompatan
                                $i = $lompat[$i];
                            }
                        }else{
                            $i = 0;
                        }
                 
                        $i++;
                        $j++;
                        if($i >= count($pattern)){
                            // jika cocok, tentukan posisi string yang cocok
                            // kemudian lompat ke string berikutnya
                            $hasil[$num++] = $j - count($pattern);
                            if(isset($lompat[$i])) {
                                $i = $lompat[$i];
                            }
                        }
                    }
                    return $hasil;
                }
                 
                // menetukan tabel lompatan dengan preKMP
                function preKMP($pattern) {
                    $i = 0;
                    $j = $lompat[0] = -1;
                    while($i < count($pattern)) {
                        while($j > -1 && $pattern[$i] != $pattern[$j]) {
                            $j = $lompat[$j];
                        }

                        $i++;
                        $j++;

                        if(isset($pattern[$i]) && isset($pattern[$j])) {
                            if($pattern[$i] == $pattern[$j]) {
                                $lompat[$i] = $lompat[$j];
                                //echo $lompat[$i];
                            }else {
                                $lompat[$i] = $j;
                                //echo $lompat[$i];
                            }
                        }
                    }
                    return $lompat;
                }

                function output ($message) {
                    if(php_sapi_name() == 'cli' )
                        return $message;
                    else {
                        return (nl2br($message));
                    }
                }
            ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Form Pencarian</h5>
                            </div>
                            <div class="ibox-content article" style="padding-bottom: 0px">  
                                <form method="post" role="form" action="<?php echo site_url('dashboard/string_matching')?>">
                                    <div class="input-group">
                                        <label></label>
                                        <input name="pattern" placeholder="Cari Kata" minlength="3" value="<?php echo $pattern; ?>" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                    <span class="help-block m-b-none">Waktu Pencarian : <span id="waktu_pencarian"></span> detik</span>
                                </form>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>Pengetahuan Tacit</h5>
                                    </div>
                                    <div class="ibox-content article">
                                        Total Tacit Ditemukan   : <span id="jumlah_tacit"></span><br>
                                        Total Kata Ditemukan   : <span id="jumlah_kata_tacit"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>Pengetahuan Explicit</h5>
                                    </div>
                                    <div class="ibox-content article">
                                        Total Explicit Ditemukan   : <span id="jumlah_explicit"></span><br>
                                        Total Kata Ditemukan   : <span id="jumlah_kata_explicit"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->benchmark->mark('awal'); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <?php 
                            $jumlah_tacit = 0;
                            $jumlah_kata_tacit = 0;
                            foreach ($text_tacit as $key => $value) {
                                $deskripsi = KMPSearch($pattern, $value['deskripsi']);
                                $judul = KMPSearch($pattern, $value['judul']);

                                if((count($deskripsi) + count($judul)) != 0) {
                                    $jumlah_tacit++;
                                    $jumlah_kata_tacit += count($deskripsi) + count($judul);
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <a href="<?php echo site_url('daftar_tacit/detail/'.$value['id_tacit']); ?>" class="btn-link">
                                            <h2>
                                                <?php echo nl2br(str_replace($pattern, '<span style="background-color: #FFFF00">'.$pattern."</span>", strip_tags(html_purify(word_limiter($value['judul'], 30)))));  ?>
                                            </h2>
                                        </a>
                                        <div class="small m-b-xs">
                                            <strong><i class="fa fa-user"></i> <?php echo $value['nama']; ?></strong> 
                                            <span class="text-muted">
                                                / <i class="fa fa-clock-o"></i> <?php echo date_format(date_create($value['waktu_buat']), 'jS F Y'); ?>
                                                / <i class="fa fa-comments-o"></i> <?php echo $value['jumlah_komentar']; ?>
                                            </span>
                                        </div>
                                        <?php 
                                            echo nl2br(str_replace($pattern, '<span style="background-color: #FFFF00">'.$pattern."</span>", html_purify(strip_tags(word_limiter($value['deskripsi'], 40))))); 
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="small">
                                                    <h5>Stats:</h5>
                                                    <div> 
                                                        <i class="fa fa-search"> </i> Jumlah Kata Ditemukan : <?php echo count($deskripsi) + count($judul); ?><br>
                                                        <i class="fa fa-info-circle"> </i> Ditemukan pada huruf ke- : <?php foreach($deskripsi as $ke) echo $ke." "; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                    </div>
                    <div class="col-lg-6">
                        <?php 
                            $jumlah_explicit = 0;
                            $jumlah_kata_explicit = 0;
                            foreach ($text_explicit as $key => $value) {
                                $deskripsi = KMPSearch($pattern, $value['deskripsi']);
                                $judul = KMPSearch($pattern, $value['judul']);

                                $lampiran = base_url('assets/lampiran/'.$value['lampiran']);
                                $path_parts = pathinfo($lampiran);
                                $extension = strtolower($path_parts['extension']);

                                if($extension == 'docx' || $extension == 'doc') {
                                    $docObj = new Doc2Txt();
                                    $docObj->file_location($value['lampiran']);
                                    $text = $docObj->convertToText();
                                    $lampiran = KMPSearch($pattern, $text);
                                } elseif($extension == 'pdf') {
                                    $pdf    =  new PdfToText($lampiran) ;
                                    $text = output($pdf->Text);         // or you could also write : echo ( string ) $pdf ;
                                    $lampiran = KMPSearch($pattern, $text);
                                }else {
                                    $text = '';
                                    $lampiran = KMPSearch($pattern, $text);
                                }   

                                if((count($deskripsi) + count($judul) + count($lampiran)) != 0) {
                                    $jumlah_explicit++;
                                    $jumlah_kata_explicit += count($deskripsi) + count($judul) + count($lampiran);
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <a href="<?php echo site_url('daftar_explicit/detail/'.$value['id_explicit']); ?>" class="btn-link">
                                            <h2>
                                                <?php echo nl2br(str_replace($pattern, '<span style="background-color: #FFFF00">'.$pattern."</span>", strip_tags(html_purify(word_limiter($value['judul'], 30)))));  ?>
                                            </h2>
                                        </a>
                                        <div class="small m-b-xs">
                                            <strong><i class="fa fa-user"></i> <?php echo $value['nama']; ?></strong> 
                                            <span class="text-muted">
                                                / <i class="fa fa-clock-o"></i> <?php echo date_format(date_create($value['waktu_buat']), 'jS F Y'); ?>
                                                / <i class="fa fa-comments-o"></i> <?php echo $value['jumlah_komentar']; ?>
                                            </span>
                                        </div>
                                        <?php 
                                            echo nl2br(str_replace($pattern, '<span style="background-color: #FFFF00">'.$pattern."</span>", strip_tags(html_purify(word_limiter($value['deskripsi'], 40))))); 
                                        ?>
                                        <hr>
                                        <?php 
                                            echo nl2br(str_replace($pattern, '<span style="background-color: #FFFF00">'.$pattern."</span>", strip_tags(html_purify(word_limiter($text, 40))))); 
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="small">
                                                    <h5>Stats:</h5>
                                                    <div> 
                                                        <i class="fa fa-search"> </i> Jumlah Kata Ditemukan : <?php echo count($deskripsi) + count($judul) + count($lampiran); ?><br>
                                                        <!-- <i class="fa fa-info-circle"> </i> Ditemukan pada huruf ke- : <?php foreach($deskripsi as $ke) echo $ke." "; ?> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $text = '';}} ?>
                    </div>
                </div>
            </div>
            <?php $this->benchmark->mark('akhir'); ?>
            <script type="text/javascript">
                document.getElementById("waktu_pencarian").innerHTML= <?php echo $this->benchmark->elapsed_time('awal','akhir'); ?>;
                document.getElementById("jumlah_kata_tacit").innerHTML= <?php echo $jumlah_kata_tacit; ?>;
                document.getElementById("jumlah_tacit").innerHTML= <?php echo $jumlah_tacit; ?>;
                document.getElementById("jumlah_kata_explicit").innerHTML= <?php echo $jumlah_kata_explicit; ?>;
                document.getElementById("jumlah_explicit").innerHTML= <?php echo $jumlah_explicit; ?>;
            </script>