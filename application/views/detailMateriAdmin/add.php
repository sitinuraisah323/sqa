<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Materi SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Materi</li>
                    <li class="breadcrumb-item active">Tilawah</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->


<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>
<?php foreach($tahsin as $data){?>

<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('DetailMateri'.$data->id) ?>"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
        <h5>Kirim Tugas</h5>
                        <form class="row" action="<?php echo site_url('DetailMateri/add/'.$data->id) ?>" method="post"
                            enctype="multipart/form-data">
                             <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" >
                             <input type="hidden" name="id_materi" value="<?php echo $data->id; ?>" >
                             <input type="hidden" name="id_program" value="<?php echo $data->id_program; ?>" >
                             <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id'); ?>" >
                             
                            <div class="col-12">
                                <textarea class="form-control main<?php echo form_error('answer') ? 'is-invalid':'' ?>"
                                    name="answer" placeholder="Your Answer ...." rows="10"></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('task') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="file" class="form-control main" name="file" id="file"
                                    class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>"
                                    accept="image/png, image/jpeg,audio/mp3, audio/wma, .pdf, .doc,.docx,application/msword">
                            </div>


                            <?php if (isset($error)) : ?>
                            <div class="invalid-feedback"><?= $error ?></div>
                            <?php endif; ?>

                            <div class="col-12">

                                <input class="btn btn-main-md" type="submit" name="btn" value="KIRIM" />
                            </div>

                        </form>
                            <?php } ?>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
    <?php $this->load->view('temp/footer.php') ?>