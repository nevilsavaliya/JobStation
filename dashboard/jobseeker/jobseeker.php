<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$id = $_SESSION['ID'];
?>
<!-- Mirrored from creativelayers.net/themes/superio/candidates-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:18 GMT -->
<head>
  <meta charset="utf-8">
  <title>Job Seeker Profile</title>

  <!-- Stylesheets -->
  <link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/responsive.css" rel="stylesheet">

  <link rel="shortcut icon" href="../../images/favicon.png" type="image/x-icon">
  <link rel="icon" href="../../images/favicon.png" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
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
                                  <span><a href="../../lists/candidates-list.php">Find Candidate</a></span>
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
                              <li class="active"><a href="jobseeker.php"><i class="la la-user-tie"></i>My Profile</a>
                              </li>
                              <li class="list"><a href="Resume.php"><i class="la la-file-invoice"></i>My
                                      Resume</a></li>
                              <li class="list"><a href="AppliedJob.php"><i class="la la-briefcase"></i> Applied
                                      Jobs </a></li>
<!--                              <li class="list"><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a>-->
<!--                              </li>-->
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
<!--      <div class="user-sidebar">-->
<!--          <div class="sidebar-inner">-->
<!--              <ul class="navigation">-->
<!--                  <li class="active"><a href="dashboard.php"> <i-->
<!--                                  class="la la-home"></i> Dashboard</a></li>-->
<!--                  <li class="list"><a href="jobseeker.php"><i class="la la-user-tie"></i>My Profile</a>-->
<!--                  </li>-->
<!--                  <li class="list"><a href="candidate-dashboard-resume.html"><i class="la la-file-invoice"></i>My-->
<!--                          Resume</a></li>-->
<!--                  <li class="list"><a href="candidate-dashboard-applied-job.html"><i class="la la-briefcase"></i> Applied-->
<!--                          Jobs </a></li>-->
<!--                  <li class="list"><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a>-->
<!--                  </li>-->
<!--                  <li class="list"><a href="candidate-dashboard-shortlisted-resume.html"><i class="la la-bookmark-o"></i>Shortlisted-->
<!--                          Jobs</a></li>-->
<!--                  <li class="list"><a href="candidate-dashboard-cv-manager.html"><i class="la la-file-invoice"></i> CV-->
<!--                          manager</a></li>-->
<!--                  <li class="list"><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>-->
<!--                  <li class="list"><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>-->
<!--                  <li class="list"><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a>-->
<!--                  </li>-->
<!--                  <li class="list"><a href="dashboard-profile.html"><i class="la la-user-alt"></i>View Profile</a></li>-->
<!--                  <li class="list"><a href="../../index.php"><i-->
<!--                                  class="la la-sign-out"></i>Logout</a></li>-->
<!--                  <li class="list"><a href="../../index.php"><i class="la la-trash"></i>Delete-->
<!--                          Profile</a></li>-->
<!--              </ul>-->
<!--          </div>-->
<!--      </div>-->
<!--       End User Sidebar -->
      <!-- Dashboard -->


    <!-- Candidate Detail Section -->
    <section class="candidate-detail-section">
      <!-- Upper Box -->
      <div class="upper-box">
        <div class="auto-container">
          <!-- Candidate block Five -->
          <div class="candidate-block-five">
            <div class="inner-box">
              <div class="content">
                <figure class="image">
                                <?php
                                $result = $conn->query("SELECT * FROM jobseeker WHERE `id` = '$id' ");
                                $row = $result->fetch_assoc();
                                echo '
                                <img src="data:image/jpg;charset=utf8;base64,';
                                echo base64_encode($row['image']) . '"alt = "">';
                                ?>
                            </figure>
                <h4 class="name">
                    <?php
                    echo $row['name'];
                    ?>
                    </a></h4>
                <ul class="candidate-info">
                    <li><span class="icon flaticon-briefcase"></span> <?php
                        echo $row['field_name'];
                        ?></li>
                  <li><span class="icon flaticon-map-locator"></span> <?php
                      echo $row['address'];
                      ?></li>
<!--                  <li><span class="icon flaticon-money"></span> $99 / hour</li>-->
<!--                  <li><span class="icon flaticon-clock"></span> Member Since,Aug 19, 2020</li>-->
                </ul>
                <ul class="post-tags">
                    <?php
                    $skill_arr = $conn->query("SELECT * FROM `jobseeker_skill` WHERE id=$id");
                    while ($value = $skill_arr->fetch_assoc()){
                        echo "<li>".$value['skill']."</li>";
                    }
                    ?>
                </ul>
              </div>

