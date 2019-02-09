            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_pegawai/tambah_pegawai')?>'"><i class="fa fa-plus"></i> Tambah Pegawai</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar pegawai</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>NIP</td>
                                            <td>Nama Pegawai</td>
                                            <td>Jenis Kelamin</td>
                                            <td>Alamat</td>
                                            <td>Jabatan</td>
                                            <td>Level User</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_pegawai as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nip']; ?></td>
                                            <td><?php echo $value['nama']; ?></td>
                                            <td><?php echo $value['jenis_kelamin']; ?></td>
                                            <td><?php echo $value['alamat']; ?></td>
                                            <td><?php echo $value['jabatan']; ?></td>
                                            <td>
                                                <?php 
                                                    if($value['level'] == 1) {
                                                        echo 'Pegawai Biasa';
                                                    }elseif($value['level'] == 2) {
                                                        echo 'Pakar';
                                                    }elseif ($value['level'] == 3) {
                                                        echo 'Admin';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger dim" onclick="if (confirm('Data pegawai akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_pegawai/hapus_pegawai/'.$value['id_pengguna'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>