
<!DOCTYPE html>
<html lang="en">
<body class="">
<div class="wrapper ">

        <!-- Navbar -->
        <?php include('includes/header.php');

        if(isset($_SESSION['logged'])){
            if($_SESSION['user'] =='user'){
                header('location: user/dashboard.php');

            }
            if($_SESSION['user'] =='police'){
                header('location: police/dashboard.php');

            }
        }
        ?>
        <!-- End Navbar -->
        <div class="panel-header" style="padding-top: 10%">
            <div class="row justify-content-center" style="margin: 5px">
                <div class="col-lg-5">
                    <?php

                    if(isset($_SESSION['success'])){
                        echo '
                            <div class="alert btn-success message-alert"> '
                            .$_SESSION['success'].'
                            </div>';
                        unset($_SESSION['success']);
                    }

                    if(isset($_SESSION['error'])){
                        echo '
                            <div class="alert btn-danger message-alert"> '
                            .$_SESSION['error'].'
                            </div>';
                        unset($_SESSION['error']);
                    }

                    ?>

                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                            <form method="POST" action="handler.php">
                                <input name="login" value="login" hidden>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="inputEmail" type="email" placeholder="name@example.com" />
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="inputPassword" type="password" placeholder="Password" />
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="inputRememberPassword" type="checkbox" value="" />
                                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="reset-password.php">Forgot Password?</a>
                                    <button type="submit" class="btn btn-primary" href="#">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php') ?>

</div>

</body>

</html>


