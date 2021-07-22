<?php

/**
 * this is query builder like laravel to secure db 
 * created by : mohammed shopan in 2021
 * 
 */


//   for test this mdb class

//   $user =  mdb::table('users')
//                 ->where('id',2)
//                 ->andWhere('firstName','mohammed')
//                 ->get();
 
//   echo $user->get_sql();
  
 

class mdb {
    /**
     * for test only print hello form  on the page 
     */
    
    static $appName = 'accounting';
    
    public $hose = '';
    public $db_name = '';
    public $username = '';
    private $password = '';

    private $_sql ='';
    private $_tblName = '';


    function __construct(){

        $this->host = '127.0.0.1';
        $this->db_name = 'acc_main_port';
        $this->username = 'root';
        $this->password = 'egypt2013';
       


         //echo $this->password , mhtml::br() ;
    }

    function get_sql(){

        return $this->_sql ;

    }

    function log_sql($sql) {
        // log sql in file here 
    }

    static function hello(){
          //global $mathing ;
          echo 'hello form mdb class static method : ' , self::$appName , '<br>' ;
          //echo $mathing ;
    }

    public function my_select(callable $_callback){
        
        // echo is_callable($_callback);

        $row = 'mohammed' ;

        $_callback($row);
    }

    public function secure_value($_val){
        return $_val ;
    }

    public function secure_key($_key){
        return $_key ;
    }

    public function setTblName($tblName){
        $this->_tblName = $tblName ;
    }

    public function table($tblName) {

        $_my_mdb = new mdb();
        $_my_mdb->setTblName($tblName);
        return $_my_mdb;
        
    }



    public function makeEqualAssign($_key , $_val){
        //secure first
        $_val = $this->secure_value($_val);
        $_key = $this->secure_key($_key);
        //end
        $assign = " `$_key` = $_val " ;

        return $assign ;
      
    }

    public function where($_key , $_val) {
         
        $myAssign = $this->makeEqualAssign($_key , $_val) ;

        $this->_sql = $this->_sql . 
        " WHERE $myAssign" ;

        return $this;
    }



    public function orWhere($_key , $_val){

        $myAssign = $this->makeEqualAssign($_key , $_val) ;

        $this->_sql = $this->_sql . 
        " OR $myAssign" ;

        return $this;

    }

    public function andWhere($_key , $_val){

        $myAssign = $this->makeEqualAssign($_key , $_val) ;

        $this->_sql = $this->_sql . 
        " AND $myAssign" ;

        return $this;

    }


    /**
     * sql = "SLECT * from `users` WHERE `id` = 2 ;" 
     */

    public function get(){
        
        $this->_sql = 
         "SELECT * FROM `$this->_tblName`"
         . $this->_sql 
         ." ; " ;

         // log the sql if sql log varible is true in the configuration file 
         $this->log_sql($this->_sql);

         return $this;

        
    }



}

?>