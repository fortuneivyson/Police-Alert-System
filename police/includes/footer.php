<footer class="footer">
    <div class="" style="display: inline-flex">
        <div class="copyright" id="copyright">
            &copy; <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by the <a style="color: orange">Police Alert App Team</a>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<form name="fugitive-form" method="POST" action="./handler.php" hidden>
    <input name="delete-fugitive" hidden>
</form>

<div class="modal fade" id="new-account">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php" onsubmit="return sendForm('add')">

                    <div class="form-floating mb-3">
                        <select class="form-control" name="new-account" required>
                            <option value="" selected disabled>Select account to create</option>
                            <option>police</option>
                            <option>User</option>
                        </select>
                        <label for="inputEmail">Account Type</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="add-first-name" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                <label for="inputFirstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="add-last-name" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required/>
                                <label for="inputLastName">Last name</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-floating mb-3">
                        <label id="val-email" class="validate-messages"></label>
                        <input class="form-control" name="add-email" type="email" placeholder="name@example.com" onkeyup="emailPress('add')" required/>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <label id="val-mobile" class="validate-messages"></label>
                        <input class="form-control" name="add-mobile" type="text" placeholder="Enter mobile number" minlength="10" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="mobilePress('add')" required/>
                        <label for="inputEmail">Mobile</label>
                    </div>

                    <div class="form-floating mb-3">
                        <label id="val-id" class="validate-messages"></label>
                        <input class="form-control" name="add-id" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPress('add')" required />
                        <label for="inputEmail">Identity Number (RSA)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="add-gender" type="text" disabled />
                        <input class="form-control" name="gender" type="text" hidden />
                        <label for="inputEmail">Gender</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <label id="val-password" class="validate-messages"></label>
                                <input class="form-control" name="add-password" type="text" placeholder="Create a password" onkeyup="passwordPress('add')" required />
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <label id="val-confirm-password" class="validate-messages"></label>
                                <input class="form-control" name="add-confirm-password" type="password" placeholder="Confirm password" onkeyup="matchPress('add')" required/>
                                <label for="inputPasswordConfirm">Confirm Password</label>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Save</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<div class="modal fade" id="crime-report">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Case Registration <i class="fa fa-info"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <div class="form-group">
                    <span class="alert-date"><?php echo date('d-m-Y h:i') ?></span>
                    <div class="case-num"></div>
                    <span>Your alert has been sent to the iER Helpdek! An agent will contact you shortly</span>

                </div>

            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="delete-case">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Delete Case <i class="fa fa-trash"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php">
                    <div class="form-group">
                        <input name="delete-case" hidden>
                        <span class="lbl-case"></span>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i> Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade" id="delete-user">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Delete User <i class="fa fa-trash"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php">
                <div class="form-group">
                    <input name="delete-user" hidden>
                    <span class="delete-user-msg"></span>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i> Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade" id="delete-police">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Delete Police <i class="fa fa-trash"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php">
                    <div class="form-group">
                        <input name="delete-police" hidden>
                        <span class="delete-police-msg"></span>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i> Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade" id="edit-user">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit User <i class="fa fa-pencil"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php" onsubmit="return sendForm('user')">
                    <input name="edit-user" hidden>
                    <input name="edit_id" value=" <?php echo $_SESSION['id'] ?>" hidden>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="user-first-name" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                <label for="inputFirstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="user-last-name" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required/>
                                <label for="inputLastName">Last name</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-floating mb-3">
                        <label id="user-msg-email" class="validate-messages"></label>
                        <input class="form-control" name="user-email" type="email" placeholder="name@example.com" onkeyup="emailPress('user')" required/>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <label id="user-msg-mobile" class="validate-messages"></label>
                        <input class="form-control" name="user-mobile" type="text" placeholder="Enter mobile number" minlength="10" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="mobilePress('user')" required/>
                        <label for="inputEmail">Mobile</label>
                    </div>

                    <div class="form-floating mb-3">
                        <label id="user-msg-id" class="validate-messages"></label>
                        <input class="form-control" name="user-id" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPress('user')" required />
                        <label for="inputEmail">Identity Number (RSA)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="gender" type="text" disabled />
                        <input class="form-control" name="user-gender" type="text" hidden />
                        <label for="inputEmail">Gender</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <label id="user-msg-password" class="validate-messages"></label>
                                <input class="form-control" name="user-password" type="text" placeholder="Create a password" onkeyup="passwordPress('user')" required />
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <label id="user-msg-confirm" class="validate-messages"></label>
                                <input class="form-control" name="user-inputPasswordConfirm" type="password" placeholder="Confirm password" onkeyup="matchPress('user')" required/>
                                <label for="inputPasswordConfirm">Confirm Password</label>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<div class="modal fade" id="edit-police">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Police <i class="fa fa-pencil"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php" onsubmit="return sendForm('police')">
                    <input name="edit-police" hidden>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="police-first-name" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                <label for="inputFirstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="police-last-name" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required/>
                                <label for="inputLastName">Last name</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-floating mb-3">
                        <label id="police-msg-email" class="validate-messages"></label>
                        <input class="form-control" name="police-email" type="email" placeholder="name@example.com" onkeyup="emailPress('police')" required/>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <label id="police-msg-mobile" class="validate-messages"></label>
                        <input class="form-control" name="police-mobile" type="text" placeholder="Enter mobile number" minlength="10" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="mobilePress('police')" required/>
                        <label for="inputEmail">Mobile</label>
                    </div>

                    <div class="form-floating mb-3">
                        <label id="police-msg-id" class="validate-messages"></label>
                        <input class="form-control" name="police-id" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPress('police')" required />
                        <label for="inputEmail">Identity Number (RSA)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="gender" type="text" disabled />
                        <input class="form-control" name="police-gender" type="text" hidden />
                        <label for="inputEmail">Gender</label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <label id="police-msg-password" class="validate-messages"></label>
                                <input class="form-control" name="police-password" type="text" placeholder="Create a password" onkeyup="passwordPress('police')" required />
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <label id="police-msg-confirm" class="validate-messages"></label>
                                <input class="form-control" name="police-inputPasswordConfirm" type="password" placeholder="Confirm password" onkeyup="matchPress('police')" required/>
                                <label for="inputPasswordConfirm">Confirm Password</label>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade" id="add-fugitive">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Add Fugitive <i class="fa fa-pencil"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="fugitive-first-name" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                <label for="inputFirstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="fugitive-last-name" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required>
                                <label for="inputLastName">Last name</label>
                            </div>
                        </div>
                    </div>


                    <!--                    <div class="form-floating mb-3">-->
                    <!--                        <label id="msg-id" class="validate-messages"></label>-->
                    <!--                        <input class="form-control" name="police-id" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPress()" required />-->
                    <!--                        <label for="inputEmail">Identity Number (RSA)</label>-->
                    <!--                    </div>-->

                    <div class="form-floating mb-3">
                        <select class="form-control" name="fugitive-gender" type="text" required>
                            <option value="" selected disabled>Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                        <label for="inputEmail">Gender</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" rows="3" name="fugitive-about" type="text" style="border: 1px lightgrey solid"  required ></textarea>
                        <label for="inputEmail">About Fugitive</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="fugitive-image" type="file" accept="image/png, image/gif, image/jpeg" required />
                        <label for="inputEmail">Upload Image</label>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" name="add-fugitive" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Save</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade" id="edit-fugitive">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Edit Fugitive <i class="fa fa-pencil"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <form method="POST" action="./handler.php" enctype="multipart/form-data">
                    <input name="edit-fugitive" hidden>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="fugitive-first-name" type="text" minlength="3" placeholder="Enter your first name" onkeypress="return /[a-z]/i.test(event.key)"  required/>
                                <label for="inputFirstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="fugitive-last-name" type="text" minlength="3" placeholder="Enter your last name"  onkeypress="return /[a-z]/i.test(event.key)" required/>
                                <label for="inputLastName">Last name</label>
                            </div>
                        </div>
                    </div>


                    <!--                    <div class="form-floating mb-3">-->
                    <!--                        <label id="msg-id" class="validate-messages"></label>-->
                    <!--                        <input class="form-control" name="police-id" type="text" placeholder="Enter identity number" minlength="13" maxlength="14" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="idPress()" required />-->
                    <!--                        <label for="inputEmail">Identity Number (RSA)</label>-->
                    <!--                    </div>-->

                    <div class="form-floating mb-3">
                        <select class="form-control" name="fugitive-gender" type="text" required>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                        <label for="inputEmail">Gender</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" rows="3" name="fugitive-about" type="text" style="border: 1px lightgrey solid"  required ></textarea>
                        <label for="inputEmail">About Fugitive</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="fugitive-image" type="file" accept="image/png, image/gif, image/jpg,image/jpeg" />
                        <label for="inputEmail">Upload Image</label>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Save</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<div class="modal fade" id="fug_report">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Fugitive Report <i class="fa fa-pdf"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div id="fug_div" class="modal-body">

                    <div class="form-floating mb-3">
                        <img class="form-control fug_image" width="50" height="350">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                               <label for="inputFirstName">First name</label>
                                <span class="form-control fug_name" ></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="inputLastName">Last name</label>
                                <span class="form-control fug_surname" ></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-floating mb-3">
                        <label for="inputEmail">Gender</label>
                        <span class="form-control fug_gender" ></span>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="inputEmail">About Fugitive</label>
                        <span class="form-control fug_about" ></span>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat" onclick="download('fug_div',$('.fug_surname').html())"><i class="fa fa-download"></i> Download</button>

            </div>

        </div>
    </div>
</div>
</div>


<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->


<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#s_table').DataTable();
    });
</script>

<script src="../assets/js/main.js"></script>
<script src="../assets/js/pdf.js"></script>
