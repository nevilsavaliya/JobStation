<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$id = $_SESSION['ID'];
?>
<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:14 GMT -->
<head>
    <meta charset="utf-8">
    <title>Employer Profile</title>

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
    <!--[if lt IE 9]>
    <script src="../../js/respond.js"></script><![endif]-->
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
                            <!--                            <li class="current dropdown">
                                                            <span>Trending</span>
                                                            <ul>
                                                                <li><a href="about.php">Trending Companies</a></li>
                                                                <li><a href="faqs.php">Trending Jobs</a></li>
                                                            </ul>
                                                        </li>-->

                            <!--                            <li>
                                                            <span><a href="lists/job-list.php">Find Jobs</a></span>
                                                        </li>-->

                            <li>
                                <span><a href="lists/candidates-list.php">Find Job Seekers</a></span>
                            </li>
                            <!--                            <li>
                                                            <span><a href="lists/Employer-list.php">Find Employer</a></span>
                                                        </li>-->

                            <li>
                                <span><a href="lists/blog-list.php">Blog</a></span>
                            </li>
                            <li class="current dropdown">
                                <span>Other</span>
                                <ul>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="faqs.php">FAQ's</a></li>
                                    <li><a href="terms.php">Terms</a></li>
                                    <li><a href="contact.php">Contact</a></li>
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
                            <li class="list"><a href="dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
                            <li class="active"><a href="employer.php"><i class="la la-user-tie"></i>Company Profile</a>
                            </li>
                            <li class="list"><a href="post-job.php"><i
                                            class="la la-paper-plane"></i>Post a New Job</a></li>
                            <li class="list"><a href="jobpost.php"><i class="la la-briefcase"></i> Manage
                                    Jobs </a>
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
                            <li class="list"><a href="../../Signout_module.php"><i class="la la-sign-out"></i>Logout</a>
                            </li>
                            <li class="list"><a href="../../index.php"><i class="la la-trash"></i>Delete Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="index.html"><img src="../../images/logo.png" alt="" title=""></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <?php
                include '.../.../Connection_Module.php';
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
                <li class="list"><a href="dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
                <li class="active"><a href="employer.php"><i class="la la-user-tie"></i>Company Profile</a></li>
                <li class="list"><a href="http://localhost/JobStation/dashboard/employer/post-job.php"><i
                                class="la la-paper-plane"></i>Post a New Job</a></li>
                <li class="list"><a href="jobpost.php"><i class="la la-briefcase"></i> Manage Jobs </a>
                </li>
                <li class="list"><a href="applicants.php"><i class="la la-file-invoice"></i>Applicants</a></li>
                <li class="list"><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted
                        Resumes</a></li>
                <!--<li class="list"><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>-->
                <li class="list"><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                <li class="list"><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
                <!--<li class="list"><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>-->
                <li class="list"><a href="http://localhost/JobStation/Signout_module.php"><i class="la la-sign-out"></i>Logout</a>
                </li>
                <li class="list"><a href="http://localhost/JobStation/index.php"><i class="la la-trash"></i>Delete
                        Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-seven">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo">
                                <?php
                                $result = $conn->query("SELECT * FROM employer WHERE `id` = '$id' ");
                                $row = $result->fetch_assoc();
                                echo '
                                <img src="data:image/jpg;charset=utf8;base64,';
                                echo base64_encode($row['image']) . '"alt = "">';
                                ?>
                            </span>
                            <h4>
                                <?php
                                echo $row['name'];
                                ?>
                            </h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-map-locator"></span> <?php
                                    echo $row['address'];
                                    ?></li>
                                <li><span class="icon flaticon-briefcase"></span> <?php
                                    echo $row['field_name'];
                                    ?></li>
                                <li><span class="icon flaticon-telephone-1"></span> <?php
                                    echo $row['phone'];
                                    ?></li>
                                <li><span class="icon flaticon-mail"></span>
                                    <?php
                                    echo $row['email'];
                                    ?>
                                </li>
                            </ul>
                            <ul class="job-other-info">
                                <li class="time">Open Jobs – 3</li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            <h4>About Company</h4>
                            <p><?php
                                echo $row['about'];
                                ?></p>
                            <!--                            <div class="row images-outer">-->
                            <!--                                <div class="col-lg-3 col-md-3 col-sm-6">-->
                            <!--                                    <figure class="image"><a href="../images/resource/employers-single-1.png"-->
                            <!--                                                             class="lightbox-image" data-fancybox="gallery"><img-->
                            <!--                                                    src="../images/resource/employers-single-1.png" alt=""></a></figure>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-lg-3 col-md-3 col-sm-6">-->
                            <!--                                    <figure class="image"><a href="../images/resource/employers-single-2.png"-->
                            <!--                                                             class="lightbox-image" data-fancybox="gallery"><img-->
                            <!--                                                    src="../images/resource/employers-single-2.png" alt=""></a></figure>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-lg-3 col-md-3 col-sm-6">-->
                            <!--                                    <figure class="image"><a href="../images/resource/employers-single-3.png"-->
                            <!--                                                             class="lightbox-image" data-fancybox="gallery"><img-->
                            <!--                                                    src="../images/resource/employers-single-3.png" alt=""></a></figure>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-lg-3 col-md-3 col-sm-6">-->
                            <!--                                    <figure class="image"><a href="../images/resource/employers-single-4.png"-->
                            <!--                                                             class="lightbox-image" data-fancybox="gallery"><img-->
                            <!--                                                    src="../images/resource/employers-single-4.png" alt=""></a></figure>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <p>Moody’s Corporation, often referred to as Moody’s, is an American business and financial-->
                            <!--                                services company. It is the holding company for Moody’s Investors Service (MIS), an-->
                            <!--                                American credit rating agency, and Moody’s Analytics (MA), an American provider of-->
                            <!--                                financial analysis software and services.</p>-->
                            <!--                            <p>Moody’s was founded by John Moody in 1909 to produce manuals of statistics related to-->
                            <!--                                stocks and bonds and bond ratings. Moody’s was acquired by Dun & Bradstreet in 1962. In-->
                            <!--                                2000, Dun & Bradstreet spun off Moody’s Corporation as a separate company that was-->
                            <!--                                listed on the NYSE under MCO. In 2007, Moody’s Corporation was split into two operating-->
                            <!--                                divisions, Moody’s Investors Service, the rating agency, and Moody’s Analytics, with all-->
                            <!--                                of its other products.</p>-->
                        </div>

                        <!-- Related Jobs -->
                        <div class="related-jobs">
                            <div class="title-box">
                                <div style="text">
                                    <h3><?php
                                        $sql = "SELECT count(*) AS 'count' FROM jobpost WHERE eid=$id";
                                        $result = $conn->query($sql);
                                        $record = $result->fetch_assoc();
                                        echo $record['count']
                                        ?> jobs at <?php
                                        echo $row['name'];
                                        ?></h3>
                                </div>
                                <!--                                <div class="text">2020 jobs live - 293 added today.</div>-->
                            </div>

                            <?php
                            $sql = "SELECT * FROM jobpost WHERE eid=$id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($record = $result->fetch_assoc()) {
                                    echo '<div class="job-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo">';
                                    echo '
                                        <img src="data:image/jpg;charset=utf8;base64,';
                                    echo base64_encode($row['image']) . '"alt = "">';
                                    echo '</span>
                                        <h4><a href="#">';
                                    echo $record['title'];
                                    echo '</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span>';
                                    echo $record['category'];
                                    echo '</li>
                                            <li><span class="icon flaticon-map-locator"></span>';
                                    echo $record['address'];
                                    echo '</li>';
