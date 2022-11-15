<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>DATA NILAI SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Data Nilai</li>
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
        <!-- <div class="download-button text-right">
            <a href="<?php echo site_url('Nilai/Tahfidz/generate') ?> " class="btn btn-main-md"><i class="fa fa-plus "></i>Export</a>
        </div> -->

        <!-- <div class="download-button text-right">
                            <button type="button" style="background-color : #FA31A9; color : white;" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu">
                                
                                <a class="dropdown-item" href="<?php echo site_url('peserta/excel') ?>"><i class="bi-file-earmark-excel-fill" style=" color: green;"></i>&nbsp;&nbsp;&nbsp;Excel </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('peserta/pdf') ?>"><i class="bi-file-earmark-pdf-fill" style=" color: red;"></i>&nbsp;&nbsp;&nbsp;PDF</a>
                            </div>
                        </div>
        <div class="mt-30"> -->
        <!-- Table -->
        <table id='empTable' class='display dataTable'>

        <thead>
            <tr>
            <!-- <th>No</th> -->
            <th>Nama</th>
            <th>Email</th>
            <th>Tugas</th>
            <th>Ujian</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
            </tr>
        </thead>

        </table>  
    </div> 
    </div>
</section>

<!--====  End of News Posts  ====-->

<!-- <script>
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
</script> -->



<?php $this->load->view('materi/tahsin/delete.php') ?>
<?php $this->load->view('temp/footer.php') ?>

<script type="text/javascript">
	$(document).ready(function(){
	   	$('#empTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          'url':'<?=base_url()?>index.php/Nilai/Tahsin/valueList'
	      	},
	      	'columns': [
	         	// { data: 'no' },
	         	{ data: 'nama' },
	         	{ data: 'email' },
	         	{ data: 'nilai' },
	         	{ data: 'ujian' },
                { data: 'rata' },
                { data: 'keterangan' },
	      	],
            'dom': 'Bfrtip',
        'buttons': [
            { extend: 'excelHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ]
	   	});
	});
	</script>