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
							
							<li>
								<a href="admin/index.php" target="_blank">Admin</a>
							</li>
							<li>
								<a href="hospital/login.php" target="_blank">Hospital</a>
							</li>
							<li>
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
			
			<!-- Home Banner -->
			<div id="carousel">
			<div id="image-container">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?HOSPITALS " alt="Image 1">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?DOCTOR " alt="Image 2">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?VACCINE " alt="Image 3">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?MEDICAL " alt="Image 4">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?CORONA " alt="Image 5">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?ambulance " alt="Image 6">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?NURSE " alt="Image 6">
    <img class="carousel-image" style="  width: 900px;" src="https://source.unsplash.com/featured/?DOCTOR " alt="Image 6">
    <img class="carousel-image" style="  width: 900px;"src="https://source.unsplash.com/featured/?PATIENT " alt="Image 6">
    <img class="carousel-image" style="  width: 900px;"src="https://source.unsplash.com/featured/?VACCINES " alt="Image 6">
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
		
			<!-- /Home Banner -->
			<div class="intro-container">
        <h1 style=" color:#028ee1;">Welcome to DocCure</h1>
        <p class="intro-text">
            At DocCure, we are dedicated to simplifying the process of vaccination registration, ensuring that you and your loved ones have easy access to essential healthcare services. Our online platform offers a seamless and user-friendly experience, allowing you to register for vaccinations from the comfort of your home.
        </p>
        <p class="intro-text">
            As we collectively work towards building a healthier and safer community, DocCure empowers you to take proactive steps in managing your health. Our secure and efficient system prioritizes your convenience while maintaining the highest standards of data privacy and security.
        </p>
        <p class="intro-text">
            Ready to get started on your vaccination journey? Click the button below to register now and contribute to a healthier future for all!
        </p>
        <a href="patient/register.php" class="cta-button">Register Now</a>
    </div>
  
			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2> VACCINES</h2>
						<p class="sub-title" style="color:black;">Here on DocCure we provide you some of given below and all Vaccines through diffrent hospitals.Register yourself to explore more and to book your Vaccination Appointment online from home.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
							
														
								<!-- /Slider Item -->
								<!-- Slider Item -->
								<div class="speicality-item text-cent">
								<div class="specialty-img" style="position: center; height: 100px; width:100px; overflow: hidden; border-radius:220px;">
    <img src="https://source.unsplash.com/featured/?Pertussis " style="width: 100%; height: 100%; object-fit: cover;" alt="Specialty">
    <span style="position:width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"><i class="fa fa-circle" aria-hidden="true"></i></span>
</div>
	
									<p> (DTaP) Vaccine

</p>	
								</div>							
								<!-- /Slider Item -->
								<!-- Slider Item -->
								<div class="speicality-item text-center">
								<div class="specialty-img" style="position: relative; height: 100px; width:100px; overflow: hidden; border-radius:220px;">
    <img src="https://source.unsplash.com/featured/?Mumps,andRubella" style="width: 100%; height: 100%; object-fit: cover;" alt="Specialty">
    <span style="position:width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"><i class="fa fa-circle" aria-hidden="true"></i></span>
</div>
	
									<p>(MMR) Vaccine

</p>	
								</div>							
								<!-- /Slider Item -->
								<!-- Slider Item -->
											<!-- Slider Item -->
								<div class="speicality-item text-center">
								<div class="specialty-img" style="position: relative; height: 100px; width:100px; overflow: hidden; border-radius:220px;">
    <img src="https://source.unsplash.com/featured/?polio" style="width: 100%; height: 100%; object-fit: cover;" alt="Specialty">
    <span style="position:width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"><i class="fa fa-circle" aria-hidden="true"></i></span>
</div>
	
									<p>Polio Vaccine (IPV)

</p>	
								</div>							
								<!-- /Slider Item -->				
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
								<div class="specialty-img" style="position: relative; height: 100px; width:100px; overflow: hidden; border-radius:220px;">
    <img src="https://source.unsplash.com/featured/?corona" style="width: 100%; height: 100%; object-fit: cover;" alt="Specialty">
    <span style="position:width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"><i class="fa fa-circle" aria-hidden="true"></i></span>
</div>
	
									<p>Corona vaccine

</p>	
								</div>							
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								
								
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 						
								
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			<!-- Clinic and Specialities -->
			<!-- Popular Section -->
		
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