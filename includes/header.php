<header>
      <div id="header-wrapper">
      
           
              <div id="hamburger-icon">
               <i class="fa fa-bars" aria-hidden="true"></i>
               </div>
               
       
           <div id="header-logo"><a href="index.php"><img src="resources/images/bookiee-logo.png" alt="bookiiee"  width="152" height="38"></a>
           </div>
           <div id="header-search">
                   
                   <form action="" method="GET">
                    <div id="search-bar">
                        
                        <input type="search" spellcheck="false" name="search_query" id="query-box" autocomplete="off">
                        
                        <button type="submit" style="border:none"><i class="fa fa-search fa-2x" aria-hidden="true" id="btn-query-box"></i></button>
                    </div>
                    </form>
           </div>
           <div id="header-page-action">
             <ul id="action-elements">
                 <li class="element-display"><a href="ad-post.php" class="element-display-a"><i class="icon-pin header-icon"></i></a></li>
                 
                 
                 
                 <?php 
                 $user = new User;
                 if($user->isLoggedin()){
                 ?>
                 
                 
                 <li class="element"><a href="notifications.php" class="element-display-a"><i class="icon-bell header-icon"><i class="fa fa-circle over" aria-hidden="true"></i></i></a>
                 
                 </li>
                 
                 <li class="element" id="user-nav">
                            <div class="user-setting">
                                <img src="<?php echo $user->data()->user_image; ?>">
                                <i class="icon-arrow-down"></i>
                     </div>

                            <ul id="dropdown-menu">
                                <li>
                                    <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                                </li>
                               <!-- <li>
                                    <a href=""><i class="fa fa-shield" aria-hidden="true"></i>Privacy</a>
                                </li>
                                <li>
                                    <a href="login.php"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                                </li> -->
                                <li>
                                    <a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
                                </li>
                            </ul>

                </li>
                
                
                <?php }
                
                else{
                
                echo'<li class="element"><a href="login.php" class="element-display-a"><i class="icon-login header-icon"></i></a></li>';
                
//                fb-callback.php
                }
                
                 ?>
                
             </ul>
              
               
           </div>
       </div>
       
   </header>   
    
    
    <div class="mobile-menu no-display" >
                
              <div id="header-search-mobile">
                    
                    <form action="" method="GET">
                    <div id="search-bar-mobile">
                        
                        <input type="search" spellcheck="false" name="search_query" id="query-box-mob" spellcheck="false" autocomplete="off">
                        
                        <button type="submit" style="border:none"><i class="fa fa-search fa-2x" aria-hidden="true" id="btn-query-box-mob"></i></button>
                    </div>
                    </form>
                 </div>
                 
                 
                 
                  
                 <ul id="mobile-menu-ul">
                    
                    <ul id="mobile-menu-ul">
                     <li class="mobile-menu-li"><span>Browse<i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                     <ul class="mobile-sub-menu">
                         <li class="mobile-sub-menu-li"><a href="index.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Top Books</a></li>
                         <li class="mobile-sub-menu-li"><a href="categories.php"><i class="fa fa-list-alt" aria-hidden="true"></i>Categories</a></li>
                     </ul>
                     </li>
                  
                  <?php 
                 $user = new User;
                 if($user->isLoggedin()){ ?>
                   
                   
                   <li class="mobile-menu-li"><span>Bookshelf<i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                     <ul class="mobile-sub-menu">
                         <li class="mobile-sub-menu-li"><a href="index.php?bookshelf=my_bookmarks"><i class="fa fa-heart" aria-hidden="true"></i>Bookmarks</a></li>
                         <li class="mobile-sub-menu-li"><a href="index.php?bookshelf=my_books"><i class="fa fa-briefcase" aria-hidden="true"></i>My Books</a></li>
                         
                     </ul>
                     </li>
                    
                    
                     <li class="mobile-menu-li"><span class="mobile-menu-span"><?php echo $user->data()->user_name ; ?><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                     
                        <ul class="mobile-sub-menu no-display">
                         <li class="mobile-sub-menu-li"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                         <!-- <li class="mobile-sub-menu-li"><a href="#"><i class="fa fa-shield" aria-hidden="true"></i>Privacy</a></li>
                         <li class="mobile-sub-menu-li"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a></li> -->
                         <li class="mobile-sub-menu-li"><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
                     </ul>
                     </li>
                     
                 <?php }
                     
                    else{
                        ?>
                        
                        <li class="mobile-menu-li"><a href="fb-callback.php"><span class="mobile-menu-span">Login<i class="fa fa-chevron-right" aria-hidden="true"></i></span></a></li>
                    <?php }
                     
                     ?>  
                 </ul>
                 
                 
                 
                 
            
        </div>
        
       <div id="header-options">
        <nav id="header-option-nav">
            <ul id="header-option-nav-ul">
                <li class="header-option-nav-li web-display">Browse<i class="icon-arrow-down"></i>
                <ul class="nav-li-options">
                    <li class="nav-li-option"><a href="index.php"><i class="fa fa-line-chart" aria-hidden="true"></i>Top Books</a></li>
                    <li class="nav-li-option"><a href="categories.php"><i class="fa fa-list-ol" aria-hidden="true"></i>Categories</a></li>
                </ul>
                </li>
                
                <?php
                if($user->isLoggedin()){
                 ?>
                <li class="header-option-nav-li web-display">Bookshelf<i class="icon-arrow-down"></i>
                <ul class="nav-li-options">
                    <li class="nav-li-option"><a href="index.php?bookshelf=my_bookmarks"><i class="fa fa-heart" aria-hidden="true"></i>Bookmarks</a></li>
                    <li class="nav-li-option"><a href="index.php?bookshelf=my_books"><i class="fa fa-briefcase" aria-hidden="true"></i>My Book</a></li>
                </ul>
                </li>
                
                <?php
                   }
                ?>
                
                <?php

            if(isset($page)){
                
                function getUrl($prop, $value){
                
                if(empty($_SERVER['QUERY_STRING'])){
 
                    return $url = 'index.php?'.$prop.'='.$value;
                    
                }
                
                else{
                    
                    $url = 'index.php?';
                    
                    $category = isset($_GET['category']) ? $_GET['category'] : NULL;
                    
                    $purpose = isset($_GET['purpose']) ? $_GET['purpose'] : NULL;
                    
                    $price = isset($_GET['price']) ? $_GET['price'] : NULL;
                    
                    $bookshelf = isset($_GET['bookshelf']) ? $_GET['bookshelf'] : NULL;
                    
                    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : NULL;
                    
                    switch($prop){
                            
                            case'purpose':
                            $purpose = $value;
                            break;
                            
                            case'price':
                            $price = $value;
                            break;
                    }
                    
                    if($search_query != NULL){
                        
                        $par[] = 'search_query='.$search_query;
                    }
                    
                    
                    else if($category != NULL){
                        
                        $par[] = 'category='.$category;
                    }
                    
                    else if($bookshelf != NULL){
                        
                        $par[] = 'bookshelf='.$bookshelf;
                    }
                    
                    if($purpose != NULL){
                        
                        $par[] = 'purpose='.$purpose;
                    }
                    
                    if($price != NULL){
                        
                        $par[] = 'price='.$price;
                    }
                    
                    $url .= implode('&',$par);
                    return $url;
                    
                    
                }
                    
                    }
                
                ?>
               
                <li class="header-option-nav-li">Sort Books<i class="icon-arrow-down"></i>
                <ul class="nav-li-options">
                    
                    
                    
                    <li class="nav-li-option">
                    <a href="<?php echo getUrl('price','h2l'); ?>" onclick=""> 
                    <i class="fa fa-sort-amount-desc" aria-hidden="true">    
                    </i>
                    Price: High - Low
                    </a>
                    </li>
                    
                    
                    
                   <li class="nav-li-option">
                    <a href="<?php echo getUrl('price','l2h'); ?>">
                    <i class="fa fa-sort-amount-asc" aria-hidden="true">
                    </i>
                    Price: Low - High
                    </a>
                    </li>
                    
                    
                    
                    <li class="nav-li-option">
                    <a href="<?php echo getUrl('purpose','donate'); ?>">
                    <i class="fa fa-gift" aria-hidden="true">
                    </i>
                    Purpose: Donate
                    </a>
                    </li>
                    
                    
                    
                    <li class="nav-li-option">
                    <a href="<?php echo getUrl('purpose','resell'); ?>">
                    <i class="fa fa-shopping-bag" aria-hidden="true">
                    </i>
                    Purpose: Resell
                    </a>
                    </li>
                    
                    
                </ul>
                </li>
                        
              <?php } ?>
                
                
            </ul>
            
          </nav>
            
        
    </div>