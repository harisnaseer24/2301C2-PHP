<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<?php 
 $id=$_GET['id'];

if($_GET['id']){

    $server="localhost";
    $username="root";
    $dbpass="";
    $dbname="2301c2";
      
        $connection= mysqli_connect($server,$username,$dbpass,$dbname)  ;
        if(!$connection){
            die("failed to connect");
        }

$query="SELECT * FROM `products` WHERE `id`=$id;";
$result=mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0){

    while($row=mysqli_fetch_assoc($result)){
     
 $pname=$row['name'];
 $price=$row['price'];
$stock=$row['stock'];
?>
<form action="updatedata.php" method="post">
    <h1>Update Product Details</h1>


    <input type="hidden" name="id"  value="<?php echo $id ?>">
    <input type="text" name="name" id=""    placeholder="enter product name" value="<?php echo $pname ?>"><br><br>
    <input type="number" name="price" id="" placeholder="enter product price" value="<?php echo $price ?>"><br><br>
    <input type="number" name="stock" id="" placeholder="enter product stock" value="<?php echo $stock ?>"><br><br>
    <input type="submit" name="add" value="Update"id=""><br><br>
    
    </form>
<?php 

    }

}


?>

<?php
}
else{
    echo "no id found";
}


?>
</body>
</html>