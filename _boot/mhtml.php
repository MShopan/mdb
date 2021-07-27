<?php
/**
 * 
 * 
 */
class mhtml {

    // var dump 
    static function dump($var) {
        echo '<pre>' , var_dump($var) , '</pre>' ;
    }

    static function print_r($var) {
        echo '<pre>' , print_r($var) , '</pre>' ;
    }


    static function print_show_table(array $arr,$model){

        $edit= true; 
        $delete = true ;

        $modelObj = new $model ;

         

        self::startTable("pure-table");
        self::startTr();

        // print table header
        foreach ($arr[0] as $key => $value) { 

        if(in_array($key,$modelObj->show)){

            self::th($key);
        }
           

        }

        if($edit){   self::th('edit');  }
        if($delete){   self::th('delete'); }

        self::endTr();


        // print table rows
        $currentId = null; 

        foreach ($arr as $key => $value) { 
            self::startTr();
                foreach ($value as $subKey => $subValue) {

                    if(in_array($subKey,$modelObj->show)){

                        self::th($subValue);
                    }

                    if($subKey=="id"){
                        $currentId = $subValue ;
                    }
                        
                  
                }
                // aditionl td
                if($edit){   self::th("<a href='edit.php?model=$model&id=$currentId'>edit</a>");  }
                if($delete){   self::th("<a href='delete.php?model=$model&id=$currentId'>delete</a>"); }

            self::endTr();
            
        }



        self::endTable();
    }



    static function print_r_table(array $arr , array $only = array()){


        // open the table 
        self::startTable("pure-table");
        self::startTr();

        // print table header
        foreach ($arr[0] as $key => $value) { 

            if ( empty($only)){
                self::th($key);
            } elseif ( in_array($key,$only) ) {
                self::th($key);
            }

        }
        self::endTr();


        // print table rows

        foreach ($arr as $key => $value) { 
            self::startTr();
                foreach ($value as $subKey => $subValue) {
                    if (empty($only) ){

                        self::th($subValue);
                    } elseif (in_array($subKey,$only) ){
                        self::th($subValue);
                        
                    }
                }
            self::endTr();
            
        }

        self::endTable();
    }
    /**
     * print h1 tag with txt in the file
     */

    static function h1($txt){
        echo  '<h1>' , $txt , '</h1>';
    }
    static function h2($txt){
        echo  '<h2>' , $txt , '</h2>';
    }
    static function h3($txt){
        echo  '<h3>' , $txt , '</h3>';
    }
    static function h4($txt){
        echo  '<h4>' , $txt , '</h4>';
    }
    static function h5($txt){
        echo  '<h5>' , $txt , '</h5>';
    }
    static function h6($txt){
        echo  '<h6>' , $txt , '</h6>';
    }

    /**
     * print new line in html formate
     */

    static function a($title , $href , $class=""){
         echo "<a class='$class' href='$href'>$title</a>";
    }

    static function br(){
        echo  '<br>';
    }

    static function sendMsg($txt){
        echo "<script> alert('$txt') </script>" ;
    }

    static function startTable($class = ""){
        echo "<table class=\"$class\">";
    }

   

    static function endTable(){
        echo '</table>';
        
    }

    static function startTr(){
        echo '<tr>';
        
    }
    static function endTr(){
        echo '</tr>';
        
    }

    static function th($content){
        echo '<th>', $content ,'</th>';
        
    }

    static function td($content){
        echo '<td>', $content ,'</td>';
        
    }

    

    

    
}

?>