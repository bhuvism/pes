<?php 
session_start();
if(isset($_SESSION['userid'])){
    header('location:welcome.php');
}
include 'config.php';
if(isset($_POST['btn'])){
    
    if(!$conn){
        echo '<script>alert("Database not connected");</script>';
        die();
    }
   
    $password = $_POST['pass'];
    $query = "SELECT * FROM users WHERE  password='".$password."' ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if($row){
        $_SESSION['admin_userid'] = $row['id'];
        $_SESSION['admin_username'] = $row['username'];
        if($row['username'] == 'admin'){
            header('location:admin.php');
        } else {
          echo '<script>alert("Access denied due to incorrect admin password!");</script>';
          echo '<script>document.location.replace("admin_login.php");</script>';
        }
      
        
    }  else {
        echo '<script>alert("Access denied due to incorrect admin password!");</script>';
        echo '<script>document.location.replace("admin_login.php");</script>';
    }


}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CSE</title>
    <link href="assets/img/Logo.png" rel="icon">
  <link href="assets/img/Logo.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a><span>Admin Login</span></a></h1>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          
          
          
        </ul>
      </nav>

    </div>
  </header> 

  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="assets/img/fast.png" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
      <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                  
                     
                          
                          <div class="form-group">
                            <label  style="color:white;" for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="pass"  placeholder="admin password" required>
                          	
                          </div>
                  <div class="lds-roller spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-get-started" name="btn" onclick="loader()">Authenticate</button>
                  </div>
                  </form>    
      </div>

    </div>
  </section>

  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PES College of Engineering, 2020</span>
          </div>
        </div>
      </footer>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>
</html>