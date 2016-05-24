<?php 
include ('dbconfig.php');

	$q = intval(@$_REQUEST['q']);
	$sql_Area = 'SELECT are_id, are_c, are_e FROM area WHERE dis_id='.$q.' order by are_e';
	$result = mysqli_query($link,$sql_Area);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
	echo '<select id="Cbo_Area" class="select" name="Cbo_Area" onchange="showLocationE(this.value)">';
	echo '<option value="0" selected disabled>Please Select Area...</option>'; 

	while ($row = mysqli_fetch_assoc($result)) {
	echo '<option value="'.$row['are_id'].'">'.$row['are_e'].'</option>';
	}
	
	echo '</select>';
	mysqli_free_result($result);
	mysqli_close($link);


?>


	
				
				