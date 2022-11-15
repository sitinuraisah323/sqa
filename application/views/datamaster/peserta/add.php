<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Peserta SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Datamaster</a></li>
                    <li class="breadcrumb-item active">Peserta</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->


<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('peserta/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">

        <form action="<?php echo site_url('peserta/add') ?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-3">
                    <label for="nama">Nama*</label>
                    <input type="text" name="nama"
                        class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" placeholder="Nama">
                    <input type="hidden" name="role_id" class="form-control" placeholder="namas" value="2">
                    <div class=" invalid-feedback">
                        <?php echo form_error('nama') ?>
                    </div>
                </div>
                <div class="col-3">
                    <label for="date">Email*</label>
                    <input type="email" name="email"
                        class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" placeholder="Email">
                    <div class="invalid-feedback">
                        <?php echo form_error('email') ?>
                    </div>
                </div>
                <div class="col-3">
                    <label for="password">Password*</label>
                    <input type="password" name="password"
                        class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
                        placeholder="Password">
                    <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                    </div>
                </div>
            </div>
            <br><br>
            
            <div class="col-3"></div>
            
            <div class="download-button text-center">

                <input class="download-button text-right btn btn-main-md" type="submit" name="btn" value="Save" />
            </div>
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
    <?php $this->load->view('temp/footer.php') ?>