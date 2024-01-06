<?php
session_start();
$id = $_SESSION['ID'];
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:54:32 GMT -->
<head>
    <meta charset="utf-8">
    <title>Post Job</title>

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

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

</head>

<body>

<div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <!--            <div class="preloader"></div>-->

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
                                <span><a href="../../lists/candidates-list.php">Find Candidate</a></span>
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

                            <!-- Only for Mobile View -->
                            <li class="mm-add-listing">
                                <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
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
                        <span class="count">1</span>
                        <span class="icon la la-heart-o"></span>
                    </button>

                    <button class="menu-btn">
                        <span class="icon la la-bell"></span>
                    </button>

                    <!-- Dashboard Option -->
                    <div class="dropdown dashboard-option">
                        <?php
                        include '../../Connection_Module.php';
                        $id = $_SESSION['ID'];
                        $result = $conn->query("SELECT image FROM employer WHERE `id` = '$id' ");
                        $row = $result->fetch_assoc();
                        echo '
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                <img src="data:image/jpg;charset=utf8;base64,';
                        echo base64_encode($row['image']) . '"';
                        echo 'alt="avatar" class="thumb">
                                <span class="name">My Account</span>
                            </a>';
                        ?>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php"> <i
                                            class="la la-home"></i> Dashboard</a></li>
                            <li><a href="employer.php"><i class="la la-user-tie"></i>Company
                                    Profile</a></li>
                            <li class="active"><a href="post-job.php"><i class="la la-paper-plane"></i>Post a
                                    New Job</a></li>
                            <li><a href="jobpost.php"><i class="la la-briefcase"></i> Manage Jobs </a>
                            </li>
                            <li><a href="applicants.php"><i class="la la-file-invoice"></i>Applicants</a></li>
                            <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a>
                            </li>
                            <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
                            <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                            <li><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
                            <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a>
                            </li>
                            <li><a href="../../Signout_module.php"><i class="la la-sign-out"></i>Logout</a></li>
                            <li><a href="../../index.php"><i class="la la-trash"></i>Delete Profile</a></li>
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
                                <img src="data:image/jpg;charset=utf8;base64,';echo base64_encode($row['image']).'"'; echo 'alt="avatar" class="thumb">
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
                <li><a href="dashboard.php"> <i class="la la-home"></i>Dashboard</a>
                </li>
                <li><a href="employer.php"><i class="la la-user-tie"></i>Company Profile</a></li>
                <li class="active"><a href="post-job.php"><i class="la la-paper-plane"></i>Post a New Job</a>
                </li>
                <li><a href="jobpost.php"><i class="la la-briefcase"></i> Manage Jobs </a></li>
                <li><a href="applicants.php"><i class="la la-file-invoice"></i> Applicants</a></li>
                <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
                <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
                <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                <li><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
                <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
                <li><a href="../../Signout_module.php"><i class="la la-sign-out"></i>Logout</a></li>
                <li><a href="index.html"><i class="la la-trash"></i>Delete Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Post a New Job!</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Post Job</h4>
                            </div>

                            <div class="widget-content">

                                <div class="post-job-steps">
                                    <div class="step">
                                        <span class="icon flaticon-briefcase"></span>
                                        <h5>Job Detail</h5>
                                    </div>

                                    <!--                                            <div class="step">
                                                                                    <span class="icon flaticon-money"></span>
                                                                                    <h5>Package & Payments</h5>
                                                                                </div>-->

                                    <div class="step">
                                        <span class="icon flaticon-checked"></span>
                                        <h5>Confirmation</h5>
                                    </div>
                                </div>

                                <form class="default-form" method="post">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Job Title</label>
                                            <input type="text" name="title" placeholder="Title" required>
                                        </div>

                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Job Description</label>
                                            <textarea name="about"
                                                      placeholder="Write Something About You Want in Your Employee."  required></textarea>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Skill</label>
                                            <div style="font-size: 15px">use control button to select multiple</div>
                                            <select name="skill[]" multiple="true" style="background-color: #F0F5F7;width: 100%;height: auto;border-radius: 10px;text-align: center;color:gray" required>
                                                <option value="Coding">Coding</option>
                                                <option value="Networking">Networking</option>
                                                <option value="System administration">System administration</option>
                                                <option value="Security">Security</option>
                                                <option value="Data analysis">Data analysis</option>
                                                <option value="Cloud computing">Cloud computing</option>
                                                <option value="Software development">Software development</option>
                                                <option value="Communication">Communication</option>
                                                <option value="Problem-solving">Problem-solving</option>
                                                <option value="Teamwork">Teamwork</option>
                                                <option value="Leadership">Leadership</option>
                                                <option value="Critical thinking">Critical thinking</option>
                                                <option value="Adaptability">Adaptability</option>
                                                <option value="Cloud computing">Cloud computing</option>
                                                <option value="Cybersecurity">Cybersecurity</option>
                                                <option value="Data analytics">Data analytics</option>
                                                <option value="Artificial intelligence">Artificial intelligence</option>
                                                <option value="Machine learning">Machine learning</option>
                                                <option value="Blockchain">Blockchain</option>
                                                <option value="Internet of Things (IoT)">Internet of Things (IoT)</option>
                                                <option value="Virtual reality (VR)">Virtual reality (VR)</option>
                                                <option value="Augmented reality (AR)">Augmented reality (AR)</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Qualification</label>
                                            <select name="qualification[]" multiple="true" style="background-color: #F0F5F7;width: 100%;height: auto;border-radius: 10px;text-align: center;color:gray" required>
                                                <option value="software engineering">software engineering</option>
                                                <option value="information technology">information technology</option>
                                                <option value="Certified Associate in Programming (CAP)">Certified Associate in Programming (CAP)</option>
                                                <option value="Certified Software Development Associate (CSDA)">Certified Software Development Associate (CSDA)</option>
                                                <option value="MCA">MCA</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BSCIT">BSCIT</option>
                                                <option value="MSCIT">MSCIT</option>
                                                <option value="Cisco Certified Network Associate (CCNA)">Cisco Certified Network Associate (CCNA)</option>
                                                <option value="Computer Network +">Computer Network +</option>
                                                <option value="Microsoft Certified Solutions Expert (MCSE)">Microsoft Certified Solutions Expert (MCSE)</option>
                                                <option value="CompTIA Linux+">CompTIA Linux+</option>
                                                <option value="CompTIA Security+">CompTIA Security+</option>
                                                <option value="Certified Ethical Hacker (CEH)">Certified Ethical Hacker (CEH)</option>
                                                <option value="Information Security Professional (CISSP)">Information Security Professional (CISSP)</option>
                                                <option value="Google Data Analytics Professional">Google Data Analytics Professional</option>
                                                <option value="Amazon Web Services (AWS)">Amazon Web Services (AWS)</option>
                                                <option value="Microsoft Azure">Microsoft Azure</option>
                                                <option value="Microsoft Certified Solutions Associate (MCSA)">Microsoft Certified Solutions Associate (MCSA)</option>
                                                <option value="Cloud Platform and Infrastructure">Cloud Platform and Infrastructure</option>
                                                <option value="MCA in Cloud Computing Applications">MCA in Cloud Computing Applications</option>
                                                <option value="Certified Scrum Master (CSM)">Certified Scrum Master (CSM)</option>
                                                <option value="Certified Kanban Professional (CKP)">Certified Kanban Professional (CKP)</option>
                                                <option value="MCA in Software Engineering">MCA in Software Engineering</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Lowest Salary</label>
                                            <input type="text" name="lsalary" placeholder="Value in Dollor" required>

                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Highest Salary</label>
                                            <input type="text" name="hsalary" placeholder="Value in Dollor" required>

                                        </div>
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="add"
                                                   placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia." required>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Type</label>
                                            <select class="chosen-select" name="jobtype">
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Work From Home">Work From Home</option>
                                                <option value="Project Hiring">Project Hiring</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Gender</label>
                                            <select class="chosen-select" name="gender">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="B">Both</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Experience</label>
                                            <input type="text" name="experience" placeholder="Value in Years">

                                        </div>
                                        <!-- Search Select -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Category</label>
                                            <input type="text" name="category"
                                                   placeholder="Software Developer,Software Designer,Data Analysist,Backend Developer" required>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Application Deadline Date</label><br>
                                            <input type="date" class="deadline" name="deadline" placeholder="06.04.2020"
                                                   style="background-color: #F0F5F7;width: 100%;height: 60px;border-radius: 10px;text-align: center;color:gray" required>
                                        </div>
                                        <script language="javascript">
                                            var today = new Date();
                                            var dd = String(today.getDate()).padStart(2, '0');
                                            var mm = String(today.getMonth() + 1).padStart(2, '0');
                                            var yyyy = today.getFullYear();
                                            today = yyyy + '-' + mm + '-' + dd;
                                            $('.deadline').attr('min', today);
                                        </script>
                                        <?php
                                        include 'post-job-module.php';
                                        ?>
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12 text-right">
                                            <button class="theme-btn btn-style-one" name="submit">Next</button>
                                        </div>
                                    </div>
                                </form>
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
        <p>© 2021 Job Station. All Right Reserved.</p>
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
<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDaaCBm4FEmgKs5cfVrh3JYue3Chj1kJMw&amp;ver=5.2.4"></script>
<script src="../../js/map-script.js"></script>
<!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:54:32 GMT -->
</html>