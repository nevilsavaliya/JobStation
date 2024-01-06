<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:50 GMT -->
<head>
    <meta charset="utf-8">
    <title>Verify</title>

    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]>
    <script src="js/respond.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <!--            <div class="preloader"></div>-->

    <!-- Main Header-->
    <header class="main-header">
        <div class="container-fluid">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo"><a href="http://localhost/JobStation/index.php"><img src="images/logo-2.png"
                                                                                               alt="" title=""></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="logo"><a href="http://localhost/JobStation/index.php"><img src="images/logo.png" alt=""
                                                                                       title=""></a></div>
            </div>

            <!-- Mobile Nav -->
            <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Info Section -->
    <!-- verification Form -->
    <div class="login-section">
        <div class="image-layer" style="background-image: url(images/background/12.jpg);"></div>
        <div class="outer-box">
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Verify your email otp</h3>
                </div>
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="verification" placeholder="verify" required
                               onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' maxlength="8" max="8">
                    </div>
                    <?php
                    if (isset($_POST['verification'])) {
                        include 'Connection_Module.php';
                        $name = $_SESSION['name'];
                        $pass = $_SESSION['pass'];
                        $user = $_SESSION['user'];
                        $email = $_SESSION['email'];
                        $verify = $_POST['verification'];
                        $sql = "SELECT `otp` FROM `email_verification` WHERE `email` = '$email'";
                        $result = $conn->query($sql);
                        $otp = array();
                        while ($row = $result->fetch_assoc()) {
                            $otp[] = $row['otp'];
                        }
                        if (in_array($verify, $otp)) {
                            if ($user == 'jobseeker') {
                                $sql = "INSERT INTO `jobseeker`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
                                $conn->query($sql);
                                $sql = "SELECT `id` FROM `jobseeker` where `email` = '$email'";
                            } else {
                                $sql = "INSERT INTO `employer`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
                                $conn->query($sql);
                                $sql = "SELECT `id` FROM `employer` where `email` = '$email'";
                            }
                            $result = $conn->query($sql);
                            $id = $result->fetch_assoc();
                            $_SESSION['ID'] = $id['id'];
                            $sql = "DELETE FROM `email_verification` WHERE `email` = '$email'";
                            $conn->query($sql);
                            $link = "<script>window.location.href='http://localhost/JobStation/dashboard/$user/dashboard.php'</script>";
                            echo $link;
                        } else {
                            echo "<span style='color: red'>OTP is Wrong.</span>";
                        }
                    }
                    ?>
                    <div class="form-group">
                        <button class="theme-btn btn-style-one submit" type="submit" name="verify">
                            Verify
                        </button>
                    </div>
                </form>
            </div>

            <!--End verification Form -->

        </div>
    </div>
    <!-- End Info Section -->


</div><!-- End Page Wrapper -->


<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/chosen.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.modal.min.js"></script>
<script src="js/mmenu.polyfills.js"></script>
<script src="js/mmenu.js"></script>
<script src="js/appear.js"></script>
<script src="js/ScrollMagic.min.js"></script>
<script src="js/rellax.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
</body>


<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:50 GMT -->
</html>