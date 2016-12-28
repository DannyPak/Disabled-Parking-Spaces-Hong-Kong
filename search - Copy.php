<?php

require('dbconfig.php');


$keyword = $_REQUEST['keyword'];
$sql = "SELECT DISTINCT region.reg_c, region.reg_e, district.dis_c, district.dis_e, "
        . "area.are_e, area.are_c, location.id, location.lat, location.qty, location.lng, "
        . "location.loc_c, location.loc_e FROM ((region INNER JOIN district ON region.reg_id = district.reg_id) "
        . "INNER JOIN area ON district.dis_id = area.dis_id) INNER JOIN location ON area.are_id = location.are_id "
        . "WHERE (((region.reg_c) LIKE  '%". $keyword . "%' ) OR ((region.reg_e) LIKE  '%". $keyword . "%' ) "
        . "OR ((district.dis_c) LIKE  '%". $keyword . "%' ) OR ((district.dis_e) LIKE  '%". $keyword . "%' ) "
        . "OR ((area.are_e) LIKE  '%". $keyword . "%' ) OR ((area.are_c) LIKE  '%". $keyword . "%' ) "
        . "OR ((location.loc_c) LIKE  '%". $keyword . "%' ) OR ((location.loc_e) LIKE  '%". $keyword . "%' )) ORDER BY location.loc_e";
$result=  mysqli_query($link, $sql);
	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}

while ($row=  mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $lat = $row['lat'];
    $lng = $row['lng'];
    $qty = $row['qty'];
    $loc_c = $row['loc_c'];
    $loc_e = $row['loc_e'];
 
    echo '<li style="margin-top:10px;"><a href="#" onclick="goToLocation('. $id . ','.$lat.','.$lng.','.$qty.',\''.$loc_c.'\',\''.$loc_e.'\')">'.$row['are_c'].'・'.$row['loc_c'].'・'.$row['dis_c'].'</a></li>';
}
	mysqli_free_result($result);
	mysqli_close($link);

?>
