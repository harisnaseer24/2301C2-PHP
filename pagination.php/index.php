<?php 
include "../essentials/header.php";
require "../essentials/config.php";

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}

$limit=2;
$offset=($page - 1)*$limit;//(1-1)*3 ;0 * 3;0
    $query="SELECT * FROM products  limit $offset, $limit;";
    $result=mysqli_query($connection,$query) or   die("failed to execute");
    // print_r($result);
    if(mysqli_num_rows($result) > 0){
        ?>
<body>
   <div class="container">
<table class="table">
  <thead>
    <tr>
    <th scope="col">Product Id</th>
    <th scope="col">Product Name</th>
    <th scope="col">Product Price</th>
     <th scope="col">Product Stock</th>
    <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
        <?php
        // echo "record found";
while($row=mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td scope='row'>".$row["id"]."</td>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$row["price"]." PKR </td>";
echo "<td>".$row["stock"]." pieces</td>";
echo "<td>
<a href='update.php?id=".$row["id"]."' class='btn btn-success'>Update</a>
<a href='delete.php?id=".$row["id"]."' class='btn btn-danger'>Delete</a>
</td>";
echo "</tr>";
}

echo " </tbody>
</table>";

$sql="SELECT * FROM products ;";
$result1=mysqli_query($connection,$sql) or die("query failed");

$totalRecords=mysqli_num_rows($result1);
$totalPages=ceil($totalRecords/$limit); //50/5=10
echo '
<nav aria-label="Page navigation example" class="d-flex justify-content-center">
  <ul class="pagination">';
if($page > 1){
echo '
    <li class="page-item">
      <a class="page-link" href="index.php?page='.($page - 1).'" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';}

    
for($i=1; $i<=$totalPages ;$i++){

if($page == $i){
    $status= "active";

}else{
    $status= "";
}

    echo'
    <li class="page-item '.$status.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>
   ';  }

   if($page < $totalPages){
echo'
    <li class="page-item">
      <a class="page-link" href="index.php?page='.($page + 1).'"" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';}

echo'
  </ul>
</nav>
';

    }else{
        echo "record not found";

    }
    ?>
    </div>
</body>
</html>