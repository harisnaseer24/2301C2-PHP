<?php
require("./assets/database/config.php");
session_start();

if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $vaccine_id = $_POST['vaccine_id'];
        $vaccine_name = $_POST['vaccine_name'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];

        $sql = "UPDATE vaccines SET vaccine_name='$vaccine_name', stock='$stock', description='$description' WHERE vaccine_id=$vaccine_id";

        if ($connection->query($sql) === TRUE) {
            echo "Vaccine updated successfully!";
            header("location: vaccines.php");
            exit();
        } else {
            echo "Error updating vaccine: " . $connection->error;
            exit();
        }
    } elseif (isset($_GET['id'])) {
        $vaccine_id = $_GET['id'];

        $sql = "SELECT * FROM vaccines WHERE vaccine_id = $vaccine_id";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $vaccine_name = $row['vaccine_name'];
            $stock = $row['stock'];
            $description = $row['description'];
        } else {
            echo "Vaccine not found.";
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
    <title>Edit Vaccine - Doccure</title>

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
    <style>
       body {
            font-family: Arial, sans-serif;
            background-image: url(https://source.unsplash.com/featured/?vaccines);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;
            color: white;
        }


        .main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .card-body {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        button {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="main-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="page-title">Edit Vaccine</h3>
                <!--update form here -->
                <form action="" method="post">
                    <input type="hidden" name="vaccine_id" value="<?php echo $vaccine_id; ?>">
                    <div class="form-group">
                        <label>Vaccine Name</label>
                        <input type="text" class="form-control" name="vaccine_name" value="<?php echo $vaccine_name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" value="<?php echo $stock; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" required><?php echo $description; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Vaccine</button>
                </form>
                <!-- End of update form -->
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
