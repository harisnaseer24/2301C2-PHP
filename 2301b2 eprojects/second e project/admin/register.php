<?php
require("./assets/database/config.php");
session_start();
if(isset($_SESSION['isadmin'])&& $_SESSION['isadmin']==true){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $uploadDir = "uploads/";
    $fileName = $_FILES["file"]["name"];
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
        $sql = "INSERT INTO `adminregister` (`picture`, `name`, `email`, `password`) VALUES ('$filePath', '$name', '$email', '$hashedPassword')";

        if ($connection->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Error: " . $sql . "\\n" . $connection->error . "');</script>";
        }
    } else {
        echo "<script>alert('File upload failed.');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Admin Register</title>
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
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                <label for="profilePicture">Profile Picture:</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <div class="form-group mb-0">
                <button class="btn btn-primary btn-block" type="submit">Register</button>
            </div>
        </form>

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
    var confirmPassword = document.getElementsByName('confirmPassword')[0].value;

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

<script>
function ok() {
    return true;
}
</script>

</body>
</html>
<?php
}else{
	header("location:login.php");
}


?>


							
