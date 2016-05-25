<?php
		include('dbconfig.php');
		
		
		$sql_Region = 'SELECT distinct reg_id, reg_c, reg_e FROM region';
		$result = mysqli_query($link,$sql_Region);
		
		if (!$result) {
		    echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysqli_error();
		    exit;
		}
		?>
		<select id="Cbo_Region" class="select" onchange="showDistrict(this.value , 'districtC.php?q=')">
		<option value="0" selected disabled>請選擇地域...</option>
<?php
		while ($row = mysqli_fetch_assoc($result)) {
		    echo '<option class="CboRegion" value="'.$row['reg_id'].'">'.$row['reg_c'].'</option>';
		}
		echo '</select>';
		mysqli_free_result($result);		
		mysqli_close($link);
	
	
?>


