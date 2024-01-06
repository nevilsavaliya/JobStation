<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id = $_SESSION['ID'];
$user = $_SESSION['USER'];
if ($user == 'jobseeker') {
    include '../Connection_Module.php';
    $sql = "select * from jobseeker where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
} else {
    include '../Connection_Module.php';
    $sql = "select * from employer where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
}
?>
<!-- Mirrored from creativelayers.net/themes/superio/job-list-v8.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:02 GMT -->
<head>
    <meta charset="utf-8">
    <title>Find Jobs</title>

    <!-- Stylesheets -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]>
    <script src="../js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">

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
                        <div class="logo"><a href="../../index.php"><img src="../images/logo.png"
                                                                                              alt="" title=""></a></div>
                    </div>

                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li class="current dropdown">
                                <span>Trending</span>
                                <ul>
                                    <li><a href="about.php">Trending Companies</a></li>
                                    <li><a href="job-list.php">Trending Jobs</a></li>
                                </ul>
                            </li>

                            <li>
                                <span><a href="http://localhost/JobStation/lists/job-list.php">Find Jobs</a></span>
                            </li>

                            <li>
                                <span><a href="lists/Employer-list.php">Find Employer</a></span>
                            </li>

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

                            <!-- Only for Mobile View -->
                            <li class="mm-add-listing">
                                <a href=".html" class="theme-btn btn-style-one">Job Post</a>
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


                    <?php
                    if ($user == "jobseeker") {
                        echo '
                            <!-- Dashboard Option -->
                            <div class="dropdown dashboard-option">';
                        echo '';
                        echo '
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                <img src="data:image/jpg;charset=utf8;base64,';
                        echo base64_encode($row['image']) . '"';
                        echo 'alt="avatar" class="thumb">
                                <span class="name">My Account</span>
                            </a>';
                        echo '<ul class="dropdown-menu">
                            <li><a href="../dashboard/jobseeker/dashboard.php"> <i
                                        class="la la-home"></i> Dashboard</a></li>
                            <li class="list"><a href="../dashboard/jobseeker/jobseeker.php"><i class="la la-user-tie"></i>My Profile</a>
                            </li>
                            <li class="list"><a href="../dashboard/jobseeker/Resume.php"><i
                                        class="la la-file-invoice"></i>My
                                    Resume</a></li>
                            <li class="list"><a href="../dashboard/jobseeker/AppliedJob.php"><i
                                        class="la la-briefcase"></i> Applied
                                    Jobs </a></li>
<!--                            <li class="list"><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job-->
<!--                                    Alerts</a>-->
                            </li>
                            <li class="list"><a href="../dashboard/jobseeker/shortlisted.php"><i
                                        class="la la-bookmark-o"></i>Shortlisted
                                    Jobs</a></li>
                            <li class="list"><a href="../dashboard/jobseeker/jobs.php"><i class="la la-box"></i>Jobs</a></li>
                            <li class="list"><a href="../dashboard/jobseeker/dashboard-messages.html"><i
                                        class="la la-comment-o"></i>Messages</a></li>
                            <li class="list"><a href="../dashboard/jobseeker/change-password.php"><i class="la la-lock"></i>Change
                                    Password</a>
                            </li>
                            <li class="list"><a href="../Signout_module.php"><i
                                        class="la la-sign-out"></i>Logout</a></li>
                            <li class="list"><a href="../index.php"><i class="la la-trash"></i>Delete
                                    Profile</a></li>
                        </ul>';
                    } else {
                        echo '
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                <img src="data:image/jpg;charset=utf8;base64,';
                        echo base64_encode($row['image']) . '"';
                        echo 'alt="avatar" class="thumb">
                                <span class="name">My Account</span>
                            </a>';
                        echo '<ul class="dropdown-menu">
                            <li class="list"><a href="../dashboard/employer/dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
                            <li class="list"><a href="../dashboard/employer/employer.php"><i class="la la-user-tie"></i>Company Profile</a>
                            </li>
                            <li class="list"><a href="../dashboard/employer/post-job.php"><i
                                            class="la la-paper-plane"></i>Post a New Job</a></li>
                            <li class="list"><a href="../dashboard/employer/jobpost.php"><i class="la la-briefcase"></i> Manage Jobs </a>
                            </li>
                            <li class="list"><a href="../dashboard/employer/applicants.php"><i class="la la-file-invoice"></i>Applicants</a>
                            </li>
                            <li class="list"><a href="../dashboard/employer/dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted
                                    Resumes</a>
                            </li>
                            <li class="list"><a href="../dashboard/employer/dashboard-packages.html"><i class="la la-box"></i>Packages</a>
                            </li>
                            <li class="list"><a href="../dashboard/employer/dashboard-messages.html"><i
                                            class="la la-comment-o"></i>Messages</a></li>
                            <li class="list"><a href="../dashboard/employer/dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume
                                    Alerts</a></li>
                            <li class="list"><a href="../dashboard/employer/dashboard-change-password.html"><i class="la la-lock"></i>Change
                                    Password</a>
                            </li>
                            <li><a href="../Signout_module.php"><i class="la la-sign-out"></i>Logout</a></li>
                            <li class="list"><a href="../index.php"><i class="la la-trash"></i>Delete Profile</a></li>
                        </ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
</div>

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="logo"><a href="index.html"><img src="../images/logo.png" alt="" title=""></a></div>

    <!--Nav Box-->
    <div class="nav-outer clearfix">

        <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
                <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
            </div>

            <button id="toggle-user-sidebar"><img src="../images/resource/company-6.png" alt="avatar" class="thumb">
            </button>
            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
        </div>
    </div>

</div>

<!-- Mobile Nav -->
<div id="nav-mobile"></div>
</header>
<!--End Main Header -->

<!--Page Title-->
<section class="page-title style-two">
    <div class="auto-container">
        <!-- <div class="title-outer">
                <h1>Find Jobs</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Jobs</li>
                </ul>
            </div> -->

        <!-- Job Search Form -->
        <div class="job-search-form">
            <form method="post" action="https://creativelayers.net/themes/superio/job-list-v10.html">
                <div class="row">
                    <!-- Form Group -->
                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                        <span class="icon flaticon-search-1"></span>
                        <input type="text" name="field_name" placeholder="Job title, keywords, or company">
                    </div>

                    <!-- Form Group -->
                    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                        <span class="icon flaticon-map-locator"></span>
                        <input type="text" name="field_name" placeholder="City or postcode">
                    </div>

                    <!-- Form Group -->
                    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                        <span class="icon flaticon-briefcase"></span>
                        <select class="chosen-select">
                            <option value="">All Categories</option>
                            <option value="44">Accounting / Finance</option>
                            <option value="106">Automotive Jobs</option>
                            <option value="46">Customer</option>
                            <option value="48">Design</option>
                            <option value="47">Development</option>
                            <option value="45">Health and Care</option>
                            <option value="105">Marketing</option>
                            <option value="107">Project Management</option>
                        </select>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                        <button type="submit" class="theme-btn btn-style-one">Find Jobs</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Job Search Form -->
    </div>
</section>
<!--End Page Title-->

<!-- Listing Section -->
<section class="ls-section">
    <div class="auto-container">
        <div class="filters-backdrop"></div>

        <div class="row">

            <!-- Filters Column -->
            <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="filters-outer">
                        <button type="button" class="theme-btn close-filters">X</button>

                        <!-- Switchbox Outer -->
                        <div class="switchbox-outer">
                            <h4>Job type</h4>
                            <ul class="switchbox">
                                <li>
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                        <span class="title">Freelance</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                        <span class="title">Full Time</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                        <span class="title">Internship</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                        <span class="title">Part Time</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                        <span class="title">Temporary</span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <!-- Checkboxes Ouer -->
                        <div class="checkbox-outer">
                            <h4>Date Posted</h4>
                            <ul class="checkboxes">
                                <li>
                                    <input id="check-f" type="checkbox" name="check">
                                    <label for="check-f">All</label>
                                </li>
                                <li>
                                    <input id="check-g" type="checkbox" name="check">
                                    <label for="check-g">Last Hour</label>
                                </li>
                                <li>
                                    <input id="check-h" type="checkbox" name="check">
                                    <label for="check-h">Last 24 Hours</label>
                                </li>
                                <li>
                                    <input id="check-i" type="checkbox" name="check">
                                    <label for="check-i">Last 7 Days</label>
                                </li>
                                <li>
                                    <input id="check-j" type="checkbox" name="check">
                                    <label for="check-j">Last 14 Days</label>
                                </li>
                                <li>
                                    <input id="check-k" type="checkbox" name="check">
                                    <label for="check-k">Last 30 Days</label>
                                </li>
                            </ul>
                        </div>

                        <!-- Checkboxes Ouer -->
                        <div class="checkbox-outer">
                            <h4>Experience Level</h4>
                            <ul class="checkboxes">
                                <li>
                                    <input id="check-a" type="checkbox" name="check">
                                    <label for="check-a">All</label>
                                </li>
                                <li>
                                    <input id="check-b" type="checkbox" name="check">
                                    <label for="check-b">Internship</label>
                                </li>
                                <li>
                                    <input id="check-c" type="checkbox" name="check">
                                    <label for="check-c">Entry level</label>
                                </li>
                                <li>
                                    <input id="check-d" type="checkbox" name="check">
                                    <label for="check-d">Associate</label>
                                </li>
                                <li>
                                    <input id="check-e" type="checkbox" name="check">
                                    <label for="check-e">Mid-Senior level4</label>
                                </li>
                                <li>
                                    <button class="view-more"><span class="icon flaticon-plus"></span> View More
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- Filter Block -->
                        <div class="filter-block">
                            <h4>Salary</h4>

                            <div class="range-slider-one salary-range">
                                <div class="salary-range-slider"></div>
                                <div class="input-outer">
                                    <div class="amount-outer">
                                                    <span class="amount salary-amount">
                                                        $<span class="min">0</span>
                                                        $<span class="max">0</span>
                                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Block -->
                        <div class="filter-block">
                            <h4>Tags</h4>
                            <ul class="tags-style-one">
                                <li><a href="#">app</a></li>
                                <li><a href="#">administrative</a></li>
                                <li><a href="#">android</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">design</a></li>
                                <li><a href="#">react</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Call To Action -->
                    <div class="call-to-action-four">
                        <h5>Recruiting?</h5>
                        <p>Advertise your jobs to millions of monthly users and search 15.8 million CVs in our
                            database.</p>
                        <a href="#" class="theme-btn btn-style-one bg-blue"><span
                                    class="btn-title">Start Recruiting Now</span></a>
                        <div class="image" style="background-image: url(../images/resource/ads-bg-4.png);"></div>
                    </div>
                    <!-- End Call To Action -->
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

                    <!-- ls Switcher -->
                    <div class="ls-switcher">
<!--                        <div class="showing-result">-->
<!--                            <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> jobs</div>-->
<!--                        </div>-->
                        <div class="sort-by">
                            <select class="chosen-select">
                                <option>New Jobs</option>
                                <option>Freelance</option>
                                <option>Full Time</option>
                                <option>Internship</option>
                                <option>Part Time</option>
                                <option>Temporary</option>
                            </select>

                            <select class="chosen-select">
                                <option>Show 10</option>
                                <option>Show 20</option>
                                <option>Show 30</option>
                                <option>Show 40</option>
                                <option>Show 50</option>
                                <option>Show 60</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" style="overflow-y: scroll">
                        <!-- Job Block -->
                        <?php
                        function getPostApplyCount($conn, $postid, $week)
                        {
                            $daysAgoStart = $week * 7;
                            $daysAgoEnd = $daysAgoStart - 7;
                            $pastDate1 = new DateTime();
                            $pastDate1->sub(new DateInterval("P{$daysAgoStart}D"));
                            $pastDate1 = $pastDate1->format('Y-m-d');

                            $pastDate2 = new DateTime();
                            $pastDate2->sub(new DateInterval("P{$daysAgoEnd}D"));
                            $pastDate2 = $pastDate2->format('Y-m-d');

                            $sql = "SELECT COUNT(*) FROM `jobpost_apply` WHERE id = $postid AND `applyDate` BETWEEN '$pastDate1' AND '$pastDate2'";
                            $postapplyarray = $conn->query($sql);
                            return $postapplyarray->fetch_assoc()['COUNT(*)'];
                        }

                        class LinearRegression
                        {
                            protected $slope;
                            protected $intercept;

                            public function train($x, $y)
                            {
                                // Calculate slope and intercept using linear regression formulas
                                $n = count($x);
                                $sumX = array_sum($x);
                                $sumY = array_sum($y);
                                $sumXY = 0;
                                $sumXX = 0;

                                for ($i = 0; $i < $n; $i++) {
                                    $sumXY += ($x[$i] * $y[$i]);
                                    $sumXX += ($x[$i] * $x[$i]);
                                }

                                $this->slope = ($n * $sumXY - $sumX * $sumY) / ($n * $sumXX - $sumX * $sumX);
                                $this->intercept = ($sumY - $this->slope * $sumX) / $n;
                            }

                            public function predict($x)
                            {
                                return $this->slope * $x + $this->intercept;
                            }
                        }

                        $sql = 'SELECT * FROM `jobpost`';
                        $dataset = [];
                        $data = [];
                        $postarray = $conn->query($sql);
                        $currentdate = date("Y-m-d");
                        while ($post = $postarray->fetch_assoc()) {
                            $postid = $post['id'];
                            $dataset[1] = getPostApplyCount($conn, $postid, 4);
                            $dataset[2] = getPostApplyCount($conn, $postid, 3);
                            $dataset[3] = getPostApplyCount($conn, $postid, 2);
                            $dataset[4] = getPostApplyCount($conn, $postid, 1);
                            $predictWeek = 5;
                            $weeks = array_keys($dataset);
                            $jobCounts = array_values($dataset);
                            $regression = new LinearRegression();
                            $regression->train($weeks, $jobCounts);
                            $predictedJobCount = $regression->predict($predictWeek);
                            $data[$postid] = round($predictedJobCount);
                        }
                        arsort($data);
                        if($data != null) {
                            foreach ($data as $key => $value) {
                                $sql = "SELECT * FROM `jobpost` WHERE id = $key";
                                $postarr = $conn->query($sql);
                                while ($post = $postarr->fetch_assoc()) {
                                    echo '<div class="job-block-four col-lg-6 col-md-6 col-sm-12"><a href="../profile/jobpost.php?id='.$post['id'].'">
                                        <div class="inner-box">
                                            <ul class="job-other-info">
                                                <li class="time">' . $post['jobtype'] . '</li>';
                                    $sql = "SELECT * FROM `jobpost_skill` where id = " . $post['id'];
                                    $postskillarr = $conn->query($sql);
                                    while ($postskill = $postskillarr->fetch_assoc()) {
                                        echo '<li class="privacy">'. $postskill['skill']. '</li>';
                                    }
                                    echo '</ul>';
                                    $sql = "SELECT * FROM `employer` where id = " .$post['eid'];
                                    $employerarr = $conn->query($sql);
                                    $employer = $employerarr->fetch_assoc();
                                    echo '<span class="company-logo">';
                                    echo '<img src="data:image/jpg;charset=utf8;base64,';
                                    echo base64_encode($employer['image']) . '"';
                                    echo 'alt="avatar" class="logo">';
                                    echo'</span>
                                            <span class="company-name">'.$employer['name'].'</span>
                                            <h4><a href="#">'.$post['title'].'</a></h4>
                                            <div class="location"><span class="icon flaticon-map-locator"></span>'.$post['address'].'</div>
                                        </div>
                                    </div></a>';
                                }
                            }
                        }else{
                            echo '<div class="job-block">
                                                    <div class="inner-box">
                                                        <div class="content">' . "No Job Post In Past Four Weeks</div></div></div>";
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <!--                                <nav class="ls-pagination">-->
                    <!--                                    <ul>-->
                    <!--                                        <li class="prev"><a href="#"><i class="fa fa-arrow-left"></i></a></li>-->
                    <!--                                        <li><a href="#">1</a></li>-->
                    <!--                                        <li><a href="#" class="current-page">2</a></li>-->
                    <!--                                        <li><a href="#">3</a></li>-->
                    <!--                                        <li class="next"><a href="#"><i class="fa fa-arrow-right"></i></a></li>-->
                    <!--                                    </ul>-->
                    <!--                                </nav>-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Listing Page Section -->


<!-- Main Footer -->
<footer class="main-footer alternate5">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row">
                <div class="big-column col-xl-4 col-lg-3 col-md-12">
                    <div class="footer-column about-widget">
                        <div class="logo"><a href="#"><img src="../images/logo.png" alt=""></a></div>
                        <p class="phone-num"><span>Call us </span><a href="thebeehost%40support.html">123 456 7890</a>
                        </p>
                        <p class="address">329 Queensberry Street, North Melbourne VIC<br> 3051, Australia. <br><a
                                    href="mailto:support@superio.com" class="email">support@superio.com</a></p>
                    </div>
                </div>

                <div class="big-column col-xl-8 col-lg-9 col-md-12">
                    <div class="row">
                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">For Candidates</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="#">Browse Jobs</a></li>
                                        <li><a href="#">Browse Categories</a></li>
                                        <li><a href="#">Candidate Dashboard</a></li>
                                        <li><a href="#">Job Alerts</a></li>
                                        <li><a href="#">My Bookmarks</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">For Employers</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="#">Browse Candidates</a></li>
                                        <li><a href="#">Employer Dashboard</a></li>
                                        <li><a href="#">Add Job</a></li>
                                        <li><a href="#">Job Packages</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">About Us</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="#">Job Page</a></li>
                                        <li><a href="#">Job Page Alternative</a></li>
                                        <li><a href="#">Resume Page</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Helpful Resources</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="#">Site Map</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Privacy Center</a></li>
                                        <li><a href="#">Security Center</a></li>
                                        <li><a href="#">Accessibility Center</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="outer-box">
                <div class="copyright-text">© 2021 <a href="#">Superio</a>. All Right Reserved.</div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
</footer>
<!-- End Main Footer -->


</div><!-- End Page Wrapper -->


<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/chosen.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.js"></script>
<script src="../js/jquery.modal.min.js"></script>
<script src="../js/mmenu.polyfills.js"></script>
<script src="../js/mmenu.js"></script>
<script src="../js/appear.js"></script>
<script src="../js/ScrollMagic.min.js"></script>
<script src="../js/rellax.min.js"></script>
<script src="../js/owl.js"></script>
<script src="../js/wow.js"></script>
<script src="../js/script.js"></script>

</body>


<!-- Mirrored from creativelayers.net/themes/superio/job-list-v8.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:02 GMT -->
</html>