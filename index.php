<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PharmEasy</title>
</head>
    <body>
     <!-- This is Navbar -->
     <?php include "navbar.php"; ?>
        <div class="main-content ">
        <?php    
                if(isset($_SESSION['success']))
                { 
            ?>
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
                unset($_SESSION['success']);
            ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="src/img/1.jpg" class="d-block w-100" alt="..." style="height:550px;">
                    </div>
                    <div class="carousel-item">
                    <img src="src/img/2.jpg" class="d-block w-100" alt="..." style="height:550px;">
                    </div>
                    <div class="carousel-item">
                    <img src="src/img/3.jpg" class="d-block w-100" alt="..." style="height:550px;">
                    </div>
                    <div class="carousel-item">
                    <img src="src/img/4.jpg" class="d-block w-100" alt="..." style="height:550px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <div class="p-4">
                <h3 class="text-uppercase text-center mb-4 mt-4">Our Products</h3>
                <div class="row">
                <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];
                }
                else{
                    $id = 0;
                } 
                $sql = "SELECT product_id, name, description,image,category,MRP,final_cost, created_at FROM products WHERE category='product' ORDER BY product_id desc LIMIT 6";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        echo "<div class='col-lg-2 pb-3 pl-2'>";
                        echo "<div class='card' style='width: 14rem;'>";
                        echo "<img src='{$row["image"]}' class='card-img-top' alt='product_image' style='height: 224px;'> ";
                        echo "<hr>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title text-truncate'>{$row["name"]}</h5>";
                        echo " <p class='card-text text-muted text-truncate'>{$row["description"]}</p>";
                        echo "<p class='card-text fw-bold d-inline'>₹ {$row["final_cost"]}.00</p>";
                        echo "<p class='card-text text-muted d-inline' style='font-size:10pt'><del> (Rs {$row["MRP"]}.00)</del></p>";
                        echo "<form action='add_to_cart.php' method='post'>";
                        echo "<input type='hidden' name='product_id' value='{$row["product_id"]}'>";
                        echo "<input type='hidden' name='user_id' value='$id'>";
                        echo "<div class='d-grid gap-2'><button class='btn btn-outline-secondary mt-3' type='submit' name='submit'>Add to cart</button></div>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } 
                else{
                    echo "<div class='container text-center text-dark'><h4>No products yet, Comming Soon..</h4></div>";
                }
            ?>
                </div>
            </div>
                <h6 class="text-center pt-2 mb-4"><u><a href="products.php" class="text-success">View All</a></u></h6>
            <!-- get in touch from here -->
            <div class=" text-center" id="get-in-touch">
            <div id="parallax"></div>
                <div id="hero-text">
                    <h3 class="text-uppercase">Find all healthcare essentials to keep your health in top shape</h3>
                </div>
            </div>
        </div>
            <div class="articles p-4 bg-info">
                <h4 class="text-white mb-3">Health Articles</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card bg-secondary text-white shadow" style="width: 28rem;border:none;">
                            <img src="src/img/articles/young.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">Want to Keep Your Heart and Brain Young? Do This</h6>
                                <p class="card-text">Here’s a startling fact: About 3 in 4 American adults don’t get the recommended amount of physical activity, according to the Centers for Disease Control and Prevention. <a href="https://www.sharecare.com/health/aging-and-fitness/article/want-keep-heart-brain-young" target="_blank" class="text-white">Read More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="card bg-secondary text-white shadow" style="width: 28rem;border:none;">
                            <img src="src/img/articles/art.jpg" class="card-img-top rounded" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">The Healthy Power of Making Art</h6>
                                <p class="card-text">Presidents, it seems, are as inclined to doddle as the rest of us. During one meeting with legislative leaders, General Eisenhower drew himself as a bold nude (from the waist up) in front of gunboats.  <a href="https://www.sharecare.com/health/art-therapy/article/healthy-power-making-art" target="_blank" class="text-white">Read More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="card bg-secondary text-white shadow" style="width: 28rem;border:none;">
                            <img src="src/img/articles/workout.jpg" class="card-img-top rounded" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">Can Workouts Make You Wealthy?</h6>
                                <p class="card-text">The best way to keep your job might be to leave your desk. That's right: The less time you spend sitting on your bottom, the better it might be for your -- and your company's -- bottom line. <a href="https://www.sharecare.com/health/benefits-regular-exercise/article/can-workouts-make-you-wealthy" target="_blank" class="text-white">Read More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner p-4">
                <img src="src/img/Capture.PNG" alt="" class="w-100">
            </div>
        </div>
        <?php include "footer.php"; ?>
       
    </body>
</html>