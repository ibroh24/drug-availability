<?php include("../includes/auth.php");?>
<?php include("../includes/functions.php");?>

<?php
$fields = implode(",", array_keys($_POST));
$newdata = "'" . implode("','", $_POST) . "'";


$qry = "SELECT * FROM tblselecteddrug WHERE($fields) = ('" . implode("','", $_POST) . "')";

$returnRes= runQuerry($dbConnect,$qry);
$count = mysqli_num_rows($returnRes);

if($count == 1){?>
<script>alert("Drug Already Added")</script>
<?php
}else{
$query = "INSERT INTO tblselecteddrug ($fields) VALUES ('" . implode("','", $_POST) . "')";

		$result = runQuerry($dbConnect,$query);
		if ($result) {
			echo "1";
		}else{
			echo "0";
		}
	}

?>