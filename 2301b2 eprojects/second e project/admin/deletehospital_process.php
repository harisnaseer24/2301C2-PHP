<?php
require("./assets/database/config.php");
session_start();

if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hospital_id = $_POST['hospital_id'];

        $sql = "DELETE FROM hospitalregister WHERE id=$hospital_id";

        if ($connection->query($sql) === TRUE) {
            echo "Hospital deleted successfully!";
            header("location: hospitals.php");
            exit();
        } else {
            echo "Error deleting hospital: " . $connection->error;
            exit();
        }
    } else {
        echo "Invalid request.";
        exit();
    }
} else {
    header("location:login.php");
    exit();
}
?>
