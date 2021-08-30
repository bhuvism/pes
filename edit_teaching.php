<?php
session_start();
if(!isset($_SESSION['userid']) && !isset($_SESSION['admin_userid'] ) ){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM teaching WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
if(isset($_POST['btn'])){
  $name = $_POST['name'];
  $code = $_POST['code'];
  $sem  = $_POST['sem'];
  $sem_type = $_POST['type'];
  $year = $_POST['year'];
  $l = $_POST['l'];
  $t = $_POST['t'];
  $p = $_POST['p'];
  $hours = $_POST['hours'];
  $section = $_POST['sec'];
  
  $query = "UPDATE teaching SET subject='$name',code='$code',sem='$sem',section='$section',sem_type='$sem_type',year='$year',l='$l',t='$t',p='$p',hours='$hours' WHERE id='$id'";
  $result = $conn->query($query);
  if($result && !isset($_SESSION['admin_userid'])){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("teaching.php");</script>';
  } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaching | Details</title>
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
          <h3><?php if(!isset($_SESSION['admin_userid'])){
              echo '<a href="teaching.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;';
          }?> Edit Teaching Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Course Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="name" value="<?php echo $row['subject']; ?>" class="form-control" id="inputEmail4" placeholder="title of the course" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Course Code :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="code"  value="<?php echo $row['code']; ?>" class="form-control" id="inputEmail4" placeholder="course code" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Semester :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="sem" class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option> 
        <option>7</option>
        <option>8</option>      
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Section :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" value="<?php echo $row['section']; ?>" style="text-transform:uppercase;" name="sec" class="form-control" id="inputEmail4" placeholder="section" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Semester Type :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="type" class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>even</option>
        <option>odd</option>
          
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Year :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="year"  value="<?php echo $row['year']; ?>" class="form-control" id="inputEmail4" placeholder="year" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">L :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="l"  value="<?php echo $row['l']; ?>" class="form-control" id="inputEmail4" placeholder="L">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">T :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="t"  value="<?php echo $row['t']; ?>" class="form-control" id="inputEmail4" placeholder="T" required >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">P :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="p"  value="<?php echo $row['p']; ?>" class="form-control" id="inputEmail4" placeholder="P" required >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Total hours :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="hours"  value="<?php echo $row['hours']; ?>" class="form-control" id="inputEmail4" placeholder="total hours" required>
    </div>
  </div>
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>