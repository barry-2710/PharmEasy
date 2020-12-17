<?php
include "db.php";
include "auth.php";
//A simple piece of code which get the id of a todo task and delets it from table

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $sql = "INSERT INTO cart (product_id, user_id)
    VALUES ('{$product_id}', '{$user_id}')";
    if($db->query($sql))
    { 
        $_SESSION['success']="Added to cart Successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        $_SESSION['success']="Sorry some error occured, Try again!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>