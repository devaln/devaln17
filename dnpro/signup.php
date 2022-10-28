<?php
    $showalert = false;
    $showerror = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        include 'sep/dbconnection.php';
    $username = $_POST["username"];
    $emailaddress = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $Fullname = $_POST["Fullname"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
        
    $sqlname = "SELECT * FROM registereddata WHERE username ='$username'";
    $result = mysqli_query($conn, $sqlname);
    $existsname = mysqli_num_rows($result);

    if($existsname > 0){
        $showerror = "username already Exists";
    }
    elseif(($password == $conpassword)){
        $sql = "INSERT INTO registereddata (username, email, phonenumber, Fullname, password) VALUES ('$username', '$emailaddress', '$phonenumber', '$Fullname', '$password')";
        $result = mysqli_query($conn, $sql); 
        if($result){
            $showalert = true;
            session_start();
            header("location: login.php");
        }
    }
    else{
            $showerror = "passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
<style><?php require 'sep/style.css'; ?></style>
<title>Signup</title>
</head>
<body>
<?php require 'sep/navig.php'; ?>

<?php
if($showalert)
echo '<div class="alert alert-success">
    <strong>Success!</strong> Your account has been created and Now you are able to login.
    </div>';
if($showerror)
echo '<div class="alert alert-danger">
    <strong>Danger!</strong>'.$showerror.'
    </div>';

    echo '<h1>SIGN UP TO OUR WEBSITE.</h1><br>';
?>
<div class = "container">
<center>
    <form action="/dnpro/signup.php" method="post">
        <table>
        <tr><div class="form-label"><h3> Please fill the below details to move further.</h3>
            <td><label for="Fullname" class="form-label">Name :</label></td>
            <td><input type="text" class="form-control" id="Fullname" name="Fullname" ></td>
        </div></tr>

        <tr><div class="form-label ">
            <td><label for="username" class="form-label">UserName :</label></td>
            <td><input type="text" max_lenght="11" class="form-control" id="username" name="username"></td>
        </div></tr>

        <tr><div class="form-label">
            <td><label for="email" class="form-label ">EmailAddress :</label></td>
            <td><input type="mail" class="form-control" id="email" name="email" aria-describedby="emailHelp"></td>
        </div></tr>

        <tr><div class="form-label">
            <td><label for="phonenumber" class="form-label">PhoneNumber :</label></td>
            <td><input type="text" max_lenght="10" class="form-control" id="phonenumber" name="phonenumber" ></td>
        </div></tr>

        <tr><div class="form-label">
            <td><label for="password" class="form-label">Password :</label></td>
            <td><input type="password" class="form-control" id="password" name="password"></td>
        </div></tr>

        <tr><div class="form-label">
            <td><label for="conpassword" class="form-label">Confirm Password :</label></td>
            <td> <input type="password" class="form-control" id="conpassword" name="conpassword"></td>
        </div></tr>
    </table><br>
    <button type="submit" class="btn btn-primary">SignUp</button>
    <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</center>
</div>
</body>
</html>