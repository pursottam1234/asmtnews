<?php
  include('connect.php');
  if(isset($_POST['loginsubmit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      if($email==''){
          $msg = "email is required";
          header('Location:../login.php?errmsg='+$msg);
      }
      if($password==''){
          $msg = "password is required";
          header('Location:../login.php?errmsg='+$msg);
      }
    $encryptedPass = md5($password);  
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$encryptedPass'";
    $result = mysqli_query($conn,$query);
     
    $row = mysqli_num_rows($result);
    if($row==1){
        header('Location:../home.php');
    }else{
        header('Location:../login.php?errmsg=email and password does not match');
    }


  }

?>