<?php include('includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<body class="">
<div class="wrapper ">
    <?php include('includes/side.php') ?>
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <?php include('includes/header.php');
        if(isset($_SESSION['logged'])){
            if($_SESSION['user'] =='police'){
                header('location: police/dashboard.php');

            }
        }else{
            header('location: ../login.php');
        }
        ?>
        <!-- End Navbar -->

        <div class="panel-header panel-header-lg">
            <div class="row container d-flex justify-content-center" style="margin: auto">
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
                <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="./../assets/img/profile.png" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h6 class="f-w-600"><?php echo $_SESSION['name'] ?></h6>
                                    <p>User</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400"><?php echo $_SESSION['email'] ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h6 class="text-muted f-w-400"><?php echo $_SESSION['mobile'] ?></h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Gender</p>
                                            <h6 class="text-muted f-w-400"><?php echo $_SESSION['gender'] ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Identity Number</p>
                                            <h6 class="text-muted f-w-400"><?php echo $_SESSION['idNo'] ?></h6>
                                        </div>


                                    </div>
                                    <div class="float-right"><button class="btn btn-warning btn-profile">Edit Profile</button></div>

<!--                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <p class="m-b-10 f-w-600">Recent</p>-->
<!--                                            <h6 class="text-muted f-w-400">Sam Disuja</h6>-->
<!--                                        </div>-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <p class="m-b-10 f-w-600">Most Viewed</p>-->
<!--                                            <h6 class="text-muted f-w-400">Dinoter husainm</h6>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <ul class="social-link list-unstyled m-t-40 m-b-10">-->
<!--                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>-->
<!--                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>-->
<!--                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>-->
<!--                                    </ul>-->
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="card shadow-lg border-0 rounded-lg edit-profile">
                    <div class=""><h5 class="text-center font-weight-light">Update Profile</h5></div>
                    <div class="card-body">
                        <form method="POST" action="handler.php" onsubmit="return sendFormU()">
                            <input name="gender" value="<?php echo $_SESSION['gender'] ?>" hidden>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="inputFirstName" value="<?php echo $_SESSION['first'] ?>" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" name="inputLastName" value="<?php echo $_SESSION['last'] ?>" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required/>
                                        <label for="inputLastName">Last name</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-floating mb-3">
                                <label id="msg-mobile" class="validate-messages"></label>
                                <input class="form-control" name="inputMobile" value="<?php echo $_SESSION['mobile'] ?>" type="text" placeholder="Enter mobile number" minlength="10" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="mobilePressU()" required/>
                                <label for="inputEmail">Mobile</label>
                            </div>

                            <div class="form-floating mb-3">
                                <label id="msg-id" class="validate-messages"></label>
                                <input class="form-control" name="inputId" value="<?php echo $_SESSION['idNo'] ?>" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPressU()" required />
                                <label for="inputEmail">Identity Number (RSA)</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="inputGender" value="<?php echo $_SESSION['gender'] ?>" type="text" disabled />
                                <label for="inputEmail">Gender</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label id="msg-password" class="validate-messages"></label>
                                        <input class="form-control" name="inputPassword" value="<?php echo $_SESSION['password'] ?>" type="text" placeholder="Create a password" onkeyup="passwordPressU()" required />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label id="msg-confirm" class="validate-messages"></label>
                                        <input class="form-control" name="inputPasswordConfirm" type="password" placeholder="Confirm password" onkeyup="matchPressU()" required/>
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="update">Update Profile</button></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <div style="height: 80px;"></div>
        <?php include('includes/footer.php') ?>
    </div>
</div>

</body>

</html>
<script>
    function mobilePressU() {

        var contact = $('input[name=inputMobile]').val();

        if (contact.length === 0) {
            $('#msg-mobile').html('');
        }

        if (contact.length < 10) {
            $('#msg-mobile').css('color', 'red').html('Number is invalid');
        }

        if ((contact.length === 10 && contact[0] === "0" && (contact[1] === "6" || contact[1] === "7" || contact[1] === "8"))
            || (contact.length === 11 && contact[0] === "2" && contact[1] === "7")) {

            $('#msg-mobile').css('color', 'Green').html('Number is valid');
        } else if (contact.length > 10) {
            $('#msg-mobile').css('color', 'red').html('Number is invalid');

        }
        else {
            $('#msg-mobile').css('color', 'red').html('Number is invalid');
        }
    }


    function emailPressU() {

        var count =0;
        let email = $('input[name=inputEmail]').val();
        let dotpos = email.indexOf(".");
        let afterDot = email.substr(dotpos,email.length -1);
        var iChar = ".";

        for (var i = 0; i < email.length; i++) {
            if (iChar.indexOf(email.charAt(i)) != -1) {
                count= count+1;
            }
        }

        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
        {
            if(count > 2 || count ==0){
                $('#msg-email').css('color','red').html('Email is invalid');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za'||afterDot=='.ac.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#msg-email').css('color','green').html('Email is valid');
                }else{
                    $('#msg-email').css('color','red').html('Email is invalid');
                }
            }

        }else{
            $('#msg-email').css('color','red').html('Email is invalid');
        }
    }

    function idPressU() {

        let id = $('input[name=inputId]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#msg-id').css('color','green').html('Identity number is valid')
                : $('#msg-id').css('color','green').html('Identity number is valid');

            if(gender >= 5){
                $('input[name=inputGender]').val('male');
                $('input[name=register]').val('male');
            } else{
                $('input[name=inputGender]').val('female');
                $('input[name=register]').val('female');
            }
        }else{
            $('#msg-id').css('color','red').html('Identity number is invalid');
            $('input[name=inputGender]').val('');
            $('input[name=register]').val('');
        }
    }

    function passwordPressU() {

        let password = $('input[name=inputPassword]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#msg-password').css('color','red').html('Weak');
            }
            else if(!(/[a-z]/.test(password))){
                $('#msg-password').css('color','red').html('Weak');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#msg-password').css('color','red').html('Weak');
            }
            else if(!(/[0-9]/.test(password))){
                $('#msg-password').css('color','red').html('Weak');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#msg-password').css('color','red').html('Weak');
            }else{
                $('#msg-password').css('color','green').html('Strong');
            }
        }else{
            $('#msg-password').html('');
        }
    }

    function matchPressU(){
        let password = $('input[name=inputPassword]').val();
        let password_confirm = $('input[name=inputPasswordConfirm]').val();

        if (password_confirm.length === 0) {
            $('#msg-confirm').html('');
            return;
        }

        if (password === password_confirm) {
            $('#msg-confirm').css('color','green').html('Password match');
            return;
        }
        else {
            $('#msg-confirm').css('color','red').html('Password dont match');
            return;
        }
    }

    function sendFormU(){

        if($('#msg-confirm').css('color') =='rgb(255, 0, 0)'){
            $('input[name=inputPasswordConfirm]').focus();
            return false;
        }
        if($('input[name=inputPassword]').val() !== $('input[name=inputPasswordConfirm]').val()){
            $('#msg-confirm').css('color','red').html('Password dont match');
            $('input[name=inputPasswordConfirm]').focus();
            return false;
        }
        if($('#msg-email').css('color') =='rgb(255, 0, 0)'){
            $('input[name=inputEmail]').focus();
            return false;
        }

        if($('#msg-password').css('color') =='rgb(255, 0, 0)'){
            $('input[name=inputPassword]').focus();
            return false;
        }
        if($('#msg-id').css('color') =='rgb(255, 0, 0)'){
            $('input[name=inputId]').focus();
            return false;
        }

        if($('#msg-mobile').css('color') =='rgb(255, 0, 0)'){
            $('input[name=inputMobile]').focus();
            return false;
        }
        return true;

    }
</script>

