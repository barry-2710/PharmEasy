<?php
include "db.php";
include "auth.php";
if(isset($_POST['submit'])){
    $total = $_POST['total'];
}
//A simple piece of code which get the id of a todo task and delets it from table
$user_id = $_SESSION['id'];
$sql="SELECT address FROM users WHERE user_id = $user_id";
$res=$db->query($sql);
if($res->num_rows>0)
{ 
    $row=$res->fetch_assoc();
}
if($row['address']=='bangalore'){
    $required = "required";
    $no_address = true;
}
else{
    $required = "";
    $no_address = false;
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
           <h2 class="text-center">Checkout</h2>
           <div class="container">
            <h5>Hello <?php echo $_SESSION['username']; ?>,</h5><br>
            <p>Check the details below</p>
            <h5 class="fw-bold text-center mb-5 mt-5">Address Details</h5>
            <form action="payment.php" method="post">
                <?php 
                    if($no_address)
                    {
                ?>
                <div id="address_form" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="name" <?php echo $required ?>>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">phone</label>
                        <input type="number" class="form-control" name="phone" id="inputPassword4" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address1" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" name="address2" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="inputCity" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select" name="state" required>
                        <option selected>Choose...</option>
                        <option>Karnataka</option>
                        <option>Andhra Pradesh</option>
                        <option>Tamil Nadu</option>
                        <option>Kerala</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" name="zip" id="inputZip" required>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                            I agree to all TC
                        </label>
                        </div>
                    </div>
                </div>
                <?php 
                    }else{
                ?>
                <div class="form-check bg-light p-5">
                    <input class="form-check-input" type="radio" name="address" value="<?php echo $row['address']; ?>" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2" style="width:300px;">
                       Delivery Address: <?php echo $row['address']; ?> 
                    </label>
                    </div>
                <?php } ?>
                <h5 class="fw-bold text-center mb-5 mt-5">Payment Details</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Total</label>
                        <fieldset disabled>
                        <input type="text" class="form-control"  value="Rs <?php echo $total; ?>.00" id="inputCity">
                        </fieldset>
                        <input type='hidden' name='total' value='<?php echo $total; ?>'>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Payment Option</label>
                        <select id="inputState" name="payment_option" class="form-select">
                        <option selected>COD</option>
                        <option>Credit Card</option>
                        <option>Debit Card</option>
                        <option>UPI</option>
                        </select>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" class="btn btn-secondary mt-5 mb-5">Make Payment</button>
                    </div>
                </div>
                </form>
           </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>