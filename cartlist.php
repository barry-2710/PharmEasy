<?php
    include "auth.php";
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
    <title>PharmEasy</title>
</head>
    <body>
     <!-- This is Navbar -->
     <?php include "navbar.php"; ?>
        <div class="main-content p-4" style="min-height:90vh;">
           <h4 class="text-center mb-5">Cart</h4>
           <table class="table text-center align-middle  <?php  if($total_rows <= 0 ){ echo "d-none"; } ?>" >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 18;
                $offset = ($pageno-1) * $no_of_records_per_page;
                
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $sql = "SELECT cart.cart_id, products.name, products.description, products.image, products.final_cost
                FROM products
                INNER JOIN cart ON products.product_id=cart.product_id
                where user_id=$id";
                $total = 0;
                $res=$db->query($sql);
                if($res->num_rows>0){
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        $total += $row['final_cost'];
                       echo "<tr>";
                       echo "<th scope='row'>$i</th>";
                       echo "<td><img src='{$row['image']}' alt='' height='50'></td>";
                       echo "<td>";
                       echo "<p class='fw-bold'>{$row['name']}</p>";
                       echo "</td>";
                       echo "<td>RS {$row['final_cost']}.00</td>";
                       echo "<form action='remove_cart.php' method='post'>";
                       echo "<input type='hidden' name='cart_id' value='{$row['cart_id']}'>";
                       echo "<td><button type='submit' name='submit' class='btn btn-outline-secondary'>Remove Item</button></td>";
                       echo "</form>";
                       echo "</tr>";
                    }
                }
                else{
                    echo "<div class='container text-center text-dark mt-5'><h4>No Items in cart <a href='products.php'>Shop Now</a></h4></div>";
                }
            ?>
             <tr class=" ">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Total : <?php echo $total ?>.00 Rs</th>
                <th scope="col"></th>
            </tr>
                </tbody>
            </table>
            <div class="text-center mt-5 <?php  if($total_rows <= 0 ){ echo "d-none"; } ?>">
                <form action="checkout.php" method="post">
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <button class="btn btn-success" type="submit" name="submit">Check Out</button>
                </form>
            </div>
           
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>