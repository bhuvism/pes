<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$query = "SELECT * FROM awards WHERE userid='".$_SESSION['userid']."' ORDER BY year DESC ";
$result = $conn->query($query);
$rows = $result->num_rows;
if($rows == 0){
    echo '<div class="wrapper">
    <div class="top_navbar">
      <!-- <div class="hamburger">
         <div class="one"></div>
         <div class="two"></div>
         <div class="three"></div>
      </div> -->
      <div class="top_menu">
        <div class="logo">Awards</div>
        <ul>
          <li><a href="#">
          <ion-icon name="log-out-outline"></ion-icon>efee</a></li>
          <li><a href="#">
            <i class="fas fa-bell"></i>
            </a></li>
          <li><a href="#">
            <i class="fas fa-user"></i>
            </a></li>
        </ul> 
      </div>
    </div>
     
     <div class="sidebar">
     <ul>
       <li><a href="welcome.php">
         
         <span class="title">My Profile</span></a></li>
       <li><a href="teaching.php" >
        
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
       <li><a href="#" class="active">
        
         <span class="title">Awards</span>
         </a></li>
         <li ><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
               </a></li>
               
   </ul>
  </div>
  
  <div class="main_container">
  <div class="container text-center"><h2>You have no records!..</h2>
  </div>
  <a href="fill_awards.php" class="backk-to-top"><i class="fa fa-plus"></i></a>
  </div>
  </div>';
} else {
   echo '<div class="wrapper">
   <div class="top_navbar">
     <!-- <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
     </div> -->
     <div class="top_menu">
       <div class="logo">Awards</div>
       <!-- <ul>
         <li><a href="#">
           <i class="fas fa-search"></i></a></li>
         <li><a href="#">
           <i class="fas fa-bell"></i>
           </a></li>
         <li><a href="#">
           <i class="fas fa-user"></i>
           </a></li>
       </ul> -->
     </div>
   </div>
    
    <div class="sidebar">
    <ul>
      <li><a href="welcome.php">
        
        <span class="title">My Profile</span></a></li>
      <li><a href="teaching.php" >
       
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
      <li><a href="#" class="active">
       
        <span class="title">Awards</span>
        </a></li>
        <li ><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a></li>
              
  </ul>
 </div>
 <div class="main_container">
 <div class="container">
 <div class="table-responsive">
 <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> Title </th>
      <th scope="col">Date</th>
      <th scope="col">Agency / Institution Name</th>
     
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  foreach($result as $row){
      echo '<tr>
      <th scope="row">'.$row['title'].'</th>
      <td>'.date('d-m-Y',strtotime($row['date'])).'</td>
      <td>'.$row['agency'].'</td>';
     
      
     echo '<td><button class="btn btn-info" data-id='.$row['id'].' onclick="getid(this)">Edit</button> 
    </tr>';
  }
    
   
 echo '</tbody>
</table></div>
<a href="fill_awards.php" class="backk-to-top"><i class="fa fa-plus"></i></a>

<div class="row justify-content-center >


<div class="col-lg-3 mb-3">

<a data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-primary" >Want to fetch award details during specific period?</a>
</div></div></div>
</div>
';

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awards | CSE</title>
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
.backk-to-top {
  position: fixed;
 
  background: #007bff;
  color: #fff;
  width: 44px;
  height: 44px;
  text-align: center;
  line-height: 1;
  font-size: 16px;
  border-radius: 50%;
  right: 30px;
  bottom: 25px;
  transition: background 0.5s;
  z-index: 11;
}

.backk-to-top i {
  padding-top: 15px;
  color: #fff;
}

@media (max-width: 768px) {
  .backk-to-top {
    bottom: 15px;
  }
}

.mobile-nav a {
  display: block;
  position: relative;
  color:white;
  padding: 10px 20px;
  font-weight: 500;
}

</style>
</head>
<body>
<script>
function getid(e){
  var id = e.getAttribute("data-id");
  window.location.href="edit_awards.php?w1=" +id ;
}

function getdata(){
  var from_date = document.getElementById('from_date').value;
  var to_date = document.getElementById('to_date').value;
  window.location.href="fetch_awards.php?w1=" +from_date+"&w2=" +to_date ;
}

</script>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Specify period</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      
        <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">From :</label>
      <input type="number" id="from_date"  id="inputEmail4" required>
      <small><strong>*year</strong></small>
    </div></div>
    <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">To :</label>
      <input type="number" id="to_date"  id="inputEmail4" required>
      <small><strong>*year</strong></small>
    </div></div>

    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="btn" class="btn btn-primary" onclick="getdata()">Fetch</button>
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