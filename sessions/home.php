<?php 

include ("../CRUD with Database/header.php");
session_start();
if(isset($_SESSION['username'])){
  

?>

<body>
    <a href="logout.php" class="btn btn-danger">LOGOUT</a>
    <h1 class="text-center display-1 my-2 fw-bold">WELCOME <?php echo $_SESSION['username'] ?> TO OUR WEBSITE</h1>
    <p>your password is <?php echo $_SESSION['password'] ?> </p>
   <?php 
   
}
else{
    // echo "Please login to continue   <a href='./login.php' class='btn btn-warning'>click here</a>";
    header("Location: login.php");
}
   
   ?>
</body>
</html>