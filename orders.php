<?php
    include "auth.php";
    include "db.php";
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    else{
        $id = 0;
    } 
    $total_pages_sql = "SELECT COUNT(*) FROM orders WHERE user_id=$id";
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
           <h4 class="text-center mb-5">My Orders</h4>
           <table class="table text-center table-striped align-middle  <?php  if($total_rows > 0 ){ echo "d-none"; } ?>" >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Payment_id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Ordered On</th>
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
                $no_of_records_per_page = 10;
                $offset = ($pageno-1) * $no_of_records_per_page;
                
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $sql = "SELECT orders.order_id, orders.payment_id, orders.delivery, orders.payment_method, orders.created_at,  products.product_id, products.name, products.description, products.image, products.final_cost
                FROM products
                INNER JOIN orders ON products.product_id=orders.product_id
                where user_id=$id";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                       echo "<tr>";
                       echo "<th scope='row'>$i</th>";
                       echo "<td>{$row['payment_id']}</td>";
                       echo "<td><img src='{$row['image']}' alt='' height='50'></td>";
                       echo "<td>";
                       echo "<p class='fw-bold'>{$row['name']}</p>";
                       echo "</td>";
                       echo "<td>RS {$row['final_cost']}.00</td>";
                       echo "<td>{$row['payment_method']}</td>";
                       echo "<td><a tabindex='0' class='btn btn-link' role='button' data-bs-toggle='popover' data-bs-trigger='focus' data-bs-placement='bottom' data-bs-content='{$row['delivery']}'>Delivered to ></a></td>";
                       echo "<td>{$row['created_at']}</td>";
                       echo "</tr>";
                    }
                }
                else{
                    echo "<div class='container text-center text-dark mt-5'><h4>No Orders yet <a href='products.php'>Shop Now</a></h4></div>";
                }
            ?>
                </tbody>
            </table>
           
        </div>
        <?php include "footer.php"; ?>
        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
        </script>
    </body>
</html>