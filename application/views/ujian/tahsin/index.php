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
                    <li class="breadcrumb-item active">Ujian</li>
                    <li class="breadcrumb-item active">Tahsin</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->

<!--================================
=            News Posts            =
=================================-->

<section class="news section">
    
    <div class="container">
        <?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>
        <div class="download-button text-right">
             <?php if($this->session->userdata('role')!= 'Peserta'){ ?>   
                                <a href="<?php echo site_url('ujian/tahsin/add') ?> " class="btn btn-main-md"><i class="fa fa-plus "></i> Add
                                    New</a>
                                    <?php } ?>
                            </div>
        <div class="row mt-30">
            
            <?php foreach($tahsin as $data){ 
                // var_dump($tahsin);exit;
                ?>
            <div class="col-lg-4 col-md-6 col-sm-8 col-10 m-auto">
                <div class="blog-post">
                    <div class="post-thumb">
                        <!-- <a href="news-single.html">
                            <img src="images/news/post-thumb-one.jpg" alt="post-image" class="img-fluid">
                        </a> -->
                    </div>
                    <div class="post-content">
                        <div class="date">
                            <h4><?php echo date('d', strtotime($data->date)); ?><span><?php echo date('M', strtotime($data->date)); ?></span>
                            </h4>
                        </div>
                        <div class="post-title">
                            <h2>
                                <?php if($this->session->userdata('role_id')==1){ ?>
                                <a href="<?php echo base_url();?>/DetailUjianAdmin/index/<?php echo $data->id;?>"><?php echo $data->title;?></a>                                
                                <?php }else{ ?>
                                <a href="<?php echo base_url();?>/DetailUjian/index/<?php echo $data->id;?>"><?php echo $data->title;?></a>
                                <?php } ?>
                            </h2>
                        </div>
                        <div class="post-meta">
                             <?php if($this->session->userdata('role')!= 'Peserta'){ ?>   
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-o"></i>
                                    <a href="#">Admin</a>
                                </li>
                                <!-- <li class="list-inline-item">
                                    <i class="fa fa-heart-o"></i>
                                    <a href="#">350</a>
                                </li> -->
                                <li class="list-inline-item">
                                    <a href="<?php echo site_url('ujian/tahsin/edit/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <!-- <a onclick="deleteConfirm('<?php echo site_url('ujian/tahsin/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a> -->
                                            <a href="<?php echo base_url('ujian/tahsin/delete/'.$data->id)  ?>" id="a_id" class="btn btn-small text-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                </li>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="col-12 text-center">
                <!-- Pagination -->
                <!-- <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="prev">
                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                <span class="sr-only">prev</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</section>

<!--====  End of News Posts  ====-->

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
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            }
        ]
    } );
} );
</script>

<?php $this->load->view('ujian/tahsin/delete.php') ?>
<?php $this->load->view('temp/footer.php') ?>