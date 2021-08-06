<?php

/**
 * 
 * Std class for all models
 */

class model {

    private $result=null;

   public function get_tbl_name(){
       return $this->tblName;
   }
   public function get_title(){
       return $this->show_title;
   }

   public public function add_title()
   {

    mhtml::h1($this->get_title());

   }

   public function add_new_button(){

    $tblName = $this->get_tbl_name() ;

    $virtual_add = $this->virtual_global['add'];
    mhtml::a($virtual_add,"insert.php?model=$tblName");

   }


   /**
    * 
    * print SHOW table for select data
    *
    */

   public function print_show_table($queryBuilderArray = "__"){
    // add title of the table 
    $this->add_title();
    // set the defult query bilder array
    if($queryBuilderArray=="__"){

        $arr =  DB::table( $this->get_tbl_name() )->get();
    } else {
        // set array if user set
        $arr = $queryBuilderArray ;
    }

    if (empty($arr)) {

         $no_data = config::get('no_data');
         $title = $this->show_title;

        mhtml::h3("$no_data");
        return 0;
    }

    $show_key_arr = array_keys($this->show);

    $show_one= $this->option_global['show_one']; 
    $edit= $this->option_global['edit']; 
    $delete= $this->option_global['delete'];     

    

    $table_class= "pure-table";

   

    mhtml::startTable($table_class);
    mhtml::startTr();

    // mhtml::dump($arr[0]['creator']);

    // print table header
    // var show_key_arr defiened befor it is the $this->show keys only  ! if is used in this coad
    foreach ($this->show as $key => $value) { 

      mhtml::th($this->virtual_names[$value]);
  
    }

    // mhtml::th($arr[0][$key]);


    if($show_one){   mhtml::th($this->virtual_global['show_one']); }
    if($edit){   mhtml::th($this->virtual_global['edit']);  }
    if($delete){   mhtml::th($this->virtual_global['delete']); }

    mhtml::endTr();


    // print table rows
    $currentId = null; 

    foreach ($arr as $arrKey => $arrValue) { 
        mhtml::startTr();
            // main td form database (resources)
            foreach ($this->show as $showKey => $showValue) {

                mhtml::th( $arrValue[$showValue] );

            }
            // aditionl td
            $currentId = $arrValue['id'];
            $model = $this->get_tbl_name() ;
             $virtual_show_one = $this->virtual_global['show_one'];
             $virtual_edit = $this->virtual_global['edit'];
             $virtual_delete = $this->virtual_global['delete'];
             if($show_one){   mhtml::th("<a href='show_one.php?model=$model&id=$currentId'>$virtual_show_one</a>"); }
            if($edit){   mhtml::th("<a href='edit.php?model=$model&id=$currentId'>$virtual_edit</a>");  }
            if($delete){   mhtml::th("<a href='delete.php?model=$model&id=$currentId'>$virtual_delete</a>"); }

        mhtml::endTr();
        
    }



    mhtml::endTable();

}

/**
 * show ONE view
 */

public function show_one(){

    $_id = $_GET['id']; 

    $this->_id = $_id ;

    $this->show_one_data($_id);

    $this->show_one_relation($_id);


}

public function show_one_data($_id)
{

    $tblName = $this->get_tbl_name();

    $source = DB::table($tblName)->where('id',$_id)->get();

    $source_first = $source[0];

    // mhtml::dump($source_first);


    $struct = $this->struct;

    mhtml::startTable("tbl_show_one");
    
    // loop througth fields
    foreach ($this->show as $key => $field) {

         
        $virtual_name = $this->virtual_names[$field];
        $value = $source_first[$field];

        mhtml::startTr();
        mhtml::td($virtual_name);
        mhtml::td($value);
        mhtml::endTr();


    }

    // if you need kind of the value retrive struct like add_edit_form()
    

    mhtml::endTable();
    
}


///////////

public function show_one_relation($_id){
    // acording to $show_one_relations probery in the child model 

    $myModel = $this->get_tbl_name();

    if (isset($this->show_one_relations)) {

        $relations = $this->show_one_relations ; 
    
        if(count($relations)>0){
          
            foreach ($relations as $relation ) {
            //    echo $relation ;
            require(config::get('main_root')."/models/{$relation}.php");

            $relation_model = new $relation ;

            $result_array = $this->find($_id)
                    ->$relation()
                    -> get();

            // mhtml::dump($result_array,'all');

            $_relation_data_array = $result_array[0][$relation] ;

            // mhtml::dump($_relation_data_array,'relation');

            $relation_model->print_show_table($_relation_data_array);

            }
    
            
        }
      
    } else {
        return 0; 
    }



}

/////////

/**
 * 
 * add EDIT form 
 * 
 */
    public function add_edit_form(){

        $_id = $_GET['id']; 
        $tblName = $this->get_tbl_name();

        $source = DB::table($tblName)->where('id',$_id)->get();

        $source_first = $source[0];

        // mhtml::dump($source_first);


        $struct = $this->struct;

        mhtml::startForm("edit","backend_edit.php");

        // loop througth fields
        foreach ($this->edit as $key => $field) {

            $kind = $struct[$field] ;
            if($kind == 'string')  {$kind = 'text' ;} 
            $value = $source_first[$field];

            mhtml::field($this->virtual_names[$field],$field,$kind,$value);

        }

        // add secret field for password
        if(isset($this->edit_secret)){
            if($this->edit_secret == true ){

                Logger::warn("we use one secret only on secret[0] in secret array in model");
                $virtual_pass = $this->virtual_names[$this->secret[0]];
                mhtml::field($virtual_pass,$this->secret[0],'password');

            }
        }

       




        // mhtml::field('user name ','user_name','text',"mohammed");
        // mhtml::field('passwording','password','password');
        // mhtml::field('age','age','number');

        mhtml::field_id_model();

        mhtml::submitForm();

        mhtml::endForm();

    }

