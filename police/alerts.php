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

        <div class="panel-header panel-header-lg" style="padding-top: 10%">
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
                        $sql = $conn->prepare("SELECT *,COUNT(alert.fugitive_id) AS counter FROM fugitive,alert WHERE fugitive.fugitive_id=alert.fugitive_id GROUP BY alert.fugitive_id ");
                        $sql->execute();
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
                                            Face ID
                                        </th>
                                        <th class="text-right">
                                            Open Maps
                                        </th>
                                        </thead>
                                        <tbody>';
                            foreach ($get as $case){
                                if(empty($case['image'])){
                                    $img = "../police/criminals/profile.png";
                                }else{
                                    $img = "../police/criminals/".$case['image'];
                                }
                                echo
                                    '
                                    <tr>
                                      <td>
                                            '.$case["first_name"].' '.$case["last_name"].'
                                        </td>
                                        <td>
                                            '.$case["case_number"].'
                                        </td>
                                        <td>
                                        <img src="'.$img.' " width="70">
                                        </td>
                                        <td  class="text-right">
                                            <button id="'.$case["fugitive_id"].'" class="btn btn-primary view-list">View<i class="alert-counter">'.$case["counter"].'</i></button>
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


<div class="modal fade" id="view-list">
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

                           <table id="s_table" class="table">
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
                               <tbody class="alert-list">

                               </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>


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

<div class="modal fade" id="alert-img">
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

                            <img src="assets/img/profile.png">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
