<?php

class users extends model {

     public $show_title = "اسماء المستخدمين";

     public $tblName = "users" ;

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

    public $secret = array(
        'password' ,
    );

    public $edit = array(
        'user',
        'real_name',
        'creator',
    );

    public $edit_secret = true ;




}


?>