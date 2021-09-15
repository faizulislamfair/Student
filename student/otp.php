<?php

require_once './dbcon.php';

session_start();

if(isset($_SESSION['student_login'])){
  header('location: systemstudent.php');
}

if(isset($_POST['login'])) {
      
  $otp = $_POST['otp'];


  $studentname_check = mysqli_query($link, "SELECT * FROM `student_info` WHERE `otp` = '$body'");
  if(mysqli_num_rows($studentname_check) > 0){
   $row = mysqli_fetch_assoc($studentname_check);

   if($row['password'] == md5($password)){
    if($row['status'] == 'active'){
      $_SESSION['student_login'] = $Roll;
      header('location: systemstudent.php');
    } 
   } else {
       $wrong_otp = "The OTP Is Wrong";
   }

  } else {
       $otp_not_found = "This OTP Is Invalid";
  }


}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/btn.css">

    <style>
.btn-primary, .btn-primary:active, .btn-primary:visited{
    width:80px;
    background-color: #2155c5;
    color: white;
    border-radius: 15px;
    border:none;
    transition: 0.2s;
    font-weight: 450;
    padding-left: 10px;
    padding-right: 10px;
    height: 35px;
}

.btn:hover, .btn-info:hover, .btn-primary:hover {
    width:80px;
    background-color: #E5E4E3;
    color:#2155c5;
    border-radius: 15px;
    border:1px solid #2155c5;
    padding-left: 10px;
    padding-right: 10px;
    transition: 0.2s;
    font-weight: 450;
    height: 35px;
}

      .form-control {
    display: block;
    width: 425px;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    margin-left: 28px;
}
    </style>
  


    <title>SIMS</title>
  </head>
  <body>

  <header style="width:100%; height:90px; background: #2887e6">
   </header>
     <br> <br>
     <a href="../"><input style="transform:translateX(-25px); float:right;" value="Back" class="btn btn-primary"></a>
     <h1 style="margin-left:465px;">Email Verification</h1>


     <div style="margin-right:100px;" class="row">
      <div class="col-sm-4 col-sm offset-4">
      <div>

      <br> 
         <form action="" method="POST">
           <div>
              <input type="password" placeholder="OTP" name="otp" required="" class="form-control" value="<?php if(isset($body)) { echo $body; } ?>">
           </div>
           <br>
           <div>
           <input style="transform: translateX(200px);" type="submit" value="Confirm" name="login" class="btn btn-primary">
           </div>
         </form>
         </div>
      </div>
     </div>
     <br>
     <?php if(isset($roll_not_found)) { echo '<div class="alert alert-danger col-sm-2 col-sm offset-5">'.roll_not_found.'</div>'; } ?>
     <?php if(isset($wrong_password)) { echo '<div class="alert alert-danger col-sm-2 col-sm offset-5">'.$wrong_password.'</div>'; } ?>
     <?php if(isset($status_inactive)) { echo '<div class="alert alert-danger col-sm-2 col-sm offset-5">'.$status_inactive.'</div>'; } ?>

   </div>

   <footer style="width:100%; height:75px; background: #2887e6; text-align:center; bottom:0; position:absolute;">
      <p style="color:white; padding-top:25px; font-size:14px;">Copyright &COPY; 2021 S.M. Faizul Islam Fair</p>
    </footer>
  </body>
</html>
