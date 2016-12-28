<?php
	
	require('dbconfig.php');
	$q = intval(@$_REQUEST['q']);
	$sql = 'SELECT qty, lat, lng FROM location WHERE id='.$q;
	$result = mysqli_query($link,$sql);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
	
 
	while ($row = mysqli_fetch_assoc($result)) {
		
		echo '<div><label>車位數量﹕&nbsp'.number_format($row['qty']).'</label></div>';
		echo '<br><div><label style="font-size: x-small">*非實時</label></div>';		
		echo '<input id="lat" type="hidden" value="'.$row['lat'].'">';
		echo '<input id="lng" type="hidden" value="'.$row['lng'].'">';

	}

	mysqli_free_result($result);
	mysqli_close($link);
?>
