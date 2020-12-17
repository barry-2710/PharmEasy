<?php
    //This is a simple code to check if logged in or not
    session_start();
    if(!isset($_SESSION["loggedin"])) {
        header("Location: login.php");
        exit();
    }
?>