<?php
require("./assets/database/config.php");
session_start();

if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $rawPassword = mysqli_real_escape_string($connection, $_POST['password']);

        $password = password_hash($rawPassword, PASSWORD_DEFAULT);

        $picture = '';

        if ($_FILES['picture']['error'] == 0) {
            $targetDir = 'C:/xampp/htdocs/second e project/hospital/uploads/';

            $targetFile = $targetDir . basename($_FILES['picture']['name']);
            $uploadOk = 1;

            if ($_FILES['picture']['size'] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedTypes)) {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
                    $picture = basename($_FILES['picture']['name']);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    exit();
                }
            }
        }

        // Set the default value for verification to 'verified'
        $verification = 'verified';

        $sql = "INSERT INTO `hospitalregister` (`picture`, `Hospitalname`, `Hospital city`, `Hospitallocation`, `email`, `password`, `verification`) VALUES ('$picture', '$name', '$city', '$location', '$email', '$password', '$verification')";

        if ($connection->query($sql) === TRUE) {
            echo "Hospital added successfully!";
            header("location: hospitals.php");
            exit();
        } else {
            echo "Error adding hospital: " . $connection->error;
            exit();
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Add Hospital - Doccure</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
        }

        .main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
        }

        .card-body {
            text-align: center;
        }

        .form-group {
            text-align: left;
        }

        button[type="submit"] {
            width: 100%;
        }
    </style>
</head>

<body style="
            font-family: Arial, sans-serif;
            background-image: url(https://source.unsplash.com/featured/?hospitals);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;"
        >
    <!-- Main Wrapper -->
   
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="page-title">Add Hospital</h3>
                <!-- Hospital Add Form -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="picture">Hospital Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                    </div>
                    <div class="form-group">
                        <label for="name">Hospital Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Hospital</button>
                </form>
                <!-- End of Hospital Add Form -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html><?php
} else {
    header("location:login.php");
    exit();
}?>