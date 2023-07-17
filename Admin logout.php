<?php
    session_start();
    unset($_SESSION["password"]);
    header('location:Admin signin.php');
?>
