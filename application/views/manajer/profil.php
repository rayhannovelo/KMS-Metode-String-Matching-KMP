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
                                        <?php foreach ($profil as $key => $value) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('profil/edit_profil_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data profil akan diperbarui. Apakah Anda yakin?');">
                                        <div class="form-group">
                                            <label>NIP :</label>
                                            <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo $value['nip']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan :</label>
                                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $value['jabatan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Akun :</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password Baru">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pegawai :</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai" value="<?php echo $value['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin :</label>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" class="form-control">
                                                    <option value="Laki-laki" <?php echo $value['jenis_kelamin'] == "Laki-laki" ? 'selected' : ''; ?>>Laki-laki</option>
                                                    <option value="Perempuan" <?php echo $value['jenis_kelamin'] == "Perempuan" ? 'selected' : ''; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <input type="text" name="alamat" class="form-control" placeholder="Username" value="<?php echo $value['alamat']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Foto :</label>
                                            <div class="col-lg-9">
                                                <div class="fileinput fileinput-new col-sm-9" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                      <img src="<?php echo base_url('assets/img/profil/'.$value['thumbnail'])?>" alt="Image 1">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    </div>
                                                    <div>
                                                      <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span>
                                                        <span class="fileinput-exists">Ganti</span>
                                                        <input type="hidden" value="<?php echo $value['foto'] ?>" name="foto">
                                                        <input type="hidden" value="<?php echo $value['thumbnail'] ?>" name="thumbnail">
                                                        <input type="file" name="foto_baru" accept="image/*">
                                                      </span>
                                                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
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