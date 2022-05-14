
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
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                        <div class="card-body">
                            <form method="POST" action="handler.php" onsubmit="return checkCreds()">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="email" type="email" placeholder="name@example.com" />
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <label id="error-password" class="validate-messages"></label>
                                    <input class="form-control" name="password" type="password" onkeyup="passwordReset()" placeholder="Enter new password" />
                                    <label for="inputPassword">New Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <label id="error-confirm" class="validate-messages"></label>
                                    <input class="form-control" name="confirm" type="password" onkeyup="confirmReset()" placeholder="Confirm password" />
                                    <label for="inputPassword">Confirm Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary" name="reset">Reset Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="login.php">Sign In!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php') ?>

</div>

</body>

</html>
<script>
function passwordReset() {

    let password = $('input[name=password]').val();
    if(password.length > 0) {

        if(password.length < 8){
            $('#error-password').css('color','red').html('Unaccepted Password');
        }
        else if(!(/[a-z]/.test(password))){
            $('#error-password').css('color','red').html('Unaccepted Password');
        }
        else if(!(/[A-Z]/.test(password))){
            $('#error-password').css('color','red').html('Unaccepted Password');
        }
        else if(!(/[0-9]/.test(password))){
            $('#error-password').css('color','red').html('Unaccepted Password');
        }
        else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
            $('#error-password').css('color','red').html('Unaccepted Password');
        }else{
            $('#error-password').css('color','green').html('Accepted Password');
        }
    }else{
        $('#error-password').html('');
    }


}

function confirmReset(){

    let password = $('input[name=password]').val();
    let password_confirm = $('input[name=confirm]').val();

    if (password_confirm.length === 0) {
        $('#error-confirm').html('');
        return;
    }

    if (password === password_confirm) {
        $('#error-confirm').css('color','green').html('Match');
        return;
    }
    else {
        $('#error-confirm').css('color','red').html('No Match');
        return;
    }

}

    function checkCreds(){


        if($('#error-confirm').css('color') =='rgb(255, 0, 0)'){
            $('input[name=confirm]').focus();
            return false;
        }

        if($('input[name=password]').val() !== $('input[name=confirm]').val()){
            $('#error-confirm').css('color','red').html('No Match');
            $('input[name=confirm]').focus();
            return false;
        }

        if($('#error-password').css('color') =='rgb(255, 0, 0)'){
            $('input[name=password]').focus();
            return false;
        }


        return true;
    }
</script>

