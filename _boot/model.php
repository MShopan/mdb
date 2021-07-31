<?php

/**
 * 
 * Std class for all models
 */

class model {

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

   public function print_show_table(){

    $arr =  DB::table( $this->get_tbl_name() )->get();

    $show_key_arr = array_keys($this->show);



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
             $virtual_edit = $this->virtual_global['edit'];
             $virtual_delete = $this->virtual_global['delete'];
            if($edit){   mhtml::th("<a href='edit.php?model=$model&id=$currentId'>$virtual_edit</a>");  }
            if($delete){   mhtml::th("<a href='delete.php?model=$model&id=$currentId'>$virtual_delete</a>"); }

        mhtml::endTr();
        
    }



    mhtml::endTable();

}

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
     

   


}
?>

<script>

</script>