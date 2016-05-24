<?php 
	include ('dbconfig.php');
	$q = intval(@$_REQUEST['q']);
	$sql_District = 'SELECT dis_id, dis_c, dis_e FROM district WHERE reg_id='.$q.' order by dis_c';
	$result = mysqli_query($link,$sql_District);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
	
	echo '<select name="Cbo_District" id="Cbo_District" class="select" onchange="showAreaC(this.value)">';
	echo '<option value="0" selected disabled>請選擇區域...</option>'; 

	while ($row = mysqli_fetch_assoc($result)) {
	    echo '<option value="'.$row['dis_id'].'">'.$row['dis_c'].'</option>';
	}
	echo '</select>';
	mysqli_free_result($result);
	mysqli_close($link);

?>


	
				
				