<?php

class users extends model {

     public $show_title = "اسماء المستخدمين";

     public $tblName = "users" ;

     public $struct = array (
         'id' => 'int',
         'user' => 'string',
         'real_name' => 'string',
         'password' => 'string' ,
     );

     // virtual_names showed for user
     public $virtual_names = array ( 
         'id'=>'م',
         'real_name'=>'اسم المستخدم',
         'user'=>'كود المستخدم',
         'creator'=>'المنشاً',
         'pass' =>'الرقم السري',
    );

    public $option_global = array(
       'edit' => true,
       'delete' => true,
    );


    public $virtual_global = array(
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'add' => 'إضافة',
    );

     public $show = array ( 
        'id',
        'real_name',
        'user',
        'creator',
        'pass',
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