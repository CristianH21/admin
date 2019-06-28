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
    <link href="../lib/font-awesome/css/all.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="../css/amanda.css">
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
                        <li><a href="../includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown-profile -->
        </div><!-- am-header-right -->
    </div><!-- am-header -->