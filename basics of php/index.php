<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Introduction to <?php
    $lang="PHP";
     echo $lang?></h1>
    <?php

print "hello world";
echo "This is Php";

$fullname="Haris Naseer";//String
$age=23;//int
$hourly_pay=250.60;//float ,double, real
$isCheck=true;
$a=245;
$b=65;
$c=$a + $b;
$str="I love programming with PHP😊";

echo("<br>".strlen($str));
echo("<br>".str_word_count($str));
echo("<br>".strrev($str));
 echo("<br>".ucwords($str));


echo ("<h1>".$fullname."</h1><p> My age is: ".$age."<br>".$c."<br>");


$num=18;
 
for( $i=1;$i<=10;$i++){

    echo($num." x ".$i." = ".$num*$i."<br>");//18 x 1 = 18
}



?>


</body>
</html>