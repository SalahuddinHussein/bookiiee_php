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
    <link rel="stylesheet" href="vendors/icons/simple-line-icons-master/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/icons/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/icons/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="resources/css/main.css">
    <link rel="stylesheet" href="resources/css/responsive.css">
    
    
    <!--[if lt IE 9]>
    <script src="vendors/js/html5shiv.js"></script>
    <![endif]-->
    <style>
  
      


        body{

            background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.65),rgba(0, 0, 0, 0.65)),
                url(resources/images/background-images/login-background.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            top: 0;
            left: 0;
            width: 100%;
            font-family: 'Roboto' , sans-serif;;
            text-rendering: optimizeLegibility;
        }
        

        #text-container{
            display: block;
            width: 100%;
            padding: 80px 20px 40px 20px;
            margin-top: 68px;
            color: #fff;
            text-align: center;
            
        }
        
        #text-container-wrapper{
            display: block;
            width: 100%;
        }

        .typing-text{
            display: block;
            text-align: center;
            width: 100%;
        }
        
        .texting-list .text,
        .texting-list .texting-style,
        .texting-list .typed-cursor{
            display: inline-block;
            font-size: 60px;
            font-weight: 600;
            padding: 10px 10px;
            letter-spacing: 1px;
        }
        
        .texting-list .typed-cursor{
            padding: 0px;
        }

        .simple-text{
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #fff;
            font-weight: 300;
        }



        .login-wrap{
            display: block;
            width: 100%;
            padding: 0px 5px;
            margin-bottom: 10px;

        }

        .login-container{
            display: block;
            width: 320px;
            border-radius: 6px;
            background: rgba(255, 255, 255 ,.7);
            padding: 20px 40px;
            margin: 0px auto;
        }
        
        .login-container-wrapper .text{
            display: block;
            text-align: center;
            color: #000;
            font-size: 16px;
            line-height: 18px;
            padding: 5px 5px;
            font-weight: 400;
        }
        
        button{
            display: block;
            width: 100%;
            height: 30px;
            margin: 20px 0px;
            border-radius: 4px;
            color: #fff;
            line-height: 30px;
            font-size: 14px;
            font-weight: 300;
            cursor: pointer;
            text-align: left;
        }

        .fb{
            background: #3b5998;
            border: none;
            -webkit-transition: .5s;
            transition: .5s;
        }

        .fb:hover,
        .fb:active{
            background: #204288;
        }

        .g-plus{
            background: #dd4b39;
            border: none;
            -webkit-transition: .5s;
            transition: .5s;
        }

        .g-plus:hover,
        .g-plus:active{
            background: #eb361f;
        }



        .fb i,
        .g-plus i{
            display: inline-block;
            float: left;
            font-size: 16px;
            padding: 0px 35px 0px 20px;
        }

        .typed-cursor{
            opacity: 1;
            -webkit-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }




        @media only screen and (max-width: 767px){

            .texting-list .text,
                .texting-list .texting-style,
                .texting-list .typed-cursor{
                    font-size: 40px;
                    padding: 10px 5px;
                }
            
            #text-container{
            padding: 30px 20px 40px 20px;}
            }
        
        
        @media only screen and (max-width: 340px){
            
            .login-container {
                width: 100%;
            }
            
            .texting-list .text,
        .texting-list .texting-style,
        .texting-list .typed-cursor{
            font-size: 30px;
            padding: 10px 2px;
        }
            
            #text-container{
            padding: 30px 20px 30px 20px;
                margin-top: 30px;
            
        }
            
            .login-container{
            padding: 15px 40px;
        }
            
            button{
            margin: 15px 0px;
        }
            
            
        }


  </style>
    
</head>
<body>


    <header>
        <div id="header-wrapper">
            <div id="header-logo"><a href="index.php"><img src="resources/images/bookiee-logo.png" alt="bookiiee"  width="152" height="38"></a>
               </div>
        </div>
    </header>

        <div id="text-container">
            <div id="text-container-wrapper">

                <div class="typing-text">
                   <div class="texting-list">
                     <span class="texting-style"></span>
                     <span class="text">books</span>
                   </div>
               </div>

               <div class="simple-text">
                   <span>
                   " One man's trash is another man's treasure" . So resell, donate and share the books you no longer want.
                   </span>

               </div>
            </div>
        </div>
   
   
   

    <div class="login-wrap">
         <div class="login-container">
            <div class="login-container-wrapper">
             
             <span class="text">One click Social Login</span>


              <?php if(!isset($_SESSION['facebook'])){ ?>
             <a href="<?php echo $loginUrl; ?>"><button class="fb"><i class="ion-social-facebook"></i>Sign in with Facebook</button><a>
              <?php } ?>
              
             <button class="g-plus"><i class="ion-social-google"></i>Sign in with Google+</button>
             
             <div class="clear"></div>
             </div>
         </div>
        </div>



 <script src="vendors/js/jquery-3.0.0.min.js"></script>
    <script src="vendors/js/typed.js"></script>
    <script>
  $(function(){
      $(".texting-style").typed({
        strings: ["sell", "buy", "donate"],
        typeSpeed: 250
      });
      
      setInterval(function(){
      $(".texting-style").typed({
        strings: ["sell", "buy", "donate"],
        typeSpeed: 250
      })},11000);
  });
</script>
        <script src="resources/js/main.js."></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.max.js"></script>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.max.js"></script>
        <script src="https://cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.max.js"></script>
</body>
</html>