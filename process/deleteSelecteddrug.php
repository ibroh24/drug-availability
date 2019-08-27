<?php include("../includes/auth.php");?>
<?php include("../includes/functions.php");?>
<?php
    if(isset($_GET['id'])){
        $NID = $_GET['id'];

        $qry = "DELETE  FROM tblSelecteddrug WHERE drugId ='$NID'";

        $result = runQuerry($dbConnect, $qry);

        if($result){
            header("location: ../doctor/druglist.php");
        }else{
            die("Unable to remove Selected Derug");
        }
    }
?>