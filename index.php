<?php
require_once'core/init.php';
$user = new User();
$db = new DB;
$page = Hash::unique();


$book_price = isset($_GET['price']) ? sanitize($_GET['price']) : NULL;
$search_query = isset($_GET['search_query']) ? sanitize($_GET['search_query']) : NULL;
$bookshelf = isset($_GET['bookshelf']) ? sanitize($_GET['bookshelf']) : NULL;
$book_category = isset($_GET['category']) ? sanitize($_GET['category']) : NULL;
$book_purpose = isset($_GET['purpose']) ? sanitize($_GET['purpose']) : NULL;

$query = '';
$query_data = array();
if($user->isLoggedin() && !empty($bookshelf)){
    if($bookshelf == 'my_books'){
    $query = "SELECT * FROM books WHERE user_id = :user_id";
    $query_data[':user_id'] = $user->data()->user_id;
    }
    
    else if($bookshelf == 'my_bookmarks'){
    $query = "SELECT books.* FROM bookmarks INNER JOIN books ON books.book_id = bookmarks.book_id WHERE bookmarks.user_id = :user_id";
    $query_data[':user_id']  = $user->data()->user_id;
     }
}

if(!empty($book_category)){
    $query = "SELECT * FROM books WHERE book_sub_category = :category";
    $query_data[':category']  = strtolower($book_category);
    
}

if(!empty($search_query)){
    
    $search_query_metaphone = metaphone($search_query);
    
    $query = "SELECT * FROM books WHERE book_title_metaphone LIKE '%:search_meta1%' OR book_tags_metaphone LIKE '%:search_meta1%'";
    
    $query_data[':search_meta1']  = $search_query_metaphone;
     $book_rows_temp = $db->select($query,[':search_meta1' => $search_query_metaphone])->row_count();
    
    if($book_rows_temp == 0 && str_word_count($search_query) > 1){
        
        $search_exploded = explode ( " ", $search_query );
        
        $x = 1;
        
        foreach( $search_exploded as $search_bit )
        {
            $search_bit_metaphone = metaphone($search_bit);
            
            $query_data[':search_meta'.$x]  = $search_bit_metaphone;
         
         if( $x == 1 )
         {
             $query = " book_tags_metaphone LIKE '%:search_meta$x%' OR book_title_metaphone LIKE '%:search_meta$x%'";
         }

         else
         {
             $query .= " OR book_tags_metaphone LIKE '%:search_meta$x%' OR book_title_metaphone LIKE '%:search_meta$x%'";
         }
            
        $x++;
         
        }

        $query = "SELECT * FROM books WHERE ".$query;
        }
}


if(empty($query)){ 
    
    $query = "SELECT book_id FROM books WHERE book_id <> 0";

}


if(!empty($book_purpose)){
    
     $query .= " AND book_purpose = :purpose";
     $query_data[':purpose']  = strtolower($book_purpose);
}


if(!empty($query)){
    
    $query .= ";"; 
}


$query_link = $db->getInstance()->link()->prepare($query);
$book_result =  $query_link->execute($query_data);
if($book_result){
    
    $book_rows = $query_link->rowCount();
    
}

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
    
    #error-message{
    display: none;    
    }
    
    </style>

</head>

<body ontouchstart="">
   
   <?php include'includes/header.php'; ?>
        
        <div class="clear"></div>
    <div id="main-body">
    
           
        <h1 id="book-bar-heading"><span></span></h1>
           
            <div id="books-wrapper">
              
              <ul id="books-bar">
                
<!--  books-ul-starts   -->

                 <li class="clear"></li>

<!--   books-ul-ends   -->
                
                <div class="success" id="error-message">    
                  <i class="" aria-hidden="true"></i>
                  <div id="heading"><span></span></div>
                  <div id="sub-heading"><span></span></div>
                  <a id="" href=""></a>
              </div>

                </ul>

                <div class="clear"></div>
            </div>
         </div>

        <div class="show-more">
            <div id="show_btn">Show me more<i class="ion-arrow-right-c"></i> </div>
            <div class="clear"></div>
        </div>


<!--   main-body ends   -->

<!--  footer starts  -->

       <?php include'includes/footer.php'; ?>
       
