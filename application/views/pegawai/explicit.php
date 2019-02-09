            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('pengetahuan/tambah_explicit')?>'"><i class="fa fa-plus"></i> Tambah Pengetahuan Explicit</button>
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
                                            <td>Lampiran</td>
                                            <td>Status</td>
                                            <td>Waktu Buat</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_explicit as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['judul']; ?></td>
                                            <td><button class="btn btn-success dim" onclick="location.href='<?php echo site_url('daftar_explicit/detail/'.$value['id_explicit'])?>'" type="button"><i class="fa fa-eye"></i> Lihat</button></td>
                                            <td><a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a></td>
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
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('pengetahuan/edit_explicit/'.$value['id_explicit'])?>'" type="button"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data explicit akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('pengetahuan/hapus_explicit/'.$value['id_explicit'].'/'.$value['lampiran'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
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