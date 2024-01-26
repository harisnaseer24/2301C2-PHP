<?php

$server ="localhost";
$username ="root";
$dbpass = "";
$dbname = "vacination1";

$connection = mysqli_connect($server, $username, $dbpass, $dbname);


if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$connection->set_charset("utf8");


?>