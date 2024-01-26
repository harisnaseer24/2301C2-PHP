<?php
require("./assets/database/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST["patientname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($patientName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION["error"] = "Please fill in all fields.";
        header("Location: register.php");
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION["error"] = "Passwords do not match.";
        header("Location: register.php");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($_FILES["file"]["name"])) {
        $uploadsFolder = "uploads/";
        $profilePicture = $uploadsFolder . basename($_FILES["file"]["name"]);

        move_uploaded_file($_FILES["file"]["tmp_name"], $profilePicture);
    } else {
        $profilePicture = "";
    }

    $sql = "INSERT INTO `patientregister`(`picture`, `patient_name`, `email`, `password`) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $profilePicture, $patientName, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION["success"] = "Registration successful!";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION["error"] = "Registration failed. Please try again.";
        header("Location: register.php");
        exit();
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Register</title>
   <!-- Favicons -->
		<link type="image/x-icon" href="../assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="../assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->  <style>
        .error-message {
            color: #dc3545;
            margin-top: 5px;
        }
    </style>
<body>
		<style>
    #carousel {
      width: 100%;
      overflow: hidden;
	  HEIGHT: 500PX;

    }

    #image-container {
      display: flex;
      
    }

    .carousel-image {
	  HEIGHT: 500PX;
	  width: 100%;
    }
	
	.intro-container {
            height: 300px;
            background-color: white;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .intro-text {
            max-width: 80%;
            line-height: 1.5;
        }

        .cta-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #fff;
            color:  #028ee1;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #e0e0e0;
        }
  </style>
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg header-nav">

					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="../index.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="../index.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
                        <ul class="nav header-navbar-rht">

                        <li class="nav-item">
							<a class="nav-link header-login" href="login.php">Login </a>
						</li>
							
    </ul>
						
						</ul>		 
					
				</nav>
			</header>
			<!-- /Header -->
<!-- form -->
<div style="height: 95px;">
</div>
<div class="main-wrapper login-body" style="margin-bottom:10px;">
    <div class="login-wrapper">
        <div class="container " style="min-height: 70vh;">
            <div class="loginbox">
           
                <div class="login-right">
                    <div class="login-right-wrap">
                    <div class="contact-us-left">
                    <img class="img-fluid" src="../assets/img/logo.png" alt="Logo">
                </div>
                        <h1>Register Yourself</h1>
                        <p class="account-subtitle">Access to our vaccination services</p>
                        <div class="container mt-5">
    <form id="registrationForm" action="register.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="patientname">Patient Name:</label>
            <input type="text" class="form-control" id="patientname" name="patientname" required>
            <div class="error-message" id="nameError"></div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="error-message" id="emailError"></div>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="error-message" id="passwordError"></div>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            <div class="error-message" id="confirmPasswordError"></div>
        </div>

        <div class="form-group">
            <label for="file">Profile Picture:</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
</div>
<a class="nav-link header-login" href="../index.php">Go To Main Page</a>


<!-- Add Bootstrap JS and Popper.js for form validation -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        let isValid = true;

        let patientName = document.getElementById("patientname").value.trim();
        if (patientName === "") {
            isValid = false;
            document.getElementById("nameError").innerText = "Please enter patient name.";
        } else {
            document.getElementById("nameError").innerText = "";
        }

        let email = document.getElementById("email").value.trim();
        if (email === "") {
            isValid = false;
            document.getElementById("emailError").innerText = "Please enter email.";
        } else {
            document.getElementById("emailError").innerText = "";
        }

        let password = document.getElementById("password").value;
        if (password === "") {
            isValid = false;
            document.getElementById("passwordError").innerText = "Please enter password.";
        } else {
            document.getElementById("passwordError").innerText = "";
        }

        let confirmPassword = document.getElementById("confirmPassword").value;
        if (confirmPassword === "") {
            isValid = false;
            document.getElementById("confirmPasswordError").innerText = "Please confirm password.";
        } else if (confirmPassword !== password) {
            isValid = false;
            document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
        } else {
            document.getElementById("confirmPasswordError").innerText = "";
        }

        if (!isValid) {
            event.preventDefault(); 
        }
    });
</script>	   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- form end  -->
	<!-- Footer -->
    <footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="../assets/img/footer-logo.png" alt="logo">
									</div>
								  
                        <div class="footer-about-content">
                            <p>
                                DocCure simplifies vaccination appointments for you and your loved ones. Easily schedule appointments online from the comfort of your home.
                            </p>
                            <p>
                                Join us in building a healthier community. DocCure empowers you with a secure and efficient system, prioritizing your health and privacy.
                            </p>
                           
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="https://www.who.int/" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="https://www.who.int/" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="https://www.who.int/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/nihgov/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.who.int/" target="_blank"><i class="fab fa-dribbble"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                    
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										
										<li><a href="login.php"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="register.php"><i class="fas fa-angle-double-right"></i> Register</a></li>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Hospital</h2>
									<ul>
										<li><a href="../hospital/bookings.php"><i class="fas fa-angle-double-right"></i> Appointments</a></li>
										
										<li><a href="../hospital/index.php"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="../hospital/register.php"><i class="fas fa-angle-double-right"></i> Register</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
                                            +92 3012119368										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											Moshinaptech222@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				
			</footer>
			<!-- /Footer -->
		   
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

</html>