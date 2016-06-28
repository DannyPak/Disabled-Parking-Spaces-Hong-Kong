<?php
header("Content-type: text/xml");
require('dbconfig.php');



$swLat = intval($_REQUEST['swLat']);
$swLng = intval($_REQUEST['swLng']);
$neLat = intval($_REQUEST['neLat']);
$neLng = intval($_REQUEST['neLng']);



function parseToXML($htmlStr) {
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
}

$sql = 'SELECT * FROM location';
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}


echo '<markers>';

while ($row = @mysqli_fetch_assoc($result)) {
//    if($row['lat'] < '22.2837235'){
   //if($swLat << intval($row['lat']) && intval($row ['lat']) << $neLat && $swLng << intval($row['lng']) && intval($row['lng']) << $neLng) {

            // ADD TO XML DOCUMENT NODE
            echo '<marker ';
            echo 'id="' . parseToXML($row['id']) . '" ';
            echo 'loc_c="' . parseToXML($row['loc_c']) . '" ';
            echo 'loc_e="' . parseToXML($row['loc_e']) . '" ';
            echo 'lat="' . $row['lat'] . '" ';
            echo 'lng="' . $row['lng'] . '" ';
            echo 'qty="' . $row['qty'] . '" ';
            echo '/>';
        
   
}
echo '</markers>';
?>