<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KMS | <?php echo $title ?></title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css')?>" rel="stylesheet">
    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/js/plugins/photoswipe/photoswipe.css'>
    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/js/plugins/photoswipe/default-skin/default-skin.css'>
    <link href="<?php echo base_url('assets/css/plugins/jasny/jasny-bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/summernote/summernote.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/summernote/summernote-bs3.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    
</head>

<body class="skin-3" onload="start();">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <img alt="image" class="img-circle" width="48" height="48" src="<?php echo $this->session->userdata('thumbnail') != '' ?  base_url('assets/img/profil/'.$this->session->userdata('thumbnail')) : base_url('assets/img/avatar.png'); ?>" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold"><?php echo $this->session->userdata('nama'); ?></strong>
                                </span>
                            </span>
                            <?php echo $this->session->userdata('jabatan'); ?>
                        </a>
                    </div>
                    <div class="logo-element">
                        KMS
                    </div>
                </li>
                <li>
                    <a href="#"><center><strong><span class="nav-label">Daftar Menu</span></strong></center></a>
                </li>

                <!-- Pegawai -->
                <?php if ($this->session->userdata('level') == 1): ?>
                <li <?php echo $active == 'dashboard' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li <?php echo $active == 'daftar_tacit' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_tacit')?>"><i class="fa fa-rss"></i> <span class="nav-label">Daftar Tacit</span></a>
                </li>
                <li <?php echo $active == 'daftar_explicit' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_explicit')?>"><i class="fa fa-book"></i> <span class="nav-label">Daftar Explicit</span></a>
                </li>
                <li <?php echo $active == 'pengetahuan' ? 'class="active"' : ''; ?>>
                    <a href="#"><i class="fa fa-star"></i> <span class="nav-label">Pengetahuan Saya</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="">
                        <li><a href="<?php echo site_url('pengetahuan/tacit')?>">Pengetahuan Tacit</a></li>
                        <li><a href="<?php echo site_url('pengetahuan/explicit')?>">Pengetahuan Explicit</a></li>
                    </ul>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <!-- Pakar -->
                <?php elseif ($this->session->userdata('level') == 2): ?>
                <li <?php echo $active == 'dashboard' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li <?php echo $active == 'daftar_tacit' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_tacit')?>"><i class="fa fa-rss"></i> <span class="nav-label">Daftar Tacit</span></a>
                </li>
                <li <?php echo $active == 'daftar_explicit' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_explicit')?>"><i class="fa fa-book"></i> <span class="nav-label">Daftar Explicit</span></a>
                </li>
                <li <?php echo $active == 'validasi' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('validasi')?>"><i class="fa fa-check"></i> <span class="nav-label">Validasi Pengetahuan</span></a>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <!-- Admin -->
                <?php elseif ($this->session->userdata('level') == 3): ?>
                <li <?php echo $active == 'dashboard' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li <?php echo $active == 'daftar_tacit' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_tacit')?>"><i class="fa fa-rss"></i> <span class="nav-label">Daftar Tacit</span></a>
                </li>
                <li <?php echo $active == 'daftar_explicit' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_explicit')?>"><i class="fa fa-book"></i> <span class="nav-label">Daftar Explicit</span></a>
                </li>
                <li <?php echo $active == 'daftar_pegawai' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('daftar_pegawai')?>"><i class="fa fa-users"></i> <span class="nav-label">Daftar Pegawai</span></a>
                </li>
                <li <?php echo $active == 'pengetahuan' ? 'class="active"' : ''; ?>>
                    <a href="#"><i class="fa fa-star"></i> <span class="nav-label">Pengetahuan Saya</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="">
                        <li><a href="<?php echo site_url('pengetahuan/tacit')?>">Pengetahuan Tacit</a></li>
                        <li><a href="<?php echo site_url('pengetahuan/explicit')?>">Pengetahuan Explicit</a></li>
                    </ul>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>
                <?php endif; ?>   
                <li>
                    <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Log out</span></a>
                </li>
            </ul>

        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Selamat Datang, <?php echo $this->session->userdata('nama') ?></span>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout')?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>