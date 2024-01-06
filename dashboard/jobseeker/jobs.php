<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id = $_SESSION['ID'];
?>
<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:49:29 GMT -->
<head>
    <meta charset="utf-8">
    <title>Jobs</title>

    <!-- Stylesheets -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="../../images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <?php
    include '../../Connection_Module.php';
    $sql = "select * from jobseeker where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    ?>
    <script>
        $(document).ready(function () {
            $(".list").click(function () {
                let complete = "<?php echo $row['complete'];?>";
                if (complete == 0) {
                    alert("Please Complete Profile First.");
                    event.preventDefault();
                }
            });
        });
    </script>
</head>

<body>

<div class="page-wrapper dashboard">

    <!-- Preloader -->
    <!--        <div class="preloader"></div>-->

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <header class="main-header header-shaddow">
        <div class="container-fluid">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo"><a href="../../index.php"><img
                                        src="../../images/logo.png" alt="" title=""></a></div>
                    </div>

                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li class="current dropdown">
                                <span>Trending</span>
                                <ul>
                                    <li><a href="../../about.php">Trending Companies</a></li>
                                    <li><a href="../../lists/job-list.php">Trending Jobs</a></li>
                                </ul>
                            </li>

                            <li>
                                <span><a href="../../lists/ job-list.php">Find Jobs</a></span>
                            </li>

                            <li>
                                <span><a href="../../lists/employer-list.php">Find Employer</a></span>
                            </li>

                            <li>
                                <span><a href="../../lists/blog-list.php">Blog</a></span>
                            </li>
                            <li class="current dropdown">
                                <span>Other</span>
                                <ul>
                                    <li><a href="../../about.php">About</a></li>
                                    <li><a href="../../faqs.php">FAQ's</a></li>
                                    <li><a href="../../terms.php">Terms</a></li>
                                    <li><a href="../../contact.php">Contact</a></li>
                                </ul>
                            </li>

                            <?php
                            if (!$row['complete']) {
                                echo '
                                    <li>
                                        <span><a href="complete-profile.php">Please Complete Your Profile</a></span>
                                    </li>';
                            }
                            ?>
                            <!-- Only for Mobile View -->
                            <li class="mm-add-listing">
                                <span>
                                            <span class="contact-info">
                                                <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                                                <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                                                <a href="mailto:support@superio.com"
                                                   class="email">support@superio.com</a>
                                            </span>
                                            <span class="social-links">
                                                <a href="#"><span class="fab fa-facebook-f"></span></a>
                                                <a href="#"><span class="fab fa-twitter"></span></a>
                                                <a href="#"><span class="fab fa-instagram"></span></a>
                                                <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                            </span>
                                        </span>
                            </li>
                        </ul>
                    </nav>
                    <!-- Main Menu End-->
                </div>

                <div class="outer-box">

                    <button class="menu-btn">
                        <span class="icon la la-bell"></span>
                    </button>

                    <!-- Dashboard Option -->
                    <div class="dropdown dashboard-option">
                        <?php
                        if ($row['image']) {
                            echo '';
                            echo '
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                <img src="data:image/jpg;charset=utf8;base64,';
                            echo base64_encode($row['image']) . '"';
                            echo 'alt="avatar" class="thumb">
                                <span class="name">My Account</span>
                            </a>';
                        }
                        ?>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php"> <i
                                            class="la la-home"></i> Dashboard</a></li>
                            <li class="list"><a href="jobseeker.php"><i class="la la-user-tie"></i>My Profile</a>
                            </li>
                            <li class="list"><a href="Resume.php"><i
                                            class="la la-file-invoice"></i>My
                                    Resume</a></li>
                            <li class="list"><a href="AppliedJob.php"><i
                                            class="la la-briefcase"></i> Applied
                                    Jobs </a></li>
                            <!--                            <li class="list"><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job-->
                            <!--                                    Alerts</a>-->
                            </li>
                            <li class="list"><a href="shortlisted.php"><i
                                            class="la la-bookmark-o"></i>Shortlisted
                                    Jobs</a></li>
                            <li class="active"><a href="jobs.php"><i class="la la-box"></i>Jobs</a></li>
                            <li class="list"><a href="dashboard-messages.html"><i
                                            class="la la-comment-o"></i>Messages</a></li>
                            <li class="list"><a href="change-password.php"><i class="la la-lock"></i>Change
                                    Password</a>
                            </li>
                            </li>
                            <li class="list"><a href="../../Signout_module.php"><i
                                            class="la la-sign-out"></i>Logout</a></li>
                            <li class="list"><a href="../../index.php"><i class="la la-trash"></i>Delete
                                    Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="../../index.php"><img src="../../images/logo.png" alt="" title=""></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">

                <?php
                include '../../Connection_Module.php';
                $sql = "select complete from jobseeker where id=$id";
                $result = $conn->query($sql);
                $row = $result->fetch_array();
                if (!$row['complete']) {
                    echo '
                                    <li>
                                        <span><a href="complete-profile.php">Please Complete Your Profile</a></span>
                                    </li>';
                }
                ?>

                <div class="outer-box">
                    <!-- Login/Register -->
                    <div class="login-box">
                        <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                    </div>

                    <?php
                    $sql = "select image from jobseeker where id=$id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_array();
                    if ($row['image']) {
                        echo '
                            <button id="toggle-user-sidebar">
                                <img src="data:image/jpg;charset=utf8;base64,';
                        echo base64_encode($row['image']) . '"';
                        echo 'alt="avatar" class="thumb">
                                </button>
                            </a>';
                    }
                    ?>

                    <button id="toggle-user-sidebar"><img src="../../images/resource/company-6.png" alt="avatar"
                                                          class="thumb"></button>
                    <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                                class="flaticon-menu-1"></span></a>
                </div>
            </div>

        </div>

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <div class="user-sidebar">

        <div class="sidebar-inner">
            <ul class="navigation">
                <li><a href="dashboard.php"> <i
                                class="la la-home"></i> Dashboard</a></li>
                <li class="list"><a href="jobseeker.php"><i class="la la-user-tie"></i>My Profile</a>
                </li>
                <li class="list"><a href="Resume.php"><i class="la la-file-invoice"></i>My
                        Resume</a></li>
                <li class="list"><a href="AppliedJob.php"><i class="la la-briefcase"></i> Applied
                        Jobs </a></li>
                <!--                <li class="list"><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a>-->
                <!--                </li>-->
                <li class="list"><a href="shortlisted.php"><i class="la la-bookmark-o"></i>Shortlisted
                        Jobs</a></li>
                <li class="active"><a href="jobs.php"><i class="la la-box"></i>Jobs</a></li>
                <li class="list"><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                <li class="list"><a href="change-password.php"><i class="la la-lock"></i>Change Password</a>
                </li>
                <li class="list"><a href="../../index.php"><i
                                class="la la-sign-out"></i>Logout</a></li>
                <li class="list"><a href="../../index.php"><i class="la la-trash"></i>Delete
                        Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Hello,<?php
                    $result = $conn->query("SELECT name FROM jobseeker WHERE `id` = '$id'");
                    $row = $result->fetch_assoc();
                    echo $row['name'];
                    ?></h3>
                <div class="text">Jobs That Might for you!</div>
            </div>

            <div class="col-lg-12">
                <!-- applicants Widget -->
                <div class="applicants-widget ls-widget">
                    <span class="widget-title">Jobs For You</span>
                    <div class="widget-content">
                        <div class="row" id="con">
                            <?php
                            $skill = array();
                            $nid = array();
                            $sql = "select skill from jobseeker_skill where id = '$id'";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $skill[] = $row['skill'];
                            }
                            foreach ($skill as $value) {
                                $sql = "select id from jobpost_skill where skill = '$value'";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $nid[] = $row['id'];
                                }
                            }
                            $nid = array_unique($nid);
                            $postid = $nid;
                            foreach($nid as $value){
                                $sql = "SELECT * FROM `jobpost_apply` WHERE id = $value AND `jid` = $id";
                                $jobpostapplyarr = $conn->query($sql);
                                if($jobpostapplyarr->num_rows > 0 ){
                                    while ($jobpostapply = $jobpostapplyarr->fetch_assoc()){
                                        $remove = array($jobpostapply['id']);
                                        $postid = array_diff($postid,$remove);
                                    }
                                }
                            }
                            if ($postid != null) {
                                foreach ($postid as $value) {
                                    $sql = "SELECT * FROM jobpost WHERE id=$value";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $record = $result->fetch_assoc();
                                        $eid = $record['eid'];
                                        $sql = "SELECT image from employer where id = $eid";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo '<div class="job-block col-lg-6 col-md-12 col-sm-12">
                                                <div class="job-block">
                                                    <div class="inner-box">
                                                        <div class="content">
                                        <span class="company-logo">';
                                        echo '
                                        <img src="data:image/jpg;charset=utf8;base64,';
                                        echo base64_encode($row['image']) . '"alt = "">';
                                        echo '</span>
                                        <h4><a href="../../profile/jobpost.php?id='.$value.'">';
                                        echo $record['title'];
                                        echo '</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span>';
                                        echo $record['category'];
                                        echo '</li>
                                            <li><span class="icon flaticon-map-locator"></span>';
                                        echo $record['address'];
                                        echo '</li>';
                                        echo '<li><span class="icon flaticon-money"></span>';
                                        echo $record['lsalary'] . '$ - ' . $record['hsalary'] . '$';
                                        echo '</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">';
                                        echo $record['jobtype'];
                                        echo '</li>
                                        </ul>
                                        <span style="text-align: right;"><a href="apply-job-module.php?id=' . $record['id'] . '" class="theme-btn btn-style-one">Apply For Job</a></span>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                </div>';
                                    }
                                }
                            } else {
                                echo ' <div class="job-block">
                                                    <div class="inner-box">
                                                        <div class="content">' . "No Jobs Related To Your Skill is Uploaded Yet.</div></div></div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- End Dashboard -->

<!-- Copyright -->
<div class="copyright-text">
    <p>© 2021 Superio. All Right Reserved.</p>
</div>

</div><!-- End Page Wrapper -->


<script src="../../js/jquery.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/chosen.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery-ui.min.js"></script>
<script src="../../js/jquery.fancybox.js"></script>
<script src="../../js/jquery.modal.min.js"></script>
<script src="../../js/mmenu.polyfills.js"></script>
<script src="../../js/mmenu.js"></script>
<script src="../../js/appear.js"></script>
<script src="../../js/ScrollMagic.min.js"></script>
<script src="../../js/rellax.min.js"></script>
<script src="../../js/owl.js"></script>
<script src="../../js/wow.js"></script>
<script src="../../js/knob.js"></script>
<script src="../../js/script.js"></script>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="../../js/chart.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Sofia Pro";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {

        type: 'line',
        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            // Information about the dataset
            datasets: [{
                label: "Views",
                backgroundColor: 'transparent',
                borderColor: '#1967D2',
                borderWidth: "1",
                data: [196, 132, 215, 362, 210, 252],
                pointRadius: 3,
                pointHoverRadius: 3,
                pointHitRadius: 10,
                pointBackgroundColor: "#1967D2",
                pointHoverBackgroundColor: "#1967D2",
                pointBorderWidth: "2",
            }]
        },

        // Configuration options
        options: {

            layout: {
                padding: 10,
            },

            legend: {
                display: false
            },
            title: {
                display: false
            },

            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        borderDash: [6, 10],
                        color: "#d8d8d8",
                        lineWidth: 1,
                    },
                }],
                xAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    },
                }],
            },

            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 13,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            }
        },
    });
</script>

</body>
</html>