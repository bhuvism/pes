<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';

if(isset($_POST['btn'])){
  $name = $_POST['name'];
  $usn = $_POST['usn'];
  $title  = $_POST['title'];
  $year = $_POST['year'];
  $status = $_POST['status'];
  $com_year = $_POST['yr_of_completion'];
  
  
  if($com_year != ''){
    $query = "INSERT INTO rcandidates(userid,name,usn,title,reg_year,status,com_year) VALUES('".$_SESSION['userid']."','$name','$usn','$title','$year','$status','$com_year')";
    $result = $conn->query($query);
  } else {
    $query = "INSERT INTO rcandidates(userid,name,usn,title,year,status) VALUES('".$_SESSION['userid']."','$name','$usn','$title','$year','$status')";
    $result = $conn->query($query);
  }
  
  if($result ){
    echo '<script>alert("Your records has been collected");</script>';
    echo '<script>document.location.replace("research_candidates.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Candidates | Details</title>
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
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style type="text/css">
body { 
  background: url(assets/img/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.section-header h3 {
  font-size: 36px;
  color: #f2f9ff;
  text-align: center;
  font-weight: 500;
  position: relative;
}
form label {
  color:white;
}
</style>
</head>
<body><br>
<header class="section-header">
<a href="welcome.php">&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:white;"  class="fas fa-home"></i></a>
          <h3><a href="research_candidates.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;Research Candidates Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4"> Research Candidate Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Research Candidate Name" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">USN :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="usn" class="form-control" id="inputEmail4" placeholder="University Seat Number" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="title of the research" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Registration Year :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="year" class="form-control" id="inputEmail4" placeholder="year">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Status :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="status" class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>pursuing</option>
        <option>Completed</option>
        
           
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Year of Completion :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="yr_of_completion" class="form-control"  id="inputEmail4" >
    <small style="color:white;"><strong>*if completed</strong></small>
    </div>
  </div>
 
  
  
  <button type="submit" name="btn" class="btn btn-primary">Add records</button>
</form>
        </div><br>
</body>
</html>