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
                    <li class="breadcrumb-item active">Detail Materi</li>
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
                    <!-- Article -->

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

                                        <a href="<?php echo base_url().'DetailMateri/download/'.$data->id ?>"><i
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

                                    <h6>Tugas: </h6>

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
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                       
                    </article>
                    
                    <?php 
                        
                            if($task == null){
                            ?>
                    <div class="comment-form">
       
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
                    </div>
                    <?php } } }  ?>

                    <?php if($task){
                        foreach($task as $data){ ?>
                    <div class="comment-form">
       
                        <h5>Jawaban</h5>
                        <p>
                                    <?php echo $data->answer; 
                                    
                                    if($data->taskValue != null){
                                    ?>
                                    
                                    <div class="pull-right">
                                    <i  class="btn btn-outline-success">Nilai : <?php echo $data->taskValue; ?></i>
                                    <i class="btn btn-success bi bi-check-circle"></i>
                                </div>
                                <?php } ?>
                                </p>
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
                                    <audio src="<?php echo base_url().'DetailMateri/download1/'.$data->id ?>" controls
                                        preload="meta"> </audio>
                                    <?php } ?>
                                </div>
                                <?php } } }?>
                    </div>
                </div>
            </div>

        </div>
    </div>
     
</section>

<!--====  End of News Posts  ====-->

<?php $this->load->view('temp/footer.php') ?>