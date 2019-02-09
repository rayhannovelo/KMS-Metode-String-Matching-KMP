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
                                        <form class="m-t" role="form" action="<?php echo site_url('daftar_pegawai/tambah_pegawai_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data Pegawai akan ditambahkan. Apakah Anda yakin?');">
                                        <div class="form-group">
                                            <label>NIP :</label>
                                            <input type="text" name="nip" class="form-control" placeholder="NIP">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Akun :</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password Baru">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pegawai :</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin :</label>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" class="form-control">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan :</label>
                                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                                        </div>
                                        <div class="form-group">
                                            <label>Level User :</label>
                                            <div class="form-group">
                                                <select name="level" class="form-control">
                                                    <option value="1">Pegawai Biasa</option>
                                                    <option value="2">Pakar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>