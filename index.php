
<?php
//    header('location: login.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>
        Police Alert APP
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="description"
        content="This a Demo Progressive Web Application which will work in offline, has a splash screen add to home screen etc,."
    />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="theme-color" content="#29434d" />
    <meta name="msapplication-TileColor" content="#29434d" />
    <meta name="msapplication-TileImage" content="./images/icons/mstile-150x150.png" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-title" content="Progressive Web Application" />
    <meta name="application-name" content="Progressive Web Application" />
    <link rel="apple-touch-icon" href="./images/icons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/icon/favicon-32x32-dunplab-manifest-42801.gif" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/img/icon/favicon-16x16-dunplab-manifest-42801.gif" sizes="16x16" />
    <link rel="manifest" href="./manifest.json" />

    <style>
        body{
            padding-top: 5%;
            background: #141E30;
            background: -webkit-gradient(linear, left top, right top, from(#0c2646), color-stop(60%, #204065), to(#2a5788));
            background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);
            position: relative;
            overflow: hidden;
        }
    </style>
</head>

<body>
<div class="wrapper ">

    <!-- Navbar -->
    <?php include('includes/header.php');

    if(isset($_SESSION['logged'])){
        if($_SESSION['user'] =='user'){
            header('location: user/dashboard.php');

        }
        if($_SESSION['user'] =='police'){
            header('location: police/dashboard.php');

        }
    }
    ?>
    <!-- End Navbar -->
    <div class="panel-header" style="padding-top: 10%">
        <div class="row justify-content-center" style="margin: 5px">
            <div class="col-lg-5">

                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">
                            <img src="assets/img/icon/favicon-96x96-dunplab-manifest-42801.gif">
                        </h3></div>
                    <div class="card-body text-center">
                            
                        <div class="form-floating mb-3">
                            <span class="form-control text-center text_bold" >
                                <strong><h5 style="color: blueviolet">Welcome back to the Crime Alert App!! </h5></strong>
                                <p>We from the CMS Team recommends the mobile app for better UX?UI.</p>

                            </span>
                        </div>
                         <button id="installApp" type="submit" class="btn btn-primary" href="#">Install App</button>

                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="register.php">The CMS Team Recommends the PWA</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php') ?>

</div>

<!-- JS Files  -->
<script src="./js/toast.js"></script>
<script src="./js/main.js"></script>
<script src="./js/offline.js"></script>
<script src="./js/app.js"></script>
<script src="./js/push.js"></script>
<script src="./js/sync.js"></script>
<script src="./js/share.js"></script>
<script src="./js/menu.js"></script>
<script src="./js/download.js"></script>

<!-- My Google Analytics Report -->
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        (i[r] =
            i[r] ||
            function() {
                (i[r].q = i[r].q || []).push(arguments);
            }),
            (i[r].l = 1 * new Date());
        (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m);
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-92627241-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>

