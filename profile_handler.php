<?php

require_once'core/init.php';

$response = array("result" => false);

$user = new user();


    
if( strlen($_POST["user-name"]) && strlen($_POST["user-pincode"]) && strlen($_POST["user-contact"]) && strlen($_POST["user-address"]) && strlen($_POST["user-city"]) )
{
    $userDetail = array("user_name" => $_POST["user-name"],
                       "user_contact" => $_POST["user-contact"],    
                       "user_city" => $_POST["user-city"],
                        "user_gender" => $_POST["user-gender"],
                        "user_pincode" => $_POST["user-pincode"],
                       "user_address" => $_POST["user-address"]);
    
    $user_id = Session::get(Config::get('session/session_name'));
    
    if($user->update($userDetail, $user_id)){
        
        $response["result"] = true;
        
    }
    
}

echo json_encode($response);

?>
   