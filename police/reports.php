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
                <div class="card user-card-full" style="min-height: 300px;">

                    <div class="form-group" style="width: 20%;margin: 5px">
                        <form id="report-form" method="POST" action="handler.php" enctype="multipart/form-data">
                            <select class="form-control" name="reportType" onchange="document.getElementById('report-form').submit()" required>
                                <option value="" selected disabled>Select report type</option>
                                <option value="alert">Alert</option>
                                <option value="reported">Reported</option>
                                <option value="users">Users</option>

                            </select>
                        </form>
                    </div>

                    <hr>



                    <div class="row m-l-0 m-r-0 " style="display: block"  <?php if(!isset($_SESSION['type'])){echo 'hidden';} else if($_SESSION['type'] !=='alert'){ echo 'hidden';} ?>>

                        <div class="form-group" style="width: 50%;margin: 5px">

                            <form id="alert-form" method="POST" action="handler.php" enctype="multipart/form-data" style="margin-left: 15px">
                                <strong>Sort by date</strong>
                                <div class="flex" style="display: flex">
                                    <input class="form-control" name="alertType" type="date" style="width: min-content">
                                    <button type="submit" class="btn btn-success btn-flat" style="margin-left: 20px"><i class="fa fa-cog"></i> Generate Report</button>

                                </div>

                            </form>
                        </div>
                        <br>

                        <div id="alert_sum" style="margin-left: 20px">


                        <?php
                        $conn = $con->open();
                        if(isset($_SESSION['alertType'])){
                            echo '<h3>All alerts starting from '.$_SESSION['alertType'].'</h3>';
                            $sql = $conn->prepare("SELECT * FROM alert,fugitive WHERE alert.fugitive_id=fugitive.fugitive_id AND alert.date LIKE :date  ");
                            $sql->execute([ 'date'=>'%'.$_SESSION['alertType'].'%']);
                            $get = $sql->fetchAll();
                        }else{
                            echo '<h3>All alerts</h3>';
                            $sql = $conn->prepare("SELECT * FROM alert,fugitive WHERE alert.fugitive_id=fugitive.fugitive_id ");
                            $sql->execute();
                            $get = $sql->fetchAll();
                        }

                        if($sql->rowCount() > 0){
                            echo ' <table  class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Surname
                                        </th>
                                        <th>
                                            Face ID
                                        </th>
                                        <th>
                                            Date
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
                                            '.$case["first_name"].'
                                        </td>
                                        <td>
                                            '.$case["last_name"].'
                                        </td>
                                        <td>
                                        <img src="'.$img.' " width="70">
                                        </td>
                                         <td>'.$case["date"].'</td>
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
                        <button onclick="download('alert_sum','alert_report')" class="btn btn-success btn-flat" style="margin-left: 20px"><i class="fa fa-save"></i> Download Report</button>



                    </div>

                    <div class="row m-l-0 m-r-0 "  style="display: block"  <?php if(!isset($_SESSION['type'])){echo 'hidden';} else if($_SESSION['type'] !=='users'){ echo 'hidden';} ?>>

                        <div class="form-group" style="width: 50%;margin: 5px">

                            <form  method="POST" action="handler.php" enctype="multipart/form-data" style="margin-left: 15px">
                                <strong>Sort by gender</strong>
                                <div class="flex" style="display: flex">
                                    <select class="form-control" name="genderType" style="width: min-content" required>
                                        <option value="" selected disabled>Select report type</option>
                                        <option value="all">All users</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                    <button type="submit" class="btn btn-success btn-flat" style="margin-left: 20px"><i class="fa fa-cog"></i> Generate Report</button>

                                </div>

                            </form>
                        </div>
                        <br>

                        <div id="user_sum" style="margin-left: 20px">


                            <?php
                            $conn = $con->open();
                            if(isset($_SESSION['genderType'])){
                                echo '<h3>All '.$_SESSION['genderType'].' users</h3>';
                                $sql = $conn->prepare("SELECT * FROM user WHERE 
                                 gender=:gender");
                                $sql->execute([ 'gender'=>$_SESSION['genderType']]);
                                $get = $sql->fetchAll();
                            }else{
                                echo '<h3>All users</h3>';
                                $sql = $conn->prepare("SELECT * FROM user");
                                $sql->execute();
                                $get = $sql->fetchAll();
                            }

                            if($sql->rowCount() > 0){
                                echo ' <table  class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Surname
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Mobile
                                        </th>
                                         <th>
                                            Image
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
                                            '.$case["first_name"].'
                                        </td>
                                        <td>
                                            '.$case["last_name"].'
                                        </td>
                                        <td>
                                            '.$case["email"].'
                                        </td>
                                        <td>
                                            '.$case["mobile"].'
                                        </td>
                                        <td>
                                        <img src="'.$img.' " width="70">
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
                        <button onclick="download('user_sum','users_report')" class="btn btn-success btn-flat" style="margin-left: 20px"><i class="fa fa-save"></i> Download Report</button>



                    </div>

                    <div class="row m-l-0 m-r-0 " style="display: block"   <?php if(!isset($_SESSION['type'])){echo 'hidden';} else if($_SESSION['type'] !=='d'){ echo 'hidden';} ?>>

                        <div class="form-group" style="width: 50%;margin: 5px">

                            <form id="alert-form" method="POST" action="handler.php" enctype="multipart/form-data" style="margin-left: 15px">
                                <strong>Sort by date</strong>
                                <div class="flex" style="display: flex">
                                    <input class="form-control" name="alertType" type="date" style="width: min-content">
                                    <button type="submit" class="btn btn-success btn-flat" style="margin-left: 20px"><i class="fa fa-cog"></i> Generate Report</button>

                                </div>

                            </form>
                        </div>
                        <br>

                        <div id="alert_sum" style="margin-left: 20px">


                            <?php
                            $conn = $con->open();
                            if(isset($_SESSION['alertType'])){
                                echo '<h3>All alerts starting from '.$_SESSION['alertType'].'</h3>';
                                $sql = $conn->prepare("SELECT * FROM alert,fugitive WHERE alert.fugitive_id=fugitive.fugitive_id AND alert.date LIKE :date  ");
                                $sql->execute([ 'date'=>'%'.$_SESSION['alertType'].'%']);
                                $get = $sql->fetchAll();
                            }else{
                                echo '<h3>All alerts</h3>';
                                $sql = $conn->prepare("SELECT * FROM alert,fugitive WHERE alert.fugitive_id=fugitive.fugitive_id ");
                                $sql->execute();
                                $get = $sql->fetchAll();
                            }

                            if($sql->rowCount() > 0){
                                echo ' <table  class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Surname
                                        </th>
                                        <th>
                                            Face ID
                                        </th>
                                        <th>
                                            Date
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
                                            '.$case["first_name"].'
                                        </td>
                                        <td>
                                            '.$case["last_name"].'
                                        </td>
                                        <td>
                                        <img src="'.$img.' " width="70">
                                        </td>
                                         <td>'.$case["date"].'</td>
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
                        <button onclick="download('alert_sum','alert_report')" class="btn btn-success btn-flat" style="margin-left: 20px"><i class="fa fa-save"></i> Download Report</button>



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
