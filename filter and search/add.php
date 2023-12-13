<?php 
include "../essentials/header.php";
require "../essentials/config.php";
include("nav.php");

if(isset($_POST['submit'])){

 $name=$_POST['name'];
$price=$_POST['price'];
$category_id=$_POST['category'];
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
if($_FILES['image']['error'] == 4){
    echo"<script>alert('image does not exist')</script>";
    
}
else{
$imgname=$_FILES['image']['name'] ;
$imgsize=$_FILES['image']['size'] ;
$tmpname=$_FILES['image']['tmp_name'] ;

$validExtensions=['jpg','png','jpeg'];

 $extension=explode(".",$imgname);
 $extension=strtolower(end($extension));//jpg

 if($imgsize >10000000){
    echo"<script>alert('image is too large.')</script>";

 }
 elseif(!in_array($extension,$validExtensions)){
    echo"<script>alert('file type not supported.')</script>";

 }
 else
 {
 $newimgname=uniqid();
 echo $newimgname .=".".$extension; 
 move_uploaded_file($tmpname,"image/".$newimgname);


$sql="INSERT INTO `product`( `name`, `price`, `image`, `category_id`) VALUES ('$name','$price','$newimgname','$category_id');";
$result=mysqli_query($connection,$sql);

if($result){
    echo"<script>alert('Product Added.')</script>";
}
else{
    echo"<script>alert('failed to add a new product.')</script>";
}

 }

}
}

?>
<body>
    
<div class="container mt-5" style="min-height:80vh;">
    <h1 class="text-center mt-5 text-primary display-3">Add product</h1>
    <form action="" class="form-group" method="post" enctype="multipart/form-data">
<input type="text" name="name" class="form-control my-3" placeholder="Enter name">
<input type="number" name="price" class="form-control my-3" placeholder="Enter price">
<select name="category" class="form-control my-3"  id="">
    <option value="0" selected disabled>Choose category</option>
<?php 
$getcategories="SELECT * from category;";
$getcategories_run=mysqli_query($connection, $getcategories) or die("failed");
if(mysqli_num_rows($getcategories_run) > 0){
    while($category=mysqli_fetch_assoc($getcategories_run)){
?>
<option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>

<?php 

    }
}




?>


</select>
<input type="file" name="image" class="form-control my-3" accept=".jpg,.png,.jpeg">
<input type="submit" name="submit" value="Add User" class="form-control btn my-3" style="background-color: #0a4275; color:white;" >

    </form>
</div>


</body>
</html>
<?php 
include("footer.php");
?>