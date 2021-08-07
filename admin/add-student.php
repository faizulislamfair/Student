<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   .btn-primary, .btn-primary:active, .btn-primary:visited{
    background-color: #2155c5;
    color: white;
    border-radius: 15px;
    border:none;
    transition: 0.2s;
    font-weight: 450;
    padding-left: 10px;
    padding-right: 10px;
    width: 60px;
    height: 32px;
}

.btn:hover, .btn-info:hover, .btn-primary:hover {
    background-color: #E5E4E3;
    color:#2155c5;
    border-radius: 15px;
    border:1px solid #2155c5;
    padding-left: 10px;
    padding-right: 10px;
    transition: 0.2s;
    font-weight: 450;
    width: 80px;
    height: 32px;
}
 </style>
</head>
<body>
  

<h1 style="margin-left: 475px;" class="text-primary"><i class="fa fa-user-plus"></i> Add Student </h1>


<?php

if(isset($_POST['add-student'])){

  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $city = $_POST['city'];
  $contact = $_POST['contact'];
  $class = $_POST['class'];

  $picture = explode('.',$_FILES['picture']['name']);
  $picture_ex = end($picture);

  $picture_name = $roll.'.'.$picture_ex;

  $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `contact`, `photo`) VALUES ('$name', '$roll', '$class', '$city', '$contact', '$picture_name')";

  $result = mysqli_query($link, $query);

  if($result){
    // $success = "Data Insertion Successful!";
    move_uploaded_file($_FILES['picture']['tmp_name'], 'student_images/'.$picture_name);
    // header('location: add-student.php');
  } else {
    $error = "Wrong!";
  }

}


?>

<div class="row">

   <?php if(isset($success)){ echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>
   <?php if(isset($error)){ echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>'; } ?>

</div>



<div style="margin-top:25px; margin-left:325px;"  class="row">
   <div class="col-sm-6">
     <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="name">Student Name</label>
          <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" >
        </div>

        <div class="form-group">
          <label for="roll">Student Roll</label>
          <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{7}" required="" >
        </div>

        <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" placeholder="City" id="city" class="form-control" required="" >
        </div>

        <div class="form-group">
          <label for="contact">Contact</label>
          <input type="text" name="contact" placeholder="01*********" id="contact" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}" required="" >
        </div>

        <div class="form-group">
          <label for="class">Class</label>
          <select id="class" class="form-control" name="class" required="" >
            <option value="">Select</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            <option value="4th">4th</option>
          </select>
        </div>

        <div class="form-group">
          <label for="picture">Picture</label>
          <input type="file" name="picture" id="picture" required="" >
        </div>
        <br>
        <div class="form-group">
          <input style="height: 32px;" type="submit" value="Add" name="add-student" class="btn btn-primary">
        </div>

     </form>

   
   </div>
</div>
<a href="index.php"><button style="float:right; transform: translateY(-45px);" class="btn btn-primary">Back</button></a>

</body>
</html>
