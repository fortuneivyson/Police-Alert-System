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
            if($_SESSION['user'] =='user'){
                header('location: ../user/dashboard.php');
            }
        }else{
            header('location: ../login.php');
        }

        ?>
        <!-- End Navbar -->

        <div class="panel-header panel-header-lg">
            <div class="row container d-flex justify-content-center" style="margin: auto">
                <button class="btn btn-primary m-5  new-account" ><i class="now-ui-icons ui-1_simple-add"></i> Add New Account</button>

                <?php

                if(isset($_SESSION['success'])){
                    echo '
                            <div class="alert btn-success message-alert" style="width: 100%;margin: 10px 150px;"> '
                        .$_SESSION['success'].'
                            </div>';
                    unset($_SESSION['success']);
                }

                if(isset($_SESSION['error'])){
                    echo '
                            <div class="alert btn-danger message-alert" style="width: 100%;margin: 10px 150px;"> '
                        .$_SESSION['error'].'
                            </div>';
                    unset($_SESSION['error']);
                }

                ?>
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">

                        <?php

                        $conn = $con->open();
                        $sql = $conn->prepare("SELECT * FROM user ");
                        $sql->execute();
                        $get = $sql->fetchAll();


                        if($sql->rowCount() > 0){
                            echo ' <table id="s_table" class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Surname
                                        </th>
                                        <th>
                                            ID Number
                                        </th>
                                        <th>
                                            E-mail
                                        </th>
                                        <th class="text-right">
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>';
                            foreach ($get as $data){

                                echo
                                    '
                                    <tr>
                                      <td>
                                            '.$data["first_name"].'
                                        </td>
                                        <td>
                                            '.$data["last_name"].'
                                        </td>
                                        <td>
                                            '.$data["idNo"].'
                                        </td>
                                        <td >
                                            '.$data["email"].'
                                        </td>
                                        <td class="text-right">
                                            <a id="'.$data["user_id"].'" class="edit-user" href="#"><i class="fa fa-edit text-warning"></i></a>
                                            <a id="'.$data["user_id"].'" class="delete-user" href="#"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    ';
                            }
                            echo  '
                                </tbody>
                            </table>';
                        }else{
                            echo '<h4 style="margin: 25px">No Alerts Found!</h4>';
                        }

                        ?>


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


