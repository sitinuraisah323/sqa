<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Ujian SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Ujian</li>
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

<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('ujian/tilawah') ?>"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">

        <form action="<?php echo site_url('ujian/tilawah/add') ?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-3">
                    <label for="date">Date*</label>
                    <input type="date" name="date"
                        class="form-control <?php echo form_error('date') ? 'is-invalid':'' ?>" placeholder="Date" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" name="id_program" value="3">
                    <div class="invalid-feedback">
                        <?php echo form_error('date') ?>
                    </div>
                </div>
                <div class="col-6">
                    <label for="name">Title*</label>
                    <input type="text" name="title"
                        class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>" placeholder="Title">
                    <div class="invalid-feedback">
                        <?php echo form_error('title') ?>
                    </div>
                </div>
                <div class="col-3">
					<label for="avatar">Upload Materi</label>
					<input type="file" name="file" id="file" class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>" accept="image/png, image/jpeg,audio/mp3, audio/wma, .pdf, .doc,.docx,application/msword">
				</div>

				<?php if (isset($error)) : ?>
					<div class="invalid-feedback"><?= $error ?></div>
				<?php endif; ?>
            </div>
            

            <div class="form-group">
                <label for="task">Task*</label>
                <textarea class="form-control <?php echo form_error('task') ? 'is-invalid':'' ?>"
                    name="task" placeholder="Jadwal Task..."></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('task') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description*</label>
                <textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
                    name="description" placeholder="Jadwal description..."></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('description') ?>
                </div>
            </div>
            <div class="download-button text-center">

                <input class="download-button text-right btn btn-main-md" type="submit" name="btn" value="Save" />
            </div>
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
    <?php $this->load->view('temp/footer.php') ?>