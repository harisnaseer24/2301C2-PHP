<?php 
include "header.php";
require "config.php";

if($_GET['id']){

    $id=$_GET['id'];
    $sql="DELETE FROM `products` WHERE `id`=$id;";
    $result=mysqli_query($connection, $sql);
    if($result){
        echo " <script>alert('Record DELETED Succesfully.')</script>";
        header("Location: index.php");
    }
    else{
        echo " <script>alert('Failed to DELETE record.')</script>";
       
}}

else{
    echo "id not found Try again later.";
}



?>