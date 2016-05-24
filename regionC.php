<?php
		
		include('dbconfig.php');
		
		
		$sql_Region = 'SELECT distinct reg_id, reg_c, reg_e FROM region';
		$result = mysqli_query($link,$sql_Region);
		
		if (!$result) {
		    echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysqli_error();
		    exit;
		}
		echo '<select id="Cbo_Region" class="select" onchange="showDistrictC(this.value)">';
		echo '<option value="0" selected disabled>請選擇地域...</option>';
		while ($row = mysqli_fetch_assoc($result)) {
		    echo '<option class="CboRegion" value="'.$row['reg_id'].'">'.$row['reg_c'].'</option>';
		}
		echo '</select>';
		mysqli_free_result($result);
		
		mysqli_close($link);

				
		//$sql_RegionE  = "SELECT distinct reg_id, reg_e FROM region";
		//$result = $database->query($sql_RegionE);
		//echo '<select id="Cbo_RegionE" class="select" onchange="showDistrict(this.value)">';
		//echo '	<option value="0">Please Select Region...</option>';
		//while ($row = $result->fetch()) {
			
		//echo '<option class="CboRegion" value="'.$row['reg_id'].'">'.$row['reg_e'].'</option>';
		
		//}
		//echo '</select>';
						
		?>	
