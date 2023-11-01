<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //indexed array
    $numbers= array(10,20,30,40,50);
    // echo "$numbers[3]";

    foreach ($numbers as $key => $value) {
        // echo "$key $value <br>";
    }

    //associative array
    $employees=[
"haris"=>"manager",
"owais"=>"asst. manager",
"ebad"=>"team lead",
"afzal"=>"jr team lead"


    ];
    //  echo $employees['ebad'];


    foreach ($employees as $key => $value) {
        echo ucwords($key)."  owns the $value post.<br>";
    }


    //multidimensional array

    $result=[

        ["haris",78],
        ["usama",88],
        ["owais",98],
        ["ebad",66],
        ["afzal",57]
    ];
    // echo  $result[4][0]." ". $result[4][3];



    echo  "<table border=1 cellpadding=5px>
    <tr>
<th>Name</th>
<th>Percentage</th>
</tr>
    
    ";
foreach ($result as $key => $value) {
    echo  "<tr>";
    foreach ($value as $key1 => $value1) {
        echo "<td>$value1</td> ";
    }
    echo  "</tr>";
}
echo "</table>";

//Multidimensional Associative array
$marks =[

"haris"=>["computer"=>78,"physics"=>88,"Maths"=>100],

"owais"=>["computer"=>55,"physics"=>75,"Maths"=>99],

"afzal"=>["computer"=>90,"physics"=>64,"Maths"=>92],

"ebad"=>["computer"=>58,"physics"=>24,"Maths"=>82]



];
echo $marks["owais"]["Maths"];



    ?>

</body>
</html>