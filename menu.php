<?php

require('dbconfig.php');


$reg = "select reg_c, reg_e from region";
$re_reg = mysqli_query($link, $reg);
if (!$re_reg) {echo 'MySQL Error: ' . mysqli_error();exit;}

$dis = "select reg_id,  dis_c, dis_e from district";
$re_dis = mysqli_query($link, $dis);
if (!$re_dis) {echo 'MySQL Error: ' . mysqli_error();exit;}

$are = "select dis_id,  are_c , are_e from area";
$re_are = mysqli_query($link, $are);
if (!$re_are) {echo 'MySQL Error: ' . mysqli_error();exit;}

$loc = "select are_id, id, loc_c, loc_e, lat, lng, qty from location";
$re_loc = mysqli_query($link, $loc);
if (!$re_loc) {echo 'MySQL Error: ' . mysqli_error();exit;}

while ($row_reg = mysqli_fetch_assoc($re_reg)) {
    $regs[] = $row_reg;
}

while ($row_dis = mysqli_fetch_assoc($re_dis)) {
    $diss[] = $row_dis;
}

while ($row_are = mysqli_fetch_assoc($re_are)) {
    $ares[] = $row_are;
}

while ($row_loc = mysqli_fetch_assoc($re_loc)) {
    $locs[] = $row_loc;
}

echo '<h2 id="regTitle" class="icon">地域</h2>';
for ($r = 0; $r < count($regs); $r++) {
    
    $reg_c = $regs[$r]['reg_c'] ;

    echo '<ul>';
    echo '<li class="icon icon-arrow-left-2">';
    echo '<a class="icon" href="#">' . $reg_c . '</a>';   
    
    
    echo '<div class="mp-level">';
    echo '<h2 id="disTitle" class="icon">區域</h2>';
    echo '<a class="mp-back" href="#">返回</a>';
    
    
    for ($d = 0; $d < count($diss); $d++) {
        if ($diss[$d]['reg_id'] == $r + 1) {
            
            
            $dis_c = $diss[$d]['dis_c'] ;

            echo '<ul>';
            echo '<li class="icon icon-arrow-left-2">';
            //echo '<a class="icon" href="#">' . $diss[$d]['dis_c'] . '</a>';
            echo '<a class="icon" href="#">' . $dis_c . '</a>';   
            
            
            echo '<div class="mp-level">';
            echo '<h2 id="areTitle" class="icon">地區</h2>';
            echo '<a class="mp-back" href="#">返回</a>';

            for ($a = 0; $a < count($ares); $a++) {
                if ($ares[$a]['dis_id'] == $d + 1) {
                    
                    $are_c = $ares[$a]['are_c'];

                    echo '<ul>';
                    echo '<li class="icon icon-arrow-left-2">';
                    echo '<a class="icon" href="#" >' . $are_c. '</a>';
                    echo '<div class="mp-level">';
                    echo '<h2 class="icon" id="locTitle">地點</h2>';
                    echo '<a class="mp-back" href="#">返回</a>';

                    for ($l = 0; $l < count($locs); $l++) {
                        if ($locs[$l]['are_id'] == $a + 1) {
                            
                            $qty = $locs[$l]['qty'];
                            $lat = $locs[$l]['lat'];
                            $lng = $locs[$l]['lng'];
                            $loc_c = $locs[$l]['loc_c'];
                            $loc_e = $locs[$l]['loc_e'];
                            $id = $locs[$l]['id'];                           
  
                            echo '<ul><li><a href="#" onclick="geocode('. $id . ','.$lat.','.$lng.','.$qty.',\''.$loc_c.'\',\''.$loc_e.'\')">'. $loc_c .'</a></li></ul>';

                            
                        }
                    }
                    
                    echo '</div>';
                    echo '</li>';
                    echo '</ul>';
                }
            }

            echo '</div>';
            echo '</li>';
            echo '</ul>';
        }
    }

    echo '</div>';
    echo '</li>';
    echo '</ul>';
    
    
}


mysqli_free_result($re_reg);
mysqli_close($link);



?>

