﻿<?php
	
	include ('dbconfig.php');
	$q = intval(@$_REQUEST['q']);
	$sql_parking = 'SELECT qty, lat, lng FROM location WHERE id='.$q;
	$result = mysqli_query($link,$sql_parking);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
	
 
	while ($row = mysqli_fetch_assoc($result)) {
		
		echo '<div><label>No. of Spaces:&nbsp'.number_format($row['qty']).'</label>'; 	
		echo '<br><label style="font-size: x-small">*not real-time</label></div>';		
		echo '<input id="lat" type="hidden" value="'.$row['lat'].'">';
		echo '<input id="lng" type="hidden" value="'.$row['lng'].'">';

	}

	
	mysqli_free_result($result);
	mysqli_close($link);

?>
