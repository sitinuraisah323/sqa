<?php $this->load->view('temp/header.php') ?>

<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Sertifikat SQAkhwat</h3>
                </div>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Sertifikat</li>
                    <li class="breadcrumb-item active">Tilawah</li>
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
            <a href="<?php echo site_url('Sertifikat/Tilawah/generate') ?> " class="btn btn-main-md"> Generate</a>
        </div>
        <div class="mt-30">
        <!-- Table -->
        <table id='empTable' class='display dataTable'>

        <thead>
            <tr>
            <!-- <th>Date</th> -->
            <th>Nama</th>
            <th>Email</th>
            <th>Nilai</th>
            <th>Program</th>
            <th>Keterangan</th>
            <th>Sertifikat</th>
            </tr>
        </thead>

        </table>  
    </div> 
    </div>
</section>

<!--====  End of News Posts  ====-->


<?php $this->load->view('materi/tilawah/delete.php') ?>
<?php $this->load->view('temp/footer.php') ?>

<script type="text/javascript">
	$(document).ready(function(){
	   	$('#empTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          'url':'<?=base_url()?>index.php/Sertifikat/Tilawah/valueList'
	      	},
	      	'columns': [
	         	// { data: 'date' },
	         	{ data: 'nama' },
	         	{ data: 'email' },
	         	{ data: 'value' },
	         	{ data: 'program' },
                { data: 'descriptions' },
                { data: 'id',
                "render": function ( data, type, row, meta ) {
      return '<a href="<?php echo base_url('sertifikat/tilawah/pdf')?>/'+data+'"><i class="fa fa-download"></i></a>';
    }
                },
	      	],
            'dom': 'Bfrtip',
            'buttons': [
            { extend: 'excelHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ]
	   	});
	});
	</script>