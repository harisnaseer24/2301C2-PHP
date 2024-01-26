<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database connection details
    $db_host = "localhost";
    $db_name = "vacination1";
    $db_user = "root";
    $db_password = "";

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO `contact us` (`Name`, `Email`, `Suggestions`) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html> 
<html lang="en">
	
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
						<a href="index.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li >
								<a href="index.php">Home</a>
							</li>
							
							<li>
								<a href="admin/index.php" target="_blank">Admin</a>
							</li>
							<li>
								<a href="hospital/login.php" target="_blank">Hospital</a>
							</li>
							<li class="active">
								<a href="contact us.php" target="_blank">Contact Us</a>
							</li>
						
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +92 3012119368</p>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="patient/login.php">login / Register </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
            <div class="main-wrapper login-body" style="min-height:70vh;">
   <div style="height: 120px;">




   </div>
	<div class="main-wrapper contact-us-body">
    <div class="contact-us-wrapper">
        <div class="container" style="min-height: 70vh;">
            <div class="contact-us-box">
                <div class="contact-us-left">
                    <img class="img-fluid" src="assets/img/logo.png" alt="Logo">
                </div>
                <div class="contact-us-right">
                    <div class="contact-us-right-wrap">
                        <h1>Contact Us</h1>
                        <p class="account-subtitle">Feel free to reach out to us</p>

                        <!-- Contact Us Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Your Message/Suggestions" required></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                        <!-- /Contact Us Form -->

                       

                        <div class="text-center dont-have">Would you like to go back? <a href="index.php">Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
										<img src="assets/img/footer-logo.png" alt="logo">
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
										
										<li><a href="patient/login.php"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="patient/register.php"><i class="fas fa-angle-double-right"></i> Register</a></li>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Hospital</h2>
									<ul>
										<li><a href="hospital/bookings.php"><i class="fas fa-angle-double-right"></i> Appointments</a></li>
										
										<li><a href="hospital/index.php"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="hospital/register.php"><i class="fas fa-angle-double-right"></i> Register</a></li>
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
											+1 315 369 5943
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