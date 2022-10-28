<?php
    $login = false;
    $showerror = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'sep/dbconnection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    
        $sql = "select * from registereddata where username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
        if($result == 1){
            $login = true;

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            header("location: welcome.php");
        }
    else{
            $showerror=" Invalid Username or Password";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" 
    crossorigin="anonymous">
    </script>
    <style><?php require 'sep/style.css'; ?></style>
<title>Login Page</title>
</head>
<body>
<?php require 'sep/navig.php'; ?>

<?php
 if($login)
echo '<div class="alert alert-success">
  <strong> Success! </strong> Your login was successfully.
</div>';
    if($showerror)
    echo '<div class="alert alert-danger ">
    <strong>!</strong>'.$showerror.'     
    </div>'; 
?>
<div class="container mt=4">
    <h1>LOGIN TO OUR WEBSITE</h1><br>
    <center>
        <form action="/dnpro/login.php" method="POST" mt-5>
            <table >
        <tr><div class="form-label">
            <td><label for="username" class="form-label">Username :</label></td>
            <td><input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"></td>
        </div></tr><br>
        <tr><div class="form-label">
            <td><label for="password" class="form-label">Password :</label></td>
            <td><input type="password" class="form-control" id="password" name="password"></td>
        </div></tr><br>
        </table>
        <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </center>
</div>
</body>
</html>