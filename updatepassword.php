<?php
  include ("includes/dbconnection.php");

  if(isset($_GET['myValue'])){
      $phon = $_GET['myValue'];
      $fetchQry = "SELECT * FROM `tblpharmacy` WHERE phone = '$phon';";
      $fetchResult = mysqli_query($dbConnect, $fetchQry) or die("cant fetch data from database!");
      if($fetchResult){
        $fetchCheck = mysqli_fetch_assoc($fetchResult) or die("cant fetch Create Array");
      }
    }
?>


<?php
    if (isset($_POST['update'])) {
       
        $pharmacyID = mysqli_real_escape_string($dbConnect, $_POST['pharmacyID']);
        $pharmacyUserName = mysqli_real_escape_string($dbConnect, $_POST['username']);
        $dValue = "DEFAULT";
        $uType = "pharmacy";

        $newPass = base64_encode($_POST['newpassword']);
        //updating password
        $updatePassword = "UPDATE `tblpharmacy` SET `password`= '$newPass' WHERE pharmacyID = '$pharmacyID';";
        $passUpdateResult = mysqli_query($dbConnect, $updatePassword) or die("Unable to update Pharmacy details".mysqli_error($dbConnect));



        
      if ($passUpdateResult) {

        //updating login
        $updateLogin = "UPDATE `tbluserlogin` SET `ID`=null,`username`='$pharmacyUserName',
        `password`='$newPass',`usertype`='$uType',`pharmacyID`='$pharcyID',`doctorID`='$dValue' WHERE pharmacyID = '$pharmacyID';";
        
        $logUpdateResult = mysqli_query($dbConnect, $updateLogin) or die("Unable to update login details".mysqli_error($dbConnect));
        
        header("Location: index.php");
          
        } else {
          echo "<alert>Error updating password</alert>".mysqli_error($dbConnect);
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
  <title>Update Password - Drug Availability</title>
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
      <div class="card-header">Update Password</div>
      <div class="card-body">
        <form method="post" autocomplete="off">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="pharmacyID" name="pharmacyID" required="required" type="hidden" aria-describedby="nameHelp" value="<?php echo $fetchCheck['pharmacyID'];?>">
            <input class="form-control" id="username" name="username" readonly="true" type="text" value="<?php echo $fetchCheck['username'];?>" aria-describedby="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input class="form-control" id="newpassword" name="newpassword" type="password" required="required" placeholder="Enter New Password">
          </div>
          <button name="update" class="btn btn-primary btn-block">Update</button>
        </form>
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
