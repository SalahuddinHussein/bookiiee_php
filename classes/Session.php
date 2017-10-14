<?php

class Session{
    
    public static function exists($name){
        
        return (isset($_SESSION[$name])) ? true : false;
    }
    
    public static function set($name, $value){
        
        
        if(!self::exists($name)){
            
            $_SESSION[$name] = $value;
        }
    }
    
    public static function get($name){
        
        if(self::exists($name)){
            return $_SESSION[$name];
        }
                
    }
    
     public static function delete($name){
        
        if(self::exists($name)){
            unset($_SESSION[$name]);
        }
    }
    
    public static function flash($name, $message=''){
        if(self::exists($name)){
            $session = self::get($name);
            self::delete($name);
            return $session;
        }
          else{
              self::set($name, $message);
          }
    }
    
}

?>