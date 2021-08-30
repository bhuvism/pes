<?php 
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$query = "SELECT * FROM profile WHERE userid='".$_SESSION['userid']."' ";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if(!$row){
    echo '<script>alert("Seems like a new user!..Please fill your profile details");</script>';
    echo '<script>document.location.replace("fill_profile.php");</script>';
}
if(isset($_POST['btn'])){
    $filename = $_FILES['file']['name'];
    $target = "files/".basename($filename);

    $query = "UPDATE profile SET photo='$filename'";
    $result = $conn->query($query);
    if($result && move_uploaded_file($_FILES['file']['tmp_name'], $target)){
        echo '<script>alert("Successfully changed");</script>';
        echo '<script>document.location.replace("welcome.php");</script>';
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
  <link href="assets/css/navbar.css" rel="stylesheet">
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <style>
  @media all and (min-width: 992px) {
	 .navbar .nav-item .dropdown-menu{ display: none; }
	 .navbar .nav-item:hover .nav-link{ color: black;  }
	 .navbar .nav-item:hover .dropdown-menu{ display: block; }
	 .navbar .nav-item .dropdown-menu{ margin-top:0; }
}
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

.mobile-nav a {
  display: block;
  position: relative;
  color:white;
  padding: 10px 20px;
  font-weight: 500;
}


</style>
<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>
<body>
<div class="wrapper">
  <div class="top_navbar">
    <!-- <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div> -->
    <div class="top_menu">
      <div class="logo">Profile</div>
      <ul>
        <li><a href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fa fa-sign-out"></i></a></li>
        
      </ul>
    </div>
  </div>
<div class="sidebar">
      <ul>
        <li><a href="#" class="active">
          
          <span class="title">My Profile</span></a></li>
        <li><a href="teaching.php">
         
          <span class="title">Teaching</span>
          </a></li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Projects
        </a>
        <ul class="dropdown-menu" >
          <li><a style="color:black;" class="dropdown-item" href="guided.php">Guided Projects</a></li>
          <li><a style="color:black;" class="dropdown-item" href="funded.php">Funded Projects</a></li>
         
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Research
        </a>
        <ul class="dropdown-menu" >
        <li>  <a style="color:black;" class="dropdown-item" href="papers.php">Papers / Publications</a></li>
          <li><a style="color:black;" class="dropdown-item" href="research_candidates.php">Research Candidates</a></li>
         
</ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Certifications
        </a>
        <ul class="dropdown-menu" >
          <li><a style="color:black;" class="dropdown-item" href="workshops.php">Workshop</a></li>
          <li><a style="color:black;" class="dropdown-item" href="online_courses.php">Online Courses</a></li>
          <li><a style="color:black;" class="dropdown-item" href="invite_talks.php">Invites Talks</a></li>
          
</ul>
      </li>
        <li><a href="leave.php">
          
          <span class="title">Leave</span>
          </a></li>
        <li><a href="awards.php">
         
          <span class="title">Awards</span>
          </a></li>
          <li><a href="cie.php">
         
         <span class="title">CIE</span>
         </a></li>
        
    </ul>
  </div>

  <div class="main_container">
    <div class="container emp-profile">
      <form method="post">
          <div class="row">
         
               <a class="profile-edit-btn" href="edit_profile.php">   Edit Profile </a>
             
              <div class="col-md-4">
              <a style="color:white;" href="#" data-toggle="modal" data-target="#exampleModal"> <div class="profile-img">
                      <img src="files/<?php echo $row['photo']; ?>" alt="profile-image"/>
                     <div class="file btn btn-lg btn-primary">
                      Change Photo 
                         
                      </div>
                  </div></a>
              </div>
              <div class="col-md-6">
                  <div class="profile-head">
                              <h5>
                              <?php echo $row['name']; ?>
                              </h5>
                              <h6>
                              <?php echo $row['designation']; ?>
                              </h6>
                             
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                          </li>
                          
                      </ul>
                  </div>
              </div>
              
          </div>
          <div class="row">
              <div class="col-md-4">
                  <div class="profile-work">
                      
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="tab-content profile-tab" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Name</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['name']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Department</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['department']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Email</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['email']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Joined Date</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['doa']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Qualification</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['qualification']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Designation</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['designation']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Employee Code</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['emp_code']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Adhar Number</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['adhar']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>PAN Number</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['pan']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Research Area</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['research_area']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Date of Birth</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['dob']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Phone</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['contactno']; ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Address</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p> <?php echo $row['address']; ?></p>
                                      </div>
                                  </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </form>           
  </div>
  </div>
</div>
<!-- <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a><span>Profile</a></span></h1>
      </div>

      <nav class="main-nav navbar float-right d-none d-lg-block">
        <ul>
          <li ><a  style="color:blue;" href="#">My Profile</a></li>
          <li ><a   href="teaching.php">Teaching</a></li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Projects
        </a>
        <ul class="dropdown-menu" >
          <li><a style="color:black;" class="dropdown-item" href="guided.php">Guided Projects</a></li>
          <li><a style="color:black;" class="dropdown-item" href="funded.php">Funded Projects</a></li>
         
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Research
        </a>
        <ul class="dropdown-menu" >
        <li>  <a style="color:black;" class="dropdown-item" href="papers.php">Papers / Publications</a></li>
          <li><a style="color:black;" class="dropdown-item" href="research_candidates.php">Research Candidates</a></li>
         
</ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Certifications
        </a>
        <ul class="dropdown-menu" >
          <li><a style="color:black;" class="dropdown-item" href="workshops.php">Workshop</a></li>
          <li><a style="color:black;" class="dropdown-item" href="online_courses.php">Online Courses</a></li>
          <li><a style="color:black;" class="dropdown-item" href="invite_talks.php">Invites Talks</a></li>
          
</ul>
      </li>
      <li ><a   href="leave.php">Leave</a></li>
      <li ><a   href="awards.php">Awards</a></li>
      <li ><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a></li>
        </ul>
      </nav>

    </div>
  </header> <br><br><br> -->




        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      
        <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Profile Photo :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="file" name="file"  id="inputEmail4" required>
    </div></div>

    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btn" class="btn btn-primary">Update Profile Photo</button>
      </div></form>
    </div>
  </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

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