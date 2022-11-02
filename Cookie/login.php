<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "connection/Database_connection.php";

        $email = $_POST["Email"];
        $password = $_POST["Password"];

        $query = "SELECT * FROM login_data WHERE Email='$email' AND Password='$password'";

        $result  = mysqli_query($conn, $query);

        if(empty($result)){
            $row    = mysqli_fetch_assoc($result);
            if($row['Password'] == $password){
                echo "successfully Logged In!";
                header("location:welcome.php");
            }
            else{
                echo "Invalid password !";
            }
        }else{
            echo "Please enter correct email!";
        }
        if(!empty($_POST["remember"])) {
            setcookie ("Email",$_POST["Email"],time()+ 3600);
            setcookie ("Password",$_POST["Password"],time()+ 3600);
            echo "Cookies Set Successfuly";
        } else {
            setcookie("Email","");
            setcookie("password","");
            echo "Cookies Not Set";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>This is your Login Page</h1><hr><br>

    <div class="container">
        <form action="/Cookie/login.php" method="post">
        <div class = "form-label">
                <label for="Email">Emailaddress:- </label>
                <input type="Email" value="<?php if(isset($_COOKIE["user"])) { echo $_COOKIE["Email"]; } ?>" class="form-control" id="Email" name="Email" required></input>
            </div><br>

            <div class = "form-label">
                <label for="Password">Password:- </label>
                <input type="Password" value="<?php if(isset($_COOKIE["user"])) { echo $_COOKIE["Password"]; } ?>" class="form-control" id="Password" name="Password" required></input>
            </div><br>
            <input type="checkbox" name="remember" /> Remember me</input>
            <button type="submit" class="btn btn-pirmary">Submit</button>
           
    </div>
</body>
</html>