<?php include("../includes/auth.php");?>
<?php include("../includes/functions.php");?>
<?php
	if ($_POST['ItemId']) {
		$DID = $_POST['ItemId'];

		$qry = "SELECT * FROM `tbldrug` WHERE drugID= '$DID' ";
		$returnresult= runQuerry($dbConnect, $qry);

		$res = mysqli_fetch_array($returnresult);
	 	echo json_encode($res);
	 }
?>