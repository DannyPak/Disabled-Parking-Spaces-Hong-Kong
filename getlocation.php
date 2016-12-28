<?php



require('dbconfig.php');

$lang = $_GET['lang'];
$id = $_GET['id'];
settype($lang, "integer");
settype($id, "integer");
$ql = "select id, loc_c, loc_e, lat, lng, qty from location where id =" . $id;
$l = mysqli_query($link, $ql);
if (!$l) {
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}
while ($row = mysqli_fetch_assoc($l)) {
    $lat = $row['lat'];
    $lng = $row['lng'];
    $qty = $row['qty'];
    if ($lang === 1) {
        $loc = $row['loc_c'];        
    } else {
        $loc = $row['loc_e'];
    }
}

echo json_encode(array($lat, $lng, $qty, $loc));
mysqli_free_result($l);
mysqli_close($link);

?>


