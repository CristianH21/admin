<?php
  session_start();
  if(isset($_SESSION['id'])){
  require 'header.php';
  require 'sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Profile Settings</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="row">
                    <div class="col-lg-11">
                        <h6 class="card-body-title">Profile</h6>
                        <p class="mg-b-20 mg-sm-b-30">Change profile information.</p>
                    </div>
                </div>
                <form action="includes/profile.inc.php" method="post">
                    <?php
                        if(isset($_GET['error'])){

                            if($_GET['error'] == 'emptypwd'){
                                echo '<div class="alert alert-danger" role="alert">Current password is required to change password.</div>';
                            } else if($_GET['error'] == 'sqlerror'){
                                echo '<div class="alert alert-danger" role="alert">Error, favor de intentar de nuevo.</div>';
                            } else if($_GET['error'] == 'wrongpwd'){
                                echo '<div class="alert alert-danger" role="alert">Incorrect Password.</div>';
                            } else if($_GET['error'] == 'nouser'){
                                echo '<div class="alert alert-danger" role="alert">Usuario no existe.</div>';
                            }
                        } else if(isset($_GET['msj'])){
                            if($_GET['msj'] == 'success'){
                                echo '<div class="alert alert-success" role="alert">Changes successful.</div>';
                            }
                        }
                    ?>

                    <div class="form-group">
                        <label class="form-control-label">Username:</label>
                        <input type="text" name="" class="form-control" value="<?php echo $_SESSION['userName'];?>" disabled>
                        <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['userName'];?>" hidden>
                        <span><i>Usernames cannot be changed.</i></span>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email'];?>" disabled>
                        <span><i>Email cannot be changed.</i></span>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label class="form-control-label">Change Password:</label>
                        <input type="password" name="pwd" class="form-control" placeholder="Enter your current password">
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label class="form-control-label">New Password:</label>
                        <input type="password" name="newPwd" class="form-control" placeholder="Enter your new password">
                    </div><!-- form-group -->

                    <button type="submit" name="submit-profile" class="btn btn-block btn-primary">Save Changes</button>
                </form>
            </div><!-- card -->
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->

<?php 
  require 'footer.php';
  } else {
    header("Location: signin.php");
  }
?>