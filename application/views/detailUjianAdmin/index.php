<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>UJIAN SQAKHWAT </h3>
                </div>
                <?php foreach($tahsin as $data){
                    
                    if($data->id_program == 1){
                        $program = 'Tahsin';
                    }elseif($data->id_program == 2){
                        $program = 'Tahfidz';
                    }elseif($data->id_program == 3){
                        $program = 'Tilawah';
                    }
                    
                } ?>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Detail Ujian</li>
                    <li class="breadcrumb-item active"><?php echo $program; ?></li>
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
        <div class="row mt-30">
            <div class="col-lg-12 col-md-10 mx-auto">
                <div class="block">
            <?php echo $this->session->flashdata('message'); ?>

                    <article class="blog-post single">
                        <?php if($tahsin){ foreach($tahsin as $data){?>
                        <div class="post-content">
                            <div class="date">
                                <h4><?php echo date('d', strtotime($data->date)); ?><span><?php echo date('M', strtotime($data->date)); ?></span>
                                </h4>
                            </div>
                            <div class="post-title">
                                <h3><?php echo $data->title; ?>.</h3>
                            </div>
                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="fa fa-user-o"></i>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-heart-o"></i>
                                        <a href="#">350</a>
                                    </li>
                                    <?php if($data->file){ ?>
                                    <li class="list-inline-item">

                                        <a href="<?php echo base_url().'DetailUjianAdmin/download/'.$data->id ?>"><i
                                                class="fa fa-download"></i>Download Materi</a>

                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <div class="post-details">
                                <p>
                                    <?php echo $data->description; ?>
                                </p>
                                <?php $extention = substr($data->file,-3); 
                                if($data->file){
                                ?>
                                <div class="img-block">
                                    <?php if($extention == 'jpg' || $extention == 'peg' || $extention == 'png' ) { ?>
                                    <img src="<?php echo base_url(); ?>storage/materi/<?php echo $data->file; ?>" alt=""
                                        title="<?php echo $data->file; ?>" width="100%" height="100%"
                                        class="img-responsive" />
                                    <?php }
                                    if($extention == 'pdf'){ ?>
                                    <iframe src="<?php  echo base_url(); ?>storage/materi/<?php echo $data->file; ?>"
                                        width="100%" height="500px"></iframe>
                                    <a src="<?php echo base_url(); ?>storage/materi/<?php echo $data->file; ?>"></a>
                                    <?php } 
                                    if($extention == 'mp3' || $extention == 'wma'){
                                    ?>
                                    <audio src="<?php echo base_url().'DetailMateri/download/'.$data->id ?>" controls
                                        preload="meta"> </audio>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <div class="quotes">

                                    <h6>Ujian: </h6>

                                    <blockquote><?php echo $data->task; ?>. </blockquote>
                                </div>
                                <!-- <p>
                                    Amet consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore dolore
                                    magna aliqua enim ad minim veniam quis nostrud.laboris nisi ut aliquip ex ea commodo
                                    conse
                                </p> -->
                                <!-- <div class="share-block">
                                    <div class="tag">
                                        <p>
                                            Tags:
                                        </p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">Event,</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Conference,</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Business</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="share">
                                        <p>
                                            Share:
                                        </p>
                                        <ul class="social-links-share list-inline">
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-rss"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-vimeo"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                       
                    </article>
                   
                <?php } } ?>
                </div>
            </div>

        </div>
    </div>
     
</section>

<section class="section faq">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>TASK <span class="alternate">SQAKHWAT</span></h3>
				</div>
			</div>
		</div>
		<div class="row">
            <?php  if($task){
                foreach($task as $data){ ?>
			<div class="col-md-12">
				<div class="accordion-block">
					<div id="accordion">
						<!-- Collapse -->
                        
						<div class="card">
							<!-- Collapse Header -->
							<div class="card-header" id="headingOne">
							  <h5 class="mb-0">
							    <a data-toggle="collapse" href="#collapseOne<?php echo $data->id_exam;?>">
							      <span class="fa fa-plus-circle"></span><?php echo $data->nama; ?>
							    </a>
                                <?php if($data->status == 1) { ?>
                                <div class="pull-right">
                                    <i  class="btn btn-outline-success">Nilai : <?php echo $data->taskValue; ?></i>
                                    <i class="btn btn-success bi bi-check-circle"></i>
                                </div>
                                <?php }else{ ?>
                                <div class="pull-right"><botton class="btn btn-main-md" data-toggle="modal" data-target="#modal_add_new<?php echo $data->id_exam; ?>">Nilai</button></div>
                                <?php } ?>  

                                <div class="modal fade" id="modal_add_new<?php echo $data->id_exam; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                        <h3 class="modal-title" id="myModalLabel"></h3>
                                    </div>
                                    <form class="form-horizontal" method="post" action="<?php echo base_url().'detailUjianAdmin/add'?>">
                                        <div class="modal-body">
                        
                                            <div class="form-group">
                                                <label class="control-label col-xs-3" >Nilai</label>
                                                <div class="col-xs-8">
                                                    <input name="nilai" class="form-control" type="text" placeholder="Masukan Nilai..." >
                                                    <input type='hidden' name="id_examquestion" class="form-control" id='id_examquestion' value='<?php echo $data->id_examquestion; ?>'>
                                                    <input type='hidden' name="id_program" class="form-control" id='id_program' value='<?php echo $data->id_program; ?>'>
                                                    <input type='hidden' name="id_user" class="form-control" id='id_user' value='<?php echo $data->id_user; ?>'>
                                                    <input type='hidden' name="id_exam" class="form-control" id='id_exam' value='<?php echo $data->id_exam; ?>'>

                                                </div>
                                            </div>
                        
                                        </div>
                        
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                            <button class="btn btn-main-md">Simpan</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                <!--END MODAL ADD BARANG-->       
							  </h5>
							</div>
							<!-- Collapse Body -->
							<div id="collapseOne<?php echo $data->id_exam;?>" class="collapse show" data-parent="#accordion">
							  <div class="card-body">
                                <?php echo $data->answer; ?>
                                <?php $extention = substr($data->file,-3); 
                                if($data->file){
                                ?>
                                <div class="img-block">
                                    <?php if($extention == 'jpg' || $extention == 'peg' || $extention == 'png' ) { ?>
                                    <img src="<?php echo base_url(); ?>storage/task/<?php echo $data->file; ?>" alt=""
                                        title="<?php echo $data->file; ?>" width="100%" height="100%"
                                        class="img-responsive" />
                                    <?php }
                                    if($extention == 'pdf'){ ?>
                                    <iframe src="<?php  echo base_url(); ?>storage/task/<?php echo $data->file; ?>"
                                        width="100%" height="500px"></iframe>
                                    <a src="<?php echo base_url(); ?>storage/task/<?php echo $data->file; ?>"></a>
                                    <?php } 
                                    if($extention == 'mp3' || $extention == 'wma'){
                                    ?>
                                    <audio src="<?php echo base_url().'DetailUjian/download1/'.$data->id_exam ?>" controls
                                        preload="meta"> </audio>
                                    <?php } ?>
                                </div>
                                <?php } ?>
							  </div>
							</div>
						</div>
                       
						
					</div>
				</div>
			</div>
             <?php } }?>
			
		</div>
	</div>
</section>



<!--====  End of News Posts  ====-->

<?php $this->load->view('temp/footer.php') ?>

