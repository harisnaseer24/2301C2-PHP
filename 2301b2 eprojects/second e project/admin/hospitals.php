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
        <title>Doccure - Hospitals List Page</title>
		
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
		
			<!-- Header -->
          
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.PHP" class="logo">
						<img src="assets/img/logo.png" alt="Logo">
					</a>
					<a href="index.PHP" class="logo logo-small">
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
	
			
			<!-- Sidebar -->
				<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li  class=""> 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="bookings.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="vaccines.php"><i class="fe fe-users"></i> <span>Vaccines</span></a>
							</li>
							<li class="active"> 
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
									<li><a href="invoice-report.html"> Reports</a></li>
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
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Hospitals</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Doctor</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="col-sm-5 col">
                            <!-- Add Button -->
							<a href="addhospital.php" class="btn btn-primary" style="margin-bottom: 10px; margin-left:240%;">Add</a>


                            <!-- /ADD Button -->
                        </div>
							<!-- /Page Wrapper -->
		<?PHP
$sql = "SELECT * FROM `hospitalregister`where `verification` = 'not verified by admin' ";
$result = $connection->query($sql);

		?>
		
		<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0"style="text-align:center;">
						<h3>Un Varified Hospitals</h3>

							<thead>
								<tr>
									<th>Hospital Name</th>
									<th>Hospital email</th>
									<th>picture</th>
									<th>Hospital city</th>
									<th>Hospital location</th>
									<th>Verification Status</th>
									<th>Actions</th>									
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
										echo '<td>' . $row["verification"] . '</td>';
										echo '<td>';
										echo '<a href="verifyhospital.php?id=' . $row["id"] . '" class="btn btn-success" style="margin-right:10px;">';
										echo '<i class="fe fe-pencil"></i> Verify';
										echo '</a>';
										


echo '<button class="btn btn-danger"  onclick="redirectTo(\'deletehospital.php?id=' . $row["id"] . '\')">';
echo '<i class="fe fe-trash"></i> Delete';
echo '</button>';

										echo '</td>';
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


			<?PHP
$sql = "SELECT * FROM `hospitalregister` where `verification` = 'verified' ";
$result = $connection->query($sql);

		?>
		
		<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0" style="text-align:center;">
						<h3>Varified Hospitals</h3>

							<thead>
								<tr>
									<th>Hospital Name</th>
									<th>Hospital email</th>
									<th>picture</th>
									<th>Hospital city</th>
									<th>Hospital location</th>
									<th>Verification Status</th>
									<th>Actions</th>									
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
										echo '<td>' . $row["verification"] . '</td>';
										echo '<td>';


echo '<button class="btn btn-danger"  onclick="redirectTo(\'deletehospital.php?id=' . $row["id"] . '\')">';
echo '<i class="fe fe-trash"></i> Delete';
echo '</button>';

										echo '</td>';
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
		<script  src="assets/js/script.js"></script>
		<script>
                    function redirectTo(targetFile) {
                        window.location.href = targetFile;
                    }
                </script>
    </body>

</html>
<?php
}else{
	header("location:login.php");
}


?>