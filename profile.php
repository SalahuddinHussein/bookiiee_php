<?php
require_once'core/init.php';

 $user = new User();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=0, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height">
    <title>Bookiiee - A place to sell, buy and donate books</title>
    
    <!--/ facicons starts-->
    
    <?php include'includes/favicons.php'; ?>
    
    <!--/ facicons ends-->
    
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="vendors/icons/simple-line-icons-master/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/icons/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/icons/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="resources/css/main.css">
    <link rel="stylesheet" href="resources/css/responsive.css">
    <link rel="stylesheet" href="vendors/css/croppic.css">
    
    
    <!--[if lt IE 9]>
    <script src="vendors/js/html5shiv.js"></script>
    <![endif]-->
    
    <style>
        
        #profile-bar-heading{
            display: none;
            text-align: center;
        }
        
        #profile-bar-heading i{
            padding-right: 5px;
            color: #09d37f;
        }
        
        .ad-post-element .error{
            display: block;
            width: 100%;
            color: #ed7f69;
            font-size: 13px;
            padding-top: 4px;
            padding-left: 2px;
            text-align: left;
        }
        
        .content-wrapper{
            padding: 40px;
        }
        
        .form-header{
            display: block;
            width: 100%;
            text-align: center;
            font-size: 26px;
            color: #3c4658;
            padding-bottom: 10px;
            border-bottom: 1px dashed #97a2b2;
        }

        .seller-header{
            display: block;
            width: 100%;
            text-align: center;
            font-size: 18px;
            color: #3c4658;
            padding-bottom: 5px;
            margin: 15px 0px;
            border-bottom: 1px dashed #97a2b2;
        }

        .ad-post-element{
            display: block;
            width: 100%;
            padding: 10px 0px;
        }

        .ad-post-element label{
            display: block;
            text-align: left;
            font-size: 16px;
            font-weight: 400;
            padding-bottom: 5px;
            padding-left: 2px;
            color: rgba(60, 70, 88, 0.8);

        }

        .ad-post-element input,
        .ad-post-element select,
        .ad-post-element textarea{
            display: block;
            width: 100%;
            padding: 7px 14px;
            font-family: 'Roboto';
            font-size: 14px;
            text-rendering: auto;
            letter-spacing: normal;
            word-spacing: normal;
            outline: none;
            text-align: start;
            text-transform: none;
            border-radius: 6px;
            border: 2px solid #97a2b2 !important;
        }


        .ad-post-element span{
            display: block;
            width: 100%;
            color: #909cb1;
            font-size: 13px;
            padding-top: 4px;
            padding-left: 2px;
            text-align: left;
        }
    
        @media only screen and (max-width: 900px){
    
            .content-box{
                width: 100%;
                margin: 0px;
            }
            
            .content-wrapper{
            padding: 30px;
            }
            
            #crop-me{
                margin: 0px 0px 5px 5px;
            }
            
}

        @media only screen and (max-width: 767px){

              .book-container {
                display: block;
                position:static;
                float: left;
                width: 100%;
                padding: 0px;
            }

            .book-box {
                display: block;
                float: left;
                width: 200px;
                height: 300px;
                border-radius: 4px;
                overflow: hidden;
                margin-left: 40px;
            }

            .book-box img{
                width: 100%;
                height: 100%;
                display: block;
            }

              .content-wrapper{
                    padding: 20px;
                }

}

@media only screen and (max-width: 720px){
    
    .content-wrapper{
            padding: 10px;
        }
}

        
@media only screen and (max-width: 480px){
    
    
    .content-wrapper{
            padding: 0px;
        }
    
}
    </style>
    
