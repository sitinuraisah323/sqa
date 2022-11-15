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
    <link href="<?php echo base_url(); ?>assets/images/favicon.png" rel="shortcut icon">

</head>

<body class="body-wrapper">
    <!--==================================
=            Registration            =
===================================-->

    <section class="registration">
        <div class="container-fuild p-0">
            <div class="row">

                <div class="col-lg-12 col-md-6 p-0">
                    <div class="registration-block bg-registration overlay-dark">
                        <div class="block" style="height: 500px; margin-top: 50px;">
                            <div class="title text-center">
                                <h3>Login to <span class="alternate">SQAkhwat</span></h3>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> -->
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>
                            <form method="post" action="<?php echo base_url('auth'); ?>">
                                <div class="row col-md-4 mx-auto">
                                    <div class="col-md-12">
                                        <?php echo form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                                        <input type=" text" class="form-control  main" placeholder="Enter Email ..."
                                            id="email" name="email" value="<?php echo set_value('email'); ?>">
                                    </div>
                                    <div class=" col-md-12">
                                        <?php echo form_error('password','<small class="text-danger pl-3">', '</small>'); ?>
                                        <input type="password" class="form-control  main"
                                            placeholder="Enter Password ..." id="password" name="password">
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-white-md">Sign In</button>
                                    </div>
                                    <br>
                                    <div class="col-12 title text-center">
                                        <br>
                                        <p>Belum punya Akun ? <a href="<?php echo base_url('auth/register'); ?>">Register
                                                Now</a>
                                        </p>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====  End of Registration  ====-->




    <!-- JAVASCRIPTS -->
    <!-- jQuey -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url(); ?>assets/plugins/popper/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Smooth Scroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- Isotope -->
    <script src="<?php echo base_url(); ?>assets/plugins/isotope/mixitup.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url(); ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Slick Carousel -->
    <script src="<?php echo base_url(); ?>assets/plugins/slick/slick.min.js"></script>
    <!-- SyoTimer -->
    <script src="<?php echo base_url(); ?>assets/plugins/syotimer/jquery.syotimer.min.js"></script>
    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/google-map/gmap.js"></script>
    <!-- Custom Script -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>

</html>