<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php");?>
<?php $username = $_SESSION['username']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>All Pharmacy - Dr. <?php echo "{$username}"; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title=" Doctors Dashboard">
          <a class="nav-link" href="doctorpage.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Doctors Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Available Drugs">
          <a class="nav-link" href="druglist.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Drug List</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Phamarcy">
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
          <a href="#">Pharmacy</a>
        </li>
        <li class="breadcrumb-item active">All Pharmacy</li>
      </ol>

      <!-- populating all pharmacy from database -->

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> List of All Pharmacy</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th>Pharm ID</th>
                  <th>Pharm Name</th>
                  <th>Pharm Address</th>
                  <th>Username</th>
                  <th>Phone Number</th>
                  <th>License Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php 
                    $query = "SELECT distinct tblpharmacy.pharmacyID, tblpharmacy.pharmacystore, tblpharmacy.address, tblpharmacy.username, tblpharmacy.phone, tblpharmacy.license, tbluserlogin.activationStatus FROM tblpharmacy, tbluserlogin where tblpharmacy.username = tbluserlogin.username";
                    $result = mysqli_query($dbConnect, $query) or die(mysqli_error($dbConnect));
                      while ($row = mysqli_fetch_assoc($result)) {
                          $actStat = $row['activationStatus'];
                        ?>
                    <tr>  
                  <td><?php echo $row['pharmacyID']; ?></td>
                  <td><?php echo $row['pharmacystore']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['license']; ?></td>
                  <td>
                  <?php if($actStat == 1) {?>
                  <button class="btn btn-success btn-sm" data-toggle="modal"  disabled="true" data-target="#ActivateModal">Activated</button> 
                  <?php } else {?> 
                  <button class="btn btn-success btn-sm text-warning" data-toggle="modal"  data-target="#ActivateModal">Activate</button>
                  <?php } ?> <span>|</span> <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button> 
                </tr>
                      <?php } ?>  
                      </td>    
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Button Modal -->
    
    <div class="modal" tabindex="-1" id="deleteModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Pharmacy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form class="form" method="post">
        <div class="form-group">
            <div class="form-row">
      <div class="modal-body">
        <label for="exampleInputEmail1">Pharmacy ID</label>

        <input  class="form-control" required="required" placeholder="Enter Pharmacy ID" type="text" name="pharmacyID" id="pharmacyID">
      </div>
       </div>
  </div>
      <div class="modal-footer">
        <button name="delete" id="delete" class="btn btn-danger">Delete Pharmacy</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
   
      </form>
    </div>
  </div>
</div>
            <?php 
            if(isset($_POST['delete'])){
              $pharmacyID = $_POST['pharmacyID'];

              $deleteQuery = "DELETE FROM `tblpharmacy` WHERE pharmacyID = '$pharmacyID';"; 
              $deleteResult = mysqli_query($dbConnect, $deleteQuery) or die ("cant delete from database!");             
              //if(!$deleteResult){
                // echo "cant delete!";
              }
            ?>


            <!-- Activate Button Modal -->
    <div class="modal" tabindex="-1" id="ActivateModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Activate Pharmacy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form class="form" method="post">
        <div class="form-group">
            <div class="form-row">
      <div class="modal-body">
        <label for="exampleInputEmail1">Pharmacy ID</label>
       
        <input  class="form-control" required placeholder="Enter Pharmacy ID" type="text" name="pharmacyID" id="pharmacyID">
      </div>
       </div>
  </div>
      <div class="modal-footer">
        <button name="activate" id="activate" class="btn btn-success">Activate Pharmacy</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
   
      </form>
    </div>
  </div>
</div>
            <?php 
            if(isset($_POST['activate'])){
              $pharmacyID = $_POST['pharmacyID'];
              $keyVal = '1';
              $activateQuery = "UPDATE `tbluserlogin` SET activationStatus = '$keyVal' WHERE pharmacyID ='$pharmacyID';"; 
              $activateResult = mysqli_query($dbConnect, $activateQuery) or die ("Account cannot be activated!");             
              
              }
            ?>
         
      
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
