<?php

class m_cat extends model{

    
    public $tblName = "m_cat" ;
    public $show_title = "اسماء الأصناف الفرعية ";



     public $struct = array (
         'id' => 'int',
         'name' => 'string',
         'real_name' => 'string',
     );

     public $show = array ( 
         'id',
         'name',
         'real_name',
    );

     public $edit = array ( 
         
         'name',
         'real_name',
    );





}


?>