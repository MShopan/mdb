<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require('../_boot/mhtml.php');
require('../_boot/mdb.php');
require('../_boot/style.html');

$tbl_name = htmlspecialchars($_GET['model']);



require("../models/$tbl_name.php");

$model = new $tbl_name;


mhtml::h1($model->show_title);

$tbl =  DB::table($tbl_name)->get();

mhtml::print_r_table($tbl);


?>
    
</body>
</html>

