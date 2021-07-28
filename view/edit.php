
<?php
  require('../_boot/bootstrap.php');

  $is_admin = true ;

  if(!$is_admin){
      echo 'access is denied';
      exit;
  }

  
?>

<?php
 if (isset($_POST['submit'])) {
     echo 'submitted';
 }

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

mhtml::startForm("edit","backend_edit.php");

mhtml::field('user name','user_name','text' ,"mohammed");
mhtml::field('pass','password','password');
mhtml::field('age','age','number');

mhtml::field_id_model();

mhtml::submitForm();

mhtml::endForm();


?>
    
</body>
<?php
require('main/footer.php');
?>
</html>