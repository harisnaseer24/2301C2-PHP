<?php 
include "../essentials/header.php";
// require "../essentials/config.php";
session_start();
if(isset($_SESSION['uname']))
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .me-7{
            margin-right:100px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aptech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

      </ul>
      <div class="d-flex me-7" >
      <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php echo $_SESSION['uname'] ?>
          </a>
      <ul class="dropdown-menu me-4 text-light">
            <li><a class="dropdown-item" href="#">     <?php echo $_SESSION['email'] ?></a></li>
            <li> <a class="mx-3 btn btn-outline-success" href="logout.php" type="submit">LOG OUT</a></li>
          </ul>
</div>
       
</div>
    </div>
  </div>
</nav>
</body>
</html>
<?php 
}
else{
    header("location: login.php");
}

?>