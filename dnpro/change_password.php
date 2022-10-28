 <?php
    $login = false;
    $showerror = false;
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'sep/dbconnection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];
    
        $sql = "SELECT * FROM registereddata WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);
      if(!$result){
    echo "The username you entered does not exist";
    }
    elseif($password == $result){
    echo "You entered an incorrect password";
    }
    if($new_password == $confirm_new_password)
    $sql = "UPDATE registereddata SET password = '$new_password' where username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($result != 1){
    echo 'you entered wrong password';
    }
    else{
        echo 'your password is been change successfully';
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style><?php require 'sep/style.css'; ?></style>
    <title>Welcome-Change password</title>
</head>
<body>
<?php require 'sep/navig.php' ?>
<div class="container"></div>
<h1>Welcome, Change your password here.</h1>
<center>
<form method="POST" action="change_password.php">
    <table>
        <tr><div class="form-label">
            <td><label for="username" class="form-label">Enter your Username :</label></td>
            <td><input type="text" class="form-control" id="username" name="username"></td>
        </div></tr><br>

        <tr><div class="form-label">
            <td><label for="password" class="form-label">Enter your Exsiting password :</label></td>
            <td><input type="password" class="form-control" id="password" name="password"></td>
        </div></tr><br>

        <tr><div class="form-label">
            <td><label for="new_password" class="form-label">Enter your New password :</label></td>
            <td><input type="password" class="form-control" id="new_password" name="new_password"></td>
        </div></tr><br>

        <tr><div class="form-label">
            <td><label for="confirm_new_password" class="form-label">Re-enter your Exsiting password :</label></td>
            <td><input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password"></td>
        </div></tr><br>

    </table><br>
    <button class="btn btn-primary">Update Password</button>
</form>
</center>
    <div align="right">
        <a href="/dnpro/welcome.php">Home</a><br>
        <a href="/dnpro/logout.php">Logout</a>
    </div>
</div>
</body>
</html>