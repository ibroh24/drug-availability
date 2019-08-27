<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php");?>
<?php $username = $_SESSION['username'];?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dr. <?php echo "{$username}"; ?> </title>
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
        <li class="breadcrumb-item active">Drug List</li>
      </ol>

      <!-- drugs data table -->

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> List of Drugs Available</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Drug Name</th>
                  <th>Description</th>
                  <th>Pharmacy Name</th>
                  <th>Pharmacy Number</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              
              <tbody>
              <?php
                $queryDrugList = "SELECT * FROM tbldrug ORDER BY DrugID ASC;";
                $Result = mysqli_query($dbConnect, $queryDrugList);
                if(!$Result){
                  echo "error while listing the list!";
                }else{
                  while ($row = mysqli_fetch_assoc($Result)) {
                    ?>
                <tr>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['description'];?></td>
                  <td><?php echo $row['pharmacystore'];?></td>
                  <td><?php echo $row['phone'];?></td>
                  <td><?php echo $row['address'];?></td>                  
                  
                  <td>
                  <!-- <a href="index.php?page=druglists&action=add&id=">Select Drug</a> -->
                  <button type="button" class="btn btn-sm btn-primary" id="<?php echo $row['drugID'] ?>" title="Select Drug" data-toggle="modal" data-target="#drugModal" data-id="<?php echo $row['drugID'] ?>">Select Drug
                            </button>
                </tr>
                  <?php  } } ?>
                
              </tbody>
            </table>
            <hr>
    
    <!-- <div class="content-wrapper"> -->
    <!-- <div class="container-fluid"> -->
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Selected Drug</a>
        </li>
        <li class="breadcrumb-item active">Selected Drug List</li>
      </ol>
     
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Drug ID</th>
                  <th>Drug Name</th>
                  <th>Pharmacy Name</th>
                  <th>Pharmacy Address</th>
                  <th>Contact Number</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $queryDrugList = "SELECT * FROM `tblselecteddrug`;";
                $Result = mysqli_query($dbConnect, $queryDrugList);
                if(!$Result){
                  echo "error while listing the list!";
                }else{
                  while ($row = mysqli_fetch_assoc($Result)) {
                    ?>
                <tr>
                  <td><?php echo $row['drugID'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['pharmacystore'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['phone'];?></td>
                  <td><?php echo $row['Quantity'];?></td>
                  <td>
                  <a class="btn btn-sm btn-danger" id="btnDelete" name="btnDelete" title="Select Drug" href="../process/deleteSelecteddrug.php?id=<?php echo $row['drugID'] ?>">Remove
                            </a>
                  </td>                 
                </tr>
                  <?php  } } ?>
                
              </tbody>

              </table>
            <div class= "col-md-12">
              <a name="btnPrint" class="btn btn-sm btn-primary btn-block" href="printdrug.php">Select Drug</a>
          </div>
              </div>

          </div>
        </div>
      </div>
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

    <form id="selectedDrug" name="selectedDrug">
  <div class="modal fade" id="drugModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content modal-col-danger">
        <div class="modal-header">
          <h4 class="modal-title" id="smallModalLabel">Select Drug</h4>
        </div>
        <div class="modal-body">
          <label class="control-label">Drug ID</label>
          <input type="text" class="form-control"  id="DrugID" name="DrugID" Readonly>
          <label class="control-label">Drug Name</label>
          <input type="text" class="form-control"  id="name" name="name" Readonly>
          <label class="control-label">Phamarcy Name:</label>
          <input type="text" class="form-control" id="pharmacystore" name="pharmacystore" Readonly>
          <label class="control-label">Pharmacy Address:</label>
          <input type="text" class="form-control" id="address" name="address" Readonly>
          <label class="control-label">Contact Number:</label>
          <input type="text" class="form-control" id="phone" name="phone" Readonly>
          <label class="control-label">Drug Quantity</label>
          <input type="Number" class="form-control" id="Quantity" name="Quantity">
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-Add">ADD</button>
          <button type="button" class="btn btn-default btn-confirm-close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form>


<!-- starts Here -->
<script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

<!-- Ends Here -->


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
    <script type="text/javascript">
      // for Selected Drug modal box
    $(document).ready(function(){
      $('#drugModal').on('show.bs.modal', function(e){
        var ItemId = $(e.relatedTarget).data('id');
          $.ajax({
            type : "POST", // type of action POST || GET
            dataType : 'json', // data type
            url: '../process/fetchSelectedDrug.php',
            data:  'ItemId='+ ItemId,
            success: function(data){
              console.log(data);
              $("#DrugID").val(data['drugID']);
              $("#name").val(data['name']);
              $("#pharmacystore").val(data['pharmacystore']);
              $("#address").val(data['address']);
              $("#phone").val(data['phone']);
              }
          });
        });

    $(document).on('click', '.btn-Add', function(ev){
      ev.preventDefault();
              var btn_button = $(this);
                var data = $("#selectedDrug").serialize();
                btn_button.html('<i class="fa fa fa-spinner fa-spin"></i> Processing...');
                btn_button.attr("disabled",true);
                $.post('../process/insertDrugToTempTable.php', data, function(data){
                  console.log("Data: "+data);
                  if( data == "1"){
                   btn_button.html('<i class="fa fa fa-check-circle "></i> Done');
                 
                    setTimeout(function(){  
                      $('#drugModal').modal('hide');
                      window.reload();
                      // window.location="druglist.php"; 
                    }, 2000);
                  }
                  else{
                    btn_button.html('Add').attr("disabled",false);
                  }
                });
                return false;
            });

      });
    </script>
  </div>
</body>

</html>
