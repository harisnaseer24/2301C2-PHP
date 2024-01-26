<?php
session_start();

require("./assets/database/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT `id`, `picture`, `patient_name`, `email`, `password` FROM `patientregister` WHERE `email` = '$email';";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["patient_name"];
        $_SESSION["user_picture"] = $row["picture"];

        echo "<script>alert('Login successful'); window.location = 'index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}

$connection->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>
    
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
		<![endif]-->
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
		<div class="main-wrapper" >
		
			<!-- <--Header --> 
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

                        <li class="nav-item" style="margin-top:20%;">
							<a class="nav-link header-login" href="register.php">Register </a><br>
						</li>
							
    </ul>
				</nav>
			</header>
			<!-- /Header -->
            <div style="height: 115px;">
</div>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container"style="min-height: 70vh;">
            <div class="loginbox">
            
                <div class="login-right">
                    <div class="login-right-wrap">
					<div class="contact-us-left">
                    <img class="img-fluid" src="../assets/img/logo.png" alt="Logo">
                </div>
                        <h1>Login Patient</h1>
                        <p class="account-subtitle">Access to our vaccination services</p>

                        <!-- Login Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                            </div>
                        </form>
                        <!-- /Login Form -->

                        <?php if (isset($loginError)): ?>
                            <div class="text-danger"><?php echo $loginError; ?></div>
                        <?php endif; ?>

                        <div class="text-center dont-have">Don’t have an account? <a href="register.php">Register</a></div>
                        <a class="nav-link header-login" href="../index.php">Go To Main Page</a>

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
										
										<li><a  href="../hospital/bookings.php"><i class="fas fa-angle-double-right"></i>Appointments</a></li>
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
											+92 3012119368
										</p>
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
		   
	   </div>
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