<?php
  session_start();
  if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Home Service Media Experts.">
    <meta name="author" content="eHomeMedia">


    <title>Admin</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/all.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="fas fa-bars"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="fas fa-bars"></i></a>
            <a href="index.php" class="am-logo"><b>eHome</b>media</a>
        </div><!-- am-header-left -->


        <div class="am-header-right">
            <a href="#" title="View Website">
            <i class="fas fa-cloud fa-lg"></i>
            </a>
            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name"><span class="hidden-xs-down">
                        <?php 
                           echo $_SESSION['firstName']." ".$_SESSION['lastName'];
                        ?>
                    </span> <i class="fa fa-angle-down mg-l-3"></i></span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="profile.php"><i class="fas fa-user"></i> Edit Profile</a></li>
                        <li><a href=""><i class="icon ion-ios-folder-outline"></i> Log</a></li>
                        <li><a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown-profile -->
        </div><!-- am-header-right -->
    </div><!-- am-header -->

    <div class="am-sideleft">
      <ul class="nav am-sideleft-tab">
          <li class="nav-item">
              <a href="#mainMenu" class="nav-link active"><i class="fas fa-home fa-lg"></i></a>
          </li>
          <!--<li class="nav-item">
              <a href="#emailMenu" class="nav-link"><i class="icon ion-ios-email-outline tx-24"></i></a>
          </li>-->
          <!--<li class="nav-item">
              <a href="#chatMenu" class="nav-link"><i class="fas fa-comments fa-lg"></i></i></a>
          </li>
          <li class="nav-item">
              <a href="#settingMenu" class="nav-link"><i class="fas fa-cog fa-lg"></i></a>
          </li>-->
      </ul>

      <div class="tab-content">
          <div id="mainMenu" class="tab-pane active">
              <ul class="nav am-sideleft-menu">
                  <li class="nav-item">
                      <a href="index.php" class="nav-link active">
                      <i class="fas fa-home fa-lg"></i>
                      <span>Dashboard</span>
                      </a>
                  </li><!-- nav-item -->
                  <li class="nav-item">
                      <a href="" class="nav-link with-sub">
                          <i class="fas fa-folder fa-lg"></i>
                          <span>Web Files</span>
                      </a>
                      <ul class="nav-sub">
                          <li class="nav-item"><a href="header-edit.php" class="nav-link">Header</a></li>
                          <li class="nav-item"><a href="banner.php" class="nav-link">Banner</a></li>
                          <li class="nav-item"><a href="services/catalog.php" class="nav-link">Service</a></li>
                          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                          <li class="nav-item"><a href="portfolio.php" class="nav-link">Portfolio</a></li>
                          <li class="nav-item"><a href="header-edit.php" class="nav-link">Testimonial</a></li>
                          <li class="nav-item"><a href="header-edit.php" class="nav-link">Footer</a></li>
                      </ul>
                  </li><!-- nav-item -->
                  <li class="nav-item">
                      <a href="analytics.php" class="nav-link hide">
                      <i class="fas fa-chart-pie fa-lg"></i> 
                      <span>Analytics</span>
                      </a>
                  </li><!-- nav-item -->
                  <li class="nav-item">
                      <a href="quote.php" class="nav-link">
                      <i class="fas fa-inbox fa-lg"></i> 
                      <span>Quote Request</span>
                      </a>
                  </li><!-- nav-item -->
                  <li class="nav-item">
                      <a href="users/users.php" class="nav-link">
                      <i class="fas fa-users-cog fa-lg"></i> 
                      <span>Users</span>
                      </a>
                  </li><!-- nav-item -->
                  <li class="nav-item">
                      <a href="users.php" class="nav-link">
                      <i class="fas fa-cog fa-lg"></i> 
                      <span>Settings</span>
                      </a>
                  </li><!-- nav-item -->
              </ul><!-- am-sideleft-menu -->
          </div><!-- #mainMenu -->
          
          <div id="emailMenu" class="tab-pane">
              <div class="pd-x-20 pd-y-10">
              <a href="" class="btn btn-orange btn-block btn-compose">Compose Email</a>
              </div>
              <ul class="nav am-sideleft-menu">
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-filing-outline"></i>
                  <span>Inbox</span>
                  </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-filing-outline"></i>
                  <span>Drafts</span>
                  </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-paperplane-outline"></i>
                  <span>Sent</span>
                  </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-trash-outline"></i>
                  <span>Trash</span>
                  </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-filing-outline"></i>
                  <span>Spam</span>
                  </a>
              </li><!-- nav-item -->
              </ul>

              <label class="pd-x-20 tx-uppercase tx-11 mg-t-10 tx-orange mg-b-0 tx-medium">My Folder</label>
              <ul class="nav am-sideleft-menu">
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-folder-outline"></i>
                  <span>Updates</span>
                  </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-folder-outline"></i>
                  <span>Social</span>
                  </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                  <a href="page-inbox.html" class="nav-link">
                  <i class="icon ion-ios-folder-outline"></i>
                  <span>Promotions</span>
                  </a>
              </li><!-- nav-item -->
              </ul>
          </div><!-- #emailMenu -->
          <div id="chatMenu" class="tab-pane">
              <div class="chat-search-bar">
              <input type="search" class="form-control wd-150" placeholder="Search chat...">
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
              </div><!-- chat-search-bar -->

              <label class="pd-x-15 tx-uppercase tx-11 mg-t-20 tx-orange mg-b-10 tx-medium">Recent Chat History</label>
              <div class="list-group list-group-chat">
              <a href="#" class="list-group-item">
                  <div class="d-flex align-items-center">
                  <img src="../img/img6.jpg" class="wd-32 rounded-circle" alt="">
                  <div class="mg-l-10">
                      <h6>Russell M. Evans</h6>
                      <span>Tuesday, 10:33am</span>
                  </div>
                  </div><!-- d-flex -->
                  <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain...</p>
              </a><!-- list-group-item -->
              <a href="#" class="list-group-item">
                  <div class="d-flex align-items-center">
                  <img src="../img/img7.jpg" class="wd-32 rounded-circle" alt="">
                  <div class="mg-l-10">
                      <h6>James F. Sears</h6>
                      <span>Monday, 4:21pm</span>
                  </div>
                  </div><!-- d-flex -->
                  <p>But who has any right to find fault with a man who chooses to enjoy a pleasure that has...</p>
              </a><!-- list-group-item -->
              <a href="#" class="list-group-item">
                  <div class="d-flex align-items-center">
                  <img src="../img/img8.jpg" class="wd-32 rounded-circle" alt="">
                  <div class="mg-l-10">
                      <h6>Sharon R. Rowe</h6>
                      <span>Sunday, 7:45pm</span>
                  </div>
                  </div><!-- d-flex -->
                  <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising...</p>
              </a><!-- list-group-item -->
              <a href="#" class="list-group-item">
                  <div class="d-flex align-items-center">
                  <img src="../img/img9.jpg" class="wd-32 rounded-circle" alt="">
                  <div class="mg-l-10">
                      <h6>Ruby M. Martin</h6>
                      <span>Sunday, 7:45pm</span>
                  </div>
                  </div><!-- d-flex -->
                  <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising...</p>
              </a><!-- list-group-item -->
              <a href="#" class="list-group-item">
                  <div class="d-flex align-items-center">
                  <img src="../img/img10.jpg" class="wd-32 rounded-circle" alt="">
                  <div class="mg-l-10">
                      <h6>Joslyn C. Mayo</h6>
                      <span>Sunday, 7:45pm</span>
                  </div>
                  </div><!-- d-flex -->
                  <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising...</p>
              </a><!-- list-group-item -->
              </div><!-- list-group -->
              <span class="d-block pd-15 tx-12">Loading messages...</span>

          </div><!-- #chatMenu -->
          <div id="settingMenu" class="tab-pane">
              <div class="pd-x-15">
              <label class="tx-uppercase tx-11 mg-t-10 tx-orange mg-b-15 tx-medium">Quick Settings</label>
              <div class="bd pd-15">
                  <h6 class="tx-13 tx-normal tx-gray-800">Daily Newsletter</h6>
                  <p class="tx-12">Get notified when someone else is trying to access your account.</p>
                  <div class="toggle toggle-light warning"></div>
              </div><!-- bd -->

              <div class="bd pd-15 mg-t-15">
                  <h6 class="tx-13 tx-normal tx-gray-800">Call Phones</h6>
                  <p class="tx-12">Make calls to friends and family right from your account.</p>
                  <div class="toggle toggle-light warning"></div>
              </div><!-- bd -->

              <div class="bd pd-15 mg-t-15">
                  <h6 class="tx-13 tx-normal tx-gray-800">Login Notifications</h6>
                  <p class="tx-12">Get notified when someone else is trying to access your account.</p>
                  <div class="toggle toggle-light warning"></div>
              </div><!-- bd -->

              <div class="bd pd-15 mg-t-15">
                  <h6 class="tx-13 tx-normal tx-gray-800">Phone Approvals</h6>
                  <p class="tx-12">Use your phone when login as an extra layer of security.</p>
                  <div class="toggle toggle-light warning"></div>
              </div><!-- bd -->
              </div>
          </div><!-- #settingMenu -->
      </div><!-- tab-content -->
    </div><!-- am-sideleft -->

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Dashboard</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
        <div class="row row-sm">
          <div class="col-lg-4">
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Today's Visitors</h6>
                    <p class="tx-12"><?php echo date('m/d/Y')?></p>
                  </div>
                  <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">24</h2>
                <p class="tx-12 mg-b-0">Visitors.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs2" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Current Visitors</h6>
                    <p class="tx-12"><?php echo date('m/d/Y')?></p>
                  </div>
                  <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">1</h2>
                <p class="tx-12 mg-b-0">Visitor.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs3" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Monthly Visitors</h6>
                    <p class="tx-12"><?php echo date('M Y'); ?></p>
                  </div>
                  <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">353</h2>
                <p class="tx-12 mg-b-0">Visitors.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
        </div><!-- row -->

      </div><!-- am-pagebody -->

    </div><!-- am-mainpanel -->

    <div class="am-footer">
        <span>Copyright &copy;. All Rights Reserved. eHomeMedia.</span>
        <span>Powered by: eHomeMedia Software.</span>
    </div><!-- am-footer -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="lib/rickshaw/rickshaw.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="lib/gmaps/gmaps.js"></script>
    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="lib/font-awesome/js/all.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/amanda.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>

  </body>
</html>
<?php 
  } else {
    header("Location: signin.php");
  }
?>