<?php
require("./assets/database/config.php");

session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: logout.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $vaccineId = $_GET["id"];

    // Update the stock status to "out of stock"
    $sql = "UPDATE vaccines SET stock = 'Available' WHERE vaccine_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $vaccineId);

    if ($stmt->execute()) {
        // Display a JavaScript alert
        echo '<script>alert("Stock updated successfully.");</script>';
        // Redirect the user to vaccines.php after the alert
        echo '<script>window.location.href = "vaccines.php";</script>';
        exit();
    } else {
        echo "Error updating stock: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
} else {
    // Handle invalid or missing parameters
    echo "Invalid request.";
}
?>
