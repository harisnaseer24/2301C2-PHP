<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h1>Insert Product Details</h1>
<input type="text" name="name" id=""    placeholder="enter product name"><br><br>
<input type="number" name="price" id="" placeholder="enter product price"><br><br>
<input type="number" name="stock" id="" placeholder="enter product stock"><br><br>
<input type="submit" name="add" id=""><br><br>

</form>

<?php 
$server="localhost";
$username="root";
$dbpass="";
$dbname="2301c2";
  
    $connection= mysqli_connect($server,$username,$dbpass,$dbname)  ;
    if(!$connection){
        die("failed to connect");
    }else{
        echo "connected";
    } 
    
    if(isset($_POST["add"])){

        $pname=$_POST['name'];
        $price=$_POST['price'];
        $stock=$_POST['stock'];

        $query= "INSERT INTO `products`( `name`, `price`, `stock`) VALUES ('$pname','$price','$stock')";

$result=mysqli_query($connection,$query);
if(!$result){
    echo " <script>alert('Failed to insert record.')</script>";
}else{
    echo " <script>alert('Record Inserted Succesfully.')</script>";
} 

    }
    
   
    
    ?>
</body>
</html>