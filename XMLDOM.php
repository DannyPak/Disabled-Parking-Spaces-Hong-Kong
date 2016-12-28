<?php
require('dbconfig.php');

function parseToXML($htmlStr) {
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
}

$sql = 'SELECT loc_c, loc_e, lat, lng, qty, id FROM location';
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}
header("Content-type: text/xml");
echo '<markers>';




while ($row = @mysqli_fetch_assoc($result)) {
    // ADD TO XML DOCUMENT NODE
    echo '<marker ';
    echo 'id="' . parseToXML($row['id']) . '" ';
    echo 'loc="' . parseToXML($row['loc_c']) . '" ';
    echo 'lat="' . $row['lat'] . '" ';
    echo 'lng="' . $row['lng'] . '" ';
    echo 'qty="' . $row['qty'] . '" ';
    echo '/>';
}
echo '</markers>';
?>
