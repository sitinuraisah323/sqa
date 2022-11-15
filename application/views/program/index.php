<?php $this->load->view( 'temp/header.php' );
?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Program SQA</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Program</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->
<!-- ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ==
=            Pricing Table            =
===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === -->

<section class='section pricing'>
    <div class='container'>
        <div class='row'>
            <div class='col-12'>
                <div class='section-title'>
                    <!-- <h3>Program <span class='alternate'>SQA</span></h3> -->
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor incididunt ut labore
                    </p> -->
                     <?php echo $this->session->flashdata('message'); ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-4 col-md-6'>
                <!-- Pricing Item -->
                <div class='pricing-item'>
                    <div class='pricing-heading'>
                        <!-- Title -->
                        <div class='title'>
                            <h6>TAHSIN</h6>
                        </div>
                        <!-- Price -->
                        <div class='price'>
                            <h2>Free<span>$</span></h2>
                            <p>/Person</p>
                        </div>
                    </div>
                    <div class='pricing-body'>
                        <!-- Feature List -->
                        <ul class='feature-list m-0 p-0'>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Dibimbing Langsung oleh Mentor</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Kajian Motivasi</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Ujian diakhir program</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Sertifikat diakhir program</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Gratis</p>
                            </li>
                            <!-- <li>
                                <p><span class='fa fa-times-circle unavailable'></span>Easy Access</p>
                            </li> -->
                        </ul>
                    </div>
                    <div class='pricing-footer text-center'>
                        
                        <!-- <a onclick="deleteConfirm('<?php echo site_url('program/add/1') ?>')"
                                                href="#" class='btn btn-transparent-md'>Daftar Program</a> -->
                        <a href="<?php echo base_url('program/add/1')  ?>" id="a_id" class='btn btn-transparent-md'>
                                                Daftar Program
                                            </a>
                    </div>
                </div>
            </div>
            <div class='col-lg-4 col-md-6'>
                <!-- Pricing Item -->
                <div class='pricing-item featured'>
                    <div class='pricing-heading'>
                        <!-- Title -->
                        <div class='title'>
                            <h6>TAHFIDZ</h6>
                        </div>
                        <!-- Price -->
                        <div class='price'>
                            <h2>Free<span>$</span></h2>
                            <p>/Person</p>
                        </div>
                    </div>
                    <div class='pricing-body'>
                        <!-- Feature List -->
                        <ul class='feature-list m-0 p-0'>
                           
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Dibimbing Langsung oleh Mentor</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Waktu Setoran Fleksibel</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Tadabbur Surat</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Kajian Motivasi Al-Qur’an</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Sertifikat Hafalan</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Gratis</p>
                            </li>
                        </ul>
                    </div>
                    <div class='pricing-footer text-center'>
                         <!-- <a onclick="deleteConfirm('<?php echo site_url('program/add/2') ?>')"
                                                href="#"  class='btn btn-main-md'>Daftar Program</a> -->

                        <a href="<?php echo base_url('program/add/2')  ?>" id="a_id" class='btn btn-transparent-md'>
                                                Daftar Program
                                            </a>
                    </div>
                </div>
            </div>
            <div class='col-lg-4 col-md-6 m-auto'>
                <!-- Pricing Item -->
                <div class='pricing-item'>
                    <div class='pricing-heading'>
                        <!-- Title -->
                        <div class='title'>
                            <h6>TILAWAH</h6>
                        </div>
                        <!-- Price -->
                        <div class='price'>
                            <h2>Free<span>$</span></h2>
                            <p>/Person</p>
                        </div>
                    </div>
                    <div class='pricing-body'>
                        <!-- Feature List -->
                        <ul class='feature-list m-0 p-0'>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Dibimbing Langsung oleh Mentor</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Kajian Motivasi</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Sertifikat diakhir program</p>
                            </li>
                            <li>
                                <p><span class='fa fa-check-circle available'></span>Gratis</p>
                            </li>
                            <!-- <li>
                                <p><span class='fa fa-times-circle unavailable'></span>Easy Access</p>
                            </li> -->

                        </ul>
                    </div>
                    <div class='pricing-footer text-center'>
                        <!-- <a onclick="deleteConfirm('<?php echo site_url('program/add/3') ?>')"
                                                href="#" class='btn btn-transparent-md'>Daftar Program</a> -->
                        <a href="<?php echo base_url('program/add/3')  ?>" id="a_id" class='btn btn-transparent-md'>
                                                Daftar Program
                                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===  =  End of Pricing Table  ===  = -->
<?php $this->load->view('program/asking.php') ?>
<?php $this->load->view( 'temp/footer.php' );
?>


<script>

    $(function() {
        $('td a#a_id').click(function() {
            return confirm("Apakah anda yakin akan akan mendaftar program ini?");
        });
    });
    $(function() {
        $('td a#a_id').click(function() {
            return confirm("Apakah anda yakin akan akan mendaftar program ini?");
        });
    });
    $(function() {
        $('td a#a_id').click(function() {
            return confirm("Apakah anda yakin akan akan mendaftar program ini?");
        });
    });
function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
