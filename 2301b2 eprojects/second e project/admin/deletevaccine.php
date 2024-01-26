<?php
require("./assets/database/config.php");
session_start();

if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
    
    // Check if the vaccine_id is set in the URL
    if(isset($_GET['id'])) {
        // Get the vaccine_id from the URL
        $vaccine_id = $_GET['id'];
    
        // Prepare and execute the DELETE query
        $deleteQuery = "DELETE FROM `vaccines` WHERE `vaccine_id` = $vaccine_id";
        if ($connection->query($deleteQuery) === TRUE) {
            echo '<script>alert("Vaccine deleted successfully!");</script>';
            header("refresh:0.1;url=vaccines.php"); // Redirect after a short delay
            exit();        } else {
            echo "Error deleting record: " . $connection->error;
        }
    
        // Close the database connection
        $connection->close();
    }
    ?>
    
<?php
} else {
    header("location:login.php");
    exit();
}
?>
