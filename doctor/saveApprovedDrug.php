<?php include("../includes/auth.php");?>
<?php include("../includes/dbconnection.php");?>
<?php $username = $_SESSION['username'];?>
<?php
if (isset($_POST['print'])){
    $DoctorsName = mysqli_real_escape_string($dbConnect, $_POST['doctorsName']);
    $PatientName = mysqli_real_escape_string($dbConnect, $_POST['patientName']);
    $DrugName = mysqli_real_escape_string($dbConnect, $_POST['drugName']);
    $DrugDecription = mysqli_real_escape_string($dbConnect, $_POST['description']);
    $PharmacyNumber = mysqli_real_escape_string($dbConnect, $_POST['pharmNum']);
    $storeName = mysqli_real_escape_string($dbConnect, $_POST['pharmName']);
    $storeAddress = mysqli_real_escape_string($dbConnect, $_POST['pharmAdd']);
    $DrugPrice = mysqli_real_escape_string($dbConnect, $_POST['price']);


    $qry ="INSERT INTO `tblApprovedDrug`(`DoctorsName`, `PatientName`, `DrugName`, `DrugDescription`, `PharmacyNumber`, `StoreName`, `StoreAddress`, `DrugPrice`) VALUES 
    ('$DoctorsName','$PatientName','$DrugName','$DrugDecription','$PharmacyNumber','$storeName','$storeAddress','$DrugPrice')";

    $result = mysqli_query($dbConnect, $qry) or die ("data cannot be save".mysqli_error($dbConnect));

    $row = mysqli_fetch_assoc($result);

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Drug</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Doctor's Name</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['DoctorsName']; ?></td>
            </tr>
        </tbody>

        <thead class="thead-light">
            <tr>
                <th>Patient's Name</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['PatientName']; ?></td>
            </tr>
        </tbody>

        <thead class="thead-light">
            <tr>
                <th>Drug Name</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['Drug Name']; ?></td>
            </tr>
        </tbody>
        
        <thead class="thead-light">
            <tr>
                <th>Drug Description</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['DrugDescription']; ?></td>
            </tr>
        </tbody>

        <thead class="thead-light">
            <tr>
                <th>Pharmacy Number</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['PharmacyNumber']; ?></td>
            </tr>
        </tbody>

        <thead class="thead-light">
            <tr>
                <th>Pharamcy Name</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['StoreName']; ?></td>
            </tr>
        </tbody>

        <thead class="thead-light">
            <tr>
                <th>Pharmacy Address</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['StoreAddress']; ?></td>
            </tr>
        </tbody>

        <thead class="thead-light">
            <tr>
                <th>Drug Price</th>
                </tr>
                </thead>
                <tbody>
            <tr>
                <td><?php echo $row['DrugPrice']; ?></td>
            </tr>
        </tbody>

    </table>
</body>
</html>