<?php
require("./assets/database/config.php");
session_start();
if(isset($_SESSION['isadmin'])&& $_SESSION['isadmin']==true){


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vaccineName = $_POST["vaccine_name"];
    $stock = $_POST["stock"];
    $description = $_POST["description"];

    $uploadsDirectory = 'uploads/';
    $uploadedFile = $_FILES['picture']['tmp_name'];
    $uploadedFileName = $_FILES['picture']['name'];
    $targetPath = $uploadsDirectory . $uploadedFileName;

    move_uploaded_file($uploadedFile, $targetPath);

    if (!file_exists($targetPath)) {
        echo "Error uploading picture.";
        exit();
    }

    $sql = "INSERT INTO `vaccines` (`vaccine_name`, `picture`, `stock`, `description`) VALUES ('$vaccineName', '$targetPath', '$stock', '$description')";

    if ($connection->query($sql) === TRUE) {
        header("location:vaccines.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Add Vaccines - Doccure</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    
</head>

<body style="
            font-family: Arial, sans-serif;
            background-image: url(https://source.unsplash.com/featured/?vaccines);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;"
        >
    <!-- Main Wrapper -->
    <div class="main-wrapper">


        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
               


                <!-- Add Vaccines Form -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="page-title" style="text-align:center;">Add Vaccines</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="vaccine_name">Vaccine Name</label>
                                        <input type="text" class="form-control" id="vaccine_name" name="vaccine_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" id="stock" name="stock" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">Picture</label>
                                        <input type="file" class="form-control-file" id="picture" name="picture" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Vaccine</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Vaccines Form -->
            </div>
        </div>
        <!-- /Page Wrapper -->

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

<?php
} else {
    header("location:login.php");
    exit();
}?>