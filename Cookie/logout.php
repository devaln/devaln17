<?php
    setcookie("user", $email, time()-1);
    header("location: login.php");
?>