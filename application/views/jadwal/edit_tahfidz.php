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
                    <li class="breadcrumb-item active">Jadwal</li>
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
            <a href="<?php echo site_url('jadwal/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

            <input type="hidden" name="id" value="<?php echo $jadwal->id?>" />
            <input type="hidden" name="id_program" value="2">
            <div class="form-row">
                <div class="col-3">
                    <label for="time">Time*</label>
                    <input type="time" name="time"
                        class="form-control <?php echo form_error('time') ? 'is-invalid':'' ?>" placeholder="Times time"
                        value="<?php echo $jadwal->time;?>">

                    <div class=" invalid-feedback">
                        <?php echo form_error('time') ?>
                    </div>
                </div>
                <div class="col-3">
                    <label for="date">Date*</label>
                    <input type="date" name="date"
                        class="form-control <?php echo form_error('date') ? 'is-invalid':'' ?>" placeholder="Date date"
                        value="<?php echo $jadwal->date ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('date') ?>
                    </div>
                </div>
                <div class="col-6">
                    <label for="name">Venue*</label>
                    <input type="text" name="venue"
                        class="form-control <?php echo form_error('venue') ? 'is-invalid':'' ?>"
                        placeholder="Venue venue" value="<?php echo $jadwal->venue ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('venue') ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description*</label>
                <textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
                    name="description"
                    placeholder="Product description..."><?php echo $jadwal->description ?></textarea>
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