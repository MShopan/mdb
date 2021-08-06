<?php

class users extends model {

     public $show_title = "اسماء المستخدمين";


     public $tblName = "users" ;

     public $struct = array (
         'id' => 'number',
         'user' => 'string',
         'real_name' => 'string',
         'password' => 'string' ,
         'creator' => 'number'
     );

     // virtual_names showed for user
     public $virtual_names = array ( 
         'id'=>'كود',
         'real_name'=>'اسم المستخدم',
         'user'=>'كود المستخدم',
         'creator'=>'المنشاً',
         'pass' =>'الرقم السري',
    );

    public $option_global = array(
       'edit' => true,
       'delete' => true,
       'show_one' => true,
    );


    public $virtual_global = array(
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'show_one' => 'عرض',
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
        'pass' ,
    );

    public $edit_secret = true ;
    
    public $edit = array(
        'user',
        'real_name',
        'creator',
    );


    public $show_one_relations = array(
        'permissions',
    );


    public function hash_secret(){
        // do this functino to hash password when edit and insert function 
        // use your hash logic here 

        $hashed_pass = null ;

        return $hashed_pass ;
    }

    public function permissions(){
        return $this->hasMany('permissions');
    }









}


?>