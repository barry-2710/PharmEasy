<?php
include "db.php";
include "auth.php";
$total_customers = "SELECT COUNT(*) FROM users";
$result = mysqli_query($db,$total_customers);
$total_customers = mysqli_fetch_array($result)[0];

$total_orders = "SELECT COUNT(*) FROM orders";
$result = mysqli_query($db,$total_orders);
$total_orders = mysqli_fetch_array($result)[0];

$total_products = "SELECT COUNT(*) FROM products";
$result = mysqli_query($db,$total_products);
$total_products = mysqli_fetch_array($result)[0];

$result = mysqli_query($db, 'SELECT SUM(amount) AS value_sum FROM orders'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php include "admin_navbar.php"; ?>
    <div class="main-content" style="min-height:95vh;">
        <div class="container text-center mt-4 mb-4">
            <h2>Admin Panel</h2>
        </div>
        <div class="container">
        <div class="row pt-2">
            <div class="col-lg-3 col-sm-6 pt-4">
                <div class="card shadow bg-primary text-white">
                    <div class="card-body">
                        <strong><p class="text-center">Total Customers</p></strong>
                        <strong><h2 class="text-center"><?php echo $total_customers; ?></h2></strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 pt-4">
                <div class="card shadow bg-primary text-white">
                    <div class="card-body">
                        <strong><p class="text-center">Total Orders</p></strong>
                        <strong><h2 class="text-center"><?php echo $total_orders; ?></h2></strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 pt-4">
                <div class="card shadow bg-primary text-white">
                    <div class="card-body">
                        <strong><p class="text-center">No of Products</p></strong>
                        <strong><h2 class="text-center"><?php echo $total_products; ?></h2></strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 pt-4">
                <div class="card shadow bg-primary text-white">
                    <div class="card-body">
                        <strong><p class="text-center">Money Earned</p></strong>
                        <strong><h3 class="text-center">Rs <?php echo $sum; ?>.00</h3></strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <h2 class="text-center mb-5">Latest Orders</h2>
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
                if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];
                }
                else{
                    $id = 0;
                } 
                $sql = "SELECT orders.order_id, orders.payment_id, orders.delivery, orders.payment_method, orders.created_at,  products.product_id, products.name, products.description, products.image, products.final_cost
                FROM products 
                INNER JOIN orders ON products.product_id=orders.product_id ORDER BY orders.order_id desc LIMIT 3 ";
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
                    echo "<div class='container text-center text-dark'><h4>No products yet, Comming Soon..</h4></div>";
                }
            ?>
             </tbody>
            </table>
            </div>
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
    <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
});
        </script>
    
  </body>
</html>
