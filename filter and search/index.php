<?php 
include("../essentials/header.php");
include("../essentials/config.php");
include("nav.php");

?>
<style>
    .btn{
        width: 150px;
        padding:20px;
        text-align:center;
        border-radius:50px;
    }
    .btn:hover{
        background-color: #0a4275;
    }
    .col-lg-4:hover{
        box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }
</style>
<!-- Categories start-->
<!-- button for categories -->
<div class="container my-5">
<h1 class='text-center my-5 text-primary display-4'>Welcome to Code HN</h1>
    <div class="text-center">
    <a href="index.php" class="btn btn-outline-primary  mx-3">ALL</a>
    <?php 
$getcategories="SELECT * from category;";
$getcategories_run=mysqli_query($connection, $getcategories) or die("failed");
if(mysqli_num_rows($getcategories_run) > 0){
    while($category=mysqli_fetch_assoc($getcategories_run)){
?>
   <a href="index.php?cat_id=<?=$category['category_id']?>" class="btn btn-outline-primary mx-3"><?=$category['category_name']?></a>
<?php 
    }
}
?>
</div>
<!-- end button for categories -->
<div class="row">
<?php 
if(isset($_GET['cat_id'])){
    $category_id=$_GET['cat_id'];
    $getProductsByCategory="SELECT * FROM `product` p inner join `category` c on p.category_id=c.category_id where p.category_id=$category_id ORDER by id desc;";
    $getProductsByCategory_run=mysqli_query($connection, $getProductsByCategory) or die("failed");
    if(mysqli_num_rows($getProductsByCategory_run )> 0){
        while($product=mysqli_fetch_assoc($getProductsByCategory_run )){
    ?>
    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
    <div class="card" style="border:none">
      <img src="./image/<?=$product['image']?>" class="card-img-top" alt="..." height="500">
      <div class="card-body">
        <h5 class="card-title"><?=$product['name']?></h5>
        <p class="card-text"><?=$product['category_name']?></p>
        <a href="#" class="btn btn-outline-primary"><?=$product['price']?></a>
      </div>
    </div>
    </div>
<?php    }}    
}else{
    $getAllProducts="SELECT * from product limit 3;";
$getAllProducts_run=mysqli_query($connection, $getAllProducts) or die("failed");
if(mysqli_num_rows($getAllProducts_run) > 0){
    while($product=mysqli_fetch_assoc($getAllProducts_run)){
?>
<div class="col-lg-4 col-md-6 col-sm-12 my-3">
<div class="card" style="border:none">
  <img src="./image/<?=$product['image']?>" class="card-img-top" alt="..." height="500">
  <div class="card-body">
    <h5 class="card-title"><?=$product['name']?></h5>
    <a href="#" class="btn btn-outline-primary"><?=$product['price']?></a>
  </div>
</div>
</div>
<?php 
    }
}
}
?>
</div>
</div>
<!-- Categories start-->

<!-- end button for Discount -->
<!-- button for categories -->
<div class="container my-5">
<h1 class='text-center my-5 text-primary display-4'>DISCOUNTS</h1>
    <div class="text-center">
    <a href="index.php#discount" class="btn btn-outline-primary  mx-3">ALL</a>
    <?php 
$discount="SELECT * from discount;";
$discount_run=mysqli_query($connection, $discount) or die("failed");
if(mysqli_num_rows($discount_run) > 0){
    while($discount=mysqli_fetch_assoc($discount_run)){
?>
   <a href="index.php?disc_id=<?=$discount['discount_id']?>" class="btn btn-outline-primary mx-3"><?=$discount['value']?> % OFF</a>
<?php 
    }
}
?>
</div>
<div class="row" id="discount">
<?php 
if(isset($_GET['disc_id'])){
    $discount_id=$_GET['disc_id'];
    $getProductsByDiscount="SELECT * FROM `product` p inner join `discount` d on p.discount_id=d.discount_id where p.discount_id=$discount_id ORDER by p.id desc;";
    $getProductsByDiscount_run=mysqli_query($connection, $getProductsByDiscount) or die("failed");
    if(mysqli_num_rows($getProductsByDiscount_run )> 0){
        while($product=mysqli_fetch_assoc($getProductsByDiscount_run )){
    ?>
    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
    <div class="card" style="border:none">
      <img src="./image/<?=$product['image']?>" class="card-img-top" alt="..." height="500">
      <div class="card-body">
        <h5 class="card-title"><?=$product['name']?></h5>
        <p class="card-text">Was <del><?=$product['price']?></del></p>
      
        <a href="#" class="btn btn-outline-primary">Now <?=$product['price'] - ($product['price']*$product['value']/100)?></a>
      </div>
    </div>
    </div>
<?php    }}    
}else{
    $getAllProducts="SELECT * FROM `product` p inner join `discount` d on p.discount_id=d.discount_id ORDER by p.id desc limit 3;";
$getAllProducts_run=mysqli_query($connection, $getAllProducts) or die("failed");
if(mysqli_num_rows($getAllProducts_run) > 0){
    while($product=mysqli_fetch_assoc($getAllProducts_run)){
?>
<div class="col-lg-4 col-md-6 col-sm-12 my-3">
<div class="card" style="border:none">
  <img src="./image/<?=$product['image']?>" class="card-img-top" alt="..." height="500">
  <div class="card-body">
    <h5 class="card-title"><?=$product['name']?></h5>
    <p class="card-text">Was <del><?=$product['price']?></del></p>
      
      <a href="#" class="btn btn-outline-primary">Now <?=$product['price'] - ($product['price']*$product['value']/100)?></a>
  </div>
</div>
</div>
<?php 
    }
}
}
?>
</div>
</div>
<!-- Discount end-->
<?php
include("footer.php");
?>