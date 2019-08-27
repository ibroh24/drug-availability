<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php"); ?>
<?php 

//Delete Drug 
  if(isset($_POST['deletedrug'])){
    $drugID = $_POST['drugID'];

    $deleteQuery = "DELETE FROM `tbldrug` WHERE drugID = '$drugID';"; 
    $deleteResult = mysqli_query($dbConnect, $deleteQuery);
    // or die ("cant delete from database!");  

    if(!$deleteResult){
      echo "cant delete from database!";
    }else{
      header("Location: pharmacypage.php");
    }
 }
?>