<?php
    session_start();
    if(!isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Home service agency.">
    <meta name="author" content="ehomemedia">


    <title>Sign In</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Brand</h2>
              <p id="quote"></p>
              <p id="author"></p>
              <hr>
              <p>Forgot your password? <br> <a href="#">Contact us now!</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <form action="includes/signin.inc.php" method="post">
              <h5 class="tx-gray-800 mg-b-25">Signin to Your Account</h5>
              <?php
                  if(isset($_GET['error'])){

                      if($_GET['error'] == 'emptyfields'){
                          echo '<div class="alert alert-danger" role="alert">Favor de llenar todos los campos.</div>';
                      } else if($_GET['error'] == 'sqlerror'){
                          echo '<div class="alert alert-danger" role="alert">Error, favor de intentar de nuevo.</div>';
                      } else if($_GET['error'] == 'wrongpwd'){
                          echo '<div class="alert alert-danger" role="alert">Contraseña incorrecta.</div>';
                      } else if($_GET['error'] == 'nouser'){
                          echo '<div class="alert alert-danger" role="alert">Usuario no existe.</div>';
                      }
                  }
              ?>
              <div class="form-group">
                <label class="form-control-label">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address">
              </div><!-- form-group -->

              <div class="form-group">
                <label class="form-control-label">Password:</label>
                <input type="password" name="pwd" class="form-control" placeholder="Enter your password">
              </div><!-- form-group -->

              <button type="submit" name="submit-signin" class="btn btn-block">Sign In</button>
            </form><!-- form -->
          </div><!-- col-7 -->
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Powered by eHomemedia.com</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
    <script>
        //random quotes

        //random number
        var min = 0;
        var max = 3;
        var randNum = Math.floor(Math.random() * (+max - +min)) + +min;

        //quotes array
        quotes = [
            {
                quote: "Write it on your heart that every day is the best day in the year.",
                author: "Ralph Waldo Emerson"
            },
            {
                quote: "Every moment is a fresh beginning.",
                author: "T.S. Eliot"
            },
            {
                quote: "Everything you’ve ever wanted is on the other side of fear.",
                author: "George Addair"
            },
            {
                quote: "Perfection is not attainable, but if we chase perfection we can catch excellence.",
                author: "Vince Lombardi"
            }];

            $('#quote').text('" ' + quotes[randNum].quote + ' "');
            $('#author').text('- ' + quotes[randNum].author);

    </script>
  </body>
</html>
<?php 
    } else {
        header("Location: index.php");
    }   
?>
