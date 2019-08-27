<?php// include("../includes/auth.php");?>
<?php //include("../includes/functions.php");?>
<?php// $username = $_SESSION['username'];?>
<?php
    // if(isset($_GET['id'])){
        $qry = "SELECT * FROM tblSelecteddrug";

        $query = "TRUNCATE tblSelecteddrug";

        $result = runQuerry($dbConnect, $qry) or die("cant fetch it");
        $row = mysqli_fetch_assoc($result);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> -->
  <title>Dr. <?php echo "{$username}"; ?> </title>
  <!-- Bootstrap core CSS-->
  <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <!-- <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet"> -->
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="doctorpage.php">Dr. Log Page</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doctor's Dashboard">
          <a class="nav-link" href="doctorpage.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Doctors Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Drug List">
          <a class="nav-link" href="druglist.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Drug List</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pharmacy">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Pharmacy</span>
          </a>

          <!-- data to edit for dropdown -->

          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="allpharmacy.php">All Pharmacy</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponent" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Users</span>
          </a>

          <!-- data to edit for dropdown -->

          <ul class="sidenav-second-level collapse" id="collapseComponent">
            <li>
              <a href="alluser.php">All Users</a>
            </li>
            <li>
              <a href="adduser.php">Add User</a>
            </li>
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
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Drug</a>
        </li>
        <li class="breadcrumb-item active">Print Drug Details</li>
      </ol>

      <!-- drugs data table -->

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Drug Properties</div>
        <div class="card-body">

        <form method="post" autocomplete="off" action="saveApprovedDrug.php">
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Doctors Name</label>
                <input class="form-control" name="doctorsName" value="<?php echo $username; ?>" disabled type="text" aria-describedby="nameHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Patient Name</label>
                <input class="form-control" placeholder="Enter Patients Name" Required name="patientName"  type="text" aria-describedby="nameHelp">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Drug Name</label>
                <input class="form-control" name="drugName" value="<?php echo $row['name']; ?>" disabled type="text" aria-describedby="nameHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Price</label>
                <input class="form-control" value="<?php echo $row['price']; ?>" name="price" disabled type="number" aria-describedby="nameHelp">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Drug Description</label>
                <input class="form-control" value="<?php echo $row['description']; ?>" name="description" disabled type="text" aria-describedby="nameHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Pharmacy Number</label>
                <input class="form-control" value="<?php echo $row['phone']; ?>" name="pharmNum" disabled type="number" aria-describedby="nameHelp">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="exampleInputEmail1">Pharmacy Name</label>
            <input class="form-control" value="<?php echo $row['pharmacystore']; ?>" name="pharmName" type="text" disabled aria-describedby="emailHelp">
            </div>
            <div class="col-md-6">
            <label for="exampleInputEmail1">Pharmacy Address</label>
            <input class="form-control" value="<?php echo $row['address']; ?>" name="pharmAdd" type="text" disabled aria-describedby="emailHelp">
          </div>
          </div>
          </div>
          <button name="print" id="print" class="btn btn-primary btn-block">Print</button>
        </form>  

                
      </div>
    </div>
      



    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <p class="text-primary"><?php echo date("l d-m-Y, h:ia");?></p>>
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
