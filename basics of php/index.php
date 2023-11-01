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


// echo ("<h1>".$fullname."</h1><p> My age is: ".$age."<br>".$c."<br>");




// echo(abs(-5.8));
// echo(round(5.3));
// echo(ceil(5.1));
// echo(floor(5.9));
// echo(sqrt(729));
// echo(rand());
// echo(min(-5.8,-10,0));
// echo(max(-5.8,-10,0,24));

$num=18;
 
// for( $i=1;$i<=10;$i++){

//     echo(" $num x $i = ".$num*$i."<br>");//18 x 1 = 18
// }

$j=1; $num2=36;
// while($j<=10){

//     echo(" $num2 x $j = ".$num2*$j."<br>");
//     $j++;
// }

// do 
// {

//     echo(" $num2 x $j = ".$num2*$j."<br>");
//     $j++;
// }
// while($j<=10);


// $a=10;
// $A="10";
// echo $a==$A;

// +,-,*,/,%=remainder
//comparison operators <,> ,==,===,!=,!==,<=,>=


// $salary=100;
// if($salary>500){
// echo "YOU HAVE HIGH SALARY";
// }
// elseif($salary==500){
//     echo "YOU HAVE NORMAL SALARY";
// }
// else{
//     echo "YOU HAVE LOW SALARY";
// }

$cars= array("Bugatti","Audi","Mustang","Mercedes","BMW");

echo "<br>". $cars[1];
echo "<pre>";
print_r( $cars);
echo "</pre>";


foreach ($cars as $key => $value) {
    echo $key.":".$value."<br>";
}

?>


</body>
</html>