<?php

require_once('core/init.php');

$db_obj = new DB;
$user = new User();
    
$query_data = [];

$response = array("error" => true,
                 "data" => null,
                 "heading" => null);

$query = '';

if(isset($_GET['rows_per_page']) && isset($_GET['start_row']) && isset($_GET['category']) && isset($_GET['price']) && isset($_GET['purpose']) && isset($_GET['search_query']) && isset($_GET['bookshelf'])){
    
    $book_price = isset($_GET['price']) ? sanitize($_GET['price']) : NULL;
    $search_query = isset($_GET['search_query']) ? sanitize($_GET['search_query']) : NULL;
    $bookshelf = isset($_GET['bookshelf']) ? sanitize($_GET['bookshelf']) : NULL;
    $book_category = isset($_GET['category']) ? sanitize($_GET['category']) : NULL;
    $book_purpose = isset($_GET['purpose']) ? sanitize($_GET['purpose']) : NULL;
    $rows_per_page = sanitize($_GET['rows_per_page']);
    $start_row = sanitize($_GET['start_row']);
    
  
        if($book_price == 'l2h'){
            
            $price = 'ASC';
        }
        
        else if($book_price == 'h2l'){
            
            $price = 'DESC';
        }
        
        else{
            
             $price = NULL;
        }


if($user->isLoggedin() && !empty($bookshelf)){
    if($bookshelf == 'my_books'){
    $query = "SELECT * FROM books WHERE user_id = :user_id";
    $query_data[':user_id'] = $user->data()->user_id;
        $response["heading"] = 'My Books';
    }
    
    else if($bookshelf == 'my_bookmarks'){
    $query = "SELECT books.* FROM bookmarks INNER JOIN books ON books.book_id = bookmarks.book_id WHERE bookmarks.user_id = :user_id";
    $query_data[':user_id']  = $user->data()->user_id;
        $response["heading"] = 'My Bookmarks';
     }
}

if(!empty($book_category)){
    $query = "SELECT * FROM books WHERE book_sub_category = :category";
    $query_data[':category']  = strtolower($book_category);
    $response["heading"] = $book_category.' Books';
}

if(!empty($search_query)){
    
    $response["heading"] = 'Search Results';
    
    $search_query_metaphone = metaphone($search_query);
    
    $query = "SELECT * FROM books WHERE book_title_metaphone LIKE '%:search_meta1%' OR book_tags_metaphone LIKE '%:search_meta1%'";
    
    $query_data[':search_meta1']  = $search_query_metaphone;
     $book_rows_temp = $db_obj->getInstance()->select($query, $query_data)->row_count();
    
    if($book_rows_temp == 0 && str_word_count($search_query) > 1){
        
        $search_exploded = explode ( " ", $search_query);
        $search_exploded = explode ( " ", $search_query);
        
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
    
    $query = "SELECT * FROM books WHERE book_id <> 0";
    
     $response["heading"] = 'Recent Books';

}

if(!empty($book_purpose)){
    
     $query .= " AND book_purpose = :purpose";
     $query_data[':purpose']  = strtolower($book_purpose);
}


 if(!empty($book_price)){
    
     $query .= " ORDER BY book_price = :price";
     $query_data[':price']  = strtolower($price);
}
    
else{
    
    $query .= " ORDER BY book_id DESC";
}
    
    if(!empty($query)){
    $query .= " LIMIT $start_row, $rows_per_page ;";
    
        
    
            
//    $query_link = $db_obj->getInstance()->link()->prepare($query);
    $query_result =  $db_obj->getInstance()->select($query, $query_data)->result();
        
    $query_row =  $db_obj->getInstance()->select($query, $query_data)->row_count();
        
    if($query_result && $query_row){
        
        $response["data"] = $query_result;
         $response["error"] = false;
        
    }
       
       else if($query_result && $query_row == 0)
        
           $response["data"] = null;
           $response["error"] = false;  
    }
    
    
}


    
echo json_encode($response);

?>

