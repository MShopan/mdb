<?php

require('_boot/bootstrap.php');

mhtml::dump(date("d-m-Y"));

logger::error("a");


$arr = array(55);

$arr[] = 1 ;
$arr[] = 2 ;
$arr[] = 3 ;

mhtml::dump($arr);


?>