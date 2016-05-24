
<?php	
	include ('dbconfig.php');
	$q = intval(@$_REQUEST['str']);	
	echo $q;
	
	$sql_District = 'SELECT dis_id, dis_c, dis_e FROM district WHERE reg_id='.$q.' order by dis_c';
	
	$result = mysqli_query($link,$sql_District);
	
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
	echo '<div class="mp-level">';
	echo '<h2 class="icon">District</h2>';
	echo '<a class="mp-back" href="#">back</a>';
	echo '<ul>';	
	while ($row = mysqli_fetch_assoc($result)) {
			echo '<li class="icon icon-arrow-left">';
			echo '<a class="icon" href="#" id="'.$row['dis_id'].'" onfocus="getArea(this.id)">'.$row['dis_c'].'</a>';
			echo '</li>';
			}
	mysqli_free_result($result);
	mysqli_close($link);
	echo '</ul>';
	echo '</div>';
?>








