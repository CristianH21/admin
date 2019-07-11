<?php
  session_start();
  if(isset($_SESSION['id'])){
  require '../layout/header.php';
  require '../layout/sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Add Service</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
        <form action="../includes/service.inc.php" method="POST" enctype="multipart/form-data">
            <?php
                if(isset($_GET['error'])){

                    if($_GET['error'] == 'emptyfields'){
                        echo '<div class="alert alert-danger" role="alert">Empty fields with *.</div><br>';
                    } else if($_GET['error'] == 'sqlerror'){
                        echo '<div class="alert alert-danger" role="alert">Error, favor de intentar de nuevo.</div><br>';
                    } else if($_GET['error'] == 'wrongpwd'){
                        echo '<div class="alert alert-danger" role="alert">Incorrect Password.</div><br>';
                    } else if($_GET['error'] == 'nouser'){
                        echo '<div class="alert alert-danger" role="alert">User invalid.</div><br>';
                    } else if($_GET['error'] == 'ei'){
                        echo '<div class="alert alert-danger" role="alert">Only PNG, JPG and JPEG icons are allowed.</div><br>';
                    } else if($_GET['error'] == 'eis'){
                        echo '<div class="alert alert-danger" role="alert">Icon size exceeds 2MB.</div><br>';
                    } else if($_GET['error'] == 'imgicon'){
                        echo '<div class="alert alert-danger" role="alert">Icon did not upload, try again.</div><br>';
                    } else if($_GET['error'] == 'imgbanner'){
                        echo '<div class="alert alert-danger" role="alert">Banner did not upload, try again.</div><br>';
                    }
                } else if(isset($_GET['msj'])){
                    if($_GET['msj'] == 'success'){
                        echo '<div class="alert alert-success" role="alert">Changes successful.</div><br>';
                    }
                }
            ?>

            <input id="username" name="username" value="<?php echo $_SESSION['userName'];?>" hidden/>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card pd-20 pd-sm-40">

                        <div class="form-group">
                            <label class="form-control-label">Title: *</label>
                            <input type="text" id="title" name="title" class="form-control" value="<?php echo (isset($_GET['t']))?$_GET['t']:''; ?>">
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="form-control-label">Subtitle: *</label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control" value="<?php echo (isset($_GET['st']))?$_GET['st']:''; ?>">
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="form-control-label">Description: *</label>
                            <textarea class="form-control" id="summernote" name="description" rows="5" placeholder="Inserta a description about this service..."><?php echo (isset($_GET['d']))?$_GET['d']:''; ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Pros:</label>
                                    <textarea id="pros" class="form-control" name="pros" rows="5" placeholder=""><?php echo (isset($_GET['c']))?$_GET['c']:''; ?></textarea>
                                </div><!-- form-group -->
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Cons:</label>
                                    <textarea id="cons" class="form-control" name="cons" rows="5" placeholder=""><?php echo (isset($_GET['p']))?$_GET['p']:''; ?></textarea>
                                </div><!-- form-group -->
                            </div>
                        </div>
                    </div><!-- card -->
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card pd-20 pd-sm-40">
                                <label>Icon: png, jpg, jpeg</label>
                                <label class="custom-file">
                                    <input id="icon" type="file" name="icon" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                        <br>
                            <div class="card pd-20 pd-sm-40">
                                <label>Banner: png, jpg, jpeg</label>
                                <label class="custom-file">
                                    <input id="banner" type="file" name="banner" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <br>
                            <button type="submit" name="submit-service-add" class="btn btn-block btn-primary">Create</button>      
                        </div>
                    </div><!-- row -->
                </div>
            </div><!-- row -->
        </form>
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->
    
<?php 
  require '../layout/footer.php';
  } else {
    header("Location: ../signin.php");
  }
?>