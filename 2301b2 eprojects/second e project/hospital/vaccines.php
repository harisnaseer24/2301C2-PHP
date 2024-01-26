
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
    <title>Doccure - Vaccines Page</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

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
                    <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li  > 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="bookings.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
                            <li   class="active"> 
                                								<a href="vaccines.php"><i class="fe fe-users"></i> <span>Vaccines</span></a>
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
			 <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Vaccines</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">vaccines</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <!-- Add Button -->
                            <a href="addvacines.php" class="btn btn-primary float-right mt-2">Add</a>
                            <!-- /ADD Button -->
                        </div>
                    </div>
                </div>
                <div class="row">
    <div class="col-sm-12">
    <h3>Not verified Vaccines</h3> <!-- Added header -->

        <div class="card">
           
            <div class="card-body">
                <div class="table-responsive">
                <?php
$sql = "SELECT `vaccine_id`, `vaccine_name`, `picture`, `stock`, `description` FROM `vaccines`WHERE `stock` = '(not verified by admin)'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="datatable table table-hover table-center mb-0" style="text-align:center;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>#</th>';
    echo '<th>Vaccine Name</th>';
    echo '<th>Picture</th>';
    echo '<th>Stock</th>';
    echo '<th>Description</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>#' . $row["vaccine_id"] . '</td>';
        echo '<td>';
        echo '<a href"">' . $row["vaccine_name"] . '</a>';
        echo '</h2>';
        echo '</td>';
        echo '<td><img src="' . $row["picture"] . '" alt="Vaccine Picture" style=height="100px" width="100px"></td>';
        echo '<td>' . $row["stock"] . '</td>';
        echo '<td>' . $row["description"] . '</td>';
        echo '<td>';
        echo '<div class="actions">';
  

        // delete Button
        
echo '<button class="btn btn-danger" onclick="redirectTo(\'deletevaccine.php?id=' . $row["vaccine_id"] . '\')">';
echo '<i class="fe fe-trash"></i> Delete';
echo '</button>';

        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
                } else {
                    echo "0 results";
                }
                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
    <div class="col-sm-12">
        <h3>Vaccines Out of Stock</h3> <!-- Added header -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    $sql = "SELECT `vaccine_id`, `vaccine_name`, `picture`, `stock`, `description` FROM `vaccines` WHERE `stock` = 'Out of stock'";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="datatable table table-hover table-center mb-0" style="text-align:center;">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>#</th>';
                        echo '<th>Vaccine Name</th>';
                        echo '<th>Picture</th>';
                        echo '<th>Stock</th>';
                        echo '<th>Description</th>';
                        echo '<th>Actions</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>#' . $row["vaccine_id"] . '</td>';
                            echo '<td>';
                            echo '<a href"">' . $row["vaccine_name"] . '</a>';
                            echo '</h2>';
                            echo '</td>';
                            echo '<td><img src="' . $row["picture"] . '" alt="Vaccine Picture"  style=height="100px" width="100px"></td>';
                            echo '<td>' . $row["stock"] . '</td>';
                            echo '<td>' . $row["description"] . '</td>';
                            echo '<td>';
                            echo '<div class="actions">';
                      
                            echo '<a href="updatestockavailable.php?id=' . $row["vaccine_id"] . '" class="btn btn-success " style="margin-right:10px;">';
                            echo '<i class="fe fe-pencil"></i> Available';
                            echo '</a>';
                            // delete Button
                            echo '<button class="btn btn-danger" onclick="redirectTo(\'deletevaccine.php?id=' . $row["vaccine_id"] . '\')">';
                            echo '<i class="fe fe-trash"></i> Delete';
                            echo '</button>';

                            echo '</div>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo "No vaccines are out of stock.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="row">
    <div class="col-sm-12">
        <h3>Available Vaccines</h3> <!-- Added header -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    $sql = "SELECT `vaccine_id`, `vaccine_name`, `picture`, `stock`, `description` FROM `vaccines` WHERE `stock` = 'Available'";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="datatable table table-hover table-center mb-0" style="text-align:center;">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>#</th>';
                        echo '<th>Vaccine Name</th>';
                        echo '<th>Picture</th>';
                        echo '<th>Stock</th>';
                        echo '<th>Description</th>';
                        echo '<th>Actions</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>#' . $row["vaccine_id"] . '</td>';
                            echo '<td>';
                            echo '<a href"">' . $row["vaccine_name"] . '</a>';
                            echo '</h2>';
                            echo '</td>';
                            echo '<td><img src="' . $row["picture"] . '" alt="Vaccine Picture" style=height="100px" width="100px"></td>';
                            echo '<td>' . $row["stock"] . '</td>';
                            echo '<td style="text-align:justify:">' . $row["description"] . '</td>';
                            echo '<td>';
                            echo '<div class="actions">';
                            // Edit Button
                            echo '<a href="updatestock.php?id=' . $row["vaccine_id"] . '" class="btn btn btn-danger " style="margin-right:10px;">';
                            echo '<i class="fe fe-pencil"></i> Out of stock';
                            echo '</a>';

                            // delete Button
                            echo '<button class="btn btn-danger" onclick="redirectTo(\'deletevaccine.php?id=' . $row["vaccine_id"] . '\')">';
                            echo '<i class="fe fe-trash"></i> Delete';
                            echo '</button>';

                            echo '</div>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo "No vaccines are Available on System.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmLogout() {
        var isConfirmed = confirm("Are you sure you want to log out?");

        if (isConfirmed) {
            window.location.href = "logout.php";
        }
    }
</script>                 <script>
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
		
    </body>

</html>
