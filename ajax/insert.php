<?php 
require("../essentials/config.php");

$id=$_POST['id'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=$_POST['pass'];

if(!$uname=="" && !$email=="" && !$pass=="" ){



$sql="INSERT INTO `user_info`(`id`, `name`, `email`, `password`) VALUES ('$id','$uname','$email','$pass') 
ON DUPLICATE KEY UPDATE `name`='$uname',`email`='$email',`password`='$pass';";
$result=mysqli_query($connection, $sql) or die("failed");

if(!$result){
    echo "Failed to insert record.";
}else{
    echo "Record Inserted Succesfully.";
} 

} else{
   echo "Please fill all fields.";
}
?>

