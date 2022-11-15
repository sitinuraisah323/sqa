<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SQAkhwat</title>

    <!-- PLUGINS CSS STYLE -->
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="<?php echo base_url(); ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Slick Carousel -->
    <link href="<?php echo base_url(); ?>assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/slick/slick-theme.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- FAVICON -->
    <link href="<?php echo base_url(); ?>assets/images/Capture22.png" rel="shortcut icon">


    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        
    
</head>

<body class="body-wrapper">


    <!--========================================
=            Navigation Section            =
=========================================-->

    <nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
        <div class="container-fluid p-0">
            <!-- logo -->
            <a class="navbar-brand" href="index.php">
                <img src="<?php echo base_url(); ?>assets/images/Capture12.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown active dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url('users'); ?>">Home
                            <span></span>
                        </a>

                    </li>

                    <?php if($this->session->userdata('role_id')==1){ ?>

                    <li class=" nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?> ">Datamaster
                            <span></span>
                        </a>
                    </li>
                    <li class=" nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="#" data-toggle="dropdown"><span></span></a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Peserta</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Mentor</a>
                        </div>
                    </li>

                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(''); ?>">Program<span></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(''); ?>">Jadwal<span></span></a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahsin</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahfidz</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tilawah</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(''); ?>">Materi<span></span></a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahsin</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahfidz</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tilawah</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Ujian
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahsin</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>l">Tahfidz</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tilawah</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(''); ?>">Sertifikat<span></span></a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahsin</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tahfidz</a>
                            <a class="dropdown-item" href="<?php echo base_url(''); ?>">Tilawah</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(''); ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">

                        </a>
                    </li>
                    <?php 
                    if(isset($this->session->userdata['logged_in'])){
                    ?>
                    <li class=" icons dropdown">

                        <div class='col-lg-4 col-md-6 align-self-center' data-toggle="dropdown">
                            <div class='image-block bg-about'>
                                <img class='img-fluid'
                                    src='<?php echo base_url(); ?>assets/images/speakers/featured-speaker.jpg' alt=''>
                            </div>
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url('users/profil'); ?>"><i class="icon-user"></i>
                                            <span>Profile</span></a>
                                    </li>


                                    <hr class="my-2">

                                    <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-key"></i>
                                            <span>Logout</span></a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </li>
                    <? } ?>

                </ul>

            </div>
        </div>
    </nav>

    <!--====  End of Navigation Section  ====-->