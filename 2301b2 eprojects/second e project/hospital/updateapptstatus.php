<?php
require("./assets/database/config.php");

session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: logout.php");
    exit();
} else {
    if (isset($_GET['appt_id']) && isset($_GET['action'])) {
        $appt_id = intval($_GET['appt_id']);
        $action = htmlspecialchars($_GET['action'], ENT_QUOTES, 'UTF-8');

        $sql = "UPDATE `vaccination_appointments` SET `Status`='$action' WHERE id=$appt_id";

        $result = $connection->query($sql);

        if ($result === false) {
            echo "Error: " . $conn->error;
            header("Location: bookings.php");
            exit();
        } else {
            echo " <script>alert('Status updated succesfully');
            window.location.href='bookings.php'</script>;";
            // header("location:bookings.php");
            exit();
        }
    } else {
        echo "Invalid appt ID or action!";
        header("Location: bookings.php");
        exit();
    }
}
?>
