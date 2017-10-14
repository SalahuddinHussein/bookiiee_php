<?php

class DB{

private static $_instance = NULL;

private $_pdo , $_query , $_error = false, $_result, $_count = 0;

    public function __construct(){
        
        try{
        $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/dbname'),Config::get('mysql/username'),Config::get('mysql/password'));
            
            
         $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
    
        }
        
        catch(PDOException $e){
            
            $e->getMessage();
        }
        
    }
    
    public static function getInstance(){
        
        if(!isset(self::$_instance)){
            
            self::$_instance = new DB;
        
        }
            return self::$_instance;
       
    }
    
    public function select($query, array $query_data){
        
        $this->_error = true;
        
        $this->_query = $this->_pdo->prepare($query);
        
        if($this->_query->execute($query_data)){
            
            $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            
            $this->_error = false;
        }
        
        return $this;
    }
    
    
    public function select_all($query){
        
        $this->_error = true;
        
        $this->_query = $this->_pdo->prepare($query);
        
        if($this->_query->execute()){
            
            $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            
            $this->_error = false;
        }
        
        return $this;
    }
    
    
    public function insert($table ,  array $props){
        
        $this->_error = true;
        
        if(count($props)){
            foreach($props as $keys => $values){
                
                $key[] = $keys;
                $value[] = $values;
            }
            
            $query = "INSERT INTO ". $table ." (".implode(', ',$key).") VALUES('". implode("', '",$value)."')";
            
            $this->_query = $this->_pdo->query($query);
           
            $this->_error = false;
          }
        
        return $this;
    }
    
    public function update($table ,  array $props, array $where){
        
        $this->_error = true;
        
        if(count($props)){
            
            $x = 0; 
            foreach($props as $keys => $values){
                
                $x++;
                
                if($x == 1){
                    
                  $query = "UPDATE ". $table. " SET ". $keys ." = '". $values ."'" ;
                    
                }
                
                else{
                    
                    $query .= ",". $keys ." = '". $values ."'";
                }
                
            }
            
            foreach($where as $keys => $values){
            $query .= "WHERE ".$keys. " = '". $values ."'" ;
            }
            
            
            $this->_query = $this->_pdo->query($query);
           
            $this->_error = false;
          }
        
        return $this;
    }
    
    public function result(){
        
        return $this->_result;
    }
    
    public function row_count(){
        
        return $this->_count;
    }
    
    public function  error(){
        
        return $this->_error;
    }
    
    public function  link(){
        
        return $this->_pdo;
    }
    
     public function  delete($query){
        
        if($this->_pdo->query($query)){
            
            return true;
            
        }
         
         else{
             
             return false;
         }
    }
    
    
    
}
?>