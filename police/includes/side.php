<div class="sidebar" data-color="orange">
    <?php
    $conn = $con->open();
    $sql = $conn->prepare("SELECT * FROM alert");
    $sql->execute();
    $counters = $sql->rowCount();
    $con->close();
    ?>
    ?>
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
<!--        <a class="simple-text logo-mini">-->
<!--            CAS-->
<!--        </a>-->
        <a class="simple-text logo-normal">
            Police Alert App
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active ">
                <a href="./dashboard.php">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="./users.php" >
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="./alerts.php">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p style="position: relative">Alerts <span class="text-success" style="position: absolute;top: -10px"><?php echo $counters;?></span></p>
                </a>
            </li>
            <li>
                <a href="./profile.php">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="./reports.php">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>Reports</p>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="fa fa-sign-out"></i>
                    <p>Logout</p>
                </a>
            </li><br><br>
            <li>
                <a href="https://www.facebook.com/profile.php?id=100072400511387" style="display: flex">
                    <i class="fa fa-facebook"></i>
                    <p>Facebook</p>
                </a>
            </li>
        </ul>
    </div>
</div>
