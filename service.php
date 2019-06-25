<?php
  session_start();
  if(!isset($_SESSION['id'])){
  require 'header.php';
  require 'sidebar.php';
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Service</h5>
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
            <div class="card pd-20 pd-sm-40">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary float-right">Add Service</button>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="service.php?srvc=1">Web Design</a></td>
                                <td>Admin</td>
                                <td>2019/07/21</td>
                            </tr>
                            <tr>
                                <td><a href="service.php?srvc=1">Social Media Marketing</a></td>
                                <td>Admin</td>
                                <td>2019/07/21</td>
                            </tr>
                            <tr>
                                <td><a href="service.php?srvc=1">Consulting</a></td>
                                <td>Admin</td>
                                <td>2019/07/21</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div><!-- responsive table -->
            </div><!-- card -->
      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->

<?php 
  require 'footer.php';
  } else {
    header("Location: signin.php");
  }
?>