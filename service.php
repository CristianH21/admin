<?php
  session_start();
  if(isset($_SESSION['id'])){
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
                    <div class="col-lg-11">
                        <h6 class="card-body-title">Services</h6>
                        <p class="mg-b-20 mg-sm-b-30">Help customers know what you offer.</p>
                    </div>
                    <div class="col-lg-1">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <thead>
                            <tr>
                            <th>
                                <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                                </label>
                            </th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                    </label>
                                </td>
                                <td>Factura Electrónica</td>
                                <td>Admin</td>
                                <td>2019/07/21</td>
                                <td>
                                    <ul>
                                        <li>Edit</li>
                                        <li>Delete</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                    </label>
                                </td>
                                <td>Nomina Electrónico</td>
                                <td>Admin</td>
                                <td>2019/07/21</td>
                                <td>
                                    <ul>
                                        <li>Edit</li>
                                        <li>Delete</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                    </label>
                                </td>
                                <td>Resplado de Información</td>
                                <td>Admin</td>
                                <td>2019/07/21</td>
                                <td>
                                    <ul>
                                        <li>Edit</li>
                                        <li>Delete</li>
                                    </ul>
                                </td>
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