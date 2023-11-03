<?php 

include "header.php";
require "config.php";
?>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h1>Insert Product Details</h1>
<input type="text" name="name" id=""    placeholder="enter product name"><br><br>
<input type="number" name="price" id="" placeholder="enter product price"><br><br>
<input type="number" name="stock" id="" placeholder="enter product stock"><br><br>
<input type="submit" name="add" id=""><br><br>

</form>

<?php 

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