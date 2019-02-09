        <style type="text/css">
            .article img {
                max-width: 100%;
            };

            #share-buttons img {
                width: 35px;
                padding: 5px;
                border: 0;
                box-shadow: 0;
                display: inline;
            }

            #share-buttons a {
                float: right;
            }
        </style>
        <div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5><?php echo $title ?></h5>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($explicit as $key => $value) { ?>
                            <div class="text-center article-title" style="margin-bottom: 20px; margin-top: 20px">
                            <strong><i class="fa fa-user"></i> <?php echo $value['nama']; ?></strong> / <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($value['waktu_buat']), 'jS F Y'); ?> / <i class="fa fa-comments-o"></i> <?php echo $value['jumlah_komentar']; ?></span>
                                <h1>
                                    <?php echo $value['judul']; ?>
                                </h1>
                            </div>
                            <?php echo $value['deskripsi']; ?>
                            <hr>
                            Lampiran : <a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a>
                            <hr>
                            <!-- I got these buttons from simplesharebuttons.com -->
                            <div id="share-buttons">
                                <!-- Google+ -->
                                <a href="https://plus.google.com/share?url=<?php echo site_url('daftar_explicit/detail/'.$value['id_explicit']); ?>" target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                                </a>
                                 
                                <!-- Twitter -->
                                <a href="https://twitter.com/share?url=<?php echo site_url('daftar_explicit/detail/'.$value['id_explicit']); ?>" target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                                </a>

                                <!-- Facebook -->
                                <a href="http://www.facebook.com/sharer.php?u=<?php echo site_url('daftar_explicit/detail/'.$value['id_explicit']); ?>" target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                                </a>
                            </div>
                            <hr>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-12">

                                    <h2>Komentar:</h2>
                                    <div id="komentar"></div>
                                    <div class="social-feed-box">
                                        <div class="social-avatar" style="margin-bottom: 15px">
                                            <a href="" class="pull-left">
                                                <img alt="image" src="<?php echo $this->session->userdata('thumbnail') != '' ?  base_url('assets/img/profil/'.$this->session->userdata('thumbnail')) : base_url('assets/img/avatar.png'); ?>">
                                            </a>
                                            <div class="media-body">
                                                <form onsubmit="sendkomentar();return false;">
                                                <textarea id="respon_komentar" name="komentar" class="form-control" placeholder="Tulis Komentar..."></textarea>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page-Level Scripts -->
        <script>
            var last = 0;
            var komentarInterval;

            function start() {
                komentarInterval = setInterval('loadkomentar();', 3000);
                loadkomentar();
            }

            function loadkomentar() {
                var xmlhttp;
                if(window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function() {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var objek = JSON.parse(xmlhttp.responseText);
                        for(var i = 0; i < objek.length; i++) {
                            if(objek[i].id_pengguna == <?php  echo $this->session->userdata('id_pengguna'); ?>) {
                                var hapus = '<a class="text-danger pull-right" onclick="if (confirm(\'Komentar akan dihapus, apakah Anda yakin?\')) hapuskomentar('+ objek[i].id_komentar_explicit +');return false;"><i class="fa fa-trash"></i> Hapus</a>';
                            }else {
                                var hapus = '';
                            }

                            if(objek[i].thumbnail == '') {
                                var src = '<?php echo base_url('assets/img/avatar.png'); ?>';
                            }else {
                                var src = '<?php echo base_url('assets/img/profil/'); ?>' + objek[i].thumbnail;
                            }
                            
                            document.getElementById("komentar").innerHTML +=
                            '<div class="social-feed-box" id="'+ objek[i].id_komentar_explicit +'">'+
                                '<div class="social-avatar">'+
                                    '<a href="" class="pull-left">'+
                                        '<img alt="image" src="'+ src +'">'+
                                    '</a>'+ hapus +
                                    '<div class="media-body">'+
                                        '<a href="#">'+
                                            objek[i].nama +
                                        '</a>'+
                                        '<small class="text-muted">' + objek[i].waktu_komentar + '</small>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="social-body">'+
                                    '<p>'+ objek[i].komentar +
                                    '</p>'+
                                '</div>'+
                            '</div>';
                            last = objek[i].id_komentar_explicit;
                            //window.scrollTo(0,document.body.scrollHeight);
                        }
                    }
                }

                xmlhttp.open("GET","<?php echo site_url('daftar_explicit/ambil_komentar_explicit/'.$this->uri->segment(3).'/')?>" + last, true);
                xmlhttp.send();
            }

            var input = document.getElementById("respon_komentar");
            input.addEventListener("keyup", function(event) {
                event.preventDefault();
                if (event.keyCode === 13 && !event.shiftKey) {
                    sendkomentar();
                }
            });

            function sendkomentar() {
                var xmlhttp_kirim;
                if(window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp_kirim = new XMLHttpRequest();
                }
                else {
                    // code for IE6, IE5
                    xmlhttp_kirim = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp_kirim.onreadystatechange = function() {
                    if (xmlhttp_kirim.readyState == 4 && xmlhttp_kirim.status == 200) {
                        var objek = JSON.parse(xmlhttp_kirim.responseText);
                        clearInterval(komentarInterval);
                        loadkomentar();
                        komentarInterval = setInterval('loadkomentar();',3000);
                        last = objek.last;
                        document.getElementById("respon_komentar").value = '';
                    }
                }

                xmlhttp_kirim.open("GET","<?php echo site_url('daftar_explicit/tambah_komentar_explicit/'.$this->uri->segment(3).'/')?>"+ document.getElementById('respon_komentar').value, true);
                xmlhttp_kirim.send();
            }

            function hapuskomentar(id_komentar_explicit) {
                var xmlhttp_kirim;
                if(window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp_kirim = new XMLHttpRequest();
                }
                else {
                    // code for IE6, IE5
                    xmlhttp_kirim = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp_kirim.onreadystatechange = function() {
                    if (xmlhttp_kirim.readyState == 4 && xmlhttp_kirim.status == 200) {
                        document.getElementById(id_komentar_explicit).remove();
                    }
                }

                xmlhttp_kirim.open("GET","<?php echo site_url('daftar_explicit/hapus_komentar_explicit/')?>" + id_komentar_explicit, true);
                xmlhttp_kirim.send();
            }
        </script>  