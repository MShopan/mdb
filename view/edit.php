
<?php
  require('../_boot/bootstrap.php');

  $is_admin = true ;

  if(!$is_admin){
      echo 'access is denied';
      exit;
  }

  
?>

<?php
//  if (isset($_POST['submit'])) {
//      echo 'submitted';
//  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo "edit ".$_GET['model'];  ?></title>
    <?php
      require('main/header.php');
    ?>
</head>
<body>

<?php

$tbl_name = htmlspecialchars($_GET['model']);

require("../models/$tbl_name.php");

$myModel = new $tbl_name;

$myModel->add_edit_form();


?>
    
</body>
<?php
require('main/footer.php');
?>
</html>