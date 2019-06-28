<?php
  session_start();
  if(isset($_SESSION['id'])){
  require 'header.php';
  require 'sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">User</h5>
      </div><!-- am-pagetitle -->
      <div class="am-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-light float-left" onclick="window.history.back();">Go Back</button>
                    </div>
                </div>
                <br>
                <form action="includes/user.inc.php" method="post">
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

                    <?php
                        require 'includes/dbh.inc.php';
                        $sql = "SELECT users.id, users.user_name, users.first_name, users.last_name, users.email, users.date_registered, roles.type FROM users INNER JOIN roles ON users.id_roles_fk = roles.id WHERE deleted_logical = 0 AND users.id= ".$_GET['user'];
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Username:</label>
                                            <input type="text" name="" class="form-control" value="'.$row["user_name"].'" disabled>
                                            <input type="text" name="username" class="form-control" value="'.$row["user_name"].'" hidden>
                                            <span><i>Usernames cannot be changed.</i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-control-label">Roles:</label>
                                        <select class="form-control select2">
                                            <option value="1">ADMINISTRATOR</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">First Name:</label>
                                            <input type="text" name="firstname" class="form-control" value="'.$row["first_name"].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Last Name:</label>
                                            <input type="text" name="lastname" class="form-control" value="'.$row["last_name"].'">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email:</label>
                                            <input type="text" name="email" class="form-control" value="'.$row["email"].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Date Registered</label>
                                            <input type="text" name="dateRegistered" class="form-control" value="'.$row["date_registered"].'" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email:</label>
                                            <input type="text" name="email" class="form-control" value="'.$row["email"].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Delete User: Type the word "DELETE"</label>
                                            <input type="text" name="delete" class="form-control is-invalid" placeholder="DELETE">
                                        </div>
                                    </div>
                                </div>

                                ';
                            }
                        }
                        mysqli_close($conn);
                    ?>
                    <button type="submit" name="submit-profile" class="btn btn-block btn-primary">Save Changes</button>
                </form>
                 
            </div><!-- card -->
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->
    <script>
    function goBack() {
        window.history.back();
        }
    </script>
<?php 
  require 'footer.php';
  } else {
    header("Location: signin.php");
  }
?>