

<?php 

$db_username = ''; //username
$db_password = ''; //password
//path to database file
$database_path = $_SERVER["DOCUMENT_ROOT"] . "\access\accessdatabase.accdb";
//check file exist before we proceed
if (!file_exists($database_path)) {
    die("Access database file not found !");
}

//create a new PDO object
$database = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=$db_username; Pwd=$db_password;");
$sql  = "SELECT * FROM userdetails";
$result = $database->query($sql);
while ($row = $result->fetch()) {
    echo '<pre>';
    print_r($row);
    echo '</pre>';
}


 ?>


