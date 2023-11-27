<?php 
include "../essentials/header.php";
require "../essentials/config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//funtion to send email
function sendRecoveryLink($token, $email, $username){
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'harisnaseer258@gmail.com';                     //SMTP username
    $mail->Password   = 'ojxk weru qvcy ozxg';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('harisnaseer258@gmail.com', 'The WEB Devs');
    $mail->addAddress($email, $username);     //Add a recipient
            

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Recovery link';
    $mail->Body    = 'Hello '.$username.', you have generated a password recovery request.<b>Please <a href="http://localhost:82/2301c2%20php/login/resetpass.php?token='.$token.'&email='.$email.'">click here</a> to reset your password.</b>';
  

    $mail->send();
    echo '<script>alert("Please check your inbox. We have sent an email at '.$email.'")</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
 
if(isset($_POST['sendmail'])){
$recoveryemail=mysqli_real_escape_string($connection, $_POST['recoveryemail']);
$token=md5(rand());


$query="SELECT * FROM `users` WHERE email='$recoveryemail';";
$result=mysqli_query($connection, $query) or die("failed to login");
if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);

$id= $row['id'];
$email= $row['email'];
$username=$row['username'];

$updateToken="UPDATE `users` SET `recovery_token`='$token' WHERE email='$email';";
$updateToken_run=mysqli_query($connection, $updateToken) or die("failed to update token.");
if($updateToken_run){
    
    sendRecoveryLink($token, $email, $username);
    echo "<script>alert('We are sending you a link to recover')</script>";
}
}
else{
echo" <script>alert('Please create your account first.')</script>";
header("location: signup.php");
}


}


?>
    <title>Recover Password </title>
<body>

<div class="container my-4">
    
    <form action="" method="post" class="form-group">
<h2 class="text-center">Recover Password</h2>
   
    <input type="email" name="recoveryemail" id="" class="form-control my-2" placeholder="Enter email">
   
    <input type="submit" name="sendmail" id="" class="form-control btn btn-primary my-2">
    </form>
</div> 
   
</body>
</html>