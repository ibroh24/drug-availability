<?php require '../includes/auth.php';?>
<?php require '../includes/dbconnection.php';?>
<?php

  if(isset($_POST['update'])){

      $firstname = mysqli_real_escape_string($dbConnect, $_POST['firstname']);
      $lastname = mysqli_real_escape_string($dbConnect, $_POST['lastname']);
      $username = mysqli_real_escape_string($dbConnect, $_POST['username']);
      $password = base64_encode($_POST['password']);
      $pharmstore = mysqli_real_escape_string($dbConnect, $_POST['pharmstore']);
      $email = mysqli_real_escape_string($dbConnect, $_POST['email']);
      $license = mysqli_real_escape_string($dbConnect, $_POST['license']);
      $phone = mysqli_real_escape_string($dbConnect, $_POST['phone']);
      $address = mysqli_real_escape_string($dbConnect, $_POST['address']);
      $pharmacyID = mysqli_real_escape_string($dbConnect, $_POST['pharmacyID']);
      $uType = "pharmacy";
      $dValue = "DEFAULT";

      $updateLogin = "UPDATE `tbluserlogin` SET `ID`=null,`username`='$username',`password`='$password',`usertype`='$uType',`pharmacyID`='$pharmacyID',`doctorID`='$dValue' WHERE 'pharmacyID' = '$pharmacyID'";
      $logUpdateResult = mysqli_query($dbConnect, $updateLogin) or die("Unable to update login details".mysqli_error($dbConnect));
      


    $qry = "UPDATE `tblpharmacy` SET `pharmacyID`='$pharmacyID',`firstname`='$firstname',`lastname`='$lastname',`username`='$username',`password`='$password',`email`='$email',`license`='$license',`pharmacystore`='$pharmstore',`phone`='$phone',`address`='$address' WHERE  'pharmacyID' = '$pharmacyID';";

    $pharmQuery = mysqli_query($dbConnect, $qry);
    
        if ($pharmQuery) {
          header("Location: ../index.php");
            
          } else {
            echo "<alert>Error updating pharmacy details</alert>".mysqli_error($dbConnect);
          }
  }
  ?>