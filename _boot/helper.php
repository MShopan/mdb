<?php

class helper {

   static function get_root_url(){
       
       return config::get('root_url');
   }

   static function remove_last_chr($var)
   {
       $value = substr($var,0,-1);
  
       return $value;
   }

}
?>