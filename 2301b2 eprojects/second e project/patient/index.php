<?php
require("./assets/database/config.php");

session_start();
if (isset( $_SESSION["user_id"] ))
{

?>



<!DOCTYPE html> 
<html lang="en">
	
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure - Home</title>
		
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
		<style>
    #carousel {
      width: 100%;
      overflow: hidden;
	  HEIGHT: 600PX;

    }

    #image-container {
      display: flex;
      
    }
    #image-container {
  width: 900px;
  overflow: ;
  height: 600px;
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
							<li class="active">
								<a href="index.php">Home</a>
							</li>
							<li class="">
								<a href="hospitals.php">Hospitals</a>
							</li>
							<li class="">
								<a href="vaccines.php">vaccines</a>
							</li>
							<li class="">
								<a href="Vaccination Appointment Form.php">Book Vaccination Appt </a>
							</li>
							<li class="">
								<a href="myappts.php">Your Vaccination Appt Status</a>
							</li>
							<li class="">
								<a href="reports.php">Vaccinations [Taken] Report </a>
							</li>
							<li class="">
								<a href="myprofile.php">My Profile</a>
							</li>
							
				
						
						</ul>		 
                        
					</div>		 
					<ul class="nav header-navbar-rht">
					
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="logout.php">logout</a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Home Banner -->
			<div id="carousel">
  <div id="image-container">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?HOSPITALS " alt="Image 1">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?DOCTOR " alt="Image 2">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?VACCINE " alt="Image 3">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?MEDICAL " alt="Image 4">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?CORONA " alt="Image 5">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?ambulance " alt="Image 6">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?NURSE " alt="Image 6">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?DOCTOR " alt="Image 6">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?PATIENT " alt="Image 6">
    <img class="carousel-image" src="https://source.unsplash.com/featured/?VACCINES " alt="Image 6">
  </div>
</div>

<script>
  const imageContainer = document.getElementById('image-container');

  setInterval(() => {
    imageContainer.style.transform = `translateX(-${100}%)`;

    setTimeout(() => {
      imageContainer.appendChild(imageContainer.firstElementChild);
      imageContainer.style.transition = 'none';
      imageContainer.style.transform = 'translateX(0)';
      setTimeout(() => {
        imageContainer.style.transition = 'transform 2s ease-in';
      });
    }, 1000);
  }, 2000);
</script>
		
								
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			     <div style="height: 30px; background-color:white;">
</div>
			<div class="intro-container">
    <h1 style="color:#028ee1;">Welcome to DocCure</h1>
    <p class="intro-text">
        DocCure is your dedicated partner in simplifying the process of scheduling your vaccination appointment. We strive to provide you and your loved ones with easy access to essential healthcare services. Our online platform ensures a seamless and user-friendly experience, enabling you to fill out your vaccination appointment form conveniently from the comfort of your home.
    </p>
    <p class="intro-text">
        Join us in our collective effort to build a healthier and safer community. DocCure empowers you to take proactive steps in managing your health through a secure and efficient system. We prioritize your convenience while upholding the highest standards of data privacy and security.
    </p>
    <p class="intro-text">
        Ready to initiate your vaccination journey? Click the button below to fill out your online vaccination appointment form now and contribute to a healthier future for all!
    </p>
    <a href="Vaccination Appointment Form.php" class="cta-button">Fill Appointment Form From Here Or Click On Book Vaccination Appt In Header </a>
</div>
<div style="height: 30px; background-color:white;">
</div>
			<!-- Footer -->
<footer class="footer">
    
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    
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
<?php
}
else{
	
	header("Location:login.php");
}
?>