<?php
session_start();

if(!isset($_SESSION["loggedin"])){
header('location: login.php');
exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" 
    crossorigin="anonymous">
    <style><?php require 'sep/style.css'; ?></style>

    <title>HOME PAGE</title>
</head>
<body>
<?php require 'sep/navig.php' ?>

<div class="alert alert-danger dismisible-alert class=close">
<strong>You loggedin successfully.</strong> Welcome to home page.     
</div>
<h1>WELCOME___<?php echo $_SESSION['username']?></h1>
<br>
<div align='center'>
<h4 class="text-center">Welcome to Home page <?php echo $_SESSION['username']?>.</h4>
</div>
<div>
     To change your password <a href="change_password.php">Click Here</a>
</div>
</body>
</html>