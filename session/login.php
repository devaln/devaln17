<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "conn/Database_connection.php";
        $email = $_POST["Email"];
        $password = $_POST["Password"];

        $sql = "SELECT * FROM login_data WHERE Email='$email'";
        $result  = mysqli_query($conn, $sql); 
        if(mysqli_num_rows($result) > 0){
            $row    = mysqli_fetch_assoc($result);
            if($row['Password'] == $password){
                echo "successfully Logged In!";
                session_start();
                $_SESSION["loggedin"]=true;
                $_SESSION["Email"]=$email;
                header("location:welcome.php");
            }
            else{
                echo "Invalid password !";
            }
        }else{
            echo "Please enter correct email!";
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
        <form action="/session/login.php" method="post">
        <div class = "form-label">
                <label for="Email">Emailaddress:- </label>
                <input type="Email" class="form-control" id="Email" name="Email" required></input>
            </div><br>

            <div class = "form-label">
                <label for="Password">Password:- </label>
                <input type="Password" class="form-control" id="Password" name="Password" required></input>
            </div><br>

            <button type="submit" class="btn btn-pirmary">Submit</button>
           
    </div>
</body>
</html>