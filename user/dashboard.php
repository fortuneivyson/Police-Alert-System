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
      <div style="margin-top: 80px;">
      <div class="content" style="margin: 15px">

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
<input class="show-modal" value="<?php if(isset($_SESSION['case_number'])) echo $_SESSION['case_number'];  ?>" hidden>
<input class="show-error" value="<?php if(isset($_SESSION['error'])) echo $_SESSION['error'];  ?>" hidden>

        <div class="row fugitive-rows">
            <div style="width: 100%;padding: 25px">
               <input type="text" class="form-control search-fugitive" onkeyup="searchFug()" style="height: 50px" placeholder="Search fugitive by name">
            </div>

<!--            <div class="fugitive-profile">-->
            <?php

            $conn = $con->open();
            $sql2 = $conn->prepare("SELECT * FROM fugitive");
            $sql2->execute();
            $get = $sql2->fetchAll();


            if($sql2->rowCount() > 0){
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
                            <h2 class="card-category text_bold">'.$fug['first_name'].' '.$fug['last_name'].'<i class="fa fa-info bg-warning about-fug" for="'.$fug['about'].'"  id="'.$fug['fugitive_id'].'" data-toggle="modal" data-target="#about-fug" title="About" style="padding: 10px;border-radius: 50%;cursor: pointer"></i></h2>
                            <div class="card-body" style="max-height: 240px;min-height: 240px">
                            </div>
                            <div class="dropdown">
                              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                  <i class="now-ui-icons ui-1_bell-53"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a id="'.$fug['fugitive_id'].'" class="dropdown-item text-danger crime-report" href="#">Report</a>
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
<!--            </div>-->


        </div>

      </div>
      </div>
        <div style="height: 80px;"></div>
        <?php include('includes/footer.php') ?>

  </div>
  </div>

</body>

</html>

<div class="modal fade" id="crime-report">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

                <div class="form-group text-center">
                    
                    <span class="alert-date"><?php echo date('d-m-Y h:i', strtotime('+2 hours')) ?></span>
                    <div class="case-num">Case <?php if(isset($_SESSION['case_number'])) echo $_SESSION['case_number'];  ?> created</div>
                    <span>Your alert has been sent to the Crime Alert Department Helpdek! We are on it</span>

                </div>

            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="about-fug">
    <div class="modal-dialog" style="background: whitesmoke;">
        <div class="modal-content">
            <div class="modal-header text-center" style="height: 90px;">
                <h4>About Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group text-center about-text">

                </div>

            </div>
        </div>
    </div>
</div>
</div>


<script>

    if($('.show-modal').val() !==''){
        $('#crime-report').modal('show');
    }
    
    if($('.show-error').val() !==''){
        alert($('.show-error').val());
    }

    $('.about-fug').on('click',function () {
        $('.about-text').html($(this).attr('for'));

        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {
                updateAbout: this.id
            },
            dataType: 'json',
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.log(error)
            }
        });

    });

</script>
<?php if(isset($_SESSION['case_number'])) unset($_SESSION['case_number']);  ?>
