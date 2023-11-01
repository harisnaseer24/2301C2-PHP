<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
    
    // echo ("<h1>Welcome ".$_POST["fullname"]." S/O ".$_POST["fathername"]." to our website. </h1>" ."<h2>We will contact you at ".$_POST["contact"]."</h2>");
    echo ("<h1>Welcome ".$_REQUEST["fullname"]." S/O ".$_REQUEST["fathername"]." to our website. </h1>" ."<h2>We will contact you at ".$_REQUEST["contact"]."</h2>");


foreach ($_REQUEST as $key => $value) {
    echo $key.":".$value."<br>";
}

    ?>
</body>
</html>