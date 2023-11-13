<?php 
$server="localhost";
$username="root";
$dbpass="";
$dbname="2301c2";


$connection= mysqli_connect($server,$username,$dbpass,$dbname)  ;
    if(!$connection){
        die("failed to connect");
    }


?>