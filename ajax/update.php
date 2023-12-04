<?php 
require("../essentials/config.php");

$id=$_POST['userid'];


$sql="SELECT * FROM`user_info` WHERE id=$id;";
$result=mysqli_query($connection, $sql) or die("failed");

if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);
}else{
    echo "sorry";
} 

?>

