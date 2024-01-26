<?php
require("./assets/database/config.php");
session_start();

if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
    if (isset($_GET['id'])) {
        $hospital_id = $_GET['id'];

        $sql = "SELECT * FROM hospitalregister WHERE id = $hospital_id";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['Hospitalname'];
            $address = $row['Hospitallocation'];
            $location = $row['Hospital city'];
        } else {
            echo "Hospital not found.";
            exit();
        }
    } else {
        echo "Invalid request.";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Delete Hospital - Doccure</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
        }

        .main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            max-width: 500px;
            width: 100%;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>

<body style="
            font-family: Arial, sans-serif;
            background-image: url(https://source.unsplash.com/featured/?hospitals);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;"
        >
    <div class="main-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="page-title">Delete Hospital</h3>
                <!-- Display hospital details -->
                <p><strong>Hospital Name:</strong> <?php echo $name; ?></p>
                <p><strong>Hospital location:</strong> <?php echo $address; ?></p>
                <p><strong>Hospital City:</strong> <?php echo $location; ?></p>

                <!-- Delete confirmation form -->
                <form action="deletehospital_process.php" method="post">
                    <input type="hidden" name="hospital_id" value="<?php echo $hospital_id; ?>">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
                <!-- End of delete confirmation form -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

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
