# models

> to extend model in the models folder extend the model 
  and the class name must the same of the table name

```php 

<?php
// models/users.php
class users extends model {
    
}

```


### now we dusscuss the child model property 

> `$tblName` write the table name of the model

> `$struct` write the structue of the table fileds

suported types is :
| type   | notes |
| -------|-------|
| number | allowed |
| string | allowed |
| date   | `will added later` |
| date_time | `will added later` |

> enum and other type is allowed 

### important property for view model 

in the folder of view you will show the files of the view and edit and view_one and delete for the model and according to the property and function of the child model will set 


> `$show_title` to show the virtuel name to the user 
you can use the localization here 

> `$virtul_names` is array of key and value of virual name of filds will sho on the user 

> `$option_global` to enable the option filds of show and show_one view  delete edit and view_one ..etc

> `$virtual_global` to set the virtual name of options above like delete edit ...etc

> `$show` the only fileds in this array will show in the show.php and show_one.php 


> `$edit` the only fileds in this arry will by enable to edit by the users

> `$secrtet` to set the sectet field like password only one key will assign in the current virsion



> `$edit_sectet` set it to true if you will permission to the user to edit the secret field

> `function hash_secret(){}` tell the parent model how tho hash password 


> to create relation one to many create function with the name of the relation model and write on it 

```php
$this->hasMany($modelName , $forginKey , $localKey )

// the defult $forginKey is $modelName_id but the model name will remove the last chracter like this

// if model name is users  the forgin key defulte is user_id whithout the last s char 


// the defulte `$localKey` is 'id'
```

```php
$this->hasMany('cars');
```

```php


public function permissions(){
    return $this->hasMany('permissions','user_id','id')
}
```






### **examble** of child user model 

```PHP
// /models/users.php

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

    public $hasMany = array(
        'permissions',
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


```