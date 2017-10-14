<?php
require_once'core/init.php';
$cat = new Categories;
$user = new User;
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
        
        
          
        
        #croppic{
	    width: 200px;  /* MANDATORY */
	    height: 300px; /* MANDATORY */
            position: relative;  /* MANDATORY */
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
        
        .ad-post-element .error{
            display: block;
            width: 100%;
            color: #ed7f69;
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
    
     .success{
    padding: 30px 10px;
    
}
}

        
@media only screen and (max-width: 480px){
    
    
    .content-wrapper{
            padding: 0px;
        }
    
    .success{
    padding: 10px 0px;
    
}
    
}
    </style>
    
</head>
<body>
   
   <!--  header starts  -->
   
   <?php include'includes/header.php'; ?>
       
      <!--  header endss  -->
        
        <div class="clear"></div>
        
        <div class="main-container">
            <div class="content-box">
                <div class="content-wrapper" id="ad-post-div">
                        <div class="book-info">
                        
                       
		            
                        <form action="data-handler-post.php" method="POST" enctype="multipart/form-data" id="post-form">
                           
                            <span class="form-header">Pin a free ad</span>

                          <div class="ad-post-element">
                            <div id="croppic"></div>
                            <div  class="action-primary" id="cropContainerHeaderButton" style="margin:10px 0px 10px 0px">Upload book photo</div>
                            <span class="error" id="picture-error"></span>
		                    <input type="text" name="book-image" id="myOutputId" style="visibility: hidden">
		                    
		                   </div>
		            


                            <div class="ad-post-element">
                               <label for="book-title">Title</label>
                               <input type="text" name="book-title" id="book-title">
                               <span>&#42; Choose an appropriate title.</span>
                               <span class="error" id="title-error"></span>
                            </div>

                            <div class="ad-post-element">
                               <label for="book-isbn">ISBN</label>
                               <input type="text" name="book-isbn" id="book-isbn">
                               <span>&#42; ISBN is optional and can be leave unfilled.</span>
                               
                            </div>

                            <div class="ad-post-element">
                               <label for="book-category">Category</label>
                               <select name="book-category" id="book-category">
                               <option value="" selected disabled>Select Category</option>
                               
                              <?php  
                              $count = 1;
                                   
                              foreach($cat->getCat() as $cats){                          
                              $name =  $cats->category_name;
                              echo "<option value=".$count.">".$name."</option>";
                              $count++;
                              }
                              ?>
                               
                                </select>
                                <span class="error" id="category-error"></span>  
                            </div>

                            <div class="ad-post-element" id="hide" style="display:none">
                               <label for="book-sub-category">Sub Category</label>
                               <select name="book-sub-category" id="book-sub-category">
                               <option value="" selected disabled>Select Sub Category</option>
                             
                               </select>
                               <span class="error" id="sub-category-error"></span>
                            </div>
                            
                            <div class="ad-post-element">
                               <label for="book-purpose">Purpose</label>
                               <select name="book-purpose" id="book-purpose">
                                  <option value="" selected disabled>Purpose of ad</option>
                                   <option value="resell">Resell</option>
                                   <option value="donate">Donate</option>
                               </select>
                               <span class="error" id="purpose-error"></span>
                            </div>

                            <div class="ad-post-element">
                               <label for="book-decription">Decription</label>
                               <textarea name="book-decription" id="book-decription"></textarea>
                               <span>&#42; Describe your book in few words</span>
                               <span class="error" id="decription-error"></span>
                            </div>

                            <div class="ad-post-element">
                               <label for="book-tags">Tags</label>
                               <textarea name="book-tags" id="book-tags"></textarea>
                               <span>&#42; Put some tags separated by comma ( , )</span>
                               <span class="error" id="tags-error"></span>
                            </div>

                            <div class="ad-post-element">
                               <label for="book-price" required>Price</label>
                               <input type="text" name="book-price" id="book-price" >
                               <span class="error" id="price-error"></span>
                            </div>
                           
                           <?php
                           if($user->isLoggedin()){
                               
                            echo'<div class="ad-post-element" style="position:relative">
                          <input type="checkbox" name="seller-info-check" id="seller-info-check" style="height:20px; width:30px; position:absolute; top: 15px;">
                          
                           <label for="seller-info-check" style="display:inline-block; padding-left: 40px;">Keep seller details same as your profile details.</label>
                         </div>';
                               
                          }
                                
                        ?>
                           
                        </div>
                    
                    <div class="seller-info" id="seller-info-box">
                      
                      <span class="seller-header">Seller Details</span>
                      
                      
                      
                       
                           <div class="ad-post-element">
                           <label for="seller-name">Name</label>
                           <input type="text" name="seller-name" id="seller-name">
                           <span>&#42; keep it real so that people can identify you</span>
                           <span class="error" id="name-error"></span>
                        </div>
                       
                           <div class="ad-post-element">
                           <label for="seller-contact">Contact</label>
                           <input type="text" name="seller-contact" id="seller-contact">
                           <span>&#42; keep it real so that people can contact you</span>
                           <span class="error" id="contact-error"></span>
                        </div>
                       
                           <div class="ad-post-element">
                           <label for="seller-city">City</label>
                           <input type="text" name="seller-city" id="seller-city">
                           <span class="error" id="city-error"></span>
                        </div>
                       
                           <div class="ad-post-element">
                           <label for="seller-address">Address</label>
                           <textarea name="seller-address" id="seller-address"></textarea>
                           <span class="error" id="address-error"></span>
                        </div>
                        
                    </div>    
                    
                    <input type="submit" class="action-primary" style="margin:10px 0px 10px 0px" name="submit" value="Pin free Ad" id="submit">
                </form>
        
                    
                </div>
                
                
                <div class="success" id="message-div">
                  <i class="fa fa-upload" aria-hidden="true"></i>
                  <div id="heading"><span>Loading..</span></div>
                  <div id="sub-heading"><span>Please wait while we are processing your request.</span></div>
                  <a id="btn-green">Wait..</a>
              </div>
                
   
              </div>
        </div>
        
        <!--  footer starts   -->

        <?php include'includes/footer.php'; ?>

        <!--  footer ends  -->
        
  <script src="vendors/js/jquery-3.0.0.min.js" type="text/javascript"></script>
  <script>
      
    $('#book-purpose').change(function(){
      
      var value = $(this).val();
      
      if(value == "donate"){
          $('#book-price').val('0');
          $('#book-price').parent().hide();
      }
          
       else if (value == "resell"){
           $('#book-price').parent().show();
        }
    
    });
      
      
   $('#book-category').change(function(){
      
      var value = $(this).val();
      
      if(value == ""){
          $('#hide').hide();
      }
      
      else{
          
          $('#hide').show();
          $.post('cat.php',{value : value}, function(data){
          
          $('#book-sub-category').html(data);
          
          });
      }
    
    });
          
          
    var seller_data = false;
    
    $('#seller-info-check').click(function(){
        
        if($(this).prop("checked") == true){
            $('#seller-info-box').hide();
            seller_data = true;
        }
        
        else if($(this).prop("checked") == false){
             $('#seller-info-box').show();
            seller_data = false;
        }
        
    });
          
         
          
          $("#cropContainerHeaderButton").click(function () {
       //1 second of animation time
       //html works for FFX but not Chrome
       //body works for Chrome but not FFX
       //This strange selector seems to work universally
       $("html, body").animate({scrollTop: 0}, 0);
    });
      
      
     $('#purpose-error').hide();
    $('#picture-error').hide();
    $('#title-error').hide();
    $('#category-error').hide();
    $('#sub-category-error').hide();
    $('#decription-error').hide();
    $('#tags-error').hide();
    $('#price-error').hide();
    $('#name-error').hide();
    $('#contact-error').hide();
    $('#city-error').hide();
    $('#address-error').hide();
    
    
    var pictureError = false;
    var titleError = false;
    var categoryError = false;
    var subCategoryError = false;
    var decriptionError = false;
    var tagsError = false;
    var purposeError = false;
    var priceError = false;
    var nameError = false;
    var contactError = false;
    var cityError = false;
    var addressError = false;
    
    
    
    $('#book-title').focusout(function(){
        check_title();
    });
    
    
    $('#book-decription').focusout(function(){
        check_decription();
    });
    
      $('#book-purpose').focusout(function(){
        check_purpose();
    });
      
      $('#book-category').focusout(function(){
        check_category();
    });
      
       $('#book-sub-category').focusout(function(){
        check_category();
    });
      
      
    $('#book-tags').focusout(function(){
        check_tags();
    });
    
    $('#book-price').focusout(function(){
        check_price();
    });
    
    
    $('#seller-name').focusout(function(){
        check_name();
    });
    
    $('#seller-contact').focusout(function(){
        check_contact();
    });
    
    $('#seller-city').focusout(function(){
        check_city();
    });
    
    $('#seller-address').focusout(function(){
        check_address();
    });
     
    
    function check_title(){
    
        var titleLength = $('#book-title').val().length;
        
        if(!titleLength){
            $('#title-error').html("*Title can't be empty.")
            $('#title-error').show();
            titleError = true;
        }
        else if(titleLength < 5 || titleLength > 100){
            $('#title-error').html("*Should be between 5-100 characters");
            $('#title-error').show();
            titleError = true;
        }
        
        else{
            $('#title-error').hide();
        }
        
    }
    
    
    function check_decription(){
    
        var decriptionLength = $('#book-decription').val().length;
        
        if(!decriptionLength){
            $('#decription-error').html("*Decription can't be empty.");
            $('#decription-error').show();
            decriptionError = true;
        }
        
        else{
            $('#decription-error').hide();
        }
        
    }
    
    function check_tags(){
    
        var tagsLength = $('#book-tags').val().length;
        
        if(!tagsLength){
            $('#tags-error').html("*Please put some tags");
            $('#tags-error').show();
            tagsError = true;
        }
        
        else{
            $('#tags-error').hide();
        }
        
    }
    
    
    
    
    function check_name(){
    
        var nameLength = $('#seller-name').val().length;
        
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
    
        var contactLength = $('#seller-contact').val().length;
        var phone = $('#seller-contact').val();
        
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
    
    function check_price(){
    
        var price = $('#book-price').val();
        var priceLength = $('#book-price').val().length;
        
        
        if(!priceLength){
            $('#price-error').html("*Price can't be empty");
            $('#price-error').show();
            
            priceError = true;
        }
         
        else if(!price.match(/^\d+$/)) {
            $('#price-error').html("*Price must contain digits");
            $('#price-error').show();
            priceError = true;
                
         }
        
        
        else if(priceLength > 5){
            $('#price-error').html("*Please put a reasonable price");
            $('#price-error').show();
            priceError = true;
        }   
        
        else{
            $('#price-error').hide();
        }
        
    }
    
    function check_city(){
    
        var cityLength = $('#seller-city').val().length;
        
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
    
        var addressLength = $('#seller-address').val().length;
        
        if(!addressLength){
            $('#address-error').html("*Address can't be empty");
            $('#address-error').show();
            addressError = true;
        }
        
        else{
            $('#address-error').hide();
        }
        
    }
    
    function check_category(){
    
        var category = $('#book-category').val();
        
        
        
        if(category == null){
            $('#category-error').html("*Please choose a category for the book");
            $('#category-error').show();
            categoryError = true;
        }
        
        else{
            $('#category-error').hide();
        }
        
    }
    
    
    function check_sub_category(){
    
        var subCat = $('#book-sub-category').val();
        
        if(subCat == null){
            $('#sub-category-error').html("*Please choose a sub category for the book");
            $('#sub-category-error').show();
            subCategoryError = true;
        }
        
        else{
            $('#sub-category-error').hide();
        }
        
    }
    
      
    function check_purpose(){
    
        var purpose = $('#book-purpose').val();
        
        if(purpose == null){
            $('#purpose-error').html("*Please choose purpose of the ad");
            $('#purpose-error').show();
            purposeError = true;
        }
        
        else{
            $('#purpose-error').hide();
        }
        
    }
    
    function check_picture(){
    
        var pictureLength = $('#myOutputId').val().length;
        
        if(!pictureLength){
            $('#picture-error').html("*Please put a picture for the ad <br> And if you already did then click on green crop button");
            $('#picture-error').show();
            pictureError = true;
        }
        
        else{
            $('#picture-error').hide();
        }
        
    }
    
    $('#post-form').on('submit',function(){
        
        
         titleError = false;
        decriptionError = false;
        tagsError = false;
        nameError = false;
        contactError = false;
        priceError = false;
        cityError = false;
        addressError = false;
        pictureError = false;
        purposeError = false;
        subCategoryError = false;
        categoryError = false;
    
        
     check_title();
        check_decription();
        check_tags();
        check_price();
        check_picture();
        check_purpose();
        check_sub_category();
        check_category();
        
        if( seller_data == false){
            check_name();
            check_city();
            check_address();
            check_contact();
        }
        
                        
        if( titleError == false && decriptionError == false && tagsError == false && nameError == false && contactError == false && priceError == false  && cityError == false && addressError == false && pictureError == false && purposeError == false && categoryError == false && subCategoryError == false ){
           
            var that = $(this),
            contents = that.serialize();
            
//            alert(contents);
            
            $("html, body").animate({scrollTop: 0}, 0);
            
            $.ajax({
               url: 'data-handler-post.php',
                dataType: 'json',
                type: 'post',
                data: contents,
                
                beforeSend: function(){
                  $('#message-div').css("display","block");
                    $('#ad-post-div').css("display","none");  
                },
                success:function(data){
                    
                  
                    if(data.result == true){
                        $('#message-div i').attr('class', 'fa fa-smile-o');
                        $('#heading span').html("Success!");
                        $('#sub-heading span').html("Ad posted! You can carry on now.");
                        $('#message-div a').attr('href','index.php');
                        $('#message-div a').html("Continue");
                    }
                    
                     if(data.result == false){
                        $('#message-div i').attr('class', 'fa fa-frown-o');
                         $('#message-div i').css('color', '#d92d2d');
                        $('#heading span').html("Oh sh#t!");
                        $('#sub-heading span').html("Something went wrong! Give it another go.");
                        $('#message-div a').attr('href','ad-post.php');
                         $('#message-div a').attr('id','btn-danger');
                        $('#message-div a').html("Ok!");
                    }
                      
                    
                }
                
                
            });
            
           return false;
            
        }
            
       else{
           
           return false;
       }
       
      
        
    });
    
  </script>
  
  <script src="resources/js/main.js" type="text/javascript"></script>
  
   <script src="vendors/js/croppic.min.js"></script>
    
        <script>
        var croppicHeaderOptions = {
				
				uploadUrl:'img_save_to_file.php',
				cropUrl:'img_crop_to_file.php',
				outputUrlId:'myOutputId',
				imgEyecandy:false,
                 doubleZoomControls:false,
                customUploadButtonId:'cropContainerHeaderButton',
                processInline:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);
        </script>
</body>
</html>