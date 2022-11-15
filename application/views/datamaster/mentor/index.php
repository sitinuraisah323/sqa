<?php $this->load->view('temp/header'); ?>
<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Data Mentor</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Datamaster</a></li>
                    <li class="breadcrumb-item active">Mentor</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->



<!--==============================
=            Schedule            =
===============================-->

<section class="section schedule">
    <div class="container">
        <!-- <div class="row">
            <div class="col-12">
                 <div class="section-title">
                    <h3>Data Peserta<span class="alternate">SQAkhwat</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore
                    </p>
                </div> 
            </div>
        </div> -->
        <div class="row">
            <div class="col-12">

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                        <div class="download-button text-right">
                            <button type="button" style="background-color : #FA31A9; color : white;" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu">
                                
                                <a class="dropdown-item" href="<?php echo site_url('mentor/excel') ?>"><i class="bi-file-earmark-excel-fill" style=" color: green;"></i>&nbsp;&nbsp;&nbsp;Excel </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('mentor/pdf') ?>"><i class="bi-file-earmark-pdf-fill" style=" color: red;"></i>&nbsp;&nbsp;&nbsp;PDF</a>
                            </div>
                        </div>

                <!-- DataTables -->
                <div class="card mb-3">
                    
                    
                    <nav class="navbar card-header">
                        <a href="<?php echo site_url('mentor/add') ?>"><i class="fa fa-plus"></i> Add New</a>
                    
                         <form class="form-inline" method='post' action="<?php echo site_url('mentor') ?>" >
                            <input class="form-control mr-sm-2" name='search' type="text" placeholder="Search" aria-label="Search">
                            <button class="btn my-2 my-sm-0" style="color : #FA31A9; " type="submit">Search</button>
                            
                        </form>
                    </nav>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $no = 1;
                                foreach ($users as $data) {
                                ?>

                                    <tr>
                                        <td><?php  echo $no++; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td><?php echo $data->email; ?></td>
                                        <td><?php  echo $data->role; ?></td>
                                        <td><?php if($data->is_active == 0){  echo 'Non Aktif' ; } else{ echo 'Aktif';}?>
                                        </td>
                                        <td><a href="<?php echo base_url('mentor/edit/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <!-- <a onclick="deleteConfirm('<?php echo site_url('mentor/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a> -->

                                            <a href="<?php echo base_url('mentor/delete/'.$data->id)  ?>" id="a_id" class="btn btn-small text-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('td a#a_id').click(function() {
            return confirm("Apakah anda yakin akan menghapus data?");
        });
    });

function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}

$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdfHtml5',
            download: 'open'
        }]
    });
});
</script>

<!--====  End of Schedule  ====-->
<?php $this->load->view('jadwal/delete.php') ?>
<?php 
$this->load->view('temp/footer');
// $this->load->view('datamaster/peserta/add.php'); 
// $this->load->view('datamaster/peserta/edit.php'); 
$this->load->view('datamaster/mentor/js'); 

?>