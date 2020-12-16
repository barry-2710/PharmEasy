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
        <div class="main-content p-4" style="min-height:90vh;">
           <div class="row pb-4">
                <div class="col-lg-2">
                    <h2>Lab tests</h2>
                </div>
                <div class="col-lg-6">
                    <form class="d-flex text-center">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                Sort by : <span class="badge bg-secondary p-2">High-Low</span> <span class="badge bg-secondary p-2">Low-High</span>
                </div>
           </div>
           <div class="products p-4 bg-light">
                <div class="row">
                    <div class="col-lg-4 pb-3">
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">Full Body Checkup</h5>
                                <p class="card-text text-muted">Includes 6 tests</p>
                                <p class="card-text fw-bold d-inline">₹ 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                                <button class="btn btn-secondary mt-3 float-right" id="add_button">Add to cart</button>
                            </div>
                        </div>
                    </div>     
                    
                    <div class="col-lg-4 pb-3">
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">Full Body Checkup</h5>
                                <p class="card-text text-muted">Includes 6 tests</p>
                                <p class="card-text fw-bold d-inline">₹ 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                                <button class="btn btn-secondary mt-3 float-right" id="add_button">Add to cart</button>
                            </div>
                        </div>
                    </div>       
                    <div class="col-lg-4 pb-3">
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">Full Body Checkup</h5>
                                <p class="card-text text-muted">Includes 6 tests</p>
                                <p class="card-text fw-bold d-inline">₹ 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                                <button class="btn btn-secondary mt-3 float-right" id="add_button">Add to cart</button>
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-4 pb-3">
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">Full Body Checkup</h5>
                                <p class="card-text text-muted">Includes 6 tests</p>
                                <p class="card-text fw-bold d-inline">₹ 350.00</p>
                                <p class="card-text text-muted d-inline" style="font-size:10pt"><del>(Rs 650.00)</del></p>
                                <button class="btn btn-secondary mt-3 float-right" id="add_button">Add to cart</button>
                            </div>
                        </div>
                    </div>   


                </div>
           </div>
           
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>