</head>
<body>
  
  <!--  header starts  -->
   
   <?php include'includes/header.php'; ?>
       
      <!--  header endss  -->
        
        <div class="clear"></div>
        
        <h1 id="profile-bar-heading"><i class="fa fa-address-card" aria-hidden="true"></i>Successfully Updated!</h1>
        
        <div class="main-container">
            <div class="content-box">
                <div class="content-wrapper">
                        <div class="book-info">
        
                 <?php
                         
                      if($user->isLoggedin()){
                          
                        
                            ?>
    
                
                        <form action="profile_handler.php"  method="POST" id="profile-form">
                           
                            <span class="form-header">Profile</span>

                            
                            <div class="ad-post-element">
                           <label for="user-name">Name</label>
                           <input type="text" name="user-name" id="name" value="<?php echo $user->data()->user_name; ?>">
                           <span>&#42; keep it real so that people can identify you.</span>
                           <span class="error" id="name-error"></span>
                        </div>
                        
                        <div class="ad-post-element">
                               <label for="user-gender">Gender</label>
                               <select name="user-gender" id="gender">
                                   <option value="female" '. <?php if($user->data()->user_gender == 'female'){
                                echo " selected='selected'";
                            }?>.'>Female</option>
                                   <option value="male" '. <?php if($user->data()->user_gender == 'male'){
                                echo " selected='selected'";
                            }?>.'>Male</option>
                               </select>
                            </div>
                            
                            <div class="ad-post-element">
                           <label for="user-contact">Contact</label>
                           <input type="text" name="user-contact" id="contact" value="<?php echo $user->data()->user_contact; ?>"> 
                           <span>&#42; keep it real so that people can contact you.</span>
                           <span class="error" id="contact-error"></span>
                        </div>
                        
                        <div class="ad-post-element">
                           <label for="user-city">Current City</label>
                           <input type="text" name="user-city" id="city" value="<?php echo $user->data()->user_city; ?>">
                           <span>&#42; keep it real so that people can reach you.</span>
                           <span class="error" id="city-error"></span>
                        </div>
                        
                        <div class="ad-post-element">
                           <label for="user-postal">Postal Code</label>
                           <input type="text" name="user-pincode" id="postal" value="<?php echo $user->data()->user_pincode; ?>">
                           <span>&#42; it is option and can be leave unfilled.</span>
                           <span class="error" id="postal-error"></span>
                        </div>
                        
                        <div class="ad-post-element">
                           <label for="user-address">Current Address</label>
                           <textarea id="address" name="user-address"><?php echo $user->data()->user_address; ?></textarea>
                           <span>&#42; keep it real so that people can reach you.</span>
                           <span class="error" id="address-error"></span>
                        </div>
                        
                    
                    
                    <button type="submit" name="update_profile" class="action-primary" style="margin:10px 0px 10px 0px">Update Profile</button>
                </form>
                               
                    <?php } 
                            
                    else{
                        
                        echo'<span style="text-align:center; display:block"  >Please login to check profile<span>';
                        
                    }?>
                            
                    
                </div>
            </div>
        </div>
        
        <!--  footer starts   -->

        <?php include'includes/footer.php'; ?>

        <!--  footer ends  -->
        
  <script src="vendors/js/jquery-3.0.0.min.js" type="text/javascript"></script>
    <script>
    
    $('#name-error').hide();
    $('#contact-error').hide();
    $('#postal-error').hide();
    $('#city-error').hide();
    $('#address-error').hide();
    
    
    var nameError = false;
    var contactError = false;
    var postalError = false;
    var cityError = false;
    var addressError = false;
    
    
    
    
    $('#name').focusout(function(){
        check_name();
    });
    
    $('#contact').focusout(function(){
        check_contact();
    });
    
    $('#city').focusout(function(){
        check_city();
    });
    
    $('#address').focusout(function(){
        check_address();
    });
        
        $('#postal').focusout(function(){
        check_address();
    });
     
    
    
    function check_name(){
    
        var nameLength = $('#name').val().length;
        
        if(!nameLength){
            $('#name-error').html("*Name can't be empty");
            $('#name-error').show();
            nameError = true;
        }
         
        else if(nameLength > 50){
            $('#name-error').html("*Should be less then 50 characters");
            $('#name-error').show();
            nameError = true;
        }   
        
        else{
            $('#name-error').hide();
        }
        
    }
    
    function check_contact(){
    
        var contactLength = $('#contact').val().length;
        var phone = $('#contact').val();
        
        if(!contactLength){
            $('#contact-error').html("*Contact can't be empty");
            $('#contact-error').show();
            contactError = true;
        }
         
        else if(!phone.match(/^\d+$/)) {
            $('#contact-error').html("*Contact must contain digits");
            $('#contact-error').show();
            contactError = true;
                
         }
        else if(contactLength != 10){
            $('#contact-error').html("*Contact must be 10 digits long");
            $('#contact-error').show();
            contactError = true;
        }
        
        else{
            $('#contact-error').hide();
        }
        
    }
        
        function check_postal(){
    
        var postalLength = $('#postal').val().length;
        var postal = $('#postal').val();
        
        if(!postalLength){
            $('#postal-error').html("*postal can't be empty");
            $('#postal-error').show();
            postalError = true;
        }
         
        else if(!postal.match(/^\d+$/)) {
            $('#postal-error').html("*postal must contain digits");
            $('#postal-error').show();
            postalError = true;
                
         }
        else if(postalLength != 6){
            $('#postal-error').html("*postal must be 6 digits long");
            $('#postal-error').show();
            postalError = true;
        }
        
        else{
            $('#postal-error').hide();
        }
        
    }
    
    
    function check_city(){
    
        var cityLength = $('#city').val().length;
        
        if(!cityLength){
            $('#city-error').html("*City can't be empty");
            $('#city-error').show();
            cityError = true;
        }
        
        else{
            $('#city-error').hide();
        }
        
    }
    
    function check_address(){
    
        var addressLength = $('#address').val().length;
        
        if(!addressLength){
            $('#address-error').html("*Address can't be empty");
            $('#address-error').show();
            addressError = true;
        }
        
        else{
            $('#address-error').hide();
        }
        
    }
    
    $('#profile-form').on('submit',function(){
        
        
        nameError = false;
        contactError = false;
        postalError = false;
        cityError = false;
        addressError = false;
    
        check_name();
        check_city();
        check_address();
        check_postal();
        check_contact();
        
                        
        if( nameError == false && contactError == false && postalError == false  && cityError == false && addressError == false){
           
            var that = $(this),
            contents = that.serialize();
            $("html, body").animate({scrollTop: 0}, 0);
            
            $.ajax({
               url: 'profile_handler.php',
                dataType: 'json',
                type: 'post',
                data: contents,
                success:function(data){
                    
                    
                     if(data.result == true){
                         $('#profile-bar-heading').css('display','block');
                    }
                    
                     if(data.result == false){
                        $('#profile-bar-heading').html('something went wrong!');
                        $('#profile-bar-heading').css('display', 'block');
                    }
                      
                 }
                
                
            });
            
           return false;
            
           return false;
            
        }
            
       else{
           
           return false;
       }
       
      
        
    });
        
    </script>
    <script src="resources/js/main.js" type="text/javascript"></script>
  
</body>
</html>