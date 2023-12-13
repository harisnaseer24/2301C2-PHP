<?php 
require("../essentials/config.php");

$id=$_POST['userid'];

$sql="DELETE from `user_info` WHERE id=$id;";
$result=mysqli_query($connection, $sql) or die("failed");

if(!$result){
    echo "Failed to delete record.";
}else{
    echo "Record Permanently Deleted. ".mysqli_affected_rows($connection)."row/rows affected. ";
} 

?>

