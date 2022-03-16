<?php
session_start();
$user_id = $_SESSION['user_id'];
include('connect.php');
if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $file =$_FILES['image']['tmp_name'];
    $target = '../img/'.$_FILES['image'] ['name'];
    move_uploaded_file($file, $target);
    $today = date('Y-m-d');
    $location = 'img/'.$_FILES['image']['name'];
    $query = "INSERT INTO post(title, content, coverImage, postDate, category_id, user_id) VALUES('$title','$content','$location','$today','$category','$user_id')";
    if(mysqli_query($conn, $query)){
        $msg = "Data inserted";
        header("Location:../add-post.php?msg=".$msg);
    }else{
        $msg = "some error occured: ".mysqli_error($conn);
        header("Location:../add-post.php?errmsg = ".$msg);
    }



}else{
    $msg="all field are required";
}