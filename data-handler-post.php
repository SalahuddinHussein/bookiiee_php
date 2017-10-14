<?php

require_once'core/init.php';
$user = new User();
$json = array("result" => false);  

$book = new Book();


    
if( strlen($_POST["book-image"]) && strlen($_POST["book-title"]) && strlen($_POST["book-category"]) && strlen($_POST["book-sub-category"]) && strlen($_POST["book-purpose"]) && strlen($_POST["book-decription"]) && strlen($_POST["book-tags"]) && strlen($_POST["book-price"]) )
{
    
    if(isset($_POST["seller-info-check"])){
        
        if( $_POST["seller-info-check"] == 'on'){
        if($user = new User(Session::get(Config::get('session/session_name')))){
            
            if($user_data = $user->data()){
                $user_name = $user_data->user_name;
                $user_contact = $user_data->user_contact;
                $user_city = $user_data->user_city;
                $user_address = $user_data->user_address;
            }
            
        }
            
     }
        
    }
    
    else{
                $user_name = $_POST["seller-name"];
                $user_contact = $_POST["seller-contact"];
                $user_city = $_POST["seller-city"];
                $user_address = $_POST["seller-address"];
    }
    $bookDetail = array("user_id" => Session::get(Config::get('session/session_name')),
                       "book_title" => $_POST["book-title"],
                        "book_title_metaphone" => metaphone($_POST["book-title"]),
                       "book_isbn" => $_POST["book-isbn"],
                       "book_category" => $_POST["book-category"],
                       "book_sub_category" => $_POST["book-sub-category"],
                       "book_purpose" => $_POST["book-purpose"],
                       "book_decription" => $_POST["book-decription"],
                       "book_tags" => $_POST["book-tags"],
                        "book_tags_metaphone" => metaphone($_POST["book-tags"]),
                       "book_price" => $_POST["book-price"],
                       "book_image" => $_POST["book-image"],
                       "seller_name" => $user_name,
                       "seller_contact" => $user_contact,    
                       "seller_city" => $user_city,
                       "seller_address" => $user_address);
    
    if($book->create($bookDetail)){
        
        $json["result"] = true;
        
    }
       
}
   
echo json_encode($json);

?>