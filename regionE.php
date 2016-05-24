<?php
		
		include('dbconfig.php');
		
		
		$sql_Region = 'SELECT distinct reg_id, reg_c, reg_e FROM region';
		$result = mysqli_query($link,$sql_Region);
		
		if (!$result) {
		    echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysqli_error();
		    exit;
		}
		echo '<select id="Cbo_Region" class="select" onchange="showDistrictE(this.value)">';
		echo '<option value="0" selected disabled>Please Select Region...</option>';
		while ($row = mysqli_fetch_assoc($result)) {
		    echo '<option class="CboRegion" value="'.$row['reg_id'].'">'.$row['reg_e'].'</option>';
		}
		echo '</select>';
		mysqli_free_result($result);
		
		mysqli_close($link);

						
		?>	
