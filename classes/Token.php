<?php

class Token{
    
    public static function generate(){
        Session::set(Config::get('token/token_name', md5(uniqid())));
    }
    
    public static function check($value){
        
        $name = Config::get('token/token/name');
        
        if(Session::exists($name) && $value == Session::get($name)){
            Session::delete($name);
            return true;
        }
        
        else{
            return false;
        }
        
    } 
    
}

?>