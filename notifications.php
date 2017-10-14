<?php
require_once'core/init.php';

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
            text-align: center;
        }
        
        #profile-bar-heading i{
            padding-right: 10px;
            color: #09d37f;
        }
        
        .
        @media only screen and (max-width: 900px){
    
            .content-box{
                width: 100%;
                margin: 0px;
            }
            
            .content-wrapper{
            padding: 30px;
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
            
            .content-box{
                width: 100%;
                margin: 0px;
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
        
        
        
        <div class="main-container">
            <div class="content-box">
         <h1 id="profile-bar-heading"><i class="fa fa-bell-slash" aria-hidden="true"></i>No Notifications</h1>
        </div>
        
        <!--  footer starts   -->

        <?php include'includes/footer.php'; ?>

        <!--  footer ends  -->
        
  <script src="vendors/js/jquery-3.0.0.min.js" type="text/javascript"></script>
    
    <script src="resources/js/main.js" type="text/javascript"></script>
  
</body>
</html>