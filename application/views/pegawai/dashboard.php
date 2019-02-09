            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content article"> 
                                <center>
                                    <h2><strong>Selamat Datang di Portal Knowledge Management System</strong></h2> 
                                    <h2><strong>PT. Ilmu Pengetahuan</strong></h2><br>
                                    <span style="font-size: 16px">
                                        KMS merupakan sistem yang berbasiskan teknologi informasi yang 
                                        dikembangkan untuk mendukung proses-proses inti dari KM yaitu, penciptaan knowledge (knowledge creation), penyimpanan knowledge (knowledge storage), pemindahan knowledge (knowledge transfer), dan pengaplikasian knowledge tersebut (knowledge application) dalam organisasi
                                    </span>
                                </center>
                                <br>
                                <hr>
                                <form method="post" role="form" action="<?php echo site_url('dashboard/string_matching')?>">
                                    <div class="input-group">
                                        <label></label>
                                        <input name="pattern" placeholder="Cari Knowledge" minlength="3" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>