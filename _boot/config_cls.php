<?php

/**
 * important set the main_root var manually 
 */

class config{

    static $main_root = 'C:\AppServ\www\MDB';

   static function get($var){

       $_main_root = self::$main_root ;
        
       require("$_main_root\config.php");       

       $value = $config[$var];

       return $value;
   }

}

?>