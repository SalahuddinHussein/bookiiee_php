<?php

class Categories{
    
    
    private $_db;
    
    public function __construct(){
        
        $this->_db = DB::getInstance();
    }
    
    public function getCat(){
        
        $query = "SELECT * FROM book_categories";
        
        $this->_db->select_all($query);
        
        if($this->_db->row_count()){
                
             return $this->_db->result();
        
        }
        
    }
    
    
    public function getSubCat($categoryId){
        
        $query = "SELECT sub_category_id , sub_category_name FROM book_sub_categories WHERE category_id =".$categoryId;
        
        $this->_db->select_all($query);
        
        if($this->_db->row_count()){
                
             return $this->_db->result();
        
        }
        
    }
}



?>