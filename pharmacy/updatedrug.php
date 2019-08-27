<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php"); ?>
<?php

// Edit Drug 
if(isset($_POST['updatedrug'])){
    $drugID = $_POST['drugID'];
    $drugName = $_POST['drugName'];
    $Description = $_POST['description'];
    $price = $_POST['price'];
  
  
    $updateQuery = "UPDATE `tbldrug` SET name='$drugName', description ='$Description', price = '$price' WHERE drugID = '$drugID';"; 
    $updateResult = mysqli_query($dbConnect, $updateQuery);
    // or die ("cant delete from database!");  
  
    if(!$updateResult){
      echo "cant delete from database!";
    }else{
      header("Location: pharmacypage.php");
    }
  }

?>