<?php
  session_start();
  if(isset($_SESSION['id'])){
  require '../layout/header.php';
  require '../layout/sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Update Service</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
        <form action="../includes/service.inc.php" method="post">
            <?php
                if(isset($_GET['error'])){

                    if($_GET['error'] == 'emptyfields'){
                        echo '<div class="alert alert-danger" role="alert">Empty fields with *.</div><br>';
                    } else if($_GET['error'] == 'sqlerror'){
                        echo '<div class="alert alert-danger" role="alert">Error, favor de intentar de nuevo.</div><br>';
                    } else if($_GET['error'] == 'wrongpwd'){
                        echo '<div class="alert alert-danger" role="alert">Incorrect Password.</div><br>';
                    } else if($_GET['error'] == 'nouser'){
                        echo '<div class="alert alert-danger" role="alert">Usuario no existe.</div><br>';
                    }
                } else if(isset($_GET['msj'])){
                    if($_GET['msj'] == 'success'){
                        echo '<div class="alert alert-success" role="alert">Changes successful.</div><br>';
                    }
                }
            ?>
            <input name="username" value="<?php echo $_SESSION['userName'];?>" hidden/>

            <?php 
                require '../includes/dbh.inc.php';
                $sql = "SELECT services.id, services.title, services.subtitle, services.description, services.pros, services.cons, services.enabled FROM services WHERE services.id=".$_GET['srvc'];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card pd-20 pd-sm-40">
            
                                    <div class="form-group">
                                        <label class="form-control-label">Title: *</label>
                                        <input type="text" name="title" class="form-control" value="'.$row['title'].'">
                                    </div><!-- form-group -->
            
                                    <div class="form-group">
                                        <label class="form-control-label">Subtitle: *</label>
                                        <input type="text" name="subtitle" class="form-control" value="'.$row['subtitle'].'">
                                    </div><!-- form-group -->
            
                                    <div class="form-group">
                                        <label class="form-control-label">Description: *</label>
                                        <textarea class="form-control" name="description" rows="5" placeholder="Leave blank if no content">'.$row['description'].'</textarea>
                                    </div><!-- form-group -->
            
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Pros:</label>
                                                <textarea class="form-control" name="pros" rows="5" placeholder="">'.$row['pros'].'</textarea>
                                            </div><!-- form-group -->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Cons:</label>
                                                <textarea class="form-control" name="cons" rows="5" placeholder="">'.$row['cons'].'</textarea>
                                            </div><!-- form-group -->
                                        </div>
                                    </div>
                                </div><!-- card -->
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card pd-20 pd-sm-40">
                                            <label>Icon: png, jpg</label>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="icon" class="custom-file-input">
                                                <span class="custom-file-control"></span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                    <br>
                                        <div class="card pd-20 pd-sm-40">
                                            <label>File: pdf</label>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="icon" class="custom-file-input">
                                                <span class="custom-file-control"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                    <br>
                                        <div class="card pd-20 pd-sm-40">
                                            <label class="ckbox">
                                                <input type="checkbox" value="'.$row['enabled'].'">
                                                <span>Enabled</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <br>
                                        <button type="submit" name="submit-service-update" class="btn btn-block btn-primary">Update</button>      
                                    </div>
                                </div><!-- row -->
                            </div>
                        </div><!-- row -->
                        ';
                    }
                } else {
                    echo "Service does not exist.";
                }
                
                mysqli_close($conn);
            ?>
            
        </form>
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->

<?php 
  require '../layout/footer.php';
  } else {
    header("Location: ../signin.php");
  }
?>