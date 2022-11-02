<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        echo ("Sorry we cannot connected to your databse".mysqli_connect_error());
    }
    // else{
    //     echo "connection established successfully";
    // }
?>