<!--              <div class="btn-box">-->
<!--                <a href="#" class="theme-btn btn-style-one">Download CV</a>-->
<!--                <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>-->
<!--              </div>-->
            </div>
          </div>
        </div>
      </div>

      <div class="candidate-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-detail">
                <h4>Job seeker About</h4>
                <p><li><span class="icon flaticon-briefcase"></span> <?php
                      echo $row['about'];
                      ?></li></p>
<!--                <p>Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam. Mauris nec erat ut libero vulputate pulvinar.</p>-->

                <!-- Resume / Education -->
<!--                <div class="resume-outer">-->
<!--                  <div class="upper-title">-->
<!--                    <h4>Education</h4>-->
<!--                  </div>-->
                  <!-- Resume BLock -->
<!--                  <div class="resume-block">-->
<!--                    <div class="inner">-->
<!--                      <span class="name">M</span>-->
<!--                      <div class="title-box">-->
<!--                        <div class="info-box">-->
<!--                          <h3>Bachlors in Fine Arts</h3>-->
<!--                          <span>Modern College</span>-->
<!--                        </div>-->
<!--                        <div class="edit-box">-->
<!--                          <span class="year">2012 - 2014</span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>-->
<!--                    </div>-->
<!--                  </div>-->

                  <!-- Resume BLock -->
<!--                  <div class="resume-block">-->
<!--                    <div class="inner">-->
<!--                      <span class="name">H</span>-->
<!--                      <div class="title-box">-->
<!--                        <div class="info-box">-->
<!--                          <h3>Computer Science</h3>-->
<!--                          <span>Harvard University</span>-->
<!--                        </div>-->
<!--                        <div class="edit-box">-->
<!--                          <span class="year">2008 - 2012</span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->

                <!-- Resume / Work & Experience -->


                <!-- Resume / Awards -->
                <div class="resume-outer theme-yellow">
<!--                  <div class="upper-title">-->
<!--                    <h4>Awards</h4>-->
<!--                  </div>-->
                  <!-- Resume BLock -->
<!--                  <div class="resume-block">-->
<!--                    <div class="inner">-->
<!--                      <span class="name"></span>-->
<!--                      <div class="title-box">-->
<!--                        <div class="info-box">-->
<!--                          <h3>Perfect Attendance Programs</h3>-->
<!--                          <span></span>-->
<!--                        </div>-->
<!--                        <div class="edit-box">-->
<!--                          <span class="year">2012 - 2014</span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>-->
<!--                    </div>-->
<!--                  </div>-->


                  <!-- Resume BLock -->
<!--                  <div class="resume-block">-->
<!--                    <div class="inner">-->
<!--                      <span class="name"></span>-->
<!--                      <div class="title-box">-->
<!--                        <div class="info-box">-->
<!--                          <h3>Top Performer Recognition</h3>-->
<!--                          <span></span>-->
<!--                        </div>-->
<!--                        <div class="edit-box">-->
<!--                          <span class="year">2012 - 2014</span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>-->
<!--                    </div>-->
<!--                  </div>-->
                </div>

                <!-- Video Box -->
<!--                <div class="video-outer">-->
<!--                  <h4>Candidates About</h4>-->
<!--                  <div class="video-box">-->
<!--                    <figure class="image">-->
<!--                      <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption="">-->
<!--                        <img src="../../images/resource/video-img.jpg" alt="">-->
<!--                        <i class="icon flaticon-play-button-3" aria-hidden="true"></i>-->
<!--                      </a>-->
<!--                    </figure>-->
<!--                  </div>-->
<!--                </div>-->
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget">
                  <div class="widget-content">
                    <ul class="job-overview">
                      <li>
                        <i class="icon icon-calendar"></i>
                        <h5>Experience:</h5>
                        <span><?php
                            echo $row['experience'];
                            ?> Years</span>
                      </li>

                      <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Age:</h5>
                        <span> Years</span>
                      </li>

<!--                      <li>-->
<!--                        <i class="icon icon-rate"></i>-->
<!--                        <h5>Current Salary:</h5>-->
<!--                        <span>11K - 15K</span>-->
<!--                      </li>-->

