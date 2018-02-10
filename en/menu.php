<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php

require('../dbconfig.php');


$qr = "select reg_e from region";
$result_r = mysqli_query($link, $qr);
if (!$result_r) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

$qd = "select reg_id, dis_e from district";
$result_d = mysqli_query($link, $qd);
if (!$result_d) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

$qa = "select dis_id, are_e from area";
$result_a = mysqli_query($link, $qa);
if (!$result_a) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

$ql = "select are_id, id, loc_e, lat, lng, qty from location";
$result_l = mysqli_query($link, $ql);
if (!$result_l) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

while ($row = mysqli_fetch_assoc($result_r)) {
    $regs[] = $row;
}

while ($row = mysqli_fetch_assoc($result_d)) {
    $diss[] = $row;
}

while ($row = mysqli_fetch_assoc($result_a)) {
    $ares[] = $row;
}

while ($row = mysqli_fetch_assoc($result_l)) {
    $locs[] = $row;
}
?>

 



<div style="height:60px">
    
    <img id="homeBtn" class="btn" alt="Home" title="Home" src="../img/home.svg" >
    <img id="tc" class="btn" alt="繁中" title="繁中" src="../img/tc.svg">
   
   
</div>





<?php
for ($r = 0; $r < count($regs); $r++) {
    $reg = $regs[$r]['reg_e'];
    echo '<ul><li class="icon icon-arrow-left-2"><a class="icon subMenu" href="#" >' . $reg . '</a><div class="mp-level"><h2 class="icon">' . $reg . '</h2><a class="mp-back" href="#">Back</a>';
    for ($d = 0; $d < count($diss); $d++) {
        if ($diss[$d]['reg_id'] == $r + 1) {

            $dis = $diss[$d]['dis_e'];
            echo '<ul><li class="icon icon-arrow-left-2"><a class="icon subMenu" href="#">' . $dis . '</a><div class="mp-level"><h2 class="icon">' . $dis . '</h2><a class="mp-back" href="#">Back</a>';

            for ($a = 0; $a < count($ares); $a++) {
                if ($ares[$a]['dis_id'] == $d + 1) {
                    $are = $ares[$a]['are_e'];

                    echo '<ul><li class="icon icon-arrow-left-2"><a class="icon subMenu" href="#" >' . $are . '</a><div class="mp-level"><h2 class="icon">' . $are . '</h2><a class="mp-back" href="#">Back</a>';

                    for ($l = 0; $l < count($locs); $l++) {
                        if ($locs[$l]['are_id'] == $a + 1) {

                            $qty = $locs[$l]['qty'];
                            $lat = $locs[$l]['lat'];
                            $lng = $locs[$l]['lng'];
//                            $loc_c = $locs[$l]['loc_c'];
                            $loc = $locs[$l]['loc_e'];

                            $id = $locs[$l]['id'];
                            switch ($loc) {
                                case "Lower Albert Rd near St. Johns Building":
                                    $loc = "Lower Albert Rd near St. John's Building";
                                    break;
                                case "Plunketts Rd":
                                    $loc = "Plunkett's Rd";
                                    break;
                                case "Lockhart Rd w/o OBrien Rd":
                                    $loc = "Lockhart Rd w/o O'Brien Rd";
                                    break;
                                case "Thomson Rd e/o OBrien Rd":
                                    $loc = "Thomson Rd e/o O'Brien Rd";
                                    break;
                                case "Tung Lo Wan Rd near Queens College":
                                    $loc = "Tung Lo Wan Rd near Queen's College";
                                    break;
                                default:
                                    $loc = $loc;
                            }

                            echo '<ul><li><a href="#" class="subMenu" onclick="goLocation(' . $id . ')">' . $loc . '</a></li></ul>';
                        }
                    }

                    echo '</div></li></ul>';
                }
            }

            echo '</div></li></ul>';
        }
    }

    echo '</div></li></ul>';
}

mysqli_free_result($result_r);
mysqli_free_result($result_d);
mysqli_free_result($result_a);
mysqli_free_result($result_l);
mysqli_close($link);
?>

