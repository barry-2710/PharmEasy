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
        <div class="main-content mt-5">
            <div class="container">
                <div class="card shadow">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block d-xl-block">
                        <img src="src/img/masks.jpeg" alt="" style="height:500px;width:100%;min-height:200px;">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="container">
                            <!-- Default form login -->
                                <form class="text-center pt-3" method="POST" action="#">
                                <p class="h4 mb-5 font-weight-bold">Sign in</p>

                                <!-- Email -->
                                <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email" value="Email" required autocomplete="email" autofocus>

                                <!-- Password -->
                                <input type="password" id="password" class="form-control mb-4" placeholder="Password" name="password" required autocomplete="current-password">

                                <!-- Sign in button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info btn-block my-4 " style="border-radius:40px" type="submit">Sign in</button>
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
    </body>
</html>