<?php 
include ('dbconfig.php');

	$q = intval(@$_REQUEST['q']);
	
	$sql_Location = 'SELECT id, qty, lat, lng, loc_c, loc_e, LatLng FROM location WHERE are_id='.$q.' order by loc_e';
	$result = mysqli_query($link,$sql_Location);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}

?>
<select id="Cbo_Location" class="select" name="Cbo_Location" onchange="showQty(this.value,'parkingE.php?q=')">
<option class="select" value="0" selected disabled>Please Select Location...</option>
<?php	
 
	while ($row = mysqli_fetch_assoc($result)) {
		
	echo '<option value="'.$row['id'].'">'.$row['loc_e'].'</option>';
	
	}
	echo '</select>';
	mysqli_free_result($result);
	mysqli_close($link);



?>

