<?php

require_once('core/init.php');

$db_obj = new DB;

$response = array("error" => true);

if(isset($_POST['user_id']) && isset($_POST['book_id']) && isset($_POST['function'])){
    
    $user_id = ($_POST['user_id'] == '') ? NULL : $_POST['user_id'];
    
    $book_id = ($_POST['book_id'] == '') ? NULL : $_POST['book_id'];
    
    $function = ($_POST['function'] == '') ? NULL : $_POST['function'];
    
    if($user_id != NULL && $book_id != NULL && $function  == 'bookmark'){
        
        $data = array("user_id" => $user_id,
                      "book_id" => $book_id);
        
        if($db_obj->select("SELECT bookmark_id FROM bookmarks WHERE user_id = $user_id AND book_id = $book_id")->row_count() == 0){
            
        if(!$db_obj->insert("bookmarks", $data)->error()){
            
           $response["error"] = false;
            
        }
            
        }
        
    }
    
    
    if($user_id != NULL && $book_id != NULL && $function  == 'unbookmark'){
        
        if($db_obj->select("SELECT bookmark_id FROM bookmarks WHERE user_id = $user_id AND book_id = $book_id")->row_count()){
            
         $query = "DELETE FROM bookmarks WHERE book_id = $book_id AND user_id = $user_id ";
        
        if($db_obj->delete($query)){
            
            $response["error"] = false;
            
            }
        
        }
        
    }
    
    
    if($user_id != NULL && $book_id != NULL && $function  == 'unpin' ){
        
        $query = "DELETE FROM books WHERE book_id = $book_id AND user_id = $user_id ";
        
        if($db_obj->delete($query)){
            
            $response["error"] = false;
            
        }
        
    }
    
    
    else if($user_id == NULL){
        
           $response['error'] = true;
    }
    
    
    
}

echo json_encode($response);

?>