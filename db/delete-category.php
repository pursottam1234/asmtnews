<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM category WHERE id = '$id'";
    include("connect.php");
    if(mysqli_query($conn, $query)){
        header("Location:../category.php?msg=successfull delete");
    }else{
        header("Location:../category.php?errmsg=".mysqli_error($conn));
    }
}

?>
