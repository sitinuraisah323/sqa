<!DOCTYPE html>
<html>
<head>
 <title>Membuat Background di html</title>
 <style>
   /* body {
    background-color: lightblue;
   } */
 </style>
</head>
<body>
<h3>Jadwal Program</h3>
<table class="table" border="1">
    <thead class="thead-light">
        <tr bgcolor="#EE5AB4">
            <th  align="center" width="5%" color="white"> No </th>
            <th width="15%" align="center" color="white"> Time</th>
            <th width="15%" align="center" color="white"> Date</th>
            <th width="25%" align="center" color="white"> Description </th>
            <th width="10%" align="center" color="white"> Venue </th>
        </tr>
    </thead>
    <tbody>
        <?php 
	  $program = 0; 
      $no = 0;
        foreach($jadwal as $data){
            $no++;
            $program = $data->id_program;
                                    
	?>

        <tr>
            <td width="5%" align="center"> <?php echo $no;?></td>
            <td width="15%" align="center"> <?php echo $data->time; ?></td>
            <td width="15%" align="center"> <?php echo date('d M Y',strtotime($data->date)); ?></td>
            <td width="25%" align="left"> <?php echo $data->description; ?> </td>
            <td width="10%" align="center"> <?php echo $data->venue; ?> </td>
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr bgcolor="#EE5AB4">
            <th  align="center" width="5%" color="white"> No </th>
            <th width="15%" align="center" color="white"> Time</th>
            <th width="15%" align="center" color="white"> Date</th>
            <th width="25%" align="center" color="white"> Description </th>
            <th width="10%" align="center" color="white"> Venue </th>
        </tr>
    </tfoot>
</table>
</body>
</html>