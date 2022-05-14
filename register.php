
<!DOCTYPE html>
<html lang="en">
<style>
    .panel-header{
        height: 120% !important;
    }
    @media screen and (max-width: 768px){
        .panel-header{
            height: 140% !important;
        }
    }
</style>
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
    <div>
    <div class="panel-header" style="padding-top: 5%">
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                    <div class="card-body">
                        <form method="POST" action="handler.php" onsubmit="return sendForm()">
                            <input name="register" hidden>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="inputFirstName" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" name="inputLastName" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required/>
                                        <label for="inputLastName">Last name</label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-floating mb-3">
                                <label id="msg-email" class="validate-messages"></label>
                                <input class="form-control" name="inputEmail" type="email" placeholder="name@example.com" onkeyup="emailPress()" required/>
                                <label for="inputEmail">Email address</label>
                            </div>


                            <div class="form-floating mb-3">
                                <label id="msg-mobile" class="validate-messages"></label>
                                <input class="form-control" name="inputMobile" type="text" placeholder="Enter mobile number" minlength="10" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="mobilePress()" required/>
                                <label for="inputEmail">Mobile</label>
                            </div>

                            <div class="form-floating mb-3">
                                <label id="msg-id" class="validate-messages"></label>
                                <input class="form-control" name="inputId" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPress()" required />
                                <label for="inputEmail">Identity Number (RSA)</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="inputGender" type="text" disabled />
                                <label for="inputEmail">Gender</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label id="msg-password" class="validate-messages"></label>
                                        <input class="form-control" name="inputPassword" type="password" placeholder="Create a password" onkeyup="passwordPress()" required />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label id="msg-confirm" class="validate-messages"></label>
                                        <input class="form-control" name="inputPasswordConfirm" type="password" placeholder="Confirm password" onkeyup="matchPress()" required/>
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" href="#">Create Account</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

    <?php include('includes/footer.php') ?>

</div>

</body>

</html>






