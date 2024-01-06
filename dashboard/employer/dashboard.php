<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$id = $_SESSION['ID'];
?>
<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:14 GMT -->
<head>
    <meta charset="utf-8">
    <title>Employer Dashboard</title>

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
    $sql = "select * from employer where id=$id";
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
<div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <!--                <div class="preloader"></div>-->

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
                            <!--                            <li class="current dropdown">
                                                            <span>Trending</span>
                                                            <ul>
                                                                <li><a href="about.php">Trending Companies</a></li>
                                                                <li><a href="faqs.php">Trending Jobs</a></li>
                                                            </ul>
                                                        </li>-->

                            <li>
                                <span><a href="../../lists/candidates-list.php">Find Job Seekers</a></span>
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
                                <a href="post-job.php" class="theme-btn btn-style-one">Job Post</a>
                                <span>
                                            <span class="contact-info">
                                                <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                                                <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                                                <a href="mailto:support@superio.com"
                                                   class="email">jobstation@gmail.com</a>
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
                            $result = $conn->query("SELECT image FROM employer WHERE `id` = '$id' ");
                            $row = $result->fetch_assoc();
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
                            <li class="active"><a href="dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
                            <li class="list"><a href="employer.php"><i class="la la-user-tie"></i>Company Profile</a>
                            </li>
                            <li class="list"><a href="post-job.php"><i
                                            class="la la-paper-plane"></i>Post a New Job</a></li>
                            <li class="list"><a href="jobpost.php"><i class="la la-briefcase"></i> Manage Jobs </a>
                            </li>
                            <li class="list"><a href="applicants.php"><i class="la la-file-invoice"></i>Applicants</a></li>
                            <li class="list"><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted
                                    Resumes</a>
                            </li>
                            <li class="list"><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a>
                            </li>
                            <li class="list"><a href="dashboard-messages.html"><i
                                            class="la la-comment-o"></i>Messages</a></li>
                            <li class="list"><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume
                                    Alerts</a></li>
                            <li class="list"><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change
                                    Password</a>
                            </li>
                            <li><a href="../../Signout_module.php"><i class="la la-sign-out"></i>Logout</a></li>
                            <li class="list"><a href="../index.php"><i class="la la-trash"></i>Delete Profile</a></li>
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
                $id = $_SESSION['ID'];
                $sql = "select complete from employer where id=$id";
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
                    if ($row['img']) {
                        $result = $conn->query("SELECT image FROM employer WHERE `id` = '$id' ");
                        $row = $result->fetch_assoc();
                        echo '
                            <button id="toggle-user-sidebar">
                                <img src="data:image/jpg;charset=utf8;base64,';
                        echo base64_encode($row['image']) . '"';
                        echo 'alt="avatar" class="thumb">
                                </button>
                            </a>';
                    }
                    ?>
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
                <li class="active"><a href="dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
                <li class="list"><a href="employer.php"><i class="la la-user-tie"></i>Company Profile</a></li>
                <li class="list"><a href="post-job.php"><i
                                class="la la-paper-plane"></i>Post a New Job</a></li>
                <li class="list"><a href="jobpost.php"><i class="la la-briefcase"></i> Manage Jobs </a></li>
                <li class="list"><a href="applicants.php"><i class="la la-file-invoice"></i>Applicants</a></li>
                <li class="list"><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted
                        Resumes</a></li>
                <!--<li class="list"><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>-->
                <li class="list"><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                <li class="list"><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
                <!--<li class="list"><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>-->
                <li><a href="../../Signout_module.php"><i class="la la-sign-out"></i>Logout</a></li>
                <li class="list"><a href="../../index.php"><i class="la la-trash"></i>Delete Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Hello,<?php
                    $result = $conn->query("SELECT name FROM employer WHERE `id` = '$id'");
                    $row = $result->fetch_assoc();
                    echo $row['name'];
                    ?></h3>
                <div class="text">Ready to jump back in?</div>
            </div>
            <div class="row">
                <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item">
                        <div class="left">
                            <i class="icon flaticon-briefcase"></i>
                        </div>
                        <div class="right">
                            <h4><?php
                                $sql = "SELECT count(*) AS 'count' FROM jobpost WHERE eid=$id";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                echo $row['count']
                                ?></h4>
                            <p>Posted Jobs</p>
                        </div>
                    </div>
                </div>
                <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item ui-red">
                        <div class="left">
                            <i class="icon la la-file-invoice"></i>
                        </div>
                        <div class="right">
                            <h4>
                                <?php
                                $applicant = 0;
                                $sql = "SELECT id FROM jobpost WHERE eid=$id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $Rid = $row['id'];
                                        $sql = "SELECT count(*) AS count FROM jobpost_apply where id=$Rid";
                                        $recordarray = $conn->query($sql);
                                        if ($recordarray->num_rows > 0) {
                                            $row = $recordarray->fetch_assoc();
                                            $applicant += (int)$row['count'];
                                        }
                                    }
                                    echo $applicant;
                                } else {
                                    echo $applicant;
                                }
                                ?>
                            </h4>
                            <p>Application</p>
                        </div>
                    </div>
                </div>
                <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                <div class="col-xl-7 col-lg-12">
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

                <div class="col-xl-5 col-lg-12">
                    <!-- Notification Widget -->
                    <div class="notification-widget ls-widget">
                        <div class="widget-title">
                            <h4>Notifications</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="notification-list">
                                <?php
                                $sql = "SELECT id FROM `jobpost` WHERE eid = $id order by id desc";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $pid = $row['id'];
                                        $sql = "SELECT * FROM `jobpost_apply` WHERE id = $pid order by id desc";
                                        $recordarray = $conn->query($sql);
                                        if ($recordarray->num_rows > 0) {
                                            while ($record = $recordarray->fetch_assoc()) {
                                                $jid = $record['jid'];
                                                $pid = $record['id'];
                                                $sql = "SELECT * FROM `jobseeker` WHERE id = $jid";
                                                $tupple = $conn->query($sql);
                                                $tupple = $tupple->fetch_assoc();
                                                $name = $tupple['name'];
                                                $sql = "SELECT * FROM `jobpost` WHERE id = $pid";
                                                $tupple = $conn->query($sql);
                                                $tupple = $tupple->fetch_assoc();
                                                $job = $tupple['title'];
                                                echo '<li><span class="icon flaticon-briefcase"></span> <strong>' . $name . '</strong> applied
                                    for a job <span class="colored">' . $job . '</span></li>';
                                            }
                                        }
                                    }
                                } else {
                                    echo "Post Job For Notification.";
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
                            <h4>Recent Applicants</h4>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM `jobpost` WHERE eid=$id";
                                $joid = array();
                                $jobpostarr = $conn->query($sql);
                                if ($jobpostarr->num_rows > 0) {
                                    while ($jobpost = $jobpostarr->fetch_assoc()) {
                                        $sql = "SELECT * FROM `jobpost_apply` WHERE id = " . $jobpost['id'];
                                        $jobapparr = $conn->query($sql);
                                        if ($jobapparr->num_rows > 0) {
                                            while ($jobapp = $jobapparr->fetch_assoc()) {
                                                $joid[] = $jobapp['jid'];
                                            }
                                        }
                                    }
                                    $joid = array_slice($joid, -10, 10);
                                    foreach ($joid as $value){
                                        $sql = "SELECT * FROM `jobseeker` WHERE id=" . $value;
                                        $jobseekerarr = $conn->query($sql);
                                        $jobseeker = $jobseekerarr->fetch_assoc();
                                        echo '<!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <figure class="image"><img src="data:image/jpg;charset=utf8;base64,';
                                        echo base64_encode($jobseeker['image']) . '"';
                                        echo 'alt="avatar" class="thumb"></figure>
                                            <h4 class="name"><a href="#">'.$jobseeker['name'].'</a></h4>
                                            <ul class="candidate-info">
                                                <li class="designation">'.$jobseeker['field_name'].'</li>
                                                <li><span class="icon flaticon-map-locator"></span>'.$jobseeker['city'].'</li>';
//                                                <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                           echo '</ul>
                                            <ul class="post-tags">';
                                           $sql = "SELECT * FROM `jobseeker_skill` where id=".$jobseeker['id'];
                                           $jobskillarr = $conn->query($sql);
                                           while ($jobskill = $jobskillarr->fetch_assoc()) {
                                               echo '<li><a href="#">'.$jobskill['skill'].'</a></li>';
                                           }
                                            echo '</ul>
                                        </div>
                                    </div>
                                </div>';
                                    }
                                } else {
                                    echo 'Post Job First';
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
        <p>© 2021 JobStation. All Right Reserved.</p>
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


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:15 GMT -->
</html>