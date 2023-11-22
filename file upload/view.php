<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
<?php 
include "../essentials/header.php";
require "../essentials/config.php";

    $query="SELECT * FROM products;";
    $result=mysqli_query($connection,$query) or   die("failed to execute");
    // print_r($result);

    if(mysqli_num_rows($result) > 0){

        // echo "record found";
while($row=mysqli_fetch_assoc($result)){
$title=$row['title'];
$image=$row['image'];



    echo '
<div class="col-lg-4 col-md-6 col-sm-12">
<div class="card" style="width: 18rem;">
  <img src="./image/'.$image.'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$title.'</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card`s content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
    
    ';
}

?>
   </div>
    </div>
</body>
</html>
<?php 
}
?>