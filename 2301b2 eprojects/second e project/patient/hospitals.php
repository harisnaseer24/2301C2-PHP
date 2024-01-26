
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
		<title>Doccure - Hospitals</title>
		
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
	  HEIGHT: 500PX;

    }

    #image-container {
      display: flex;
      
    }

    .carousel-image {
	  HEIGHT: 500PX;
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
							<li class="">
								<a href="index.php">Home</a>
							</li>
							<li class="active">
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
								<a href="reports.php">Vaccinations [Taken] Report</a>
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
            <div style="height: 80px;">
</div>

<!-- Page Wrapper -->
<div class="page-wrapper"style="min-height: 70vh;">
                <div class="content container-fluid">
				
		<?PHP
$sql = "SELECT * FROM `hospitalregister` where `verification` = 'verified' ";
$result = $connection->query($sql);

		?>
		<!-- table -->
		<div class="row">
		<div class="col-sm-12">
			<div class="card">
			<div class="card-header text-center">
                <h1>HOSPITALS</h1>
</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Hospital Name</th>
									<th>Hospital email</th>
									<th>picture</th>
									<th>Hospital city</th>
									<th>Hospital location</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										$picture=	$row["picture"];
										echo '<tr>';
										echo '<td>' . $row["Hospitalname"] . '</td>';
										echo '<td>' . $row["email"] . '</td>';
										echo '<td><img src="/second e project/hospital/uploads/'.$picture.'" height="100px" width="100px" alt="000"></td>';
										echo '<td>' . $row["Hospital city"] . '</td>';
										echo '<td>' . $row["Hospitallocation"] . '</td>';
									
										echo '</tr>';
									}
								} else {
									echo '<tr><td colspan="4">No data available</td></tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
<!-- table end  -->
			<!-- Footer -->
<footer class="footer" style="min-height: 48vh;">
    
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