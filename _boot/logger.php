<?php


class logger {


    static function log($msg, $tag = "info" ,$kind = "info"){
         $class = __CLASS__ ;
         $date_tmie = date("Y-m-d h:i:s") ;


         $line = "[$date_time][$tag][$kind]: $msg ";
         echo $line ;
    }

    static function error($msg , $tag = "info"){
         self::log($msg, $tag ,"error");
    }

    static  function info($msg , $tag = "info"){
        self::log($msg, $tag ,"info");
    }

    static  function warn($msg , $tag = "info" ){
        self::log($msg, $tag , "warn");
    }



}

?>