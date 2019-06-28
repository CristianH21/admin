<?php
  session_start();
  if(isset($_SESSION['id'])){
  require '../layout/header.php';
  require '../layout/sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Service</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="create.php" class="btn btn-primary float-right">Add Service</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require '../includes/dbh.inc.php';
                                $sql = "SELECT services.id, services.title, services.date_registered, users.user_name FROM services INNER JOIN users ON services.id_users_fk = users.id";
                                //$sql = "SELECT services.id, services.title, services.date_registered, users.user_name FROM services INNER JOIN users ON users.id = services.id_users_fk ORDER BY services.id DESC";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                     // output data of each row
                                     while($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                            <tr>
                                                <td><a href="update.php?srvc='.$row["id"].'">'.$row["title"].'</a></td>
                                                <td>'.$row["user_name"].'</td>
                                                <td>'.$row["date_registered"].'</td>
                                            </tr>
                                        ';
                                     }
                                } else {
                                    echo "No hay publicaciones.";
                                }
                                
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div><!-- responsive table -->
            </div><!-- card -->
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->

<?php 
  require '../layout/footer.php';
  } else {
    header("Location: /signin.php");
  }
?>