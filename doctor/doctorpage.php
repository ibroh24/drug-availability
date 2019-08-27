<?php include("../includes/auth.php");?>
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Health and Medical News </div>
        <div class="card-body">

  <!-- medical news -->
        <hr class="bg-primary">
        <!-- <hr class="bg-primary"> -->
        
        <div class="jumbotron">
        <!-- <img class="img-fluid" src="../img/jointdoc.jpg" alt="drug" height="120px" width="20px"> -->
        <h3 class="text-center text-danger">Medical Headline News</h3>
        </div>
        <!-- <hr class="bg-primary"> -->
        <hr class="bg-primary"> 
        <div class="jumbotron">
        <div class="row">
        <div class="col-md-4">
        <h5>Appeal to NCSBN to Approve An NCLEX Test Center in Africa (Nigeria) for Nurses</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>In trying to build our case on why we deserve a test center in Nigeria, Nursingworld Nigeria reviewed the statistical data 
        NCSBN provides annually on its website on candidate performances on the NCLEX RN exam[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=appeal-to-ncsbn-to-approve-an-nclex-test-center-in-africa-nigeria-for-nurses#.XGmNEOhKjDc" class="btn btn-primary">Read More </a>
        </div>
          
        <div class="col-md-4">
        <h5>Trump In Very Good Health Overall But Obese, According To Physical Exam Results</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>President Donald Trump, 72, is in "very good health overall," according to results from his physical examination, 
        which were released on Thursday.   Trump underwent a physical examination at the Walt[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=trump-in-very-good-health-overall-but-obese-according-to-physical-exam-results" class="btn btn-primary">Read More </a>
        </div>

        <div class="col-md-4">
        <h5>Court convicts man for exporting hard drug to Malaysia</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>A Federal High Court in Lagos has convicted a drug dealer, Mba Ebere, for exporting for exporting 
        280 grams of methamphetamine (a hard drug) to Malaysia.   Justice Mojisola Olatoregun convicted Ebere after fin[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=court-convicts-man-for-exporting-hard-drug-to-malaysia" class="btn btn-primary">Read More </a>
        </div>
        </div>
<hr>
        <hr>

        <div class="row">
        <div class="col-md-4">
        <h5>CMD seeks support for cancer patients</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>Chief Medical Director of the Federal Teaching Hospital, Ido Ekiti, Dr Adekunle Ajayi, has urged well-meaning Nigerians to 
        come to the aid of cancer patients, in view of the high cost of treatment.   Ajayi sai[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=cmd-seeks-support-for-cancer-patients" class="btn btn-danger">Read More </a>
        </div>
          
        <div class="col-md-4">
        <h5>PCN pledges to sanitise pharmaceutical industry</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>The Pharmacists Council of Nigeria (PCN) says it will redouble efforts to rid the 
        country’s pharmaceutical industry of unwholesome practices.</p>
        <a target="_blank" href="https://www.today.ng/news/nigeria/pcn-pledges-sanitise-pharmaceutical-industry-170811" class="btn btn-danger">Read More </a>
        </div>

        <div class="col-md-4">
        <h5>Federal government seeks review of pharmacy curriculum</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>In its quest to reduce the high rate of drug importation in the country, the Federal Government has said there is need to revise the curriculum 
        on pharmacy to one that trains future pharmacists to become entrepreneurs, producers as well as manufacturers.</p>
        <a target="_blank" href="https://www.today.ng/news/nigeria/federal-government-seeks-review-pharmacy-curriculum-142300" class="btn btn-danger">Read More </a>
        </div>
        </div>

        <hr>

        <div class="row">
        <div class="col-md-4">
        <h5>Appeal to NCSBN to Approve An NCLEX Test Center in Africa (Nigeria) for Nurses</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>In trying to build our case on why we deserve a test center in Nigeria, Nursingworld Nigeria reviewed the statistical data 
        NCSBN provides annually on its website on candidate performances on the NCLEX RN exam[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=appeal-to-ncsbn-to-approve-an-nclex-test-center-in-africa-nigeria-for-nurses#.XGmNEOhKjDc" class="btn btn-primary">Read More </a>
        </div>
          
        <div class="col-md-4">
        <h5>Trump In Very Good Health Overall But Obese, According To Physical Exam Results</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>President Donald Trump, 72, is in "very good health overall," according to results from his physical examination, 
        which were released on Thursday.   Trump underwent a physical examination at the Walt[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=trump-in-very-good-health-overall-but-obese-according-to-physical-exam-results" class="btn btn-primary">Read More </a>
        </div>

        <div class="col-md-4">
        <h5>Court convicts man for exporting hard drug to Malaysia</h5>
        <span>On 15th/Feb/2019</span>
        <br>
        <br>
        <p>A Federal High Court in Lagos has convicted a drug dealer, Mba Ebere, for exporting for exporting 
        280 grams of methamphetamine (a hard drug) to Malaysia.   Justice Mojisola Olatoregun convicted Ebere after fin[...]</p>
        <a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=court-convicts-man-for-exporting-hard-drug-to-malaysia" class="btn btn-primary">Read More </a>
        </div>
        </div>

        <hr>

<div class="row">
<div class="col-md-4">
<h5>CMD seeks support for cancer patients</h5>
<span>On 15th/Feb/2019</span>
<br>
<br>
<p>Chief Medical Director of the Federal Teaching Hospital, Ido Ekiti, Dr Adekunle Ajayi, has urged well-meaning Nigerians to 
come to the aid of cancer patients, in view of the high cost of treatment.   Ajayi sai[...]</p>
<a target="_blank" href="https://www.medicalworldnigeria.com/read.php?year=2019&month=02&slug=cmd-seeks-support-for-cancer-patients" class="btn btn-danger">Read More </a>
</div>
  
<div class="col-md-4">
<h5>PCN pledges to sanitise pharmaceutical industry</h5>
<span>On 15th/Feb/2019</span>
<br>
<br>
<p>The Pharmacists Council of Nigeria (PCN) says it will redouble efforts to rid the 
country’s pharmaceutical industry of unwholesome practices.</p>
<a target="_blank" href="https://www.today.ng/news/nigeria/pcn-pledges-sanitise-pharmaceutical-industry-170811" class="btn btn-danger">Read More </a>
</div>

<div class="col-md-4">
<h5>Federal government seeks review of pharmacy curriculum</h5>
<span>On 15th/Feb/2019</span>
<br>
<br>
<p>In its quest to reduce the high rate of drug importation in the country, the Federal Government has said there is need to revise the curriculum 
on pharmacy to one that trains future pharmacists to become entrepreneurs, producers as well as manufacturers.</p>
<a target="_blank" href="https://www.today.ng/news/nigeria/federal-government-seeks-review-pharmacy-curriculum-142300" class="btn btn-danger">Read More </a>

</div>
</div>
<hr>
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
