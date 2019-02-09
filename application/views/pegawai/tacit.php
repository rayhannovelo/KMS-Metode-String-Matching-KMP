            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('pengetahuan/tambah_tacit')?>'"><i class="fa fa-plus"></i> Tambah Pengetahuan Tacit</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Judul</td>
                                            <td>Deskripsi</td>
                                            <td>Status</td>
                                            <td>Waktu Buat</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_tacit as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['judul']; ?></td>
                                            <td><button class="btn btn-success dim" onclick="location.href='<?php echo site_url('daftar_tacit/detail/'.$value['id_tacit'])?>'" type="button"><i class="fa fa-eye"></i> Lihat</button></td>
                                            <td>
                                                <?php if($value['status'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status']; ?></span>
                                                <?php elseif ($value['status'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status']; ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo $value['status']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $value['waktu_buat']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('pengetahuan/edit_tacit/'.$value['id_tacit'])?>'" type="button"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data tacit akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('pengetahuan/hapus_tacit/'.$value['id_tacit'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
                                                </div>
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