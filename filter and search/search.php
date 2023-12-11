<?php 
include("../essentials/header.php");
include("../essentials/config.php");
include("nav.php"); ?>
<div class="container" style="min-height:80vh">
<div class="row">
    <?php 
    if(isset($_GET['search'])){
        $search=$_GET['search'];
        $searchQuery="SELECT * FROM `product` as p inner join category as c on p.category_id=c.category_id where p.name like '%$search%' OR p.price like '%$search%' OR c.category_name like '%$search%';";//OR p.description like '%$search%'
        $result=mysqli_query($connection, $searchQuery) or die("failed");
        if(mysqli_num_rows($result) > 0){
            echo"<h1 class='text-center my-5 text-primary display-5'>Showing result for \"$search\" </h1>";

            while($product=mysqli_fetch_assoc($result)){
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
              <?php       }
        }else{
            echo"<h1 class='text-center my-5 text-primary display-3'>Nothing to show..!</h1>";
        }
    }else{
        echo"<h1 class='text-center my-5 text-primary display-3'>nothing to show</h1>";
    }
    ?>
</div>
</div>
<?php
include("footer.php");
?>