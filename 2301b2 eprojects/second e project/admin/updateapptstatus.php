<?php
require("./assets/database/config.php");
session_start();
if(isset($_SESSION['isadmin'])&& $_SESSION['isadmin']==true){
    if (isset($_GET['appt_id']) && isset($_GET['action'])) {

        $appt_id=$_GET['appt_id'];
        $action=$_GET['action'];
 
        $sql = "UPDATE `vaccination_appointments` SET `Status`='$action' WHERE id=$appt_id";
        $result = $connection->query($sql);
    
        if ($result === false) {
            echo "Error: " . $connection->error;
            header("location:bookings.php");
            exit();
        }
    
        
         else {
           
            echo " <script>alert('Status updated succesfully');
            window.location.href='bookings.php'</script>;";
            // header("location:bookings.php");
            exit();
        }
    } else {
        echo "Invalid appt ID!";
        header("location:bookings.php");
        exit();
    }







} else {
    header("location:login.php");
    exit(); 
}