<?php
include "db.php";
include "auth.php";
//A simple piece of code which get the id of a todo task and delets it from table

if(isset($_POST['submit'])){
    $cart_id = $_POST['cart_id'];
    $sql = "DELETE FROM cart WHERE cart_id=$cart_id";
    if($db->query($sql))
    { 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        $_SESSION['success']="Sorry some error occured, Try again!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>