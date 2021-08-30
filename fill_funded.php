<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';

if(isset($_POST['btn'])){
  $name = $_POST['name'];
  $funded_by = $_POST['funded_by'];
  $date = $_POST['date'];
  $duration = $_POST['duration'];
  $amount = $_POST['amount'];
  $year = date('Y',strtotime($date));


  $query = "INSERT INTO funded(userid,name,funded_by,date,duration,amount,year) VALUES('".$_SESSION['userid']."','$name','$funded_by','$date','$duration','$amount','$year')";
  $result = $conn->query($query);
  if($result){
    echo '<script>alert("Your records has been collected");</script>';
    echo '<script>document.location.replace("funded.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funded Project | Details</title>
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
          <h3><a href="funded.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp; Funded Project Details</h3>
         
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
      <label for="inputEmail4">Funded by :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="funded_by" class="form-control" id="inputEmail4" placeholder="funded by" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Sanction Date :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="date" name="date" class="form-control" id="inputEmail4" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Duration :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="duration" class="form-control" id="inputEmail4" required>
    <small style="color:white;" ><strong>*in months</strong></small>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Amount :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="amount" class="form-control" id="inputEmail4" required>
    <small style="color:white;" ><strong>*in rupees</strong></small>
    </div>
  </div>

  <button type="submit" name="btn" class="btn btn-primary">Add records</button>
</form>
        </div><br>
</body>
</html>