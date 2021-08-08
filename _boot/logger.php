<?php

class logger {

    public function log($msg, $tag = "info" ,$kind = "info"){
      $log = new myLogger ;  
      $log->log($msg,$tag,$kind);
    }

   public function error($msg , $tag = "info"){
        self::log($msg, $tag ,"error");
   }

   public  function info($msg , $tag = "info"){
       self::log($msg, $tag ,"info");
   }

   public  function warn($msg , $tag = "info" ){
       self::log($msg, $tag , "warn");
   }
}

class myLogger {

    private $filename;
    private $fh;
    

    function __construct()
    {
        // !important
        // this will be form config file form the futur
        //
        // $project_main_dir = "test";


        // $serverDir = $_SERVER['DOCUMENT_ROOT']  ;
        // $mainDir = "$serverDir/$project_main_dir";

        $mainDir = config::get('main_root');

        date_default_timezone_set('UTC');
        $currentDate = date("d-m-Y") ;
       
        $this->filename = "$mainDir/log/$currentDate.log";
        $this->open();
    }
   

    public function log($msg, $tag = "info" ,$kind = "info"){
         $class = __CLASS__ ;

         $date_time = date("Y-m-d h:i:s") ;
        //  $date_time = $_SERVER['REQUEST_TIME'] ;


         $line = "[$date_time][$tag][$kind]: $msg ";

         $this->write($line);
    }

    // handle files func


    private function open()
    {
    $this->fh = fopen($this->filename, 'a') or die("Can't open {$this->filename}");
    }
    private function write($note)
    {
    fwrite($this->fh, "{$note}\n");
    }
    private function read()
    {
    return join('', file($this->filename));
    }
    private function __wakeup()
    {
    $this->open();
    }
    private function __sleep()
    {
    // write information to the account file
    fclose($this->fh);
    // return array("filename");
    }
   



}

?>