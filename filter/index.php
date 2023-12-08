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
<!-- button for categories -->
<div class="container my-5">
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
      <img src="../file upload/image/<?=$product['image']?>" class="card-img-top" alt="..." height="500">
      <div class="card-body">
        <h5 class="card-title"><?=$product['name']?></h5>
        <p class="card-text"><?=$product['category_name']?></p>
        <a href="#" class="btn btn-outline-primary"><?=$product['price']?></a>
      </div>
    </div>
    </div>
<?php     
        }}
}else{
    $getAllProducts="SELECT * from product;";
$getAllProducts_run=mysqli_query($connection, $getAllProducts) or die("failed");
if(mysqli_num_rows($getAllProducts_run) > 0){
    while($product=mysqli_fetch_assoc($getAllProducts_run)){
?>
<div class="col-lg-4 col-md-6 col-sm-12 my-3">
<div class="card" style="border:none">
  <img src="../file upload/image/<?=$product['image']?>" class="card-img-top" alt="..." height="500">
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
<?php
include("footer.php");
?>