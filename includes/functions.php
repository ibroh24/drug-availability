<?php include("../includes/dbconnection.php");?>
<?php
	function confirmQuerry($dbConnect,$resultSet){
		if(!$resultSet){
			echo mysqli_error($dbConnect);
		}
	}

	function runQuerry($dbConnect, $querry){
		$result = mysqli_query($dbConnect, $querry);
		confirmQuerry($dbConnect, $result);
		return $result;
	}

?>