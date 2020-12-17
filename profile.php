<?php 
include "db.php";
include "auth.php";
$user_id = $_SESSION['id'];
$sql="SELECT * FROM users WHERE user_id = $user_id";
$res=$db->query($sql);
if($res->num_rows>0)
{ 
    $row=$res->fetch_assoc();
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
           <h4 class="text-center mb-4">Profile</h4>
           <div class="card mx-auto d-block bg-secondary text-white" style="width:600px;">
            <div class="card-body">
                <h6 class="font-weight-bold d-inline">Name:</h6><h6 class="float-end"> <?php echo $row['name']; ?></h6>
                <hr>
                <h6 class="font-weight-bold d-inline">Email:</h6><h6 class="float-end"> <?php echo $row['email']; ?></h6>
                <hr>
                <h6 class="font-weight-bold d-inline">Mobile:</h6><h6 class="float-end"> <?php echo $row['phone']; ?></h6>
                <hr>
                <!-- <h6 class="font-weight-bold d-inline">Address:</h6><h6 class="float-end"> <?php echo $row['address']; ?></h6> -->
                <div style="height:50px;"><h6 class="font-weight-bold d-inline">Address:</h6><h6 class="float-end text-end" style="width:320px;"> <?php echo $row['address']; ?></h6></div>
                <hr>
                <h6 class="font-weight-bold d-inline">Password:</h6><h6 class="float-end"> **********</h6>
            </div>
        </div>
           
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>