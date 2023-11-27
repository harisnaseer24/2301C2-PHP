<?php 
include "../essentials/header.php";
require "../essentials/config.php";

if(isset($_POST['reset'])){
   
    $pass=mysqli_real_escape_string($connection, $_POST['newpassword']);
    $cpass=mysqli_real_escape_string($connection, $_POST['cpassword']);

if(isset($_GET['token'])){
    $token=$_GET['token'];
}else{
    $token="";
}
if(isset($_GET['email'])){
    $email=$_GET['email'];
}else{
    $email="";
}


    $query="SELECT * FROM `users` WHERE email='$email' AND recovery_token='$token';";
    $result=mysqli_query($connection, $query) or die("failed to login");
    if(mysqli_num_rows($result) > 0){
       $row=mysqli_fetch_assoc($result);

   if($pass==$cpass){
$newpass=password_hash($pass, PASSWORD_BCRYPT);
$newtoken=md5(rand());

$updatepass="UPDATE `users` SET `password`='$newpass',`recovery_token`='
$newtoken' WHERE email='$email' AND recovery_token='$token';";
$updatepass_run=mysqli_query($connection , $updatepass) or die("faile to set new pass");

if($updatepass_run){
    echo" <script>alert('Your Password has been successfully reset.Please login with your new password.')
    
    window.location.href='login.php'
    </script>";
}

   }else{
    echo" <script>alert('Password does not match.')</script>";
   }
   
    }
    else{
       echo" <script>alert('Invalid token.')</script>";
       header("location: login.php");
    }
   
   
   
   
   
   
   }
   
       
       
?>
    <title>Reset Your Password. </title>
<body>

<div class="container my-4">
    
    <form action="" method="post" class="form-group">
<h2 class="text-center">Reset Your Password..!</h2>

    <input type="password" name="newpassword" id="" class="form-control my-2" placeholder="Enter password">
    <input type="password" name="cpassword" id="" class="form-control my-2" placeholder="confirm password">
    <a href="forgetpass.php">Forgot your password..?</a>
    <input type="submit" name="reset" id="" class="form-control btn btn-primary my-2">
    </form>
</div> 

</body>
</html>