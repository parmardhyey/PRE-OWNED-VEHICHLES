<?php
    session_start();
    if(!isset($_SESSION["password"])) {
        header("Location: Admin signin.php");
        exit();
    }
?>