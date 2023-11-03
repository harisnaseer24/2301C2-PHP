<?php 
include "header.php";
require "config.php";

    $query="SELECT * FROM products;";
    

    $result=mysqli_query($connection,$query) or   die("failed to execute");
    // print_r($result);

    if(mysqli_num_rows($result) > 0){


        ?>
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

<body>
   
        <table border=1 cellpadding=7px>
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Stock</th>
                    <th>Actions</th>

                   
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
<a href='delete.php?id=".$row["id"]."' class='btn btn-danger'>Delete</a>
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