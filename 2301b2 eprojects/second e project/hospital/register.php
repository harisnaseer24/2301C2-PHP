<?php

require("./assets/database/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $rawPassword = mysqli_real_escape_string($connection, $_POST['password']);

    $password = password_hash($rawPassword, PASSWORD_DEFAULT);

    $picture = '';
    if ($_FILES['picture']['error'] == 0) {
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($_FILES['picture']['name']);
        $uploadOk = 1;

        if ($_FILES['picture']['size'] > 500000) {
            header("location: index.php?error=file_size");
            exit();
        }

        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            header("location: index.php?error=file_type");
            exit();
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
                $picture = basename($_FILES['picture']['name']);
            } else {
                header("location: index.php?error=file_upload");
                exit();
            }
        }
    }

    $sql = "INSERT INTO hospitalregister (`picture`, `Hospitalname`, `Hospital city`, `Hospitallocation`, `email`, `password`, `verification`) VALUES (?, ?, ?, ?, ?, ?, 'not verified by admin')";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssss", $picture, $name, $city, $location, $email, $password);
    

    if ($stmt->execute()) {
        header("location: login.php?success=1");
        exit();
    } else {
        header("location: register.php?error=" . $stmt->error);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Hospital Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register Your Hospital</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
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
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <!-- End of Hospital Add Form -->
                           <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
<script>
function validateForm() {
    var password = document.getElementsByName('password')[0].value;
    var confirmPassword = document.getElementsByName('confirmpassword')[0].value;

    if (password === '' || confirmPassword === '') {
        alert('Please fill in all fields.');
        return false;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    return true;
}
</script>


</body>
</html>