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
      <div style="margin-top: 80px;">
      <div class="content" style="margin: 15px">
        <div class="row">
            <button class="btn btn-primary m-5 add-fugitive"><i class="now-ui-icons ui-1_simple-add"></i> Add Fugitive</button>
            <div style="width: 100%;padding: 25px">
               <input type="text" class="form-control search-fugitive" onkeyup="searchFug()" style="height: 50px" placeholder="Search fugitive by name">
            </div>
            <?php
                if(isset($_SESSION['success'])){
                    echo '<div class="alert btn-success message-alert" style="width: 100%;margin: 15px 150px;"> '
                        .$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                }

                if(isset($_SESSION['error'])){
                    echo '<div class="alert btn-danger message-alert" style="width: 100%;margin: 15px 150px;"> '
                        .$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                }
            ?>


            <?php

            $conn = $con->open();
            $sql = $conn->prepare("SELECT * FROM fugitive");
            $sql->execute();
            $get = $sql->fetchAll();


            if($sql->rowCount() > 0){

                foreach ($get as $fug){

                    if(empty($fug['image'])){
                        $img = "../police/criminals/profile.png";
                    }else{
                        $img = "../police/criminals/".$fug['image'];
                    }
                    echo
                    '
                          <div class="col-lg-4 fugitive-profile">
                            <div class="card card-chart card-back" style="background-image: url('.$img.')">
                              <div class="card-header">
                                <h2 class="card-category text_bold">'.$fug['first_name'].' '.$fug['last_name'].'</h2>
                                <div class="card-body" style="max-height: 240px;min-height: 240px">
                                </div>
                                <div class="dropdown">
                                  <button id="'.$fug['fugitive_id'].'" style="max-width: 50px;width: 25px;height: 25px" class="btn btn-round bg-warning btn-outline-default btn-simple btn-icon no-caret edit-fugitive">
                                      <i class="now-ui-icons ui-1_settings-gear-63 text-white"></i>
                                  </button>
                                  <button style="max-width: 50px;width: 25px;height: 25px" class="btn btn-round bg-danger btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                      <i class="now-ui-icons ui-1_simple-remove text-white"></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right ">
                                    <a id="'.$fug['fugitive_id'].'" class="dropdown-item text-danger delete-fugitive" href="#">Delete Fugitive?</a>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                              </div>
                            </div>
                          </div>
                 
                    ';
                }

            }else{
                echo ' <div class="card card-chart " style="text-align: center;padding: 10px;margin: 15px;"> No Data Found ...</div>';
            }
            echo '
                <div class="card card-chart no-results" style="text-align: center;padding: 10px;margin: 15px;" > No Results Found ...</div>';

            ?>



        </div>

      </div>
      </div>
        <div style="height: 80px;"></div>
        <?php include('includes/footer.php') ?>

  </div>
  </div>

</body>

</html>


