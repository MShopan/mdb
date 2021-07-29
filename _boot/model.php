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
    mhtml::a("add","insert.php?model=$tblName");

   }

    // print show table for select data

   public function print_show_table(){

    $arr =  DB::table( $this->get_tbl_name() )->get();

    $edit= true; 
    $delete = true ;

    

    $table_class= "pure-table";


    mhtml::startTable($table_class);
    mhtml::startTr();

    // print table header
    foreach ($arr[0] as $key => $value) { 

    if(in_array($key,$this->show)){

        mhtml::th($key);
    }
       

    }

    if($edit){   mhtml::th('edit');  }
    if($delete){   mhtml::th('delete'); }

    mhtml::endTr();


    // print table rows
    $currentId = null; 

    foreach ($arr as $key => $value) { 
        mhtml::startTr();
            foreach ($value as $subKey => $subValue) {

                if(in_array($subKey,$this->show)){

                    mhtml::th($subValue);
                }

                if($subKey=="id"){
                    $currentId = $subValue ;
                }
                    
              
            }
            // aditionl td
            $model = $this->get_tbl_name() ;
            if($edit){   mhtml::th("<a href='edit.php?model=$model&id=$currentId'>edit</a>");  }
            if($delete){   mhtml::th("<a href='delete.php?model=$model&id=$currentId'>delete</a>"); }

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

        $struct = $this->struct;

        mhtml::startForm("edit","backend_edit.php");

        // loop througth fields
        foreach ($this->edit as $key => $field) {
            mhtml::field($field,$field,'text');
        }


        // mhtml::field('user name ','user_name','text',"mohammed");
        // mhtml::field('passwording','password','password');
        // mhtml::field('age','age','number');

        mhtml::field_id_model();

        mhtml::submitForm();

        mhtml::endForm();

    }


}
?>