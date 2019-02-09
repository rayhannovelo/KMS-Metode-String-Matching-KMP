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
                                    <?php foreach ($explicit as $key => $value) { ?>
                                    <form class="form-horizontal" role="form" action="<?php echo site_url('pengetahuan/edit_explicit_form/'.$value['id_explicit'])?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Judul :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="judul" placeholder="Judul" class="form-control" value="<?php echo $value['judul']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Deskripsi :</label>
                                            <div class="col-lg-9">
                                                <textarea type="text" id="summernote" name="deskripsi" placeholder="Deskripsi Makanan" class="form-control"><?php echo $value['deskripsi']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Lampiran :</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" name="lampiran_lama" value="<?php echo $value['lampiran']; ?>">
                                                <input type="file" name="lampiran" placeholder="Lampiran" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>