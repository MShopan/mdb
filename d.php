
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

require('_boot/bootstrap.php');
require('config.php');

// mhtml::dump(date("d-m-Y"));



mhtml::dump($config['main_root']);

mhtml::h1('form lab');

require('models/users.php');

$mohammed = new users;

$func = "find";

$res = $mohammed->find(1)->permissions()->get();
// $res = $mohammed->find(1)->get();

mhtml::dump($res,'all');






?>