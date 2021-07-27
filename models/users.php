<?php

class users {

    public $show_title = "اسماء المستخدمين";

     public $struct = array (
         'id' => 'int',
         'user' => 'string',
         'real_name' => 'string',
     );

     public $show = array ( 
         'id',
         'user',
         'real_name',
         'creator',
    );

    public $hide = array(
        'password' ,
    );




}


?>