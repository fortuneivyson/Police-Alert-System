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
                    <div class="row m-l-0 m-r-0" style="margin-right: 0px">

                        <div id="googleMaps"></div>

                        <iframe id="mapsFrame" width="100%" height="540" style="border:0;margin-left: 15px;" allowfullscreen="" loading="lazy"></iframe>
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



