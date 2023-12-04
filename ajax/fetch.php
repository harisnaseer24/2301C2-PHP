<?php 
require("../essentials/config.php");

$sql="SELECT * FROM `user_info` where status=1;";
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
    <td><button data-id="'.$row["id"].'" class="btn btn-primary updatebtn">Update</button></td>
    <td><button data-id="'.$row["id"].'" class="btn btn-primary deletebtn">Delete</button></td>
</tr>
';

    }
}


?>

