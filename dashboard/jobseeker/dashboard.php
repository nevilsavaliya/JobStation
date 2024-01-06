<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id = $_SESSION['ID'];
?>
<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:49:29 GMT -->
<head>
    <meta charset="utf-8">
    <title>Job Seeker Dashboard</title>

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
    <div class="preloader"></div>

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
                                <span><a href="../../lists/job-list.php">Find Jobs</a></span>
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
                            <li class="active"><a href="dashboard.php"> <i
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
<!--                            </li>-->
                            <li class="list"><a href="shortlisted.php"><i
                                            class="la la-bookmark-o"></i>Shortlisted
                                    Jobs</a></li>
                            <li class="list"><a href="jobs.php"><i class="la la-box"></i>Jobs</a></li>
                            <li class="list"><a href="dashboard-messages.html"><i
                                            class="la la-comment-o"></i>Messages</a></li>
                            <li class="list"><a href="change-password.php"><i class="la la-lock"></i>Change
                                    Password</a>
                            </li>
                            <li><a href="../../Signout_module.php"><i
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
                include '..\..\Connection_Module.php';
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
                <li class="active"><a href="dashboard.php"> <i
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
                <li class="list"><a href="jobs.php"><i class="la la-box"></i>Jobs</a></li>
                <li class="list"><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                <li class="list"><a href="change-password.php"><i class="la la-lock"></i>Change Password</a>
                </li>
                <li><a href="../../Signout_module.php"><i
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
                <div class="text">Ready to jump back in?</div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item">
                        <div class="left">
                            <i class="icon flaticon-briefcase"></i>
                        </div>
                        <div class="right">
                            <h4><?php
                                $sql = "SELECT count(*) as count FROM `jobpost_apply` WHERE jid = $id";
                                $result = $conn->query($sql);
                                $row = 0;
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc()['count'];
                                }
                                echo $row;
                                ?></h4>
                            <p>Applied Jobs</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item ui-red">
                        <div class="left">
                            <i class="icon la la-file-invoice"></i>
                        </div>
                        <div class="right">
                            <h4><?php
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
                                echo sizeof($nid);
                                ?></h4>
                            <p>Job Alerts</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item ui-yellow">
                        <div class="left">
                            <i class="icon la la-comment-o"></i>
                        </div>
                        <div class="right">
                            <h4>0</h4>
                            <p>Messages</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item ui-green">
                        <div class="left">
                            <i class="icon la la-bookmark-o"></i>
                        </div>
                        <div class="right">
                            <h4>0</h4>
                            <p>Shortlist</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-lg-7">
                    <!-- Graph widget -->
                    <div class="graph-widget ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Your Profile Views</h4>
                                <div class="chosen-outer">
                                    <!--Tabs Box-->
                                    <select class="chosen-select">
                                        <option>Last 6 Months</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="widget-content">
                                <canvas id="chart" width="100" height="45"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Notification Widget -->
                    <div class="notification-widget ls-widget">
                        <div class="widget-title">
                            <h4>Notifications</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="notification-list">
                                <?php
                                $nid = array_slice($nid, -10);
                                if (!empty($nid)) {
                                    foreach ($nid as $value) {
                                        $sql = "select eid,title from jobpost where id=$value";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        $title = $row['title'];
                                        $eid = $row['eid'];
                                        $sql = "select name from employer where id=$eid";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        $name = $row['name'];
                                        echo '<li><span class="icon flaticon-briefcase"></span> <strong>';
                                        echo $name . '</strong> Posted Job For <span class="colored">';
                                        echo $title . '</span></li>';
                                    }
                                } else {
                                    echo 'No Jobs For You Yet.';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <!-- applicants Widget -->
                    <div class="applicants-widget ls-widget">
                        <div class="widget-title">
                            <h4>Jobs Applied Recently</h4>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <!-- Job Block -->
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                        src="../../images/resource/company-logo/1-1.png" alt=""></span>
                                            <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">Full Time</li>
                                                <li class="privacy">Private</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Block -->
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                        src="../../images/resource/company-logo/1-2.png" alt=""></span>
                                            <h4><a href="#">Recruiting Coordinator</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">Full Time</li>
                                                <li class="privacy">Private</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Block -->
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                        src="../../images/resource/company-logo/1-3.png" alt=""></span>
                                            <h4><a href="#">Product Manager, Studio</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">Full Time</li>
                                                <li class="privacy">Private</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Block -->
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                        src="../../images/resource/company-logo/1-4.png" alt=""></span>
                                            <h4><a href="#">Senior Product Designer</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">Full Time</li>
                                                <li class="privacy">Private</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Block -->
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                        src="../../images/resource/company-logo/1-5.png" alt=""></span>
                                            <h4><a href="#">Senior Full Stack Engineer, Creator Success</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">Full Time</li>
                                                <li class="privacy">Private</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Block -->
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                        src="../../images/resource/company-logo/1-6.png" alt=""></span>
                                            <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">Full Time</li>
                                                <li class="privacy">Private</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
<script src="../../js/chart.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Sofia Pro";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
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