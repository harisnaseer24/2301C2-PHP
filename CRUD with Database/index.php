<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        table{
            background: skyblue;
            width: 100%;
        }
        th{
            background: black;
            color:white;
        }
    </style>
</head>
<body>
    <?php 
$server="localhost";
$username="root";
$dbpass="";
$dbname="2301c2";


    // $connection= mysqli_connect("localhost","root","","2301c2");
    $connection= mysqli_connect($server,$username,$dbpass,$dbname)  ;
    if(!$connection){
        die("failed to connect");
    }else{
        // echo "connected";
    }


    $query="SELECT * FROM products;";
    

    $result=mysqli_query($connection,$query) or   die("failed to execute");
    // print_r($result);

    if(mysqli_num_rows($result) > 0){


        ?>
        <table border=1 cellpadding=7px>
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Stock</th>
                    <th>Operations</th>

                   
                </tr>
            </thead>
        
        
        
        
        <?php
        // echo "record found";
while($row=mysqli_fetch_assoc($result)){



echo "<tr>";
echo "<td>".$row["id"]."</td>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$row["price"]." PKR </td>";
echo "<td>".$row["stock"]." pieces</td>";
echo "<td>
<a href='update.php?id=".$row["id"]."' class='btn btn-success'>Update</a>
<a href='' class='btn btn-danger'>Delete</a>
</td>";


echo "</tr>";

}

echo "</table>";

    }else{
        echo "record not found";

    }
    ?>
</body>
</html>