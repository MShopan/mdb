<?php

class config{

   static function get($var){
       
       require('config.php');

       $value = $config[$var];

       return $value;
   }

}

?>