
<?php
require("./assets/database/config.php");

session_start();



if (!isset($_SESSION['user_email'])) {
    header("Location: logout.php");
    exit();
}
 
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Reports Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
<style> .print-button {
        position: absolute;
        top: 95px;
        right: 9px;
        z-index: 1000; /* Ensure it is above other elements */
    }
</style>
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

     				<!-- Header -->
          
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.php" class="logo">
						<img src="assets/img/logo.png" alt="Logo">
					</a>
					<a href="index.php" class="logo logo-small">
						<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
				
			</div>
			
			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					
						
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a>
    </div>
</li>

<script>
    function confirmLogout() {
        var isConfirmed = confirm("Are you sure you want to log out?");
        
        if (isConfirmed) {
            window.location.href = "logout.php"; 
        }
    }
</script>

					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			<!-- /Header -->
				<!-- Sidebar -->
				<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li   class=""> 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="bookings.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="vaccines.php"><i class="fe fe-users"></i> <span>Vaccines</span></a>
							</li>
							<li class="active">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="reports.php"> Reports</a></li>
								</ul>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="register.php"> Register </a></li>
								
								</ul>
							</li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
<div class="page-wrapper">
    <div class="content container-fluid" >

        <?php
        $mysqli = new mysqli("localhost", "root", "", "vacination1");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

		$query = "SELECT `id`, `parent_name`, `phone_number`, `parent_email`, `Child Name`, `date of birth`, `Vaccine`, `preferred_time`, `hospital`, `Status` FROM `vaccination_appointments` where `status` = 'completed'";

        $result = $mysqli->query($query);

        if (!$result) {
            die("Query failed: " . $mysqli->error);
        }

        ?>
        <div class="row" style="min-height:70vh;">
            <div class="col-sm-12">
            <div id="print-content">

            <div class="card">
   
                            <div class="card-header text-center">
                        <h1>Child's Vaccination [Taken] Reports </h1>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive"  style=" background-color:transparent;">
                            <table class="datatable table table-hover table-center table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th  style="font-weight: bold; ">ID</th>
                                        <th  style="font-weight: bold; ">Parent Name</th>
                                        <th  style="font-weight: bold; ">Phone Number</th>
                                        <th  style="font-weight: bold; ">Parent Email</th>
                                        <th  style="font-weight: bold; ">Child Name</th>
                                        <th  style="font-weight: bold; ">Date of Birth</th>
                                        <th  style="font-weight: bold; ">Vaccine</th>
                                        <th  style="font-weight: bold; ">Date & Time</th>
                                        <th  style="font-weight: bold; ">Hospital</th>
                                        <th  style="font-weight: bold; ">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td style="font-weight: bold; "><?= $row['id'] ?></td>
                                            <td style="font-weight: bold; "><?= $row['parent_name'] ?></td>
                                            <td style="font-weight: bold; "><?= $row['phone_number'] ?></td>
                                            <td style="font-weight: bold; "><?= $row['parent_email'] ?></td>
                                            <td style="font-weight: bold; "><?= $row['Child Name'] ?></td>
                                            <td style="font-weight: bold; "><?= $row['date of birth'] ?></td>
                                            <td style="font-weight: bold; "><?= $row['Vaccine'] ?></td>
                                        
                                            <td style="font-weight: bold; "><?= $row['preferred_time'] ?></td>
                                            <td style="font-weight: bold;"><?= $row['hospital'] ?></td>
											<td style="font-weight: bold; color: green;"><?= $row['Status'] ?></td> 
                                        </tr></div>
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
    <?php
    $mysqli->close();
    ?>
<!-- </div>           <div class="print-button">
                        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
                </div> -->

<!-- /Main Wrapper -->


<script>
    function confirmLogout() {
        var isConfirmed = confirm("Are you sure you want to log out?");

        if (isConfirmed) {
            window.location.href = "logout.php";
        }
    }
</script>                <script>
                    function redirectTo(targetFile) {
                        window.location.href = targetFile;
                    }
                </script>

            </div>
            <!-- /Page Wrapper -->
	
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
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
