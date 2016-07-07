<?php

require('dbconfig.php');


$keyword = $_REQUEST['keyword'];
$sql = "SELECT DISTINCT region.reg_c, region.reg_e, district.dis_c, district.dis_e, area.are_e, area.are_c, location.id, location.lat, location.qty, location.lng, location.loc_c, location.loc_e FROM ((region INNER JOIN district ON region.reg_id = district.reg_id) INNER JOIN area ON district.dis_id = area.dis_id) INNER JOIN location ON area.are_id = location.are_id WHERE (((region.reg_c) LIKE  '%". $keyword . "%' ) OR ((region.reg_e) LIKE  '%". $keyword . "%' ) OR ((district.dis_c) LIKE  '%". $keyword . "%' ) OR ((district.dis_e) LIKE  '%". $keyword . "%' ) OR ((area.are_e) LIKE  '%". $keyword . "%' ) OR ((area.are_c) LIKE  '%". $keyword . "%' ) OR ((location.loc_c) LIKE  '%". $keyword . "%' ) OR ((location.loc_e) LIKE  '%". $keyword . "%' )) ORDER BY location.loc_e";
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
    $loc = $loc_e;
    
                                switch ($loc_e) {
                                case "Lower Albert Rd near St. Johns Building":
                                    $loc_e = "Lower Albert Rd near St. John's Building";
                                    break;
                                case "Plunketts Rd":
                                    $loc_e = "Plunkett's Rd";
                                    break;
                                case "Lockhart Rd w/o OBrien Rd":
                                    $loc_e = "Lockhart Rd w/o O'Brien Rd";
                                    break;
                                case "Thomson Rd e/o OBrien Rd":
                                    $loc_e = "Thomson Rd e/o O'Brien Rd";
                                    break;
                                case "Tung Lo Wan Rd near Queens College":
                                    $loc_e = "Tung Lo Wan Rd near Queen's College";
                                    break;
                                default:
                                    $loc_e = $loc_e;
                            }
    
    
 
    echo '<li style="margin-top:10px;"><a href="#" onclick="goToLocation('. $id . ','.$lat.','.$lng.','.$qty.',\'' .$loc.'\')">'.$loc_e.'・'.$row['are_e'].'・'.$row['dis_e'].'</a></li>';
}
	mysqli_free_result($result);
	mysqli_close($link);

?>
