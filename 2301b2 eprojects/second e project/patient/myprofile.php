<?php

session_start();
if (isset( $_SESSION["user_id"] ))
{$user_id=$_SESSION["user_id"]


?>



<!DOCTYPE html> 
<html lang="en">
	
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure - My Profile</title>
		
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
         .print-button {
        position: absolute;
        top: 885px;
        right: 9px;
        z-index: 1000; 
    } 
   .print-record {
            page-break-before: always;
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
							<li class="active">
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
			<!-- header end -->
    <div class="main-wrapper">
        
	<!-- profile -->

        <div style="height: 80px; background-color:white;"></div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <?php
                $mysqli = new mysqli("localhost", "root", "", "vacination1");

                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                $query = "SELECT `id`, `picture`, `patient_name`, `email` FROM `patientregister` WHERE `id`= '$user_id'";

                $result = $mysqli->query($query);

                if (!$result) {
                    die("Query failed: " . $mysqli->error);
                }
                ?>

                <div class="colum" style="min-height:70vh;">
                    <div class="col-sm-12">
                        <div id="print-content">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h1>Parent's Information</h1>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Picture</th>
                                                    <th>Patient Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
													$picturePath = "../patient/" . $row['picture'];
													?>
                                                    <tr>
                                                        <td><?= $row['id'] ?></td>
                                                        <td><img src="<?= $picturePath ?>" alt="Patient Picture" height="100px" width="100px"></td>
                                                        <td><?= $row['patient_name'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
    

            <div class="content container-fluid">
                <?php
                $mysqli = new mysqli("localhost", "root", "", "vacination1");

                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                $query = "SELECT `Child Name`, `date of birth`, `Vaccine`, `preferred_time`, `status`, `patientid` FROM `vaccination_appointments` WHERE `patientid`= '$user_id'";

                $result = $mysqli->query($query);

                if (!$result) {
                    die("Query failed: " . $mysqli->error);
                }
                ?>

                <div class="colum" style="min-height:70vh;">
                    <div class="col-sm-12">
                        <div id="print-content">
                            <div class="card">
                            <div id="print-content">
            
                                <div class="card-header text-center">
                                    <h1>Child's Vaccination & Appointments Details</h1>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center table-bordered mb-0">
                                            <thead>
                                                <tr>
												<th>Parent's Id</th>
                                                    <th>Child Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Date & Time Of Vaccination</th>
                                                    <th>Vaccine Name</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        
                                                        <td><?= $row['patientid'] ?></td>
                                                        <td><?= $row['Child Name'] ?></td>
                                                        <td><?= $row['date of birth'] ?></td>
                                                        <td><?= $row['preferred_time'] ?></td>
                                                        <td><?= $row['Vaccine'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                    </tr>
                                                <?php
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

                     
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $mysqli->close();
        ?>


<!-- profile end -->

											</div>
											</div>
											</div>
											</div>
											</div>
											</div>
											</div>


                                            <div class="print-button">
                        <button onclick="printTable()" class="btn btn-primary">Print </button>
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
        <script>
    function printTable() {
        var printContent = document.getElementById('print-content').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;

        window.print();

        document.body.innerHTML = originalContent;
    }
</script>
	</body>

</html>
<?php
}
else{
	
	header("Location:login.php");
}
?>