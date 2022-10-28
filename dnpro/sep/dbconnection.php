<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "signupdata";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    echo ("sorry we failed to connect".mysqli_connect_error());
}
/* else {
    echo "connection established successfully";
} */
?>