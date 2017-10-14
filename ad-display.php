<?php
require_once'core/init.php';
$book = new Book();
$user = new User();
$db = new DB();

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
    
    
    <!--[if lt IE 9]>
    <script src="vendors/js/html5shiv.js"></script>
    <![endif]-->
    
    <style>
        
        #ad-display-bar-heading{
            display: block;
            text-align: center;
            display: none;
        }
        
        #ad-display-bar-heading i{
            padding-right: 5px;
            color: #09d37f;
        }
        .book-container {
            display: block;
            position: absolute;
            float: left;
            padding: 40px;
            padding-right: 0px;
        }

        .book-box {
            display: block;
            width: 200px;
            height: 300px;
            border-radius: 4px;
            overflow: hidden;
        }

        .book-box img{
            width: 100%;
            height: 100%;
            display: block;
        }

        .detail-container{
            display: block; 
            float: left;
            width: 100%;
            padding: 40px;
            padding-left: 280px; 
         }

        .book-details, .seller-details{
            display: block;
            width: 100%;
            float: left;
        }

        .book-details li,
        .seller-details li{
            display: block;
            width: 100%;
            float: left;
            padding-bottom: 5px;
            font-size: 18px;
        }

        .book-details .book-title{
            font-size: 32px;
            letter-spacing: -1px;
            color: #3c4658;
            padding-bottom: 20px;
        }

        .book-details .book-decription{
            font-size: 16px;
            color: #909cb1;
            padding-bottom: 10px;
            font-weight: 400;

        }

        .book-details .detail-element .value, .seller-details .detail-element .value{
            display: inline-block;
            color: #697281;
            padding-left: 120px;
            font-weight: 400;
        }


        .book-details .detail-element .attr, .seller-details .detail-element .attr{
            color: #5dc560;
            display: inline-block;
            position:absolute;
            font-weight: 400;
        }

        .detail-container .role{
            display: block;
            font-size: 16px;
            padding-bottom: 10px;
            padding-top: 5px;
            color: #758294;
            font-weight: 400;
            text-decoration: underline;
        }

        .detail-container .action-secondary{
            margin-right: 10px;
            margin-top: 30px;
        } 

        .detail-container .action-primary{
            margin-top: 30px;
        }
    
        @media only screen and (max-width: 900px){
    
    .content-box{
        width: 100%;
        margin: 0px;
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
    
    .detail-container{
        display: block;
        clear: both;
        float: left;
        width: 100%;
        padding: 40px;
     }
    
}

@media only screen and (max-width: 720px){
    
    .book-box {
        
        margin-left: 20px;
    }
    
    .detail-container{
            padding: 20px;
         }

    }

@media only screen and (max-width: 480px){
    
    .book-box {
        
        margin-left: 0px;
    }
    
    .detail-container{
            padding: 0px;
        padding-top: 20px;
         }
    
}
    </style>
    
</head>
<body>
   
   
   <!--  header starts  -->
   
   <?php include'includes/header.php'; ?>
       
      <!--  header endss  -->
        
        <div class="clear"></div>
        
        <h1 id="ad-display-bar-heading"></h1>
        
        <div class="main-container">
            <div class="content-box">
                <div class="content-wrapper">
        
                    <?php
                    
                       if(isset($_GET['book_id']) && $book->get($_GET['book_id'])->book_data()){
                           
                                $book_detail = $book->get($_GET['book_id'])->book_data();
                           
                                $book_id =  $book_detail->book_id;
                                $user_id =  $book_detail->user_id;
                                $book_title =  $book_detail->book_title;
                                $book_price =  $book_detail->book_price;
                                $book_image =  $book_detail->book_image;
                                $book_isbn =  $book_detail->book_isbn;
                                $book_decription =  $book_detail->book_decription;
                                $seller_name =  $book_detail->seller_name;
                                $seller_city =  $book_detail->seller_city;
                               $seller_address =  $book_detail->seller_address;
                               $seller_contact =  $book_detail->seller_contact;
                           
                            ?>
                   
                    <div class="book-container">
                       <div class="book-box">
                        <img src="<?php echo $book_image; ?>" alt="" width="200px" height="300px">
                        </div>
                    </div>
                 
                     
                    
                    
                          
                    <div class="detail-container">
                     
                      <ul class="book-details">
                       <li class="book-title"><?php echo $book_title; ?></li>
                       
                       
                       <li class="detail-element"><span class="attr">Decription</span><span class="value"><?php echo $book_decription; ?></span></li>
                        <!--<li class="detail-element"><span class="attr">ISBN</span><span class="value"><?php echo $book_isbn; ?></span></li>-->
                        <li class="detail-element"><span class="attr">Price</span><span class="value">Rs <?php echo $book_price; ?></span></li>
                        </ul>
                        
                        <span class="role">Seller Details</span>
                        
                        <ul class="seller-details">
                            <li class="detail-element"><span class="attr">Name</span><span class="value"><?php echo $seller_name; ?></span></li>
                            <li class="detail-element"><span class="attr">Contact</span><span class="value"><?php echo $seller_contact; ?></span></li>
                            <li class="detail-element"><span class="attr">Address</span><span class="value"><?php echo $seller_address; ?></span></li>
                        </ul>
                        
                        <?php
                           
                           if($user->isLoggedin() && $db->select_all("SELECT bookmark_id FROM bookmarks WHERE user_id = ".$user->data()->user_id." AND book_id = $book_id")->row_count()){ ?>
                               
                               <button class="action-secondary" id="unbookmarkme">Un-Bookmark</button>
                        
                                <?php } 
                                
                                else{ ?>
                                
                                <button class="action-secondary" id="bookmarkme">Bookmark</button>
                                
                                <?php } ?>
                        
                        <?php
                           if( !$user->isLoggedin() || $user_id != $user->data()->user_id ) { ?>
                               
                               <button class="action-primary">Contact seller</button>
                          <?php }
                           
                           else{ ?>
                               
                               <button class="action-primary" id="unpinme">Unpin Ad</button>
                           <?php }
                           ?>
                        
                    </div>
                    
                    <?php
                       }
                    ?>
                </div>
            </div>
        </div>
        
        <!--  footer starts   -->

        <?php include'includes/footer.php'; ?>

        <!--  footer ends  -->

  <script src="vendors/js/jquery-3.0.0.min.js" type="text/javascript"></script>
  <script src="resources/js/main.js" type="text/javascript"></script>
       <script>
           
        function bookmark($book_id = null, $user_id = null){
        
        $.ajax({
               url: 'bookmark_handler.php',
                dataType: 'json',
                type: 'post',
                data: {"user_id" : $user_id , "book_id" : $book_id ,"function" : "bookmark"},
                success:function(data){
                    
                  
                    if(data.error == true){
                        $('#ad-display-bar-heading').html('<i class="fa fa-id-badge aria-hidden="true"></i> Please Login to bookmark!');
                        $('#ad-display-bar-heading').css('display', 'block');
                    }
                    
                     if(data.error == false){
                         $('#ad-display-bar-heading').html('<i class="fa fa-heart" aria-hidden="true"></i> Bookmarked!');
                         $('#ad-display-bar-heading').css('display', 'block');
                    }
                      
                 }
                
                
            });
        }
           
         
        $('#bookmarkme').click(function(){
          bookmark('<?php echo $book_id; ?>','<?php  echo Session::get('user'); ?>');
      });
           
           function unbookmark($book_id = null, $user_id = null){
        
        $.ajax({
               url: 'bookmark_handler.php',
                dataType: 'json',
                type: 'post',
                data: {"user_id" : $user_id , "book_id" : $book_id ,"function" : "unbookmark"},
                success:function(data){
                    
                  
                    if(data.error == true){
                        $('#ad-display-bar-heading').html('<i class="fa fa-id-badge aria-hidden="true"></i>Something went wrong!');
                        $('#ad-display-bar-heading').css('display', 'block');
                    }
                    
                     if(data.error == false){
                         $('#ad-display-bar-heading').html('<i class="fa fa-heart" aria-hidden="true"></i> Bookmark Removed!');
                         $('#ad-display-bar-heading').css('display', 'block');
                    }
                      
                 }
                
                
            });
        }
           
      $('#unbookmarkme').click(function(){
          unbookmark('<?php echo $book_id; ?>','<?php  echo Session::get('user'); ?>');
      });
           
           
           function unpin($book_id = null, $user_id = null){
        
       
        $.ajax({
               url: 'bookmark_handler.php',
                dataType: 'json',
                type: 'post',
                data: {"user_id" : $user_id , "book_id" : $book_id , "function" : "unpin"},
                success:function(data){
                    
                  
                    if(data.error == true){
                        $('#ad-display-bar-heading').html('<i class="fa fa-window-closee" aria-hidden="true"></i> Something went wrong!');
                        $('#ad-display-bar-heading').css('display', 'block');
                    }
                    
                     if(data.error == false){
                     $('#ad-display-bar-heading').html('<i class="fa fa-trash" aria-hidden="true"></i> Successfully Deleted!');
                         $('#ad-display-bar-heading').css('display', 'block');
                         
                    }
                      
                 }
                
                
            });
        }
           
      $('#unpinme').click(function(){
          
          unpin('<?php echo $book_id; ?>','<?php  echo Session::get('user'); ?>');
          
      });
           
    
           
    </script>
        
</body>
</html>