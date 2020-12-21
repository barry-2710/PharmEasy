<?php
include "db.php";
include "auth.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PharmEasy</title>
  </head>
  <body>
  <?php include "admin_navbar.php"; ?>
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
  <?php
    if(isset($_POST['submit'])){
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $category = $_POST['product_category'];
        $mrp = $_POST['product_mrp'];
        $final_cost = $_POST['product_final_cost'];
        //This is from where the file upload starts
        $target_dir = "src/img/products/".uniqid();
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($category!='lab'){
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                    $_SESSION['error']= "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $_SESSION['error']= "File is not an image.";
                    $uploadOk = 0;
                }
                

                // Check if file already exists
                if (file_exists($target_file)) {
                $_SESSION['error']= "Sorry, file already exists.";
                $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                $_SESSION['error']= "Sorry, your file is too large.";
                $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $_SESSION['error']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                $_SESSION['error']= "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                } else {
                    $_SESSION['error']= "Sorry, there was an error uploading your file.";
                }
            }
        }
        else{
            $target_file = "src/img/products/labtest.png";
        }
        //This is where the file check ends
        $sql="INSERT INTO products(name,description,image,category,MRP,final_cost)
        VALUES ('{$name}','{$description}','{$target_file}','{$category}','{$mrp}','{$final_cost}')";
        if($db->query($sql))
        {
            $_SESSION['success']="Product Added";
        }

    }  

  ?>
    <div class="main-content" style="min-height:95vh;">
        <div class="container text-center mt-4 mb-4">
            <h2 class="text-center mb-5">Add Products</h2>
        </div>
        <div class="container">
        <form class="row g-3" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control" name="product_name" placeholder="Enter product name" id="inputEmail4" required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <input type="text" class="form-control" name="product_description" id="inputAddress" placeholder="Enter product description" required>
  </div>
  <div class="mb-3">
  <label for="fileToUpload" class="form-label">Select Product image</label>
  <input class="form-control form-control-sm" name="fileToUpload" id="fileToUpload" type="file" required>
</div>
<div class="col-5">
    <label for="inputState" class="form-label">Category</label>
    <select id="inputState" name="product_category" class="form-select" required>
      <option selected value="product">Product</option>
      <option value="medicine">Medicine</option>
      <option value="lab">Lab</option>
    </select>
  </div>
  <div class="col-md-6">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">MRP</label>
    <input type="number" name="product_mrp" class="form-control" placeholder="Enter the MRP Price" id="inputZip" required>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Final Cost</label>
    <input type="number" name="product_final_cost" class="form-control" placeholder="Enter the final discounted price" id="inputZip" required>
  </div>
  <div class="col-12 text-center">
    <button type="submit" name="submit" class="btn btn-secondary">Add product</button>
  </div>
</form>
        </div>
        
    </div>
    
    
    <?php include "footer.php"; ?>
    
  </body>
</html>
