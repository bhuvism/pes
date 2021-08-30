<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';

if(isset($_POST['btn'])){
  $name = $_POST['name'];
  $degree = $_POST['degree'];
  $year = $_POST['year'];
  $no_of_stud = $_POST['no_of_stud'];
  
  $query = "INSERT INTO guided(userid,name,degree,year,no_of_stud) VALUES('".$_SESSION['userid']."','$name','$degree','$year','$no_of_stud')";
  $result = $conn->query($query);
  if($result){
    echo '<script>alert("Your records has been collected");</script>';
    echo '<script>document.location.replace("guided.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guided Projects | Details</title>
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
          <h3><a href="guided.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp; Guided Projects Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="name of the project" required>
    </div>
  </div>
  
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Degree :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="degree" class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>BE</option>
        <option>M.Tech</option>
           
      </select>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Year :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="year" class="form-control" id="inputEmail4" placeholder="year" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Number of students :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="no_of_stud" class="form-control" id="inputEmail4" required >
    </div>
  </div>
  
  <button type="submit" name="btn" class="btn btn-primary">Add records</button>
</form>
        </div><br>
</body>
</html>