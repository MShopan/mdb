<?php
/**
 * 
 * 
 */
class mhtml {
    /**
     * print h1 tag with txt in the file
     */
    static function h1($txt){
        echo  '<h1>' , $txt , '</h1>';
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