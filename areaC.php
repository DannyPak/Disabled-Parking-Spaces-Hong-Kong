<?php 
include ('dbconfig.php');

	$q = intval(@$_REQUEST['q']);
	$sql_Area = 'SELECT are_id, are_c, are_e FROM area WHERE dis_id='.$q.' order by are_c';
	$result = mysqli_query($link,$sql_Area);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
?>
	
	
	<select id="Cbo_Area" class="select" name="Cbo_Area" onchange="showLocation(this.value, 'locationC.php?q=')">
	<option value="0" selected disabled>請選擇地區...</option>
	
<?php
	while ($row = mysqli_fetch_assoc($result)) {
	echo '<option value="'.$row['are_id'].'">'.$row['are_c'].'</option>';
	}
	echo '</select>';
	mysqli_free_result($result);
	mysqli_close($link);
?>


	
				
				