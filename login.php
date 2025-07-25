<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:50 GMT -->
<head>
    <meta charset="utf-8">
    <title>Login</title>

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
    <script src="js/validation.js"></script>
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
            $(".google-btn").click(function () {
                if ($(".submit").is('[disabled]')) {
                    event.preventDefault();
                    $(".msg").text("Please Select Employer Or JobSeeker");
                } else {
                    let name = "user";
                    let value = $(".user").val();
                    document.cookie = name + '=' + value;
                }
            });
        });
    </script>
    <?php
    if (isset($_POST['submit'])) {
        $lEmailE = $passE = $lPassE1 = $lPassE2 = $lPassE3 = $lPassE4 = "";

        $email = $_POST['email'];
        $pass = $_POST['pass'];
    $valid = true;
    // checking javascript is on or off
    if ($_POST["javaScriptValid"] == 0) {
        if (empty($email)) {
			$valid = false;
			$lEmailE = "Enter a valid email";
		} else if (!preg_match("/[a-z][a-z0-9]+@(gmail|outlook|hotmail|yahoo|icloud|utu)[.](com|in)/", $email)) {
			$valid = false;
			$lEmailE = "Enter a valid email";
		}

		// password
		if (empty($pass)) {
			$valid = false;
			$lPassE1 = "Enter a valid password";
		} else {
			if (strlen($pass) < 8 && strlen($pass > 15)) {
				$valid = false;
				$lPassE1 = "8-15 case sensitive characters";
			}
			if (!preg_match("/[a-z]/", $pass)) {
				$valid = false;
				$lPassE2 = "Atleast one small alphabet";
			}
			if (!preg_match("/[A-Z]/", $pass)) {
				$valid = false;
				$lPassE3 = "Atleast one capital alphabet";
			}
			if (!preg_match("/[0-9]/", $pass)) {
				$valid = false;
				$lPassE4 = "Atleast one number";
			}
		}
	}
	if ($valid) {
		$_SESSION["loginDetails"] = $_POST;
		$_SESSION["loginDetails"] = $_POST;
		// checkUserExist();
		// include '../PHPMailer/MailOtp.php';
		// $otp = rand(100000, 999999);
		// sendLoginMail($email, $otp);
        }


    }
    ?>

</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

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
                    <!-- Login/Register -->
                    <div class="btn-box">
                        <a href="register.php" class="theme-btn btn-style-one">Register</a>
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
    <div class="login-section">
        <div class="image-layer" style="background-image: url(images/background/12.jpg);"></div>
        <div class="outer-box">
            <!-- Login Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Login to job station</h3>

                    <div class="form-group">
                        <div class="btn-box row">
                            <div class="col-lg-6 col-md-12">
                                <button class="theme-btn btn-style-four Candidate"><i class="la la-user"></i> Job Seeker
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
                    <form method="post" onsubmit="return loginNullCheck()">
                        <input type="hidden" class="user" name="user" value="">
                        <div class="form-group">
                            <label for="email-field">Email</label>
                            <input type="text" class="form-control form-control-lg" id="lEmail" placeholder="Email" onkeyup="loginEmailCheck()" name="email" value="<?php if (isset($_COOKIE['ckEmail'])) echo $_COOKIE['ckEmail']; ?>">
                            <span id="lEmailV"></span>
                            <span><?php if (isset($lEmailE)) echo $lEmailE; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="password-field">Password</label>
                            <input type="password" class="form-control form-control-lg" id="lPass" placeholder="Password" onkeyup="loginPassCheck()" maxlength="8" name="pass" value="<?php if (isset($_COOKIE['ckPass'])) echo $_COOKIE['ckPass']; ?>">
                            <span id="lPassV"></span>
<!--                            <span>--><?php //if (isset($lPassE1)) echo $lPassE1; ?><!--</span>-->
<!--                            <span>--><?php //if (isset($lPassE2)) echo $lPassE2; ?><!--</span>-->
<!--                            <span>--><?php //if (isset($lPassE3)) echo $lPassE3; ?><!--</span>-->
<!--                            <span>--><?php //if (isset($lPassE4)) echo $lPassE4; ?><!--</span>-->
                        </div>

                        <div class="form-group">
                            <div class="field-outer">
                                <div class="input-group checkboxes square">
                                    <input type="checkbox" name="remember-me" value="" id="remember">
                                    <label for="remember" class="remember"><span class="custom-checkbox"></span>
                                        Remember me</label>
                                </div>
                                <a href="#" class="pwd">Forgot password?</a>
                            </div>
                        </div>

                        <span class="msg">
                                    &nbsp;
                                    <?php
                                    include 'Signin_Module.php';
                                    ?>
                                </span>
                        <!-- hidden field for checking javascript is on or off -->
                        <input type="hidden" name="javaScriptValid" id="jsValid" value="0" />
                        <div class="form-group">
                            <button class="theme-btn btn-style-one submit" type="submit" name="submit" disabled>Log In
                            </button>
                        </div>

                    </form>

                    <div class="bottom-box">
                        <div class="text">Don't have an account? <a href="register.php">Signup</a></div>
                        <div class="divider"><span>or</span></div>
                        <div class="btn-box row">
                            <div class="col-lg-6 col-md-12">
                                <a href="#" class="theme-btn social-btn-two facebook-btn"><i
                                            class="fab fa-facebook-f"></i> Log In via Facebook</a>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <?php
                                include 'config.php';
                                echo '<a href="' . $google_client->createAuthUrl() . '"class="theme-btn social-btn-two google-btn">
        <i class="fab fa-google"></i> Log In via Gmail</a>';
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