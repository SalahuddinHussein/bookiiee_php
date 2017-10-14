<?php

class User {
    
private $_db ,$_sessionName ,$_isLoggedin;
private $_data = null;
public function __construct($user = null){
    
    $this->_db = DB::getInstance();
    
    $this->_sessionName = Config::get('session/session_name');
    
    $userId = Session::get($this->_sessionName);
    
    if(!empty($userId)){
            
        $query = "SELECT * FROM users WHERE user_id = :user_id  LIMIT 1";
                
            if($this->_db->select($query,[":user_id" => $userId])){
            
            $this->_data = $this->_db->result()[0];
                
            if($userId = $this->_data->user_id){
                
                
                return $this->_isLoggedin = true;
                
            }
                
                else{
                    return $this->_isLoggedin = false;
                }
            
                
            }
    }
    
}

    public function create(array $userDetail){
    
    
    if($this->_db->insert("users" , $userDetail)->error()){
        
        throw new Exception('there is problem creating account');
    }
        
        else{
            
            return true;
        }
}
    
    public function update(array $userDetail, $user){
    
        $where = array("user_id" => $user);
    
    if($this->_db->update("users" , $userDetail , $where)->error()){
        
        throw new Exception('there is problem updating account');
    }
        
        else{
            
            return true;
        }
}
    
    
    
    public function login($client_id, array $userDetail = NULL){
        
        if($client_id){
            
            
        $query = "SELECT * FROM users WHERE client_id = :client_id  LIMIT 1";
                
            $this->_db->select($query,[":client_id" => $client_id]);
            
            if($this->_db->row_count()){
                
             $this->_data = $this->_db->result()[0];
                    
             Session::set($this->_sessionName,$this->data()->user_id);
                    
             Redirect::to('index.php');
                    
            return true;
                
            }
            
            else{
                
                if($this->create($userDetail)){
                    
                    $this->login($client_id);
                }
            }
         }
    }
    
    
    public function isLoggedin(){
        
        if(Session::exists($this->_sessionName)){
        
        return $this->_isLoggedin = true;
        
        }
        
        else{
            
            return $this->_isLoggedin = false;
            
        }
    }
    
    public function data(){
    
    return $this->_data;
    
    }
    
   
    
}

?>