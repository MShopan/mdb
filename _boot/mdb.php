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

    private $_hasWhere = false;
    private $compare_signs = array('LIKE' , '>' ,'<' , '<>' , '<=' ,'>=' ) ;

    private $_sql ='';
    private $_limit = '';
    private $_tblName = '';
    public $result = null ; 


    function __construct(){

        $this->host = '127.0.0.1';
        $this->db = 'acc_main_port';
        $this->username = 'root';
        $this->password = 'egypt2013';
       


         //echo $this->password , mhtml::br() ;
    }

    function get_sql(){

        return $this->_sql ;

    }

    function log_sql($sql) {
        // log sql in file here          
        logger::info($this->_sql,"DB:$this->_tblName");

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
        // $newVal = mysqli_real_escape_string($_val); 
        // return $newVal ;

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



    public function makeEqualAssign($_key , $_val , $option = "="){
        //secure first
        $_val = $this->secure_value($_val);
        $_key = $this->secure_key($_key);
        //end
        $assign = " `$_key` $option '$_val' " ;

        return $assign ;
      
    }


    public function where($_key  , $_val  , $option = "=") {

        if($this->_hasWhere==true){
            // if has where before run and where 
            $this->andWhere($_key  , $_val  , $option );
        
        } else {
            $this->firstWhere($_key  , $_val  , $option );
        }

        return $this;

    }

    public function firstWhere($_key  , $_val  , $option = "=") {

     

        if ( in_array($_val, $this->compare_signs ) ){
            // if query use LIKE or another sign 
            $compare = $_val ;

            $_val = $option ;
      

            $myAssign = $this->makeEqualAssign($_key , $_val , $compare ) ;
        } else {
            // if eqal sign only  only

            $myAssign = $this->makeEqualAssign($_key , $_val ) ;
        }
        

        $this->_sql = $this->_sql . 
        " WHERE $myAssign" ;

        
        
        // set has where = true 
        $this->_hasWhere=true; 
        
        // mhtml::print_r($this)  ;
        return $this;

    }



    public function andWhere($_key , $_val , $option = "="){

        if ( in_array($_val, $this->compare_signs ) ){
            // if query use LIKE or another sign 
            $compare = $_val ;

            $_val = $option ;
      

            $myAssign = $this->makeEqualAssign($_key , $_val , $compare ) ;
        } else {
            // if = only

            $myAssign = $this->makeEqualAssign($_key , $_val ) ;
        }

        $this->_sql = $this->_sql . 
        " AND $myAssign" ;

        return $this;

    }


    /**
     * 
     * do and where function OR in sql 
     * 
     */

    public function orWhere($_key , $_val ,$option = "="){

        if ( in_array($_val, $this->compare_signs ) ){
            // if query use LIKE or another sign 
            $compare = $_val ;

            $_val = $option ;
      

            $myAssign = $this->makeEqualAssign($_key , $_val , $compare ) ;
        } else {
            // if =  only

            $myAssign = $this->makeEqualAssign($_key , $_val ) ;
        }

        $this->_sql = $this->_sql . 
        " OR $myAssign" ;

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
         logger::info($this->_sql,"DB:$this->_tblName");

         $this->excute();

         return $this->result;

        
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

         $this->excute('delete');

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

     // update sample 
     //  UPDATE `waiters` SET `name` = 'ddd', `creator` = 'd' WHERE `id` =18 LIMIT 1 ;

     public function update(array $arr){
      

        $_connact = ''; 

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
            
            // if value is string add '' arround it 
            if (is_string($value)){
               $value = "'$value'";
            }
            // connact the key
            $_connact = $_connact . " `$key` = $value " . $comma ; 

            $i++;

        }

        // write the sql query 
         $this->_sql = 
         "UPDATE `$this->_tblName` SET $_connact $this->_sql ;"; 

         return $this;
     }

     function excute($type="select"){


        $connect=mysqli_connect($this->host,$this->username,$this->password,$this->db);

        $connect->set_charset("utf8"); 
        
        date_default_timezone_set('Africa/Cairo');

        $query=mysqli_query($connect,$this->_sql);

        $this->result =  array();

        if ($type=="select"){
            while($row=mysqli_fetch_assoc($query)){

                array_push($this->result , $row);
            }

            return $this->result;
        }

        if($type=='delete'){
            // do nothing 
            // query doing in top 
            return $this;
        }



     }

    


     




     


}

?>