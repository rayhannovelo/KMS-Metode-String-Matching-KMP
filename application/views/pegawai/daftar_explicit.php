        <style type="text/css">
            .blog img {
                display: block;
                max-width: 100%;
                height: auto
            };
        </style>
        <div class="wrapper wrapper-content  animated fadeInRight blog">
            <div class="row">
                <?php foreach ($daftar_explicit as $key => $value) { ?>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <a href="<?php echo site_url('daftar_explicit/detail/'.$value['id_explicit']); ?>" class="btn-link">
                                <h2>
                                    <?php echo $value['judul']; ?>
                                </h2>
                            </a>
                            <div class="small m-b-xs">
                                <strong>
                                    <i class="fa fa-user"></i> <?php echo $value['nama']; ?></strong> 
                                    <span class="text-muted">
                                        / <i class="fa fa-clock-o"></i> <?php echo date_format(date_create($value['waktu_buat']), 'jS F Y'); ?>
                                        / <i class="fa fa-comments-o"></i> <?php echo $value['jumlah_komentar']; ?>
                                    </span>
                            </div>
                            <?php 
                                $konten = word_limiter($value['deskripsi'], 30);
                                $konten = html_purify($konten);
                                echo $konten; 
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>