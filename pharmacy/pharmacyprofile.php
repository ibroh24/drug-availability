<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php"); ?>
<?php 
$username = $_SESSION['username'];

$fetchQry = "SELECT * FROM `tblpharmacy` WHERE username = '$username';";
      $fetchResult = mysqli_query($dbConnect, $fetchQry) or die("cant fetch data from database!");
      if($fetchResult){
        $fetchCheck = mysqli_fetch_assoc($fetchResult) or die("cant fetch Create Array");
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
  <title>Pharmacy - Drug List </title>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pharm's Dashboard">
          <a class="nav-link" href="pharmacypage.php">
            <i class="fa fa-fw fa-dashboard text-primary"></i>
            <span class="nav-link-text text-primary">Pharmacy Profile</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Drugs">
          <a class="nav-link" href="adddrugs.php">
            <i class="fa fa-fw fa-tablet text-primary"></i>
            <span class="nav-link-text text-primary">Add Drugs</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" data-toggle="collapse" href="pharmacyprofile.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench text-primary"></i>
            <span class="nav-link-text text-primary">Profile</span>
          </a>

          <!-- data to edit for dropdown -->

          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <!-- <li>
              <a href="allpharmacy.php">All Pharmacy</a>
            </li>
            <li>
              <a href="cards.php">Activate Pharmacy</a>
            </li> -->
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
          <a href="#">Pharmacy</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $username."'s";?> Profile </li>
      </ol>

      <!-- drugs data table -->

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Profile</div>
        <div class="card-body">


          <!-- getting data from database  -->

          <form method="post" action="updateProfile.php" autocomplete="off">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First Name</label>
                <input class="form-control" id="pharmacyID" name="pharmacyID" required="required" type="hidden" aria-describedby="nameHelp" value="<?php echo $fetchCheck['pharmacyID'];?>" >
                <input class="form-control" readonly="true" id="firstname" value="<?php echo $fetchCheck['firstname'];?>" name="firstname" type="text" aria-describedby="nameHelp" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last Name</label>
                <input class="form-control" required="required" name="lastname" id="lastname" value="<?php echo $fetchCheck['lastname'];?>" readonly="true" type="text" aria-describedby="nameHelp">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Username</label>
                <input class="form-control" value="<?php echo $fetchCheck['username'];?>" id="username" name="username" required="required" readonly="true"  type="text" aria-describedby="nameHelp" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Password</label>
                <input class="form-control" id="password" name="password" required="required" type="password" aria-describedby="nameHelp" placeholder="*****">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="exampleInputEmail1">Email Address</label>
            <input class="form-control" id="email" name="email" value="<?php echo $fetchCheck['email'];?>" type="email" required="required" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>
            <div class="col-md-6">
            <label for="exampleInputEmail1">License Number</label>
            <input class="form-control" value="<?php echo $fetchCheck['license'];?>" id="license" name="license" type="text" readonly="true" required="required" aria-describedby="emailHelp">
            </div>
          </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="exampleInputEmail1">Pharmacy Store</label>
            <input class="form-control" id="pharmstore" value="<?php echo $fetchCheck['pharmacystore'];?>" name="pharmstore" type="text" required="required" aria-describedby="emailHelp" placeholder="Enter Pharmacy Store Name">
            </div>
            <div class="col-md-6">
            <label for="exampleInputEmail1">Phone Number</label>
            <input class="form-control" id="phone" name="phone" value="<?php echo $fetchCheck['phone'];?>" type="number" required="required" aria-describedby="emailHelp" placeholder="Enter Phone Number">
            </div>
          </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Address</label>
                <textarea class="form-control" id="address" name="address" type="text" required="required" placeholder="Enter Address"><?php echo $fetchCheck['address'];?></textarea> 
              </div>
            </div>
          </div>
          <button name="update" class="btn btn-primary btn-block">Update Profile</button>
        </form>
          
        </div>
      </div>
    </div>




<!-- Delete Button Modal -->
    <div class="modal" tabindex="-1" id="eraseDrug" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Erase Drug</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" method="post" action="deletedrug.php">
        <div class="form-group">
            <div class="form-row">
      <div class="modal-body">
        <label for="exampleInputEmail1" class="col-form-label">Drug ID</label>
        <input  class="form-control" required="required" placeholder="Enter Drug ID" name="drugID" id="drugID" type="text">
      </div>
       </div>
  </div>
      <div class="modal-footer">
        <button name="deletedrug" id="deletedrug" class="btn btn-danger">Erase Drug</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
   
      </form>
    </div>
  </div>
</div>

      
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
