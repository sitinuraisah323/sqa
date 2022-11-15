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

        <div class="row">
            <div class="col-12">
                <?php echo $this->session->flashdata('success'); ?>
                <div class="schedule-tab">
                    <ul class="nav nav-pills text-center">

                    <?php if($this->session->userdata('role_id')==2){ ?>
                        <?php if($this->session->userdata('program')=='Tahsin'){ ?>
                        <li class="nav-item">
                            <a class="nav-link " href="#nov20" data-toggle="pill">
                                Tahsin
                                <span></span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php }else{ ?>
                            <li class="nav-item">
                            <a class="nav-link " href="#nov20" data-toggle="pill">
                                Tahsin
                                <span></span>
                            </a>
                        </li>

                        <?php } ?>

                    <?php if($this->session->userdata('role_id')==2){ ?>
                        <?php if($this->session->userdata('program')=='Tahfidz'){ ?>
                        <li class="nav-item">
                            <a class="nav-link " href="#nov21" data-toggle="pill">
                                Tahfidz
                                <span></span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php }else{ ?>
                            <li class="nav-item">
                            <a class="nav-link " href="#nov21" data-toggle="pill">
                                Tahfidz
                                <span></span>
                            </a>
                        </li>
                            
                        <?php } ?>

                     <?php if($this->session->userdata('role_id')==2){ ?>
                       <?php if($this->session->userdata('program')=='Tilawah'){ ?>
                        <li class="nav-item">
                            <a class="nav-link " href="#nov22" data-toggle="pill">
                                Tilawah
                                <span></span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php }else{ ?>
                             <li class="nav-item">
                            <a class="nav-link " href="#nov22" data-toggle="pill">
                                Tilawah
                                <span></span>
                            </a>
                        </li>
                            
                        <?php } ?>

                    </ul>
                </div>
                <div class="schedule-contents bg-schedule">
                    <div class="tab-content" id="pills-tabContent">
                    <?php if($this->session->userdata('role_id')==2){ ?>
                         <?php if($this->session->userdata('program')=='Tahsin'){ ?>
                        <div class="tab-pane fade show active schedule-item" id="nov20">
                            <!-- Headings -->
                        <?php if($this->session->userdata('role')== 'Administrator'){ ?>                            
                            <div class="download-button text-right">
                                <a href="<?php echo site_url('jadwal/add') ?>"><i class="fa fa-plus "></i> Add
                                    New</a>
                            </div>
                        
                        <?php } ?>
                            <ul class="m-0 p-0">
                                <li class="headings">
                                    <div class="time">Time</div>
                                    <div class="time">Date</div>
                                    <div class="subject">Description</div>
                                    <div class="venue">Venue</div>


                                </li>
                                <!-- Schedule Details -->

                                <?php $program = 0; 
                                foreach($tahsin as $data){
                                    $program = $data->id_program;
                                    ?>
                                <li class="schedule-details">
                                    <div class="block">
                                        <!-- time -->
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="time"><?php echo $data->time; ?></span>
                                        </div>
                                        <!-- Speaker -->
                                        <div class="time">
                                            <span
                                                class="time"><?php echo date('d M Y', strtotime($data->date)); ?></span>
                                        </div>
                                        <!-- Subject -->
                                        <div class="subject"><?php echo  $data->description; ?></div>
                                        <!-- Venue -->
                                        <div class="venue"><?php echo $data->venue; ?>
                                         <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                            <a href="<?php echo site_url('jadwal/edit_tahsin/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a>
                                        <?php } ?>

                                        </div>
                                    </div>
                                </li>
                                <?php } ?>


                            </ul>
                            <div class="download-button text-center">
                                <a href="<?php echo site_url('jadwal/pdf/'.$program) ?>"
                                    class="btn btn-main-md">Download Schedule</a>
                            </div>

                        </div>
                        <?php } ?>
                        <?php }else{ ?>
                            <div class="tab-pane fade show active schedule-item" id="nov20">
                            <!-- Headings -->
                        <?php if($this->session->userdata('role')== 'Administrator'){ ?>                            
                            <div class="download-button text-right">
                                <a href="<?php echo site_url('jadwal/add') ?>"><i class="fa fa-plus "></i> Add
                                    New</a>
                            </div>
                        
                        <?php } ?>
                            <ul class="m-0 p-0">
                                <li class="headings">
                                    <div class="time">Time</div>
                                    <div class="time">Date</div>
                                    <div class="subject">Description</div>
                                    <div class="venue">Venue</div>


                                </li>
                                <!-- Schedule Details -->

                                <?php $program = 0; 
                                foreach($tahsin as $data){
                                    $program = $data->id_program;
                                    ?>
                                <li class="schedule-details">
                                    <div class="block">
                                        <!-- time -->
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="time"><?php echo $data->time; ?></span>
                                        </div>
                                        <!-- Speaker -->
                                        <div class="time">
                                            <span
                                                class="time"><?php echo date('d M Y', strtotime($data->date)); ?></span>
                                        </div>
                                        <!-- Subject -->
                                        <div class="subject"><?php echo  $data->description; ?></div>
                                        <!-- Venue -->
                                        <div class="venue"><?php echo $data->venue; ?>
                                         <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                            <a href="<?php echo site_url('jadwal/edit_tahsin/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>


                            </ul>
                            <div class="download-button text-center">
                                <a href="<?php echo site_url('jadwal/pdf/'.$program) ?>"
                                    class="btn btn-main-md">Download Schedule</a>
                            </div>

                        </div>
                            
                        <?php } ?>

                    <?php if($this->session->userdata('role_id')==2){ ?>
                         <?php if($this->session->userdata('program')=='Tahfidz'){ ?>
                        <div class="tab-pane fade show active schedule-item" id="nov21">
                            <!-- Headings -->
                            <div class="download-button text-right">
                                 <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                <a href="<?php echo site_url('jadwal/add_tahfidz') ?>"><i class="fa fa-plus "></i> Add
                                    New</a>
                                    <?php } ?>
                            </div>
                            <ul class="m-0 p-0">
                                <li class="headings">
                                    <div class="time">Time</div>
                                    <div class="time">Date</div>
                                    <div class="subject">Description</div>
                                    <div class="venue">Venue</div>


                                </li>
                                <!-- Schedule Details -->

                                <?php 
                                $program = 0;
                                foreach($tahfidz as $data){
                                    $program = $data->id_program;
                                    ?>
                                    
                                <li class="schedule-details">
                                    <div class="block">
                                        <!-- time -->
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="time"><?php echo $data->time; ?></span>
                                        </div>
                                        <!-- Speaker -->
                                        <div class="time">
                                            <span
                                                class="time"><?php echo date('d M Y', strtotime($data->date)); ?></span>
                                        </div>
                                        <!-- Subject -->
                                        <div class="subject"><?php echo  $data->description; ?></div>
                                        <!-- Venue -->
                                        <div class="venue"><?php echo $data->venue; ?>
                                         <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                            <a href="<?php echo site_url('jadwal/edit_tahfidz/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>

                            </ul>
                            <div class="download-button text-center">
                                <a href="<?php echo site_url('jadwal/pdf/'.$program) ?>" class="btn btn-main-md">Download Schedule</a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php }else{ ?>
                            <div class="tab-pane fade show active schedule-item" id="nov21">
                            <!-- Headings -->
                            <div class="download-button text-right">
                                 <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                <a href="<?php echo site_url('jadwal/add_tahfidz') ?>"><i class="fa fa-plus "></i> Add
                                    New</a>
                                    <?php } ?>
                            </div>
                            <ul class="m-0 p-0">
                                <li class="headings">
                                    <div class="time">Time</div>
                                    <div class="time">Date</div>
                                    <div class="subject">Description</div>
                                    <div class="venue">Venue</div>


                                </li>
                                <!-- Schedule Details -->

                                <?php 
                                $program = 0;
                                foreach($tahfidz as $data){
                                    $program = $data->id_program;
                                    ?>
                                    
                                <li class="schedule-details">
                                    <div class="block">
                                        <!-- time -->
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="time"><?php echo $data->time; ?></span>
                                        </div>
                                        <!-- Speaker -->
                                        <div class="time">
                                            <span
                                                class="time"><?php echo date('d M Y', strtotime($data->date)); ?></span>
                                        </div>
                                        <!-- Subject -->
                                        <div class="subject"><?php echo  $data->description; ?></div>
                                        <!-- Venue -->
                                        <div class="venue"><?php echo $data->venue; ?>
                                         <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                            <a href="<?php echo site_url('jadwal/edit_tahfidz/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>

                            </ul>
                            <div class="download-button text-center">
                                <a href="<?php echo site_url('jadwal/pdf/'.$program) ?>" class="btn btn-main-md">Download Schedule</a>
                            </div>
                        </div>
                            
                        <?php } ?>
                        

                    <?php if($this->session->userdata('role_id')==2){ ?>
                         <?php if($this->session->userdata('program')=='Tilawah'){ ?>
                        <div class="tab-pane fade show active schedule-item" id="nov22">
                            <!-- Headings -->
                            <div class="download-button text-right">
                                 <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                <a href="<?php echo site_url('jadwal/add_tilawah') ?>"><i class="fa fa-plus "></i> Add
                                    New</a>
                                    <?php } ?>
                            </div>
                            <ul class="m-0 p-0">
                                <li class="headings">
                                    <div class="time">Time</div>
                                    <div class="time">Date</div>
                                    <div class="subject">Description</div>
                                    <div class="venue">Venue</div>


                                </li>
                                <!-- Schedule Details -->

                                <?php 
                                $program = 0;
                                foreach($tilawah as $data){
                                    $program = $data->id_program;
                                    ?>
                                <li class="schedule-details">
                                    <div class="block">
                                        <!-- time -->
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="time"><?php echo $data->time; ?></span>
                                        </div>
                                        <!-- Speaker -->
                                        <div class="time">
                                            <span
                                                class="time"><?php echo date('d M Y', strtotime($data->date)); ?></span>
                                        </div>
                                        <!-- Subject -->
                                        <div class="subject"><?php echo  $data->description; ?></div>
                                        <!-- Venue -->
                                        <div class="venue"><?php echo $data->venue; ?>
                                         <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                            <a href="<?php echo site_url('jadwal/edit_tilawah/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>

                            </ul>
                            <div class="download-button text-center">
                                <a href="<?php echo site_url('jadwal/pdf/'.$program) ?>" class="btn btn-main-md">Download Schedule</a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php }else{ ?>
                            <div class="tab-pane fade show active schedule-item" id="nov22">
                            <!-- Headings -->
                            <div class="download-button text-right">
                                 <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                <a href="<?php echo site_url('jadwal/add_tilawah') ?>"><i class="fa fa-plus "></i> Add
                                    New</a>
                                    <?php } ?>
                            </div>
                            <ul class="m-0 p-0">
                                <li class="headings">
                                    <div class="time">Time</div>
                                    <div class="time">Date</div>
                                    <div class="subject">Description</div>
                                    <div class="venue">Venue</div>


                                </li>
                                <!-- Schedule Details -->

                                <?php 
                                $program = 0;
                                foreach($tilawah as $data){
                                    $program = $data->id_program;
                                    ?>
                                <li class="schedule-details">
                                    <div class="block">
                                        <!-- time -->
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="time"><?php echo $data->time; ?></span>
                                        </div>
                                        <!-- Speaker -->
                                        <div class="time">
                                            <span
                                                class="time"><?php echo date('d M Y', strtotime($data->date)); ?></span>
                                        </div>
                                        <!-- Subject -->
                                        <div class="subject"><?php echo  $data->description; ?></div>
                                        <!-- Venue -->
                                        <div class="venue"><?php echo $data->venue; ?>
                                         <?php if($this->session->userdata('role')== 'Administrator'){ ?>   
                                            <a href="<?php echo site_url('jadwal/edit_tilawah/'.$data->id) ?>"
                                                class="btn btn-small"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$data->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>

                            </ul>
                            <div class="download-button text-center">
                                <a href="<?php echo site_url('jadwal/pdf/'.$program) ?>" class="btn btn-main-md">Download Schedule</a>
                            </div>
                        </div>
                            
                        <?php } ?>
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>

<script>
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

<!--====  End of Schedule  ====-->
<?php $this->load->view('jadwal/delete.php') ?>
<?php $this->load->view('temp/footer.php') ?>