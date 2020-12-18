<?php
    include "db.php";
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    else{
        $id = 0;
    } 
    $total_pages_sql = "SELECT COUNT(*) FROM cart WHERE user_id=$id";
    $result = mysqli_query($db,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/main.css">

    <!-- bootstraplinks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>PharmEasy</title>
</head>
    <body>
        <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="admin_home.php">PharmEasy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                </div>
                <div class="d-flex">
                <ul class="navbar-nav" >
                    <?php 
                        if(isset($_SESSION["loggedin"])) {
                    ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white dropstart pad-left" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php 
                        if(isset($_SESSION["loggedin"])) {
                            echo $_SESSION["username"];
                        }
                        else{
                            echo "user";
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="admin_home.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="add_product.php">Add Products</a></li>
                        <li><a class="dropdown-item" href="view_products.php">View orders</a></li>
                    </ul>
                    </li>
                    <?php }else{
                    ?>
                    <li class="nav-item">
                    <a class="nav-link text-white  pad-left" href="login.php">Login/Register</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link text-white  pad-left" href="logout.php" tabindex="-1" aria-disabled="true"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
                </div>
                </div>
        </nav>
        </div>

    <script src="https://kit.fontawesome.com/aab1532f44.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js" ></script>
    <script src="src/js/main.js"></script>
    
    </body>
</html>