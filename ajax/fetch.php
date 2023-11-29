<?php 
require("../essentials/config.php");

$sql="SELECT * FROM `user_info`";
$result=mysqli_query($connection, $sql) or die("failed");

if(mysqli_num_rows($result) >0){
    while($row=mysqli_fetch_assoc($result)){
echo
'
<tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["password"].'</td>
    <td><a href="update.php?id='.$row["id"].'" class="btn btn-primary">Update</a></td>
    <td><a href="delete.php?id='.$row["id"].'" class="btn btn-primary">Delete</a></td>
</tr>
';



    }
}


?>