//                                            <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                    echo '<li><span class="icon flaticon-money"></span>';
                                    echo $record['lsalary'] . '$ - ' . $record['hsalary'] . '$';
                                    echo '</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">';
                                    echo $record['jobtype'];
                                    echo '</li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>';
                                }
                            } else {
                                echo "<div class='text'>No Job Posted Yet</div>";
                            }
                            ?>

                            <!-- Job Block -->
                            <!--                            <div class="job-block">-->
                            <!--                                <div class="inner-box">-->
                            <!--                                    <div class="content">-->
                            <!--                                        <span class="company-logo"><img src="../images/resource/company-logo/1-3.png"-->
                            <!--                                                                        alt=""></span>-->
                            <!--                                        <h4><a href="#">Senior Full Stack Engineer, Creator Success</a></h4>-->
                            <!--                                        <ul class="job-info">-->
                            <!--                                            <li><span class="icon flaticon-briefcase"></span> Segment</li>-->
                            <!--                                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>-->
                            <!--                                            <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>-->
                            <!--                                            <li><span class="icon flaticon-money"></span> $35k - $45k</li>-->
                            <!--                                        </ul>-->
                            <!--                                        <ul class="job-other-info">-->
                            <!--                                            <li class="time">Full Time</li>-->
                            <!--                                            <li class="required">Urgent</li>-->
                            <!--                                        </ul>-->
                            <!--                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                        </div>
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget company-widget" style="background-color: white">
                                <div class="widget-content">

                                    <ul class="company-info mt-0">
                                        <li>Primary industry: <span> <?php
                                                echo $row['field_name'];
                                                ?></span></li>
                                        <!--<li>Company size: <span>501-1,000</span></li>-->
                                        <li>Founded in: <span> <?php
                                                echo $row['date_of_establishment'];
                                                ?></span></li>
                                        <li>Phone: <span><?php
                                                echo $row['phone'];
                                                ?></span></li>
                                        <li>Email: <span><?php
                                                echo $row['email'];
                                                ?></span></li>
                                        <li>Location: <span><?php
                                                echo $row['address'];
                                                ?></span></li>
                                        <!--                                        <li>Social media:-->
                                        <!--                                            <div class="social-links">-->
                                        <!--                                                <a href="#"><i class="fab fa-facebook-f"></i></a>-->
                                        <!--                                                <a href="#"><i class="fab fa-twitter"></i></a>-->
                                        <!--                                                <a href="#"><i class="fab fa-instagram"></i></a>-->
                                        <!--                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>-->
                                        <!--                                            </div>-->
                                        <!--                                        </li>-->
                                    </ul>

                                    <!--                                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three">www.invisionapp.com</a>-->
                                </div>
                            </div>

                            <!--                            <div class="sidebar-widget">-->
                            <!--                                <!-- Map Widget -->
                            <!--                                <h4 class="widget-title">Job Location</h4>-->
                            <!--                                <div class="widget-content">-->
                            <!--                                    <div class="map-outer mb-0">-->
                            <!--                                        <div class="map-canvas" data-zoom="12" data-lat="-37.817085"-->
                            <!--                                             data-lng="144.955631" data-type="roadmap" data-hue="#ffc400"-->
                            <!--                                             data-title="Envato" data-icon-path="images/resource/map-marker.png"-->
                            <!--                                             data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->


                        </aside>
                    </div>
                </div>
            </div>
            <!-- End Job Detail Section -->

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