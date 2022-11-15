<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Mentor SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Edit Mentor</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->



<!-- Card  -->
<div class="card mb-3">
    <div class="card-header">
        <div class="card-header">
            <a href="<?php echo site_url('peserta') ?>"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

            <?php// foreach($peserta as $data){ ?>
            <input type="hidden" name="id" value="<?php echo $peserta->id?>" />
            <input type="hidden" name="id_program" value="2">
            <div class="form-row">
                <div class="col-3">
                    <label for="nama">Nama*</label>
                    <input type="text" name="nama"
                        class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" placeholder="Nama nama"
                        value="<?php echo $peserta->nama ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('nama') ?>
                    </div>
                </div>
                <div class="col-6">
                    <label for="email">Email*</label>
                    <input type="email" name="email"
                        class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
                        placeholder="Email email" value="<?php echo $peserta->email ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('email') ?>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-3">
                    <label for="password">Password*</label>
                    <input type="password" name="password"
                        class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
                        placeholder="Password password">
                    <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                    </div>
                </div>
                <div class="col-6">
                    <label for="role">Role*</label>
                    <select name="role_id" class="form-control <?php echo form_error('role_id') ? 'is-invalid':'' ?>">
                        <?php foreach ($role as $k)
						{ ?>
                        <option value="<?php echo $k->id ?> " <?php echo $peserta->role_id==$k->id?'selected':''; ?>>
                            <?php echo $k->role ?></option>
                        <?php } ?>
                    </select>

                    <div class="invalid-feedback">
                        <?php echo form_error('role_id') ?>
                    </div>
                </div>




            </div>

            <div class="col-6"></div>
            <br><br>
            <div class="download-button text-center">

                <input class="download-button text-right btn btn-main-md" type="submit" name="btn" value="Save" />
            </div>
            <?php// } ?>
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>
    <?php $this->load->view('temp/footer.php') ?>