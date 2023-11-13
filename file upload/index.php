<?php 
include "../essentials/header.php";
require "../essentials/config.php";

if(isset($_POST['submit'])){

 $name=$_POST['name'];
$age=$_POST['age'];
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


$sql="INSERT INTO `users`( `name`, `age`, `image`) VALUES ('$name','$age','$newimgname');";
$result=mysqli_query($connection,$sql);

if($result){
    echo"<script>alert('User Added.')</script>";
}
else{
    echo"<script>alert('failed to add a new user.')</script>";
}

 }

}
}

?>
<body>
    
<div class="container">
    <h1 class="text-center">Add User</h1>
    <form action="" class="form-group" method="post" enctype="multipart/form-data">
<input type="text" name="name" class="form-control my-3" placeholder="Enter name">
<input type="number" name="age" class="form-control my-3" placeholder="Enter age">
<input type="file" name="image" class="form-control my-3" accept=".jpg,.png,.jpeg">
<input type="submit" name="submit" value="Add User" class="form-control btn btn-info my-3" >

    </form>
</div>


</body>
</html>