<!--                      <li>-->
<!--                        <i class="icon icon-salary"></i>-->
<!--                        <h5>Expected Salary:</h5>-->
<!--                        <span>26K - 30K</span>-->
<!--                      </li>-->

                      <li>
                        <i class="icon icon-user-2"></i>
                        <h5>Gender:</h5>
                        <span><?php
                            if( $row['gender'] == 'M'){
                                echo "Male";
                            }
                            else{
                                echo "Female";
                            }
                            ?></span>
                      </li>

<!--                      <li>-->
<!--                        <i class="icon icon-language"></i>-->
<!--                        <h5>Language:</h5>-->
<!--                        <span>English, German, Spanish</span>-->
<!--                      </li>-->

<!--                      <li>-->
<!--                        <i class="icon icon-degree"></i>-->
<!--                        <h5>Education Level:</h5>-->
<!--                        <span>Master Degree</span>-->
<!--                      </li>-->
                        <li>
                            <i class="icon flaticon-telephone-1"></i>
                            <h5>Phone:</h5>
                            <span><?php
                                echo $row['phone'];
                                ?></span>
                        </li>
                        <li>
                            <i class="icon icon-calendar"></i>
                            <h5>Date Of Birth:</h5>
                            <span><?php
                                echo $row['date_of_Birth'];
                                ?> </span>
                        </li>

                    </ul>
                  </div>

                </div>

<!--                <div class="sidebar-widget social-media-widget">-->
<!--                  <h4 class="widget-title">Social media</h4>-->
<!--                  <div class="widget-content">-->
<!--                    <div class="social-links">-->
<!--                      <a href="#"><i class="fab fa-facebook-f"></i></a>-->
<!--                      <a href="#"><i class="fab fa-twitter"></i></a>-->
<!--                      <a href="#"><i class="fab fa-instagram"></i></a>-->
<!--                      <a href="#"><i class="fab fa-linkedin-in"></i></a>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->


<!--                <div class="sidebar-widget">-->
<!-- Job Skills -->
<!--                  <h4 class="widget-title">Professional Skills</h4>-->
<!--                  <div class="widget-content">-->
<!--                    <ul class="job-skills">-->
<!--                      <li><a href="#">app</a></li>-->
<!--                      <li><a href="#">administrative</a></li>-->
<!--                      <li><a href="#">android</a></li>-->
<!--                      <li><a href="#">wordpress</a></li>-->
<!--                      <li><a href="#">design</a></li>-->
<!--                      <li><a href="#">react</a></li>-->
<!--                    </ul>-->
<!--                  </div>-->
<!--                </div>-->

<!--                <div class="sidebar-widget contact-widget">-->
<!--                  <h4 class="widget-title">Contact Us</h4>-->
<!--                  <div class="widget-content">-->
<!--                    Comment Form -->
<!--                    <div class="default-form">-->
<!--                      Comment Form-->
<!--                      <form>-->
<!--                        <div class="row clearfix">-->
<!--                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">-->
<!--                            <input type="text" name="username" placeholder="Your Name" required>-->
<!--                          </div>-->
<!--                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">-->
<!--                            <input type="email" name="email" placeholder="Email Address" required>-->
<!--                          </div>-->
<!--                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">-->
<!--                            <textarea class="darma" name="message" placeholder="Message"></textarea>-->
<!--                          </div>-->
<!--                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">-->
<!--                            <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </form>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End candidate Detail Section -->


    <!-- Main Footer -->
    <footer class="main-footer alternate5">
      <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
          <div class="row">
            <div class="big-column col-xl-4 col-lg-3 col-md-12">
              <div class="footer-column about-widget">
                <div class="logo"><a href="#"><img src="../../images/logo.png" alt=""></a></div>
                <p class="phone-num"><span>Call us </span><a href="thebeehost%40support.html">123 456 7890</a></p>
                <p class="address">329 Queensberry Street, North Melbourne VIC<br> 3051, Australia. <br><a href="mailto:support@superio.com" class="email">jobstation@gmail.com</a></p>
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
            <div class="copyright-text">© 2021 <a href="#">JobStation</a>. All Right Reserved.</div>
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


  <script src="../../js/jquery.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery-ui.min.js"></script>
  <script src="../../js/chosen.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
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


<!-- Mirrored from creativelayers.net/themes/superio/candidates-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:35 GMT -->
</html>