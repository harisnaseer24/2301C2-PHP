<?php 
include "../essentials/header.php";
require "../essentials/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container my-4">
    <form action="" method="post" class="form-group">
<h2 class="text-center">Create an account now..!</h2>
    <input type="text" name="username" id="" class="form-control my-2" placeholder="Enter username">
    <input type="email" name="email" id="" class="form-control my-2" placeholder="Enter email">
    <input type="password" name="password" id="" class="form-control my-2" placeholder="Enter password">
    <input type="submit" name="signup" id="" class="form-control btn btn-primary my-2">
    </form>
</div>    
<?php 
if(isset($_POST['signup'])){
$username=  mysqli_real_escape_string($connection, $_POST['username']);
$email=  mysqli_real_escape_string($connection, $_POST['email']);
$password=  mysqli_real_escape_string($connection, $_POST['password']);
// echo"<br>";
$encrypted_password=password_hash($password, PASSWORD_BCRYPT);
// echo $encrypted_password=md5($password);

//to check if a user already exists

$check="SELECT * FROM `users` WHERE email='$email';";
$result=mysqli_query($connection, $check);
if($result){
    if(mysqli_num_rows($result) >0){
        echo "<script>alert('User Already Registered.')</script>";
    }
    else{
//to insert a new user
$add="INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$username','$email','$encrypted_password');";
$result2=mysqli_query($connection, $add);
if($result2){
    header("location: login.php");


}else{
    echo "<script>alert('faile to create an account.')</script>";
}
    }
    
};




}


?>

</body>
</html>