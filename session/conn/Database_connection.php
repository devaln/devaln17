<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user1";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    echo "Error to connect". mysqli_connect_error($conn);
}
// else{
//     echo "Connection Established Successfully";
// }
?>