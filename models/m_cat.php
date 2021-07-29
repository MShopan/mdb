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

        // virtual_names showed for user
    public $virtual_names = array ( 
        'id'=>'كود',
        'real_name'=>'اسم المستخدم',
        'name'=>'كود المستخدم',

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





}


?>