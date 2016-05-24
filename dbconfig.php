<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "966035";

if (!$link = mysqli_connect($servername, $username, $password)) {
    echo 'Could not connect to mysql';
    exit;
}
$link->set_charset("utf8");

if (!mysqli_select_db($link,$dbname)) {
    echo 'Could not select database';
    exit;
}






/* MS Access
		$db_username = ''; //username
		$db_password = ''; //password
		
		//path to database file
		$database_path = $_SERVER['DOCUMENT_ROOT']."/db/map.accdb";
		
		//check file exist before we proceed
		if (!file_exists($database_path)) {
		    die("Access database file not found !");
		}
		
		//create a new PDO object
		$database = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=$db_username; Pwd=$db_password;");
*/
?>
