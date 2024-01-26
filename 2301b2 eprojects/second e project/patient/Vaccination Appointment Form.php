<?php
require("./assets/database/config.php");

session_start();
if (isset( $_SESSION["user_id"] ))
{ $patientid=$_SESSION["user_id"];
    $pattientname=$_SESSION["user_name"];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parentName = $_POST['parent_name'];
    $phoneNumber = $_POST['phone_number'];
    $parentEmail = $_POST['parent_email'];
    $childName = $_POST['child_name'];
    $dateOfBirth = $_POST['date_of_birth'];
    $vaccine = $_POST['vaccine'];

    $uploadsDirectory = 'uploads/'; 
    $childPicture = '';

    if (!empty($_FILES['child_picture']['name'])) {
        $targetFile = $uploadsDirectory . basename($_FILES['child_picture']['name']);
        $uploadSuccess = move_uploaded_file($_FILES['child_picture']['tmp_name'], $targetFile);

        if ($uploadSuccess) {
            $childPicture = $targetFile;
        } else {
            die('File upload failed');
        }
    }

    $preferredTime = $_POST['preferred_time'];
    $hospital = $_POST['hospital'];
    $status = 'pending';  


    $query = "INSERT INTO `vaccination_appointments`(`parent_name`, `phone_number`, `parent_email`, `Child Name`, `date of birth`, `Vaccine`,  `preferred_time`, `hospital`, `status`, `patientid`) VALUES ('$parentName', '$phoneNumber', '$parentEmail', '$childName', '$dateOfBirth', '$vaccine', '$preferredTime', '$hospital', '$status', '$patientid')";


    if ($connection->query($query) === TRUE) {
        echo "Record inserted successfully";
        header('Location: index.php');
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Vaccination Appointment Form </title>
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
<style>
    .navbar-header{margin: bottom 30px;}
</style>
<body>			<!-- Header -->
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
							<li class="active">
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
			
            <div style="height: 95px;">
</div>
<!-- form -->
<div class="main-wrapper login-body"  style="min-height: 70vh">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                    <h2>Vaccination Appointment Form</h2>
    
                    <form id="vaccinationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" novalidate>
        <div class="form-group">
     
            <label for="parentName">Parent Name:</label>
            <input type="text" class="form-control" id="parentName" name="parent_name" required>
        </div>

        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phone_number" required>
        </div>

        <div class="form-group">
            <label for="parentEmail">Parent Email:</label>
            <input type="email" class="form-control" id="parentEmail" name="parent_email" required>
        </div>

        <div class="form-group">
            <label for="childName">Child Name:</label>
            <input type="text" class="form-control" id="childName" name="child_name" required>
        </div>

        <div class="form-group">
            <label for="dateOfBirth">Date of Birth:</label>
            <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" required>
        </div>

        <div class="form-group">
        <label for="vaccine">Vaccines:</label>

        <select class="form-control my-3"  name="vaccine" id="vaccine" placeholder="Select Vaccine">
    <option value="" selected disabled>Select Vaccine</option>
    <?php 
    
    $query1="SELECT * FROM `vaccines` where `stock` = 'Available';";
    $result1=mysqli_query($connection, $query1) or die("failed to execute");
    if(mysqli_num_rows($result1) > 0){
        while($row1=mysqli_fetch_assoc($result1)){
            ?>
            <option value="<?=$row1['vaccine_name']?>"><?=$row1['vaccine_name']?></option>
              
            <?php
        }
    }
    
    ?></select> </div>

        <div class="form-group">
        <label for="hospital">Hospital:</label>

        <select class="form-control my-3"  name="hospital" id="hospital" placeholder="Select Hospital">
    <option value="" selected disabled>Select Hospital</option>
    <?php 
    
    $query1="SELECT `picture`, `Hospitalname`, `Hospital city`, `Hospitallocation`, `email` FROM `hospitalregister` WHERE `verification` = 'verified'";
    $result1=mysqli_query($connection, $query1) or die("failed to execute");
    if(mysqli_num_rows($result1) > 0){
        while($row1=mysqli_fetch_assoc($result1)){
            ?>
            <option value="<?=$row1['Hospitalname']?>"><?=$row1['Hospitalname']?></option>
              
            <?php
        }
    }
    
    ?></select> 
</div>
<div class="form-group">
    <label for="preferredTime">Preferred Time:</label>
    <input type="datetime-local" class="form-control" id="preferredTime" name="preferred_time" required>
</div>

<script>
    // Get the current date and time in the format required by datetime-local input
    function getCurrentDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = (now.getMonth() + 1).toString().padStart(2, '0');
        const day = now.getDate().toString().padStart(2, '0');
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');

        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    // Set the min attribute of the datetime-local input to the current date and time
    document.getElementById('preferredTime').min = getCurrentDateTime();

    // Add an event listener to the input to check for changes
    document.getElementById('preferredTime').addEventListener('input', function () {
        // Get the selected date and time from the input
        const selectedDateTime = new Date(this.value);

        // Get the current date and time
        const currentDateTime = new Date();

        // Compare the selected date and time with the current date and time
        if (selectedDateTime < currentDateTime) {
            alert('Please select a future date and time.');
            this.value = getCurrentDateTime(); // Reset to the current date and time
        }
    });
</script>


      

       
     
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
<div style="height: 10px;">
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
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
<!-- Add this script to the end of your HTML file, just before the closing </body> tag -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const vaccinationForm = document.getElementById('vaccinationForm');

        vaccinationForm.addEventListener('submit', function (event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });

        function validateForm() {
            let isValid = true;

            // Validate Parent Name
            const parentNameInput = document.getElementById('parentName');
            if (parentNameInput.value.trim() === '') {
                isValid = false;
            

            // Validate Phone Number
            const phoneNumberInput = document.getElementById('phoneNumber');
            const phoneNumberRegex = /^\d{10}$/; // Assuming a 10-digit phone number
            if (!phoneNumberRegex.test(phoneNumberInput.value.trim())) {
                isValid = false;
            

            // Validate Parent Email
            const parentEmailInput = document.getElementById('parentEmail');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(parentEmailInput.value.trim())) {
                isValid = false;
            

            // Validate Child Name
            const childNameInput = document.getElementById('childName');
            if (childNameInput.value.trim() === '') {
                isValid = false;
            

            // Validate Date of Birth
            const dateOfBirthInput = document.getElementById('dateOfBirth');
            const currentDate = new Date();
            const selectedDate = new Date(dateOfBirthInput.value);
            if (selectedDate >= currentDate) {
                isValid = false;
            

            // Validate Vaccine Selection
            const vaccineInput = document.getElementById('vaccine');
            if (vaccineInput.value.trim() === '') {
                isValid = false;
            

            // Validate Hospital Selection
            const hospitalInput = document.getElementById('hospital');
            if (hospitalInput.value.trim() === '') {
                isValid = false;
            

            // Validate Preferred Time
            const preferredTimeInput = document.getElementById('preferredTime');
            const preferredTimeDate = new Date(preferredTimeInput.value);
            if (preferredTimeDate <= currentDate) {
                isValid = false;
            }
                  }}}}}}                   alert('Please fill all feilds to continue.');
   }
            return isValid;
        }
    });
</script>

</body>
</html>
<?php
}
else{
	
	header("Location:login.php");
}
?>