<!--  footer ends  -->
        
  <script src="vendors/js/jquery-3.0.0.min.js" type="text/javascript"></script>
  
  <script src="resources/js/main.js" ></script>
  
   <script>
    $(document).ready(function(){
        
        $total_rows = "<?php echo $book_rows; ?>";
        $rows_per_page = 22;
        $total_page = Math.ceil( $total_rows / $rows_per_page);
        $current_page = 1;
        $start_row = ($current_page * $rows_per_page) - $rows_per_page;
        
        function load_data($rows_per_page, $start_row){
            console.log($start_row);
            $.ajax({
                url:"index_handler.php",
                type:"get",
                data: { "rows_per_page" : $rows_per_page,
                       "start_row" : $start_row,
                       "category" : "<?php echo $book_category; ?>" ,
                       "price" : "<?php echo $book_price; ?>" ,
                       "purpose" : "<?php echo $book_purpose; ?>" , 
                       "search_query" : "<?php echo $search_query; ?>" ,
                       "bookshelf" : "<?php echo $bookshelf; ?>" } ,
                dataType:"json",
                beforeSend: function(){
                    $('#show_btn').html("Loading..");
                    $('#show_btn i').css('display','none');
                },
                complete:function(){
                    $('#show_btn').html("Show me more");
                    $('#show_btn i').css('display','block');
                    if($current_page > $total_page){
                        $('#show_btn').css('display','none');
                    }
                    },
                success:function(response){
                        
                   if(response.error == false && response.data != null){
                       
                       if(response.category != ''){
                           $('#book-bar-heading span').html(response.heading);
                       }
                       
                       $.each(response.data, function(i, item){
                         
                            $('#books-bar').append("<li class='book'> <div class='book-img-box'><img src='"+response.data[i].book_image+"' width='150' height='225' alt='book_image'><a href='ad-display.php?book_id="+response.data[i].book_id+"' class='hover-content-a'><div class='hover-content'><span class='plus'><i class='fa fa-plus' aria-hidden='true'></i></span></div></a></div> <div class='book-name'> <span>"+response.data[i].book_title+"</span> </div> <div class='book-detail'><span class='price'><i class='fa fa-inr' aria-hidden='true'></i>"+response.data[i].book_price+"</span> <span class='status'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i>"+response.data[i].book_purpose+"</span> </div> </li>");
                            
                       });
                       
                    }
                    
                    if(response.error == false && response.data == null){
                    
                    if(response.heading == 'My Books'){
                       
                       $('#book-bar-heading').hide();
                        $('.show-more').hide();
                        $('#error-message').css('display','block');
                        $('#error-message i').attr('class', 'fa fa-thumb-tack');
                         $('#message-div i').css('color', '#d92d2d');
                        $('#heading span').html("Oops..");
                        $('#sub-heading span').html("You haven't pinned any ads till now.");
                        $('#error-message a').attr('href','ad-post.php');
                         $('#error-message a').attr('id','btn-danger');
                        $('#error-message a').html("Pin Free Ad");         
                       
                    }
                    
                    else if(response.heading == 'My Bookmarks'){
                       
                       $('#book-bar-heading').hide();
                        $('.show-more').hide();
                        $('#error-message').css('display','block');
                        $('#error-message i').attr('class', 'fa fa-heart');
                         $('#message-div i').css('color', '#d92d2d');
                        $('#heading span').html("Oops..");
                        $('#sub-heading span').html("You haven't bookmarked any ads till now.");
                        $('#error-message a').attr('href','index.php');
                         $('#error-message a').attr('id','btn-danger');
                        $('#error-message a').html("Bookmark Now");         
                       
                    }
                    
                    else if(response.heading == 'Recent Books'){
                       
                       $('#book-bar-heading').hide();
                        $('.show-more').hide();
                        $('#error-message').css('display','block');
                        $('#error-message i').attr('class', 'fa fa-frown-o');
                         $('#message-div i').css('color', '#d92d2d');
                        $('#heading span').html("Oh Sh#t");
                        $('#sub-heading span').html("Something went horribly wrong.");
                        $('#error-message a').attr('href','404.shtml');
                         $('#error-message a').attr('id','btn-danger');
                        $('#error-message a').html("Please Visit Later");         
                       
                    }
                        
                        else{
                            
                            $('#book-bar-heading').hide();
                        $('.show-more').hide();
                        $('#error-message').css('display','block');
                        $('#error-message i').attr('class', 'fa fa-frown-o');
                         $('#message-div i').css('color', '#d92d2d');
                        $('#heading span').html("Sorry..");
                        $('#sub-heading span').html("We don't have any ads for this kind.");
                        $('#error-message a').attr('href','index.php');
                         $('#error-message a').attr('id','btn-danger');
                        $('#error-message a').html("Search Again");
                            
                        }
                        
                    }
                    
                    if(response.error == true){
                        $('#book-bar-heading').hide();
                        $('.show-more').hide();
                        $('#error-message').css('display','block');
                        $('#error-message i').attr('class', 'fa fa-frown-o');
                         $('#message-div i').css('color', '#d92d2d');
                        $('#heading span').html("Oh Sh#t");
                        $('#sub-heading span').html("Something went horribly wrong.");
                        $('#error-message a').attr('href','index.php');
                         $('#error-message a').attr('id','btn-danger');
                        $('#error-message a').html("Try Again");
                    
                        
                        
                    }
                }
            });
            
            
        }
        
        
        
        load_data($rows_per_page, $start_row);
        
        
        $current_page = 2;
        
        $('#show_btn').click(function(){
           
            $start_row = ($current_page * $rows_per_page) - $rows_per_page;
            
            if($current_page <= $total_page){
                
                load_data($rows_per_page, $start_row);
                
                $current_page++;
            }
            
        });
        
        
        
    });
      
       
      
    </script>
  
</body>
</html>