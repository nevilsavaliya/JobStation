<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/job-single-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:04 GMT -->
<head>
    <meta charset="utf-8">
    <title>Job Profile</title>

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
                              <li class="active"><a href="shortlisted.php"><i
                                              class="la la-bookmark-o"></i>Shortlisted
                                      Jobs</a></li>
                              <li class="list"><a href="jobs.php"><i class="la la-box"></i>Jobs</a></li>
                              <li class="list"><a href="dashboard-messages.html"><i
                                              class="la la-comment-o"></i>Messages</a></li>
                              <li class="list"><a href="change-password.php"><i class="la la-lock"></i>Change
                                      Password</a>
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
                  <li class="active"><a href="shortlisted.php"><i class="la la-bookmark-o"></i>Shortlisted
                          Jobs</a></li>
                  <li class="list"><a href="jobs.php"><i class="la la-box"></i>Jobs</a></li>
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

      <!-- Job Detail Section -->
    <section class="job-detail-section">
      <div class="job-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-block-outer">
                <!-- Job Block -->
                <div class="job-block-seven style-two">
                  <div class="inner-box">
                    <div class="content">
                      <h4><a href="#">Product Designer / UI Designer</a></h4>
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
                    </div>
                  </div>
                </div>
              </div>

              <div class="job-overview-two">
                <h4>Job Description</h4>
                <ul>
                  <li>
                    <i class="icon icon-calendar"></i>
                    <h5>Date Posted:</h5>
                    <span>Posted 1 hours ago</span>
                  </li>
                  <li>
                    <i class="icon icon-expiry"></i>
                    <h5>Expiration date:</h5>
                    <span>April 06, 2021</span>
                  </li>
                  <li>
                    <i class="icon icon-location"></i>
                    <h5>Location:</h5>
                    <span>London, UK</span>
                  </li>
                  <li>
                    <i class="icon icon-user-2"></i>
                    <h5>Job Title:</h5>
                    <span>Designer</span>
                  </li>
                  <li>
                    <i class="icon icon-clock"></i>
                    <h5>Hours:</h5>
                    <span>50h / week</span>
                  </li>
                  <li>
                    <i class="icon icon-rate"></i>
                    <h5>Rate:</h5>
                    <span>$15 - $25 / hour</span>
                  </li>
                  <li>
                    <i class="icon icon-salary"></i>
                    <h5>Salary:</h5>
                    <span>$35k - $45k</span>
                  </li>
                </ul>
              </div>

              <div class="job-detail">

                <h4>Job Description</h4>
                <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                <h4>Key Responsibilities</h4>
                <ul class="list-style-three">
                  <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                  <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                  <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                  <li>Accurately estimate design tickets during planning sessions.</li>
                  <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                  <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                  <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                  <li>Present your work to the wider business at Show & Tell sessions.</li>
                </ul>
                <h4>Skill & Experience</h4>
                <ul class="list-style-three">
                  <li>You have at least 3 years’ experience working as a Product Designer.</li>
                  <li>You have experience using Sketch and InVision or Framer X</li>
                  <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                  <li>You are familiar using Jira and Confluence in your workflow</li>
                </ul>
              </div>

              <!-- Other Options -->
              <div class="other-options">
                <div class="social-share">
                  <h5>Share this job</h5>
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                  <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                  <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>
                </div>
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="btn-box">
                  <a href="#" class="theme-btn btn-style-one">Apply For Job</a>
                  <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
                </div>

                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo"><img src="../images/resource/company-7.png" alt=""></div>
                      <h5 class="company-name">InVision</h5>
                      <a href="#" class="profile-link">View company profile</a>
                    </div>

                    <ul class="company-info">
                      <li>Primary industry: <span>Software</span></li>
                      <li>Company size: <span>501-1,000</span></li>
                      <li>Founded in: <span>2011</span></li>
                      <li>Phone: <span>123 456 7890</span></li>
                      <li>Email: <span>info@joio.com</span></li>
                      <li>Location: <span>London, UK</span></li>
                      <li>Social media:
                        <div class="social-links">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li>
                    </ul>

                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three">www.invisionapp.com</a></div>
                  </div>
                </div>

                <div class="sidebar-widget contact-widget">
                  <h4 class="widget-title">Contact Us</h4>
                  <div class="widget-content">
                    <!-- Comment Form -->
                    <div class="default-form">
                      <!--Comment Form-->
                      <form>
                        <div class="row clearfix">
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="text" name="username" placeholder="Your Name" required>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email Address" required>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea class="darma" name="message" placeholder="Message"></textarea>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>

          <!-- Related Jobs -->
          <div class="related-jobs">
            <div class="title-box">
              <h3>Related Jobs</h3>
              <div class="text">2020 jobs live - 293 added today.</div>
            </div>
            <div class="row">
              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                    <li class="privacy">Private</li>
                    <li class="required">Urgent</li>
                  </ul>
                  <span class="company-logo"><img src="../images/resource/company-logo/3-1.png" alt=""></span>
                  <span class="company-name">Catalyst</span>
                  <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                  </ul>
                  <span class="company-logo"><img src="../images/resource/company-logo/3-2.png" alt=""></span>
                  <span class="company-name">Catalyst</span>
                  <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                  </ul>
                  <span class="company-logo"><img src="../images/resource/company-logo/3-3.png" alt=""></span>
                  <span class="company-name">Upwork</span>
                  <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                  </ul>
                  <span class="company-logo"><img src="../images/resource/company-logo/3-4.png" alt=""></span>
                  <span class="company-name">invision</span>
                  <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Job Detail Section -->


    <!-- Main Footer -->
    <footer class="main-footer alternate5">
      <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
          <div class="row">
            <div class="big-column col-xl-4 col-lg-3 col-md-12">
              <div class="footer-column about-widget">
                <div class="logo"><a href="#"><img src="../images/logo.png" alt=""></a></div>
                <p class="phone-num"><span>Call us </span><a href="thebeehost%40support.html">123 456 7890</a></p>
                <p class="address">329 Queensberry Street, North Melbourne VIC<br> 3051, Australia. <br><a href="mailto:support@superio.com" class="email">support@superio.com</a></p>
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
  <!--Google Map APi Key-->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDaaCBm4FEmgKs5cfVrh3JYue3Chj1kJMw&amp;ver=5.2.4"></script>
  <script src="../js/map-script.js"></script>
  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/job-single-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 04:53:04 GMT -->
</html>