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

	echo '<select id="Cbo_Location" class="select" name="Cbo_Location" onchange="showQtyE(this.value)">';
	echo '<option class="select" value="0" selected disabled>Please Select Location...</option>';
	
 
	while ($row = mysqli_fetch_assoc($result)) {
		
	echo '<option value="'.$row['id'].'">'.$row['loc_e'].'</option>';
	
	}
	echo '</select>';
		
		//echo '<input id="lat" type="hidden" value="'.$row['lat'].'">';
		//echo '<input id="lng" type="hidden" value="'.$row['lng'].'">';
		//echo '<div><label>Quantity:&nbsp'.number_format($row['qty']).'</label></div>'; 			
		

	
	//mysqli_free_result($result);
	//mysqli_close($link);



	//$sql_parking = 'SELECT id, qty, lat, lng FROM location WHERE id='.$row['id'];
	//$result = mysqli_query($link,$sql_parking);
	
	//if (!$result) {
	  //  echo "DB Error, could not query the database\n";
	   // echo 'MySQL Error: ' . mysqli_error();
	    //exit;
	//}
	
 

	mysqli_free_result($result);
	mysqli_close($link);



/*
$q = intval(@$_REQUEST['q']);
$sql_LocationE  = "SELECT id, loc_e, LatLng FROM location WHERE are_id=".$q." order by loc_e";
$result = $database->query($sql_LocationE);

echo '<br>';

echo '<select id="Cbo_LocationE" class="select" name="Cbo_LocationE" onchange="showQty(this.value)">';
echo '<option value="0" selected disabled>Please Select Location...</option>';
while ($row = $result->fetch()){
echo '<option value="'.$row['id'].'">'.$row['loc_e'].'</option>';

}
echo '</select>';
*/



?>

