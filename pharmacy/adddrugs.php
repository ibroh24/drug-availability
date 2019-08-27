<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php");?>

<?php
$user = $_SESSION['username'];
$qry = "SELECT pharmacystore, address, phone FROM tblpharmacy WHERE username ='$user'";
$returnQuerry = mysqli_query($dbConnect, $qry);
if ($row = mysqli_fetch_assoc($returnQuerry)) {
  $dbAddress = $row['address'];
  $dbPharmacy = $row['pharmacystore'];
  $dbPhone = $row['phone'];
} else {
  echo "<alert>Error fetching pharmacy details</alert>";
}

  if(isset($_POST['drugs'])){
    $drugName = mysqli_real_escape_string($dbConnect, $_POST['drugname']);
    $drugdescription = mysqli_real_escape_string($dbConnect, $_POST['drugdescription']);
    $drugprice = mysqli_real_escape_string($dbConnect, $_POST['drugprice']);
    $pharmacystore = mysqli_real_escape_string($dbConnect, $_POST['pharmacystore']);
    $address = mysqli_real_escape_string($dbConnect, $_POST['address']);
    $phone = mysqli_real_escape_string($dbConnect, $_POST['phone']);



    $drugQuery = "INSERT INTO `tbldrug`(`name`, `description`, `price`, `pharmacystore`, `address`, `phone`) VALUES ('$drugName','$drugdescription','$drugprice', '$pharmacystore','$address','$phone');";

    $drugResult = mysqli_query($dbConnect, $drugQuery);
    if(!$drugResult){
      echo "cant save to database!";
    }else{
      header("Location: pharmacypage.php");
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
  <title>Pharmacy - Add Drug </title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark text-primary" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top text-primary" id="mainNav">
    <a class="navbar-brand text-primary" href="pharmacypage.php"><b>Pharmacy Log Page</b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="pharmacypage.php">
            <i class="fa fa-fw fa-dashboard text-primary"></i>
            <span class="nav-link-text text-primary">Pharmacy Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Drugs">
          <a class="nav-link" href="adddrugs.php">
            <i class="fa fa-fw fa-tablet text-primary"></i>
            <span class="nav-link-text text-primary">Add Drugs</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
        <a class="nav-link" href="pharmacyprofile.php">
            <i class="fa fa-fw fa-wrench text-primary"></i>
            <span class="nav-link-text text-primary">Profile</span>
          </a>
          </a>

          <!-- data to edit for dropdown -->

          <ul class="sidenav-second-level collapse" id="collapseComponents">
          </ul>
        </li>
                
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out text-primary"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Drugs</a>
        </li>
        <li class="breadcrumb-item active">Add Drugs</li>
      </ol>

      <!-- adding drug session -->

      <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12 col-sm-6">
                <label for="exampleInputName">Drug Name</label>
                <input class="form-control" id="drugname" name="drugname" type="text" required="required" aria-describedby="nameHelp" placeholder="Enter Drug Name">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12 col-sm-6">
              <input class="form-control" id="pharmacystore" name="pharmacystore" required="required" type="hidden"  value="<?php echo $dbPharmacy; ?>">
              <input class="form-control" id="address" name="address" required="required" type="hidden"  value="<?php echo $dbAddress; ?>">
              <input class="form-control" id="phone" name="phone" required="required" type="hidden"  value="<?php echo $dbPhone; ?>">
            <label for="exampleInputEmail1">Price</label>
            <input class="form-control" id="drugprice" name="drugprice" required="required" type="number" aria-describedby="emailHelp" placeholder="Enter Drug Price">
            </div>
          </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Drug Description</label>
                <textarea class="form-control" id="drugdescription" name="drugdescription" required="required" type="text" placeholder="Enter Drug Description"></textarea> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-12">
          <button name="drugs" id="drugs" class="btn btn-primary btn-block">Add Drug</button>
          </div>
        </div>
      </div>

      
        </form>
        <hr>
    
    <!-- To upload bulk drug list -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Drugs</a>
        </li>
        <li class="breadcrumb-item active">Bulk Upload</li>
      </ol>
    <form method="request">
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Bulk Drug List</label>
    <input type="file" class="form-control-file" id="druglist" name="druglist">
  </div>
  <div class="form-group">
            <div class="form-row">
          <div class="col-md-4">
          <button name="uploaddrug" id="uploaddrug" class="btn btn-primary btn-block">Upload Bulk</button>
          </div>
        </div>
</form>
    <?php
        // get uploaded data
        // if(isset($_REQUEST['uploaddrug'])){
        //   $fileSuccess = true;
        //   $fileUpload = $_FILE['csv_file']['tmp_name'];
        //   $fileHandle = fopen($fileu, "r");
        //   if ($fileUpload == null) {
        //     echo "please select file to upload";
        //     header("Location: adddrugs.php");
        //   } else {
        //     while (($uploads = fgetcsv($fileHandle, 1000, ","))!=false) {
        //       $drugNames = $uploads['0'];
        //       $drugPrice = $uploads['1'];
        //       $drugDescription = $uploads['2'];
        //     }
        //     if($fileSuccess){
        //       $saveSql = ("INSERT INTO `tbldrug`SET
        //       `name`= '". mysqli_escape_string($drugNames). "'",
        //       `price` = '". mysqli_escape_string($drugPrice). "'",
        //       `description` = '". mysqli_escape_string($drugDescription). "'";
        //       mysqli_query($)
        //     }
        //   }
          
        // }


    ?>
        





      
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <p class="text-primary"><?php echo date("l d-m-Y, h:ia");?></p>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
