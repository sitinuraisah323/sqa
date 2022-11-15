<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60">
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

        <!-- Datatable CSS -->
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</head>

<body class="body-wrapper">

    <!-- admin ->datamaster, program, sertifikat-->
    <!-- user -->
    <!-- mentor -->

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
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url('users'); ?>">Home
                            <span></span>
                        </a>

                    </li>

                    <?php if($this->session->userdata('role_id')==1){ ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="#" data-toggle="dropdown">Datamaster
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url('peserta'); ?>">Peserta</a>
                            <a class="dropdown-item" href="<?php echo base_url('mentor'); ?>">Mentor</a>
                        </div>
                    </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('program'); ?>">Program<span></span></a>
                    </li>
                    

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('jadwal'); ?>">Jadwal<span></span></a>
                    </li>

                    <?php if($this->session->userdata('role_id')!=2){ ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Materi
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url('materiAdmin/tahsin'); ?>">Tahsin</a>

                            <a class="dropdown-item" href="<?php echo base_url('materiAdmin/tahfidz'); ?>">Tahfidz</a>

                            <a class="dropdown-item" href="<?php echo base_url('materiAdmin/tilawah'); ?>">Tilawah</a>

                        </div>
                    </li>
                    <?php } ?>

                    <?php if($this->session->userdata('role_id')==2 ){ ?>
                    <?php if($this->session->userdata('program')){ ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Materi
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            <?php if($this->session->userdata('program')=='Tahsin'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url('materi/tahsin'); ?>">Tahsin</a>
                            <?php } ?>

                            <?php if($this->session->userdata('program')=='Tahfidz'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url('materi/tahfidz'); ?>">Tahfidz</a>
                            <?php } ?>

                            <?php if($this->session->userdata('program')=='Tilawah'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url('materi/tilawah'); ?>">Tilawah</a>
                            <?php } ?>

                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                     
                    <?php if($this->session->userdata('role_id') != 2){ ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Ujian
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">
                            
                            <a class="dropdown-item" href="<?php echo base_url('ujian/tahsin'); ?>">Tahsin</a>

                            <a class="dropdown-item" href="<?php echo base_url('Ujian/tahfidz'); ?>">Tahfidz</a>

                            <a class="dropdown-item" href="<?php echo base_url('Ujian/tilawah'); ?>">Tilawah</a>

                        </div>
                    </li>
                    <?php } ?>

                    <?php if($this->session->userdata('role_id')==2){ ?>
                    <?php if($this->session->userdata('program')){ ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Ujian
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">

                            <?php if($this->session->userdata('program')=='Tahsin'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url('ujian/tahsin'); ?>">Tahsin</a>
                            <?php } ?>
                            <?php if($this->session->userdata('program')=='Tahfidz'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url('Ujian/tahfidz'); ?>">Tahfidz</a>
                            <?php } ?>
                            <?php if($this->session->userdata('program')=='Tilawah'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url('Ujian/tilawah'); ?>">Tilawah</a>
                            <?php } ?>

                        </div>
                    </li>
                    <?php } 
                    }?>

                    <?php if($this->session->userdata('role_id')!=2){ ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Nilai
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="<?php echo base_url('nilai/tahsin'); ?>">Tahsin</a>

                            <a class="dropdown-item" href="<?php echo base_url('nilai/tahfidz'); ?>">Tahfidz</a>

                            <a class="dropdown-item" href="<?php echo base_url('nilai/tilawah'); ?>">Tilawah</a>

                        </div>
                    </li>
                    <?php } ?>

                    
                    <?php  
                     if($this->session->userdata('role_id')!=2){ 
                       
                        ?>
                    <li class="nav-item dropdown dropdown-slide">
                        <a class="nav-link" href="<?php echo base_url(''); ?>" data-toggle="dropdown">Sertifikat
                            <span></span>
                        </a>
                        <!-- Dropdown list -->
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="<?php echo base_url('sertifikat/tahsin'); ?>">Tahsin</a>

                            <a class="dropdown-item" href="<?php echo base_url('sertifikat/tahfidz'); ?>">Tahfidz</a>

                            <a class="dropdown-item" href="<?php echo base_url('sertifikat/tilawah'); ?>">Tilawah</a>

                        </div>
                    </li>
                    <?php } ?>

                    <?php if($this->session->userdata('role_id')==2){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('sertifikat/sertifikat'); ?>">Sertifikat<span></span></a>
                    </li>
                    <?php } ?>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(''); ?>">Contact</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link">

                        </a>
                    </li>
                    <?php //if(isset($this->session->userdata['logged_in'])){
 ?>
                    <li class=" icons dropdown">

                        <div class='col-lg-4 col-md-6 align-self-center' data-toggle="dropdown">
                            <div class='image-block bg-about'>
                                <a href=""><img class='img-fluid' src='<?php echo base_url(); ?>assets/images/user.png'
                                        alt=''></a>
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
                    <?php //}?>

                </ul>

            </div>
        </div>
    </nav>

    <!--====  End of Navigation Section  ====-->