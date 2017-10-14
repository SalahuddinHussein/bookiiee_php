<?php
require_once'core/init.php';
$cat = new Categories;
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
        
        .main-body{
            width: 100%;
            padding: 5px;
            font-family: 'Roboto' , sans-serif;;
            text-rendering: optimizeLegibility;
        }
        
        
.main-container-category{
            display: block;
            width: 100%;
            padding: 15px 120px;
            margin: 0px;
        }
.main-contaner-wrapper{
    display: block;
    width: 100%;
}

.page-heading{
    line-height: 1;
    text-align: center;
    border-bottom: 1px solid #ddd;
    padding-bottom: 15px;
    margin: 10px;
    font-weight: 500;
    width: 100%;
    margin: 15px 0px 20px 0px;
    color: #444;
}

.category-list-container{
    width: 100%;
    display: block;
    
}

.list-container{
    width: 100%;
    display: block;
    padding: 20px;
    background: #f0f0f0;
    border-radius: 4px;
    margin-bottom: 20px;
    min-height: 180px;
    overflow: hidden;
    border:2px solid #C2C2C2;
}

.info-box{
    display: block;
    position: absolute;
    width: 240px;
    overflow: hidden;
}

        
.category-icon{
    color: #ef9b54;
    font-size: 50px;
    display: block;
}

.category-name{
    display: block;
    margin-top: 10px;
    font-size: 22px;
    color: #ef9b54;
    font-weight: 400;
}

.category-detail{
    display: block;
    margin-top: 5px;
    font-size: 15px;
    font-weight: 600;
    color: #b0b0b0;
}

.sub-list-box{
    width: 100%;
    display: block;
    float: left;
    padding-left: 240px;
}

.list-content{
    display: inline-block;
    float: left;
    height: 30px;
    margin: 5px;
    padding: 0px;
    
}    

.list-content a{
    font-family: 'Roboto Slab';
    display: block;
    height: 100%;
    color: #fff;
    line-height: 30px;
    font-size: 14px;
    padding: 0px 5px;
    font-weight: 400;
    background: #9c9c9c;
    border-radius: 4px;
    overflow: hidden;
    white-space: nowrap;
    word-break:keep-all;
    
}
        
        .list-content a:hover{
            background : #5C5C5C;
        }     
       
     
        @media only screen and (max-width: 1200px){
           
            .main-container-category{
            display: block;
            width: 100%;
            padding: 15px 80px;
            margin: 0px;
        }
            
        }
        
        @media only screen and (max-width: 1024px){
           
            .main-container-category{
            display: block;
            width: 100%;
            padding: 15px 20px;
            margin: 0px;
        }
            
        }
        
        @media only screen and (max-width: 767px){
           
    .main-container-category{
            display: block;
            width: 100%;
            padding: 15px 0px;
            margin: 0px;
            padding-bottom: 0px;
        }
            
.info-box{
    display: block;
    position: static;
    width: 100%;
    margin-bottom: 10px;
}
            
.sub-list-box{
    width: 100%;
    display: block;
    float: left;
    padding-left: 0px;
}
            
.page-heading{
    text-align: center;
    font-weight: 500;
    font-size: 22px;
}
            
.list-container{
    width: 100%;
    display: block;
    padding: 20px;
    background: #f0f0f0;
    border-radius: 4px;
    margin-bottom: 10px;
    min-height: 160px;
    overflow: hidden;

        }
        


        
        
        
    </style>
</head>
<body ontouchstart="">
       
   <!--  header starts  -->
   
   <?php include'includes/header.php'; ?>
       
      <!--  header endss  -->
        
        <div class="clear"></div>
    
    <div class="main-body">
       <div class="main-container-category">
          <div class="main-contaner-wrapper">
             <h1 class="page-heading"> Explore Over 25,000 Books in  Categories</h1>       
             
             
             
             <ul class="category-list-container">
                
                           <?php  
                              
                              foreach($cat->getCat() as $cats){
                                $name = $cats->category_name;
                                  $id = $cats->category_id;
                                  $icon = $cats->category_icon;
                                  
                                ?>
                              
                              <li class="list-container">
                                     <div class="info-box">
                                        <i class="<?php echo $icon;?> category-icon"></i>
                                        <span class="category-name"><?php echo $name; ?></span>
                                        <span class="category-detail">250 Books</span>

                                     </div>
                                     <ul class="sub-list-box"> 
                                     
                                     
                            <?php         
                                  
                              foreach($cat->getSubCat($id) as $subCats){                          
                              $subName =  $subCats->sub_category_name;
                             
                                  echo'<li class="list-content"><a href="'."index.php?category=".strtolower($subName).'">'.$subName.'</a></li>';
                                   
                              }
                                  echo'</ul> </li>';
                              }
                              
                              ?>
                 
             </ul>
             
           </div>
           
       </div>
    
    </div>
            


        <!--   main-body ends  -->

        <!--  footer starts   -->

        <?php include'includes/footer.php'; ?>

        <!--  footer ends  -->
        
  <script src="vendors/js/jquery-3.0.0.min.js" type="text/javascript"></script>
  <script src="resources/js/main.js" type="text/javascript"></script>
  
</body>
</html>