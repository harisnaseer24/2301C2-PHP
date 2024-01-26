<?php
session_start();

require("./assets/database/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginEmail = $_POST["email"];
    $loginPassword = $_POST["password"];

    $loginEmail = filter_var($loginEmail, FILTER_VALIDATE_EMAIL) ? $loginEmail : null;

    if ($loginEmail) {
        $loginEmail = $connection->real_escape_string($loginEmail);

        $sql = "SELECT * FROM `hospitalregister` WHERE `email` = '$loginEmail'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($loginPassword, $hashedPassword)) {
                $token = bin2hex(random_bytes(16));

                $sessionId = $row['user_id'] . "_" . $token;

                session_id($sessionId);
                session_start();

                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_email'] = $loginEmail;
                $_SESSION['Hospitalname'] = $row['Hospitalname'];

                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password.');</script>";
            }
        } else {
            echo "<script>alert('User not found.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email.');</script>";
    }
}

$connection->close();
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Hospital Login</title>
		
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
								<h1>Login Hospital</h1>
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
							<div class="text-center dont-have">Don’t have an account? <a href="register.php">Register</a></div>
							</div>
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