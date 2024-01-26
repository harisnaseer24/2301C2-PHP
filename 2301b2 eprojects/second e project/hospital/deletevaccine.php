<?php
require("./assets/database/config.php");

session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: logout.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $vaccineId = $_GET['id'];

    // Delete the vaccine entry
    $sql = "DELETE FROM `vaccines` WHERE `vaccine_id` = $vaccineId";

    if ($connection->query($sql) === TRUE) {
        $connection->close();
        echo '<script>alert("Vaccine deleted successfully!");</script>';
        header("refresh:0.1;url=vaccines.php"); // Redirect after a short delay
        exit();
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
} else {
    echo "Invalid request.";
    exit();
}
?>
