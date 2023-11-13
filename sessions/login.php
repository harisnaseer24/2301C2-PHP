<?php 

include ("../CRUD with Database/header.php");
session_start();
// $_SESSION['username']="Haris naseer";
?>

<body>
    <h1 class="text-center display-3 my-2 ">Login Now</h1>
    <div class="container">
    <form class="col-md-5 mx-auto  form-group"action="login.php" method="post">

        <input class="form-control" type="text" name="username" id="username" placeholder="Enter username"><br>
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter password"><br>
        <input class="form-control btn btn-primary" type="submit" name="Login" id="Login" value="Login">
    </form></div>
   <?php
   
   if(isset($_POST['Login'])){

    $_SESSION['username']= $_POST['username'];
    $_SESSION['password']= $_POST['password'];

    header("Location: home.php");
   }
   
   ?>
   
</body>
</html>