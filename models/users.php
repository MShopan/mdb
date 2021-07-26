<?php

class users {

    public $show_title = "اسماء المستخدمين";

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

    public $hide = array(
        'password' ,
    );




}


?>