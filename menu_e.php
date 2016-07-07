<?php

require('dbconfig.php');


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
echo '<div style="height:60px"><img id="tc" class="btn" src="img/tc.svg"></div>';
for ($r = 0; $r < count($regs); $r++) {
    $reg_e = $regs[$r]['reg_e'];
    echo '<ul><li class="icon icon-arrow-left-2"><a class="icon subMenu" href="#" >' . $reg_e . '</a><div class="mp-level"><h2 class="icon">' . $reg_e . '</h2><a class="mp-back" href="#">Back</a>';
    for ($d = 0; $d < count($diss); $d++) {
        if ($diss[$d]['reg_id'] == $r + 1) {

            $dis_e = $diss[$d]['dis_e'];
            echo '<ul><li class="icon icon-arrow-left-2"><a class="icon subMenu" href="#">' . $dis_e . '</a><div class="mp-level"><h2 class="icon">' . $dis_e . '</h2><a class="mp-back" href="#">Back</a>';

            for ($a = 0; $a < count($ares); $a++) {
                if ($ares[$a]['dis_id'] == $d + 1) {
                    $are_e = $ares[$a]['are_e'];

                    echo '<ul><li class="icon icon-arrow-left-2"><a class="icon subMenu" href="#" >' . $are_e . '</a><div class="mp-level"><h2 class="icon">' . $are_e . '</h2><a class="mp-back" href="#">Back</a>';

                    for ($l = 0; $l < count($locs); $l++) {
                        if ($locs[$l]['are_id'] == $a + 1) {

                            $qty = $locs[$l]['qty'];
                            $lat = $locs[$l]['lat'];
                            $lng = $locs[$l]['lng'];
//                            $loc_c = $locs[$l]['loc_c'];
                            $loc_e = $locs[$l]['loc_e'];
                            $loc = $loc_e;
                            $id = $locs[$l]['id'];
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

                            echo '<ul><li><a href="#" class="subMenu" onclick="goToLocation(' . $id . ',' . $lat . ',' . $lng . ',' . $qty . ',\'' . $loc . '\')">' . $loc_e . '</a></li></ul>';
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

