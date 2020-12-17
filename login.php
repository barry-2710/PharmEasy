<?php
    include "db.php";
    session_start();
    if(isset($_SESSION["loggedin"])) {
        if($_SESSION["admin"]==1){
            header("Location: admin_home.php");
            exit();
        }
        else{
            header("Location: user_home.php");
            exit();
        }
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
    <?php
        if(isset($_POST['submit'])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            $sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
            $res=$db->query($sql);    
            if($res->num_rows>0)
            { 
                $row=$res->fetch_assoc(); 
                $_SESSION['success']=" You have successfully Logged in";
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row['user_id'];  
                $_SESSION["username"] = $row['name'];
                if($row['admin']==1){
                    $_SESSION['admin']=1;
                    echo "<script>window.open('admin_home.php','_self')</script>";
                }
                else{
                    $_SESSION['admin']=0;
                    echo "<script>window.open('index.php','_self')</script>";
                }  
            }
            else
            {
                $_SESSION['error']="E-mail id and Password dosen't match";
            }
        }
    ?>
     <!-- This is Navbar -->
     <?php include "navbar.php"; ?>
     <?php    
                if(isset($_SESSION['error']))
                {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['error'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
                unset($_SESSION['error']);
            ?>
        <div class="main-content mt-5" style="height:90vh;">
            <div class="container">
                <div class="card shadow">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block d-xl-block">
                        <img src="src/img/masks.jpeg" alt="" style="height:500px;width:100%;min-height:200px;">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="container">
                            <!-- Default form login -->
                                <form class="text-center pt-3" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <p class="h4 mb-5 font-weight-bold">Sign in</p>

                                <!-- Email -->
                                <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email" required autocomplete="email" autofocus>

                                <!-- Password -->
                                <input type="password" id="password" class="form-control mb-4" placeholder="Password" name="password" required autocomplete="current-password">

                                <!-- Sign in button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info btn-block my-4 " style="border-radius:40px" name="submit" type="submit">Sign in</button>
                                </div>
                                <!-- Register -->
                                <p>Not a member?
                                    <a href="register.php">Register</a>
                                </p>
                                </form>
                                <!-- Default form login -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
    </body>
</html>