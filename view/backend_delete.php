<?php
require('../_boot/bootstrap.php');

mhtml::dump($_POST);

if($_POST['confirm']=='yes'){
    // echo 'do confirm';
    $tbl_name = htmlspecialchars($_POST['model']);

    require("../models/$tbl_name.php");

    $myModel = new $tbl_name;

    $myModel->do_delete_row($_POST['id']);
    
} else {
    // redirect to show page 
}

?>