<?php
include "db.php";
include "auth.php";
//A simple piece of code which get the id of a todo task and delets it from table

if(isset($_POST['submit'])){
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $payment_id = uniqid($username);
    if(isset($_POST['address'])){
        $final_address = $_POST['address'];
        $total = $_POST['total'];
        $payment_option = $_POST['payment_option'];
    }
    else{
        $val = false;
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $final_address = $name.", ".$address1.", ".$address2.", ".$city."-".$zip.", ".$state.", Mob:".$phone;
        $total = $_POST['total'];
        $payment_option = $_POST['payment_option'];
        $sql = "UPDATE users SET address='$final_address' WHERE user_id=$id";
        if($db->query($sql)){
            echo("");
        }
        else{
            echo("error");
        }
    }
    $sql = "SELECT cart.cart_id, products.name, products.final_cost, products.product_id
    FROM products
    INNER JOIN cart ON products.product_id=cart.product_id
    where user_id=$id";
    $res=$db->query($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
            $order_sql = "INSERT INTO orders(user_name,user_id,delivery,product_id,product_name,amount,payment_method,payment_status,payment_id)
            VALUES ('{$username}','{$id}','{$final_address}','{$row['product_id']}','{$row['name']}','{$total}','{$payment_option}',1,'{$payment_id}')";
            if($db->query($order_sql)){
                $empty_sql = "DELETE FROM cart WHERE user_id=$id";
                if($db->query($empty_sql)){
                    $val = true;
                }  
            }
            else{
                $val = false;
            }
        }
        if($val){
            echo "<script>window.open('success.php','_self')</script>";
        }
        else{
            echo "error";
        }
    }
    else{
        echo "<div class='container text-center text-dark mt-5'><h4>No Items in cart <a href='products.php'>Shop Now</a></h4></div>";
    }
}

?>