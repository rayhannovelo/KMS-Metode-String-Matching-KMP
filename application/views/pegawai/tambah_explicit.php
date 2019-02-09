            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form class="form-horizontal" role="form" action="<?php echo site_url('pengetahuan/tambah_explicit_form')?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Judul :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="judul" placeholder="Judul" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Deskripsi :</label>
                                            <div class="col-lg-9">
                                                <textarea type="text" id="summernote" name="deskripsi" placeholder="Deskripsi Makanan" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Lampiran :</label>
                                            <div class="col-lg-9">
                                                <input type="file" accept="image/*,video/*,audio/*,.pps,.txt,.doc,.docx,.xlsx.,.xls,application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.slideshow,application/vnd.openxmlformats-officedocument.presentationml.presentation" name="lampiran" placeholder="lampiran" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>