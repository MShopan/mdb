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
    static function br(){
        echo  '<br>';
    }

    static function sendMsg($txt){
        echo "<script> alert('$txt') </script>" ;
    }

    static function startTable(){
        echo '<table class="">';
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