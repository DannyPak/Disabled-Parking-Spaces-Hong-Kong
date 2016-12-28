<?php
require('dbconfig.php');
$q = intval(@$_REQUEST['q']);
$sql = 'SELECT * FROM location';
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}
?>
<table>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<th>' . $row['id'] . '</th>';
        echo '<th>' . $row['are_id'] . '</th>';
        echo '<th>' . $row['loc_c'] . '</th>';
        echo '<th>' . $row['loc_e'] . '</th>';
        echo '<th>' . $row['lat'] . '</th>';
        echo '<th>' . $row['lng'] . '</th>';
        echo '<th>' . $row['qty'] . '</th>';
        echo '</tr>';
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
    ?>

</table>


