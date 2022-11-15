<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Jadwal SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Materi</li>
                    <li class="breadcrumb-item active">Tahsin</li>
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

<!-- Card  -->
<div class="card mb-3">
    <div class="card-header">
        <div class="card-header">
            <a href="<?php echo site_url('materi/tahsin') ?>"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

            <input type="hidden" name="id" value="<?php echo $materi->id?>" />
            <input type="hidden" name="id_program" value="1">
            <div class="form-row">
                <div class="col-3">
                    <label for="date">Date*</label>
                    <input type="date" name="date"
                        class="form-control <?php echo form_error('date') ? 'is-invalid':'' ?>" placeholder="Date date"
                        value="<?php echo $materi->date ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('date') ?>
                    </div>
                </div>
                <div class="col-6">
                    <label for="name">Title*</label>
                    <input type="text" name="title"
                        class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>"
                        placeholder="Venue venue" value="<?php echo $materi->title ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('title') ?>
                    </div>
                </div>
                <div class="col-3">
                    <label for="name">Upload Materi</label>
                    <input type="file" name="file"
                        class="form-control <?php echo form_error('file') ? 'is-invalid':'' ?> " accept="image/png, image/jpeg,audio/mp3, audio/wma, .pdf, .doc,.docx,application/msword"
                        placeholder="Venue file">
                    <input type="hidden" name="old_file"
                        placeholder="Venue file" value="<?php echo $materi->file ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('file') ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="task">Task</label>
                <textarea class="form-control <?php echo form_error('task') ? 'is-invalid':'' ?>"
                    name="task"
                    placeholder="Product task..."><?php echo $materi->task ?></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('task') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description*</label>
                <textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
                    name="description"
                    placeholder="Product description..."><?php echo $materi->description ?></textarea>
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