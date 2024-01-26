
<?php
require("./assets/database/config.php");
session_start();
if(isset($_SESSION['isadmin'])&& $_SESSION['isadmin']==true)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Delete Vaccine - Doccure</title>

 <!-- Favicon -->
 <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feathericon.min.css">

<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">

<!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body><?php
require("./assets/database/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vaccine_id = $_POST['vaccine_id'];

    $sql = "DELETE FROM vaccines WHERE vaccine_id = $vaccine_id";

    if ($connection->query($sql) === TRUE) {
        echo "Vaccine deleted successfully!";
        header("location: vaccines.php"); 
        exit();
    } else {
        echo "Error deleting vaccine: " . $connection->error;
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

?>
<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
</body>	
</html>