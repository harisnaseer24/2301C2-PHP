<?php
require("./assets/database/config.php");
session_start();
if(isset($_SESSION['isadmin'])&& $_SESSION['isadmin']==true){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Appointment List Page</title>

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

    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
	<div class="content container-fluid">

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
        <!-- Add some text or icon for the dropdown trigger -->
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a>
    </div>
</li>

<script>
    function confirmLogout() {
        // Display a confirmation dialog
        var isConfirmed = confirm("Are you sure you want to log out?");
        
        // If the user clicks OK in the confirmation dialog, proceed with logout
        if (isConfirmed) {
            window.location.href = "logout.php"; // Redirect to the logout page
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
       			
				<!-- Sidebar -->
				<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li > 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="active"> 
								<a href="bookings.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="vaccines.php"><i class="fe fe-users"></i> <span>Vaccines</span></a>
							</li>
							<li > 
								<a href="hospitals.php"><i class="fe fe-user-plus"></i> <span>Hospitals</span></a>
							</li>
							<li> 
								<a href="patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="Suggestion.php"><i class="fe fe-user"></i> <span>Messags/Suggestions</span></a>
							</li>
							<li class="submenu">
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
			</div>
            <div class="page-wrapper">
		<div class="row">
                       
                        
                    </div>
                    <?php
$mysqli = new mysqli("localhost", "root", "", "vacination1");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM `vaccination_appointments`WHERE `Status` = 'pending'";

$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pending Appointments List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0" style="text-align:center;">
                        <thead>
                        <tr>
                                        <th>ID</th>
                                        <th>Parent Name</th>
                                        <th>Phone Number</th>
                                        <th>Parent Email</th>
                                        <th>Child Name</th>
                                        <th>Date of Birth</th>
                                        <th>Vaccine</th>
                                        <th>Preferred Time</th>
                                        <th>Hospital</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['parent_name'] ?></td>
                                            <td><?= $row['phone_number'] ?></td>
                                            <td><?= $row['parent_email'] ?></td>
                                            <td><?= $row['Child Name'] ?></td>
                                            <td><?= $row['date of birth'] ?></td>
                                            <td><?= $row['Vaccine'] ?></td>
                                            <td><?= $row['preferred_time'] ?></td>
                                            <td ><?= $row['hospital'] ?></td>
                                            <td><?= $row['Status'] ?></td>
                                      
            <td>
                <div class="btn-group">
                    <a href="updateapptstatus.php?appt_id=<?= $row['id']?>&action=confirmed" class="btn btn-success">Confirmed</a>
                    <a style="margin-left:10px;" href="updateapptstatus.php?appt_id=<?= $row['id']?>&action=canceled" class="btn btn-danger">Cancelled</a>
                  
                </div>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$mysqli = new mysqli("localhost", "root", "", "vacination1");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM `vaccination_appointments` WHERE `Status` = 'confirmed'";

$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Confirmed Appointments List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0" style="text-align:center;">
                        <thead>
                        <tr>
                                        <th>ID</th>
                                        <th>Parent Name</th>
                                        <th>Phone Number</th>
                                        <th>Parent Email</th>
                                        <th>Child Name</th>
                                        <th>Date of Birth</th>
                                        <th>Vaccine</th>
                                        <th>Preferred Time</th>
                                        <th>Hospital</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['parent_name'] ?></td>
                                            <td><?= $row['phone_number'] ?></td>
                                            <td><?= $row['parent_email'] ?></td>
                                            <td><?= $row['Child Name'] ?></td>
                                            <td><?= $row['date of birth'] ?></td>
                                            <td><?= $row['Vaccine'] ?></td>
                                            <td><?= $row['preferred_time'] ?></td>
                                            <td ><?= $row['hospital'] ?></td>
                                            <td><?= $row['Status'] ?></td> 
                                      
            <td>
                <div class="btn-group">
                <a href="updateapptstatus.php?appt_id=<?= $row['id']?>&action=completed" class="btn btn-success">Completed</a>
                    <a style="margin-left:10px;" href="updateapptstatus.php?appt_id=<?= $row['id']?>&action=canceled" class="btn btn-danger">Cancelled</a>

                </div>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$mysqli = new mysqli("localhost", "root", "", "vacination1");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM `vaccination_appointments` WHERE `Status` = 'completed'";

$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Completed Appointments List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0" style="text-align:center;">
                        <thead>
                        <tr>
                                        <th>ID</th>
                                        <th>Parent Name</th>
                                        <th>Phone Number</th>
                                        <th>Parent Email</th>
                                        <th>Child Name</th>
                                        <th>Date of Birth</th>
                                        <th>Vaccine</th>
                                        <th>Preferred Time</th>
                                        <th>Hospital</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['parent_name'] ?></td>
                                            <td><?= $row['phone_number'] ?></td>
                                            <td><?= $row['parent_email'] ?></td>
                                            <td><?= $row['Child Name'] ?></td>
                                            <td><?= $row['date of birth'] ?></td>
                                            <td><?= $row['Vaccine'] ?></td>
                                            <td><?= $row['preferred_time'] ?></td>
                                            <td ><?= $row['hospital'] ?></td> 
                                            <td><?= $row['Status'] ?></td>
                                      
         
        </tr>
    <?php
    }
    ?>
</tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$mysqli = new mysqli("localhost", "root", "", "vacination1");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM `vaccination_appointments` WHERE `Status` = 'canceled'";

$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Canceled Appointments List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0" style="text-align:center;">
                        <thead>
                        <tr>
                                        <th>ID</th>
                                        <th>Parent Name</th>
                                        <th>Phone Number</th>
                                        <th>Parent Email</th>
                                        <th>Child Name</th>
                                        <th>Date of Birth</th>
                                        <th>Vaccine</th>
                                        <th>Preferred Time</th>
                                        <th>Hospital</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['parent_name'] ?></td>
                                            <td><?= $row['phone_number'] ?></td>
                                            <td><?= $row['parent_email'] ?></td>
                                            <td><?= $row['Child Name'] ?></td>
                                            <td><?= $row['date of birth'] ?></td>
                                            <td><?= $row['Vaccine'] ?></td>
                                            <td><?= $row['preferred_time'] ?></td>
                                            <td ><?= $row['hospital'] ?></td>
                                            <td><?= $row['Status'] ?></td> 
                                      
           
        </tr>
    <?php
    }
    ?>
</tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$mysqli->close();
?>
  </div>
</div>



    </div>
</div>
    <!-- /Main Wrapper -->

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
    <script src="assets/js/script.js"></script>

</body>

</html>
<?php
} else {
    header("location:login.php");
    exit(); 
}
?>
