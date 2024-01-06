<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:50 GMT -->
<head>
    <meta charset="utf-8">
    <title>Register</title>

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
    <script>

        $(document).ready(function () {
            $(".Candidate").click(function () {
                $(".user").val("jobseeker");
                $(".Candidate").addClass("btn-style-seven");
                $(".Employer").removeClass("btn-style-seven");
                $(".submit").prop("disabled", false);
            });
            $(".Employer").click(function () {
                $(".user").val("employer");
                $(".Employer").addClass("btn-style-seven");
                $(".Candidate").removeClass("btn-style-seven");
                $(".submit").prop("disabled", false);
            });
        });
    </script>
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

                <div class="outer-box">
                    <!-- Login/Register -->
                    <div class="btn-box">
                        <a href="photocapture/detail.php" class="theme-btn btn-style-one">FaceLogin</a>
                    </div>
                </div>

                <div class="outer-box">
                    <div class="btn-box">
                        <a href="login.php" class="theme-btn btn-style-one">Login</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="http://localhost/JobStation/index.php"><img src="images/logo.png" alt=""
                                                                                   title=""></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">

                <div class="outer-box">
                    <!-- Login/Register -->
                    <div class="login-box">
                        <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                    </div>

                    <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                                class="flaticon-menu-1"></span></a>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Info Section -->
    <div class="login-section">
        <div class="image-layer" style="background-image: url(images/background/12.jpg);"></div>
        <div class="outer-box">
            <!-- Login Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Create a Free Job Station Account</h3>
                    <div class="form-group">
                        <div class="btn-box row">
                            <div class="col-lg-6 col-md-12">
                                <button class="theme-btn btn-style-four Candidate"><i class="la la-user"></i> JobSeeker
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <button class="theme-btn btn-style-four Employer"><i class="la la-briefcase"></i>
                                    Employer
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--Login Form-->
                    <form method="post">
                        <input type="hidden" class="user" name="user" value="">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password-field" type="password" name="pass" value="" placeholder="Password">
                        </div>
                        <?php
                        include 'Signup_Module.php';
                        ?>
                        <div class="form-group">
                            <button class="theme-btn btn-style-one submit" type="submit" name="submit" disabled="true">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="bottom-box">
                        <div class="text">Have an account? <a href="login.php">Login</a></div>
                        <div class="divider"><span>or</span></div>
                        <div class="btn-box row">
                            <div class="col-lg-6 col-md-12">
                                <a href="#" class="theme-btn social-btn-two facebook-btn"><i
                                            class="fab fa-facebook-f"></i> Sign In via Facebook</a>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <?php
                                include 'config.php';
                                echo '<a href="' . $google_client->createAuthUrl() . '"class="theme-btn social-btn-two google-btn">
        <i class="fab fa-google"></i> Sign In via Gmail</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Login Form -->
        </div>
    </div>
    <!-- End Info Section -->


</div><!-- End Page Wrapper -->


<script src="js/jquery.js"></script>
<script src="js/popper.
        min.js"></script>
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


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:50 GMT -->
</html>