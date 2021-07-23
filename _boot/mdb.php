<?php

/**
 * this is query builder like laravel to secure db 
 * created by : mohammed shopan in 2021
 * 
 * link blow to convert the regrular sql to qery builder
 * https://sql2builder.github.io/
 * 
 */


//   for test this DB class

//   $user =  DB::table('users')
//                 ->where('id',2)
//                 ->andWhere('firstName','mohammed')
//                 ->get();
 
//   echo $user->get_sql();
  
 

class DB {
    /**
     * for test only print hello form  on the page 
     */
    
    static $appName = 'accounting';
    
    public $hose = '';
    public $db_name = '';
    public $username = '';
    private $password = '';

    private $_sql ='';
    private $_limit = '';
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
          echo 'hello form DB class static method : ' , self::$appName , '<br>' ;
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

        $_my_DB = new DB();
        $_my_DB->setTblName($tblName);
        return $_my_DB;
        
    }



    public function makeEqualAssign($_key , $_val){
        //secure first
        $_val = $this->secure_value($_val);
        $_key = $this->secure_key($_key);
        //end
        $assign = " `$_key` = '$_val' " ;

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
     * set the limit of sql query 
     */
    public function limit($limit)
    {

        $this->_limit = " LIMIT $limit " ; 

        return $this;
        
    }


    /**
     * sql = "SLECT * from `users` WHERE `id` = 2 ;" 
     */

    public function get(){
        $end = ""; 
        if(!empty($this->_limit)){
             $end = " $this->_limit ";
        }
        $this->_sql = 
         "SELECT * FROM `$this->_tblName`"
         . $this->_sql 
         . $end ." ; " ;

         // log the sql if sql log varible is true in the configuration file 
         $this->log_sql($this->_sql);

         return $this;

        
    }

    
    // INSERT INTO `waiters` (
    //     `id` ,
    //     `name` ,
    //     `real_name` ,
    //     `creator` ,
    //     `notes`
    //     )
    //     VALUES (
    //     NULL , 'hassan', 'hassan', '', ''
    //     );


    // $test =  DB::table('users')->insert( array ( 
    //     'email' => 'kayla@example.com',
    //     'votes' => 0 ,
    //   
    // ));

    /**
     * funciton to insert into table
     */

     public function insert(array $arr)
     {

        $my_keys = ''; 
        $my_vals = ''; 

        $i = 1;

        $comma = ",";

        // loop throug the arry and connact keys nas vals
        foreach ($arr as $key => $value) {
            //secure first 
            $key = $this->secure_key($key);
            $value = $this->secure_value($value);
            //end

            // if last item
            // remover the comma  
            if(count($arr) == $i){ $comma = ""; }

            // connact the key
            $my_keys = $my_keys."`$key` $comma" ;
            
            // if value is string add '' arround it 
            if (is_string($value)){
               $value = "'$value'";
            }
            
            $my_vals = $my_vals."$value $comma";

            $i++;

        }

        // write the sql query 
         $this->_sql = 
         "INSERT INTO `$this->_tblName` ($my_keys) VALUE ($my_vals) ;"; 

         return $this;
     }

     // DELETE FROM `users` WHERE `id` = '15' ;
     public function delete(){
        $end = ""; 
        if(!empty($this->_limit)){
             $end = " $this->_limit ";
        }
        $this->_sql = 
         "DELETE FROM `$this->_tblName`"
         . $this->_sql 
         . $end ." ; " ;

         // log the sql if sql log varible is true in the configuration file 
         $this->log_sql($this->_sql);

         return $this;
     }

     public function truncate()
     {

         $this->_sql = "TRUNCATE TABLE `$this->_tblName` ;" ;
          // log the sql if sql log varible is true in the configuration file 
          $this->log_sql($this->_sql);
          return $this;

     }

     public function drop()
     {

         $this->_sql = "DROP TABLE `$this->_tblName` ;" ;
          // log the sql if sql log varible is true in the configuration file 
          $this->log_sql($this->_sql);
          return $this;

     }


     


}

?>