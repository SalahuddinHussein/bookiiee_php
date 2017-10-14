<?php

class Book{
    
    
    private $_db, $_data, $_count = 0;
    
    public function __construct(){
        
        $this->_db = DB::getInstance();
        
    }
    
    public function create(array $bookDetail){
        
        if($this->_db->insert("books" , $bookDetail)->error()){
        
        throw new Exception('there is problem creating shelf');
    }
        
        else{
            
            return true;
        }
        
    }
    
    
    public function get($bookdetail = null){
        
         if(is_numeric ($bookdetail)){
            
       $query = "SELECT * FROM books WHERE book_id = '".$bookdetail."'  LIMIT 1";
                
            $this->_db->select_all($query);
            
            if($this->_db->row_count()){
            
            $this->_count = $this->_db->row_count();
                
             $this->_data = $this->_db->result()[0];
                    
            return $this;
                
            }
        
    }
        
        else if($bookdetail == null){
            
            
        $query = "SELECT * FROM books ORDER BY book_id DESC";
                
            $this->_db->select($query);
            
            if($this->_db->row_count()){
                
            $this->_count = $this->_db->row_count();    
             $this->_data = $this->_db->result();
                    
            return $this;
                
            }
        
    }
        
        else if(is_string($bookdetail) && !empty($bookdetail)){
            
            $query = "SELECT * FROM books WHERE book_sub_category = '".strtolower($bookdetail)."' ORDER BY book_id DESC";
                
            $this->_db->select($query);
            
            if($this->_db->row_count()){
                
            $this->_count = $this->_db->row_count();    
             $this->_data = $this->_db->result();
                    
            return $this;
                
            } 
            
        }
        
        
    
}
    
    
    public function book_count(){
        
        return   $this->_count;
    }
    
    public function book_data(){
        
        return   $this->_data;
    }

}

?>