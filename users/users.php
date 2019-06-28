<?php
  session_start();
  if(isset($_SESSION['id'])){
  require '../layout/header.php';
  require '../layout/sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Users</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary float-right">Add User</button>
                    </div>
                </div>
                <br>
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-10p">User name</th>
                        <th class="wd-10p">First name</th>
                        <th class="wd-10p">Last name</th>
                        <th class="wd-10p">Registered date</th>
                        <th class="wd-10p">Role</th>
                        <th class="wd-10p"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        require '../includes/dbh.inc.php';
                        $sql = "SELECT users.id, users.user_name, users.first_name, users.last_name, users.date_registered, roles.type FROM users INNER JOIN roles ON users.id_roles_fk = roles.id WHERE deleted_logical = 0";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '
                              <tr>
                                <td><a href="user.php?user='.$row["id"].'">'.$row["user_name"].'</a></td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td>
                                <td>'.$row["date_registered"].'</td>
                                <td>'.$row["type"].'</td>
                                <td></td>
                              </tr>
                            ';
                          }
                        }
                        mysqli_close($conn);
                      ?>
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->     
            </div><!-- card -->
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->


  </body>
</html>

<?php 
    require '../layout/footer.php';
  } else {
    header("Location: signin.php");
  }
?>