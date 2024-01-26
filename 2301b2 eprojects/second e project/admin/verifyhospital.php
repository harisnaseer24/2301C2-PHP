<?php
$mysqli = new mysqli("localhost", "root", "", "vacination1");
session_start();

if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Assuming you are using GET method to pass the ID
    if (isset($_GET['id'])) {
        $hospitalId = $_GET['id'];

        // Update verification status to 'verified'
        $updateQuery = "UPDATE `hospitalregister` SET `verification` = 'verified' WHERE `id` = $hospitalId";

        if ($mysqli->query($updateQuery) === TRUE) {
            // Close the database connection
            $mysqli->close();

            // Display alert and redirect
            echo "<script>
                    alert('Verification status updated successfully');
                    window.location.href = 'hospitals.php';
                  </script>";
            exit;
        } else {
            echo "Error updating verification status: " . $mysqli->error;
        }
    } else {
        echo "Invalid hospital ID";
    }

    // Close the database connection
    $mysqli->close();
} else {
    header("location: login.php");
}
?>
