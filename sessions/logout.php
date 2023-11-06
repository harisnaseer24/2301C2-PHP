<?php 

include ("../CRUD with Database/header.php");
session_start();
session_unset();
session_destroy();
header("location: login.php");

?>

<body>
    <!-- <h1 class="text-center display-1 my-2 fw-bold">Your session has been ended please login again.</h1> -->
   <!-- <a href="./login.php" class="btn btn-warning">click here</a> -->
</body>
</html>