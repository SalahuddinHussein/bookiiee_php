<?php

require_once'core/init.php';

$cat = new Categories;

if(isset($_POST['value'])){

$value = $_POST['value'];

 
    foreach($cat->getSubCat($value) as $subCat){                          
     $name =  $subCat->sub_category_name;
     
     echo "<option value='".$name."'>".$name."</option>";
 }


}

?>