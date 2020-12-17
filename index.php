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
        <div class="main-content">
        <?php    
                if(isset($_SESSION['success']))
                {
            ?>
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['success'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
            <div class="container p-2">
                <h3 class="text-uppercase text-center mb-4 mt-4">Our Products</h3>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card" style="width: 11rem;">
                            <img src="src/img/products/mask.jpg" class="card-img-top border" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">N-95 Mask</h5>
                                <p class="card-text text-muted">6 mask in one pack</p>
                                <p class="card-text fw-bold d-inline">Rs 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card" style="width: 11rem;">
                            <img src="src/img/products/mask.jpg" class="card-img-top border" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">N-95 Mask</h5>
                                <p class="card-text text-muted">6 mask in one pack</p>
                                <p class="card-text fw-bold d-inline">Rs 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card" style="width: 11rem;">
                            <img src="src/img/products/mask.jpg" class="card-img-top border" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">N-95 Mask</h5>
                                <p class="card-text text-muted">6 mask in one pack</p>
                                <p class="card-text fw-bold d-inline">Rs 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card" style="width: 11rem;">
                            <img src="src/img/products/mask.jpg" class="card-img-top border" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">N-95 Mask</h5>
                                <p class="card-text text-muted">6 mask in one pack</p>
                                <p class="card-text fw-bold d-inline">Rs 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card" style="width: 11rem;">
                            <img src="src/img/products/mask.jpg" class="card-img-top border" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">N-95 Mask</h5>
                                <p class="card-text text-muted">6 mask in one pack</p>
                                <p class="card-text fw-bold d-inline">Rs 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card" style="width: 11rem;">
                            <img src="src/img/products/mask.jpg" class="card-img-top border" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">N-95 Mask</h5>
                                <p class="card-text text-muted">6 mask in one pack</p>
                                <p class="card-text fw-bold d-inline">Rs 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <h6 class="text-center pt-2 text-success"><u>View All</u></h6>
            <div class="articles p-4 bg-light">
                <h4>Health Articles</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card" style="width: 28rem;">
                            <img src="src/img/articles/young.jpg" class="card-img-top rounded" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">Want to Keep Your Heart and Brain Young? Do This</h6>
                                <p class="card-text">Here’s a startling fact: About 3 in 4 American adults don’t get the recommended amount of physical activity, according to the Centers for Disease Control and Prevention. <a href="https://www.sharecare.com/health/aging-and-fitness/article/want-keep-heart-brain-young" target="_blank" class="fw-bold">Read More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 28rem;">
                            <img src="src/img/articles/art.jpg" class="card-img-top rounded" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">The Healthy Power of Making Art</h6>
                                <p class="card-text">Presidents, it seems, are as inclined to doddle as the rest of us. During one meeting with legislative leaders, General Eisenhower drew himself as a bold nude (from the waist up) in front of gunboats.  <a href="https://www.sharecare.com/health/art-therapy/article/healthy-power-making-art" target="_blank" class="fw-bold">Read More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 28rem;">
                            <img src="src/img/articles/workout.jpg" class="card-img-top rounded" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">Can Workouts Make You Wealthy?</h6>
                                <p class="card-text">The best way to keep your job might be to leave your desk. That's right: The less time you spend sitting on your bottom, the better it might be for your -- and your company's -- bottom line. <a href="https://www.sharecare.com/health/benefits-regular-exercise/article/can-workouts-make-you-wealthy" target="_blank" class="fw-bold">Read More</a></p>
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