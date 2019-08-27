<?php
include ("includes/dbconnection.php");

if (isset($_POST['submit'])) {
  $phone = mysqli_real_escape_string($dbConnect, $_POST['phone']);
  $query = "SELECT phone FROM `tblpharmacy` WHERE phone = '$phone';";
  $QueryResult = mysqli_query($dbConnect, $query) or die("Error Querrying Database");
  // $fetchResult = mysqli_fetch_assoc($QueryResult);
  // $dbPhone = $fetchResult['phone'];
  $count = mysqli_num_rows($QueryResult);
      if($count == 1){
        header("Location: updatepassword.php?myValue=".$phone);
      }else{
        echo "Phone Number Entered is not correct";
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
  <title>Forgot Password - Drug Availability</title>
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
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your Phone Number and we will send you instructions on how to reset your password.</p>
        </div>
        <form method="POST" autocomplete="off">
          <div class="form-group">
            <input class="form-control" name="phone" id="phone" type="phone" aria-describedby="emailHelp" required="required" placeholder="Enter Phone Number">
          </div>
          <button name="submit" class="btn btn-primary btn-block">Submit</button>
          <!-- <a class="btn btn-primary btn-block" href="index.php">Reset Password</a> -->
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="index.php">Login Page</a>
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
