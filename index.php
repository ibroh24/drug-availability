<?php
  session_start();
  include ("includes/dbconnection.php");

  session_unset();

  if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($dbConnect, $_POST['username']);
    $password = base64_encode($_POST['password']);

    $checkUserType = "SELECT `username`, `password`, `usertype`,`activationStatus` FROM `tbluserlogin` WHERE `username`='$username' AND`password`='$password'";
    $Result = mysqli_query($dbConnect, $checkUserType);
    while ($row = mysqli_fetch_assoc($Result)) {
      $dbUserName = $row['username'];
      $dbPassword = base64_decode($row['password']);
      $dbUserType = $row['usertype'];
      $dbActivationStatus = $row['activationStatus'];
      
    }
    $count = mysqli_num_rows($Result);
    
    if (!$Result) {
      echo "cant connect to database!".mysqli_error($dbConnect);
    } else{
      if ($count == 1){
          if ($dbUserType == "doctor") {
           $_SESSION['username'] = $dbUserName;
           header("Location: doctor/doctorpage.php");
          } else if($dbUserType =="pharmacy"){
            if ($dbActivationStatus == 1) {
              $_SESSION['username'] = $dbUserName;
              header("Location: pharmacy/pharmacypage.php");
            }else{ ?>
            <script>
              window.alert("Your License is yet to be verified");
            </script>
              <?php
            }
            
          }
          } else{ ?>
            <script>
            window.alert("Invalid Username or password");
          </script>
      <?php }
      }
    
  }
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login - Drug Availability</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login Page</div>
      <div class="card-body">
        <form method="post" autocomplete="off">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="password" name="username" type="text" required="required" aria-describedby="username" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password" type="password" required="required" placeholder="Password">
          </div>
          
          <button name="login" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
