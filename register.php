<?php
  include ("includes/dbconnection.php");

  if(isset($_POST['register'])){
    $pharmacyID = mysqli_real_escape_string($dbConnect, $_POST['pharmacyID']); 
    $firstname = mysqli_real_escape_string($dbConnect, $_POST['firstname']);
    $pharmstore = mysqli_real_escape_string($dbConnect, $_POST['pharmstore']); 
    $phone = mysqli_real_escape_string($dbConnect, $_POST['phone']);
    $lastname = mysqli_real_escape_string($dbConnect, $_POST['lastname']);
    $username = mysqli_real_escape_string($dbConnect, $_POST['username']);
    $password = base64_encode($_POST['password']);    
    $email = mysqli_real_escape_string($dbConnect, $_POST['email']);
    $licence = mysqli_real_escape_string($dbConnect, $_POST['licence']);
    $address = mysqli_real_escape_string($dbConnect, $_POST['address']);
    $usertype = "pharmacy";

    $query = "INSERT INTO tblpharmacy (pharmacyID, firstname, lastname, username, password, email, license, pharmacystore, phone, address) VALUES ('$pharmacyID', '$firstname','$lastname','$username','$password','$email','$licence','$pharmstore', '$phone','$address');";

    $pharmacyQuery = "INSERT INTO `tbluserlogin`(`ID`, `username`, `password`, `usertype`, `pharmacyID`, `doctorID`) VALUES (null,'$username','$password','$usertype','$pharmacyID','default');";

    $result = mysqli_query($dbConnect, $query);

    $pharmacyResult = mysqli_query($dbConnect, $pharmacyQuery);

    if (!$result) {
      ?>
      <script>
        window.alert("Cant save to database!");
      </script>
      <?php
    } else {
       ?>
      <script>
        window.alert("Data saved successfully!");
      </script>
      <?php
      header("Location: index.php");
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
  <title>Register - Drug Availability</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" href="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" autocomplete="off">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First Name</label>
                <?php $randNumber = rand(1455, 2111);?>
                <input class="form-control" id="pharmacyID" name="pharmacyID" required="required" type="hidden" aria-describedby="nameHelp" value="<?php echo "PHY-" .$randNumber; ?>" >
                <input class="form-control" id="firstname" name="firstname" required="required" type="text" aria-describedby="nameHelp" placeholder="Enter First Name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last Name</label>
                <input class="form-control" name="lastname" id="lastname" required="required" type="text" aria-describedby="nameHelp" placeholder="Enter Last Name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Username</label>
                <input class="form-control" id="username" name="username" required="required" type="text" aria-describedby="nameHelp" placeholder="Enter Username">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Password</label>
                <input class="form-control" id="password" name="password" required="required" type="password" aria-describedby="nameHelp" placeholder="Enter Password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="exampleInputEmail1">Email Address</label>
            <input class="form-control" id="email" name="email" type="email" required="required" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>
            <div class="col-md-6">
            <label for="exampleInputEmail1">License Number</label>
            <input class="form-control" id="licence" name="licence" type="text" required="required" aria-describedby="emailHelp" placeholder="Enter Licence Number">
            </div>
          </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="exampleInputEmail1">Pharmacy Store</label>
            <input class="form-control" id="pharmstore" name="pharmstore" type="text" required="required" aria-describedby="emailHelp" placeholder="Enter Pharmacy Store Name">
            </div>
            <div class="col-md-6">
            <label for="exampleInputEmail1">Phone Number</label>
            <input class="form-control" id="phone" name="phone" type="number" required="required" aria-describedby="emailHelp" placeholder="Enter Phone Number">
            </div>
          </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Address</label>
                <textarea class="form-control" id="address" name="address" type="text" required="required" placeholder="Enter Address"></textarea> 
              </div>
            </div>
          </div>
          <button name="register" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
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
