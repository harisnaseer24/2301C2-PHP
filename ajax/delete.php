<?php 
require("../essentials/config.php");

$id=$_POST['userid'];


$sql="UPDATE `user_info` SET `status`=0 WHERE id=$id;";
$result=mysqli_query($connection, $sql) or die("failed");

if(!$result){
    echo "Failed to delete record.";
}else{
    echo "Record moved to trash Succesfully. ".mysqli_affected_rows($connection)."row/rows affected. ";
} 

?>

