<?php
    session_start();
    if(!isset($_SESSION["loggedin"])){

        header("location:login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome -</title>
</head>
<body>
    <h1>Hello-- This is your welcome page<h1><br>

    <a href="logout.php">Click here</a> if you want to logout.
</body>
</html>