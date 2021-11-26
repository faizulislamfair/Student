<?php
session_start();
require_once './dbcon.php';
if(!isset($_SESSION['student_login'])){
     header('location: login.php');


}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  
  <link rel="stylesheet" type="text/css" href="../fonts/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/btn.css">
  <title>SIMS</title>


</head>

<body>

<header style="width:100%; height:80px; background: #2887e6;">
   </header>
  
    <br>

    <a style="float:right;" class="btn btn-primary" href="logout.php">Logout</a>
    <br> <br>
  


<h1 style="margin-left: 425px;" class="text-primary"><i class="fas fa-user-edit"></i> Update User Profile</h1>


<?php

$id = base64_decode($_GET['id']);



if(isset($_POST['update-student'])){

  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "UPDATE `student_info` SET `name` = '$name' ,`username` = '$username' ,`email` = '$email' ,`password` = '$password'  WHERE `id` = '$id'";
  $result = mysqli_query($link, $query);

  if($result){
    //header('location: index.php?page=user-profile');
  }

}

$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = $id");
$db_row = mysqli_fetch_assoc($db_data);


?>



<div style="margin-top:25px; margin-left:325px;" class="row">
   <div class="col-sm-6">
     <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" placeholder="Name" id="name" class="form-control" required="" value="<?= $db_row['name'] ?>" >
        </div>

        <div class="form-group">
          <label for="roll">Username</label>
          <input type="text" name="username" placeholder="Username" id="username" class="form-control" required="" value="<?= $db_row['username'] ?>" >
        </div>

        <div class="form-group">
          <label for="city">Email</label>
          <input type="text" name="email" placeholder="Email" id="email" class="form-control" required="" value="<?= $db_row['email'] ?>" >
        </div>

        <div class="form-group">
          <label for="pcontact">Password</label>
          <input type="text" name="password" placeholder="Password" id="password" class="form-control" required="" value="<?= $db_row['password'] ?>" >
        </div>


        <div class="form-group">
          <input style="height:35px; margin-top:15px;" type="submit" value="Update User Profile" name="update-user" class="btn btn-primary">
        </div>

     </form>
   </div>
 </div>


 
 <footer style="width:100%; height:75px; background: #2887e6; bottom:0; text-align:center; margin-top:188px">
       <p style="color:white; padding-top:25px; font-size:14px;">Copyright &COPY; 2021 S.M. Faizul Islam Fair</p>
    </footer>


</body>
</html>    