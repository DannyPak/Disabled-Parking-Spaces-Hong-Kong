<?php 
	require('dbconfig.php');
	$q = intval(@$_REQUEST['q']);
	$sql = 'SELECT dis_id, dis_c FROM district WHERE reg_id='.$q.' order by dis_c';
	$result = mysqli_query($link,$sql);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
	
?>
	<select name="Cbo_District" id="Cbo_District" class="select" onchange="showArea(this.value,'areaC.php?q=')">
	<option value="0" selected disabled>請選擇區域...</option> 

<?php
	while ($row = mysqli_fetch_assoc($result)) {
	    echo '<option value="'.$row['dis_id'].'">'.$row['dis_c'].'</option>';
	}
	echo '</select>';
	mysqli_free_result($result);
	mysqli_close($link);

?>


	
				
				