<?php
 include('connect.php');
 if(isset($_POST['category'])){
     $category = $_POST['category'];
     $iconClass = $_POST['iconclass'];
     if($category!=''){
         $query = "INSERT INTO category(title,iconImage)VALUE ('$category','$iconClass')";
         if(mysqli_query($conn, $query)){
             $msg = "successfully inserted";
         }else{
             $msg = mysqli_error();
         }
         header('Location:../category.php?msg='.$msg);
     }else{
         $msg = "category name required";
         header('Location:../category.php?errmsg='.$msg);
     }
 }

?>