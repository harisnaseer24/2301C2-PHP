<?php 

$server="localhost";
$username="root";
$dbpass="";
$dbname="2301c2";
  
    $connection= mysqli_connect($server,$username,$dbpass,$dbname)  ;
    if(!$connection){
        die("failed to connect");
    }


    $id=$_POST['id'];
    $pname=$_POST['name'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];



$query="UPDATE `products` SET `name`='$pname',`price`='$price',`stock`='$stock' WHERE `id`=$id;";
$result=mysqli_query($connection, $query);
if(!$result){
    echo " <script>alert('Failed to Update record.')</script>";
}else{
    echo " <script>alert('Record Updated Succesfully.')</script>";
}


?>