            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> Tacit</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama</td>
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
                                            <td><?php echo $value['nama']; ?></td>
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
                                                <?php if($value['status'] == 'Belum Divalidasi'): ?>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('validasi/tacit/Valid/'.$value['id_tacit'])?>'" type="button"><i class="fa fa-check"></i> Valid</button>
                                                        <button class="btn btn-danger dim" onclick="location.href='<?php echo site_url('validasi/tacit/Tidak Valid/'.$value['id_tacit'])?>'" type="button"><i class="fa fa-times"></i> Tidak</button>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning dim" onclick="location.href='<?php echo site_url('validasi/tacit/Belum Divalidasi/'.$value['id_tacit'])?>'" type="button"><i class="fa fa-undo"></i> Batalkan</button>
                                                    </div>
                                                <?php endif; ?>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> Explicit</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama</td>
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
                                            <td><?php echo $value['nama']; ?></td>
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
                                                <?php if($value['status'] == 'Belum Divalidasi'): ?>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('validasi/explicit/Valid/'.$value['id_explicit'])?>'" type="button"><i class="fa fa-check"></i> Valid</button>
                                                        <button class="btn btn-danger dim" onclick="location.href='<?php echo site_url('validasi/explicit/Tidak Valid/'.$value['id_explicit'])?>'" type="button"><i class="fa fa-times"></i> Tidak</button>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning dim" onclick="location.href='<?php echo site_url('validasi/explicit/Belum Divalidasi/'.$value['id_explicit'])?>'" type="button"><i class="fa fa-undo"></i> Batalkan</button>
                                                    </div>
                                                <?php endif; ?>
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