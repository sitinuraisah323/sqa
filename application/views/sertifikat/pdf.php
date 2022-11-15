<!DOCTYPE html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

        /* body {
     background: url(<?php //echo base_url('assets/images/background/bg1.jpg');?>) no-repeat;           
   } */
    body{ 
        /* background-color : pink; */
        /* background: url(<?php echo base_url();?>assets/images/background/bg1.jpg);  */
        background-size:100%; 
        background-repeat: no-repeat; 
        width: 100%; } 
    </style>

</head>

<body>
    <?php foreach($data as $data) ?>
    <div id=halaman style="background-color : pink;">
        <h3 id=judul> SERTIFIKAT <?php echo strtoupper($data->program); ?></h3>

        <p>Diberikan Kepada :</p>

        <table>
            <h4 id=judul>  <?php echo strtoupper($data->nama); ?></h4>
           
        </table>

        <p>Atas partisipasi dalam <b>Program <?php echo $data->program;?> Online</b></p>
        <p>Komunitas Sahabat Quran Akhwat</p>

        <div style="width: 50%; text-align: left; float: right;">Jakarta, <?php echo date('d',strtotime($data->date)); ?> <?php echo date('M',strtotime($data->date));?> <?php echo date('Y',strtotime($data->date)); ?></div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">Nining</div>

    </div>
</body>

</html>