<?php
session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
 

$categoryQuery = "SELECT * FROM category";
$categoryResult = mysqli_query($conn, $categoryQuery);

?>

<html>
  <head>
      <title>Home-Asmt News</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
<?php include('include/nav.php');?>    
 
<div class="container">
  <div class="row">
    <?php include('include/left-nav.php');?>
   <div class="col-8">
      <form method="POST" action="db/add-category.php">
          <label>Category title</label>
          <div class="input-group">
              <input type="text" class="form-control" name="category">
          </div>
          <br/>
          <div class="input-group">
              <input type="text" placeholder="fa icon class" class="form-control" name="iconclass">
          </div>
          <br/>
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
      <?php include('include/message.php'); ?>
      <div class="row justify-content-md-center">
        <?php
        if(mysqli_num_rows($categoryResult)==0){
          echo "<h3>No Category found </h3>";
        }else{  ?>

        <table class="table">
          <thead>
            <th>Title</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php while($row=mysqli_fetch_assoc($categoryResult)){ ?>
            <tr>
              <td><?php echo $row['title'];?></td>
              <td><a href="db/delete-category.php?id=<?php echo $row['id']; ?>">D</a> | E</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <?php  }  ?>
      
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/18e7e11ee0.js" crossorigin="anonymous"></script>
</body>
</html>