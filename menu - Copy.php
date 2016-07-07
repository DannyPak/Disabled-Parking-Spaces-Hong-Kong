<?php

require('dbconfig.php');


$qr = "select reg_c from region";
$result_r = mysqli_query($link, $qr);
if (!$result_r) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

$qd = "select reg_id,  dis_c from district";
$result_d = mysqli_query($link, $qd);
if (!$result_d) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

$qa = "select dis_id,  are_c  from area";
$result_a = mysqli_query($link, $qa);
if (!$result_a) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

$ql = "select are_id, id, loc_c, loc_e, lat, lng, qty from location";
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

echo '<div style="height:60px"><img id="en" class="btn" src="img/en.svg"></div>';

for ($r = 0; $r < count($regs); $r++) {

    $reg_c = $regs[$r]['reg_c'];

    echo '<ul>';
    echo '<li class="icon icon-arrow-left-2">';
    echo '<a class="icon subMenu" href="#" >' . $reg_c . '</a>';
    echo '<div class="mp-level">';
    echo '<h2 class="icon">' . $reg_c . '</h2>';
    echo '<a class="mp-back" href="#">返回</a>';


    for ($d = 0; $d < count($diss); $d++) {
        if ($diss[$d]['reg_id'] == $r + 1) {

            $dis_c = $diss[$d]['dis_c'];
            echo '<ul>';
            echo '<li class="icon icon-arrow-left-2">';
            echo '<a class="icon subMenu" href="#">' . $dis_c . '</a>';

            echo '<div class="mp-level">';
            echo '<h2 class="icon">' . $dis_c . '</h2>';
            echo '<a class="mp-back" href="#">返回</a>';

            for ($a = 0; $a < count($ares); $a++) {
                if ($ares[$a]['dis_id'] == $d + 1) {
                    $are_c = $ares[$a]['are_c'];

                    echo '<ul>';
                    echo '<li class="icon icon-arrow-left-2">';
                    echo '<a class="icon subMenu" href="#" >' . $are_c . '</a>';
                    echo '<div class="mp-level">';
                    echo '<h2 class="icon">' . $are_c . '</h2>';
                    echo '<a class="mp-back" href="#">返回</a>';

                    for ($l = 0; $l < count($locs); $l++) {
                        if ($locs[$l]['are_id'] == $a + 1) {

                            $qty = $locs[$l]['qty'];
                            $lat = $locs[$l]['lat'];
                            $lng = $locs[$l]['lng'];
                            $loc_c = $locs[$l]['loc_c'];
                            $loc_e = $locs[$l]['loc_e'];
                            $id = $locs[$l]['id'];

                            echo '<ul>';
                            echo '<li>';
                            echo '<a href="#" class="subMenu" onclick="goToLocation(' . $id . ',' . $lat . ',' . $lng . ',' . $qty . ',\'' . $loc_c . '\',\'' . $loc_e . '\')">' . $loc_c . '</a></li></ul>';
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


mysqli_free_result($result_r);
mysqli_free_result($result_d);
mysqli_free_result($result_a);
mysqli_free_result($result_l);
mysqli_close($link);
?>

