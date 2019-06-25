<?php
  session_start();
  if(isset($_SESSION['id'])){
  require 'header.php';
  require 'sidebar.php';
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
                
            </div><!-- card -->
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->

<?php 
  require 'footer.php';
  } else {
    header("Location: signin.php");
  }
?>