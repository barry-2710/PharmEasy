<?php
include "db.php";
session_start();
$query = " ";
if(isset($_POST['search_button'])){
    $query = $_POST['query'];
}
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
        <div class="main-content p-4" style="min-height:90vh;">
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
           <div class="row pb-4">
                <div class="col-lg-6">
                    <h3>Search result for "<?php echo $query?>"</h3>
                </div>
                <div class="col-lg-6">
                    <form class="d-flex text-center">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
           </div>
           <div class="products p-4 bg-light">
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
                $no_of_records_per_page = 18;
                $offset = ($pageno-1) * $no_of_records_per_page;
                $total_pages_sql = "SELECT COUNT(*) FROM products WHERE name like '%{$query}%' || description like '%{$query}%'";
                $result = mysqli_query($db,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $sql = "SELECT product_id, name, description,image,category,MRP,final_cost, created_at FROM products WHERE name like '%{$query}%' || description like '%{$query}%' LIMIT $offset, $no_of_records_per_page";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        echo "<div class='col-lg-2 pb-3'>";
                        echo "<div class='card' style='width: 14rem;'>";
                        echo "<img src='{$row["image"]}' class='card-img-top' alt='product_image' style='height: 224px;'>";
                        echo "<hr>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title text-truncate'>{$row["name"]}</h5>";
                        echo " <p class='card-text text-muted text-truncate'>{$row["description"]}</p>";
                        echo "<p class='card-text fw-bold d-inline'>₹ {$row["final_cost"]}.00 </p>";
                        echo "<p class='card-text text-muted d-inline' style='font-size:10pt'><del>(Rs {$row["MRP"]}.00)</del></p>";
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
                    echo "<div class='container text-center text-dark'><h4>Sorry, no records found</h4></div>";
                }
            ?>
                </div>
           </div>
           <ul class="pagination container pt-4 <?php if($total_rows < 19 ){ echo 'd-none'; } ?>" id="page">
                <li><a href="?pageno=1" class="btn btn-light"><< First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="btn btn-light ml-3">< Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="btn btn-light ml-3">Next ></a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>" class="btn btn-light ml-3">Last >></a></li>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>