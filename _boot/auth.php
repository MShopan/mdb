<?php

$auth_model = config::get('auth_model');
$main_root = config::get('main_root');
require("{$main_root}\\models\\{$auth_model}.php");




/**
 * 
 * login class   
 * static class auth use this class to mange login 
 * 
 */

class login_user{

    public $id = null ;
    public $user = null;

    

    function __construct(){ 

        $this->set_login_user_data();
      
        
        
    }

    public function set_login_user_data(){


        global $auth_model ;
        $auth_model_obj = new $auth_model ;

        $this->id = 1;

        $this->user = $auth_model_obj->find($this->id)->permissions()->get();


    }

    // if it true all permission is allowed
    public function is_admin(){
        return false;
    }

}







/**
 * 
 * static class
 * 
 */

class auth {

    static function user(){
        return new login_user ;
    }

    

    // to use this functin 

    // if(!auth::has_permission($permission)){exit;} 
    // to exit the function 
    static function hasAccess($permission){
        // defult access is false
        $access = false;

        $_login_user = new login_user ;

        $_permissions = $_login_user->user[0]['permissions'];


        $permission_names = array();

        foreach ($_permissions as $key => $value) {
            $permission_names[] = $value['name'];
        }

        // mhtml::dump($permission_names);

        // if in_array permission
        if(in_array($permission,$permission_names) || $_login_user->is_admin() ){
            $access = true;
        }

        
        
        if(!$access){
            logger::warn("access is denied : $permission");
        } else {
            logger::info("access is allow : $permission");

        }

        return $access ;
    }
}

?>