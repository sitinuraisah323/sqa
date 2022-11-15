<h3>Data Mentor</h3>
<table class="table" border="1">
    <thead class="thead-light">
        <tr bgcolor="#EE5AB4">
            <th  align="center" width="5%" color="white"> No </th>
            <th width="25%" align="center" color="white"> Nama</th>
            <th width="25%" align="center" color="white"> Email</th>
            <th width="10%" align="center" color="white"> Status </th>
            <!-- <th width="10%" align="center" color="white"> Venue </th> -->
        </tr>
    </thead>
    <tbody>
        <?php 
	  $program = 0; 
      $no = 0;
        foreach($peserta as $data){
            $no++;
            // $program = $data->id_program;
                                    
	?>

        <tr>
            <td width="5%" align="center"> <?php echo $no;?></td>
            <td width="25%" align="left"> <?php echo $data->nama; ?></td>
            <!-- <td width="15%" align="center"> <?php// echo date('d M Y',strtotime($data->date)); ?></td> -->
            <td width="25%" align="left"> <?php echo $data->email; ?> </td>
            <td width="10%" align="left"> <?php echo $data->role; ?> </td>
        </tr>
        <?php } ?>
    </tbody>
   
</table>