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


                        <?php

                        $conn = $con->open();
                        $sql = $conn->prepare("SELECT *,fugitive.first_name AS name,fugitive.last_name AS surname 
                                             FROM fugitive,alert,user WHERE fugitive.fugitive_id=alert.fugitive_id 
                                             AND user.user_id=alert.user_id AND user.user_id=:id ");
                        $sql->execute(['id'=>$_SESSION['id']]);
                        $get = $sql->fetchAll();


                        if($sql->rowCount() > 0){
                            echo ' <table id="s_table" class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Full Names
                                        </th>
                                        <th>
                                            Case Number
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th class="text-right">
                                            Open Maps
                                        </th>
                                        </thead>
                                        <tbody>';
                            foreach ($get as $case){

                                echo
                                    '
                                        <tr>
                                          <td>
                                                '.$case["name"].' '.$case["surname"].'
                                            </td>
                                            <td>
                                                '.$case["case_number"].'
                                            </td>
                                            <td>
                                                '.$case["date"].'
                                            </td>
                                            <td  class="text-right">
                                                <button class="btn btn-primary view-report" onclick="viewReport('.$case["case_number"].')">View</button>
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

<div class="modal fade" id="view-report">
    <div class="modal-dialog" style="background: whitesmoke;max-width: 90%;width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0" style="margin-right: 0px">

                            <div id="googleMaps"></div>

                            <iframe id="reportMap" width="100%" height="540" style="border:0;margin-left: 15px;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