    /**
     * add DELETE from 
     */

     public public function add_delete_form()
     {

        $_id = $_GET['id'];


        $model = $this->get_tbl_name();

        mhtml::startForm("delete","backend_delete.php");
        mhtml::h1("are you sure do delete");
       
        echo  "<button name=\"confirm\" type=\"submit\" value=\"yes\" > yes </button>";
        echo "<button name=\"confirm\" type=\"submit\" value=\"no\" > no </button>";

        echo "<input class='vis_hidden' name='model' value=$model  >";
        echo "<input class='vis_hidden' name='id' value=$_id  >";
       
        mhtml::endForm();
       
       
     }
     
     public public function do_delete_row($id)
     {  
         # code...
        //  mhtml::dump($id);

        $model = $this->get_tbl_name() ;

        try {
            $myDel = DB::table($model)->where('id',$id)
            ->delete();
        } catch (Throwable $th) {
            echo 'error in delete item ';
            exit;
        }

        mhtml::h1('delete success');
        // redirect 
 
        $root_url = config::get('root_url');

        echo "
        <script>
        setTimeout(() => {
            window.location.replace('$root_url/view/show.php?model=$model');
        }, 1000);
        </script>
        ";

                          
         
     }

     public function find($id)
     {
        $tbl_name= $this->get_tbl_name();

        $result = DB::table($tbl_name)->where('id',$id)->get();

        $this->result= $result;

        return $this ;

         
     }

     public function hasMany($modelName , $forginKey="" , $localKey="id" ){
        
        // add forginKey default value if not set by programmer
        if( empty($forginKey) ) {
            $tbl_name= $this->get_tbl_name();
            $forginKey=helper::remove_last_chr($tbl_name).'_id';
        }

        $currnt_result = $this->result ;


        if(is_array($currnt_result)){
            // 2multi dementionl array
            
            foreach ($currnt_result as $key => $el) {

                $my_id = $el[$localKey];

                $result = DB::table($modelName)->where($forginKey,$my_id)->get();
            
                $currnt_result[$key][$modelName]=$result;

            }

        // end if 
        } else {
            // one diminssion arrray 
            $my_id = $currnt_result[$localKey];

            $result = DB::table($modelName)->where($forginKey,$my_id)->get();
            
            $currnt_result[$key][$modelName]=$result;

        }


        $this->result = $currnt_result ;


         return  $this;
     }

     public function get()
     {

        return $this->result;
         
     }

     
     

   


}
?>

<script>

</script>