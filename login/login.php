<?php 
include "../essentials/header.php";
require "../essentials/config.php";
?>
    <title>Login </title>
<body>

<div class="container my-4">
    
    <form action="" method="post" class="form-group">
<h2 class="text-center">Sign In now..!</h2>
   
    <input type="email" name="loginemail" id="" class="form-control my-2" placeholder="Enter email">
    <input type="password" name="loginpassword" id="" class="form-control my-2" placeholder="Enter password">
    <a href="forgetpass.php">Forgot your password..?</a>
    <input type="submit" name="signin" id="" class="form-control btn btn-primary my-2">
    </form>
</div> 
    <?php 
    if(isset($_POST['signin'])){
 $email=mysqli_real_escape_string($connection, $_POST['loginemail']);
 $pass=mysqli_real_escape_string($connection, $_POST['loginpassword']);

 $query="SELECT * FROM `users` WHERE email='$email';";
 $result=mysqli_query($connection, $query) or die("failed to login");
 if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_assoc($result);

    $regesteredEmail= $row['email'];
    $regesteredPass= $row['password'];//HASH
    $regesteredUsername=$row['username'];

    $matchPass=password_verify($pass, $regesteredPass);// returns true or false

    if($matchPass){

        echo "<script>alert('Login Success')</script>";
        session_start();
        
        $_SESSION['uname']=$regesteredUsername;
        $_SESSION['email']= $regesteredEmail;


        header("location: home.php");
    }
    else{
        echo" <script>alert('Invalid Credentials')</script>";
    }

 }
 else{
    echo" <script>alert('Please create your account first.')</script>";
    header("location: signup.php");
 }






}

    
    
    
    
    
    ?>
</body>
</html>