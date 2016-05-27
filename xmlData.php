<?php

require('dbconfig.php');


	function parseToXML($htmlStr)
	{
		$xmlStr=str_replace('<','&lt;',$htmlStr);
		$xmlStr=str_replace('>','&gt;',$xmlStr);
		$xmlStr=str_replace('"','&quot;',$xmlStr);
		$xmlStr=str_replace("'",'&#39;',$xmlStr);
		$xmlStr=str_replace("&",'&amp;',$xmlStr);
		return $xmlStr;
	}



	
	$reg = "select * from region";
	$re_reg = mysqli_query($link,$reg);	
	if (!$re_reg) {echo 'MySQL Error: ' . mysqli_error();exit;}
	
	$dis = "select * from district";
	$re_dis = mysqli_query($link,$dis);	
	if (!$re_dis) {echo 'MySQL Error: ' . mysqli_error();exit;}
	
	$are = "select * from area";
	$re_are = mysqli_query($link,$are);	
	if (!$re_are) {echo 'MySQL Error: ' . mysqli_error();exit;}
	
	$loc = "select * from location";
	$re_loc = mysqli_query($link,$loc);	
	if (!$re_loc) {echo 'MySQL Error: ' . mysqli_error();exit;}
	
	

	
	while($row_reg = mysqli_fetch_assoc($re_reg)){
		$regs[]=$row_reg;
		}
		echo 'no of reg:';
		echo count($regs);
		echo '<br>';

	
	while($row_dis = mysqli_fetch_assoc($re_dis)){
		$diss[]=$row_dis;
		}
		echo 'no of dis:';
		echo count($diss);
		echo '<br>';

		
	while($row_are = mysqli_fetch_assoc($re_are)){
		$ares[]=$row_are;
		}
		echo 'no of are:';
		echo count($ares);
		echo '<br>';


		
	while($row_loc = mysqli_fetch_assoc($re_loc)){
		$locs[]=$row_loc;
		}
		echo 'no of loc:';
		echo count($locs);
		echo '<br>';
		echo '<p>';



	$xml = new DomDocument("1.0","UTF-8");
	$spaces = $xml-> createElement("spaces");
	$spaces = $xml -> appendChild($spaces);


for($r=0;$r<count($regs);$r++){
		$region = $xml -> createElement("region");
		$region = $spaces -> appendChild($region);
		$reg_id = $xml -> createElement("reg_id",$regs[$r]['reg_id']);
		$reg_id = $region -> appendChild($reg_id);
		$reg_c = $xml -> createElement("reg_c",$regs[$r]['reg_c']);
		$reg_c = $region -> appendChild($reg_c);
		$reg_e = $xml -> createElement("reg_e",$regs[$r]['reg_e']);
		$reg_e = $region -> appendChild($reg_e);
							

		
		for($d=0;$d<count($diss);$d++){
			if($diss[$d]['reg_id']==$r+1){
			
			
							$district = $xml -> createElement("district");
							$district = $region -> appendChild($district);
							$dis_id = $xml -> createElement("dis_id",$diss[$d]['dis_id']);
							$dis_id = $district -> appendChild($dis_id);
							$dis_c = $xml -> createElement("dis_c",$diss[$d]['dis_c']);
							$dis_c = $district -> appendChild($dis_c);
							$dis_e = $xml -> createElement("dis_e",parseToXML($diss[$d]['dis_e']));
							$dis_e = $district -> appendChild($dis_e);
							
							echo 'dis_id='.$diss[$d]['dis_id'];
							echo '<br>';

				for($a=0;$a<count($ares);$a++){
					if($ares[$a]['dis_id']==$d+1){
							
							echo 'are_id='.$ares[$a]['are_id'];
							echo '<br>';

							echo '<p>';



						$area = $xml -> createElement("area");
						$area = $district -> appendChild($area);
						$are_id = $xml -> createElement("are_id",$ares[$a]['are_id']);
						$are_id = $area -> appendChild($are_id);
						$are_c = $xml -> createElement("are_c",$ares[$a]['are_c']);
						$are_c = $area -> appendChild($are_c);
						$are_e = $xml -> createElement("are_e",parseToXML($ares[$a]['are_e']));
						$are_e = $area -> appendChild($are_e);
						for($l=0;$l<count($locs);$l++){
							if($locs[$l]['are_id']==$a+1){
							
							
								$location = $xml -> createElement("location");
								$location = $area -> appendChild($location);
								$id = $xml -> createElement("id",$locs[$l]['id']);
								$id = $location -> appendChild($id);
								$loc_c = $xml -> createElement("loc_c",$locs[$l]['loc_c']);
								$loc_c = $location -> appendChild($loc_c);
								$loc_e = $xml -> createElement("loc_e",parseToXML($locs[$l]['loc_e']));
								$loc_e = $location -> appendChild($loc_e);
								$lat = $xml -> createElement("lat",$locs[$l]['lat']);
								$lat = $location -> appendChild($lat);
								$lng = $xml -> createElement("lng",$locs[$l]['lng']);
								$lng = $location -> appendChild($lng);
								$qty = $xml -> createElement("qty",$locs[$l]['qty']);
								$qty = $location -> appendChild($qty);
								
								}

							}
						
						}
					}
				}
		}

}


$xml -> FormatOutput = true;
$string_value = $xml-> saveXML();
$xml -> save("xmlData.xml");
		mysqli_free_result($re_reg);		
		mysqli_close($link);


?>


