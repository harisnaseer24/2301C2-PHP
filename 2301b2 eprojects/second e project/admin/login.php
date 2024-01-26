<?php
require("./assets/database/config.php");

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Email and password are required.');</script>";
    } else {
        $query = "SELECT * FROM adminregister WHERE email = '$email'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Check if user exists
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];

                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['isadmin'] = true;
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<script>alert('Incorrect password.');</script>";
                }
            } else {
                echo "<script>alert('User not found.');</script>";
            }
        } else {
            echo "<script>alert('Login failed. Please try again.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Admin Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login Admin</h1>
								<p class="account-subtitle">Access to our dashboard</p>
							
    <form action="" method="post" onsubmit="">
        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </div>
    </form>

							
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery --><script>
function validateLoginForm() {
    var email = document.getElementsByName('email')[0].value;
    var password = document.getElementsByName('password')[0].value;

    if (email === '' || password === '') {
        alert('Please fill in all fields.');
        return false;
    }

    return true;
}
</script>

        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>