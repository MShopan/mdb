<?php

class permissions extends model {

     public $show_title = "الصلاحيات";

     public $tblName = "permissions" ;

     public $struct = array (
         'id' => 'number',
         'user_id' => 'number',
         'name' => 'string',
         'notes' => 'string' ,
         
     );

     // virtual_names showed for user
     public $virtual_names = array ( 
        'id' => 'الكود',
        'user_id' => 'كود المستخدم',
        'name' => 'اسم الصلاحية  ',
        'notes' => 'الملاحظات' ,
    );

    public $option_global = array(
       'edit' => false,
       'delete' => true,
       'show_one' => false,
    );


    public $virtual_global = array(
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'show_one' => 'عرض',
        'add' => 'إضافة',
    );

     public $show = array ( 
        'id',
        'user_id',
        'name',
        'notes',

    );


    
    public $edit = array(

    );






    public function users(){
        return $this->belongsToMany('users');
        // blelongs to not defined yet in the model parant class
    }









}


?>