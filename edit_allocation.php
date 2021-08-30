<?php
session_start();
if(!isset($_SESSION['userid']) && !isset($_SESSION['admin_userid'] ) ){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM sub_allocation WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
if(isset($_POST['btn'])){
    $allocated_to = $_POST['allocate_to'];
    $subject = $_POST['title'];
    $code = $_POST['code'];
    $sem = $_POST['sem'];
    $section = $_POST['sec'];
    $year = $_POST['year'];
  
  $query = "UPDATE sub_allocation SET allocated_to='$allocated_to', subject='$subject',code='$code',sem='$sem',section='$section',year='$year' WHERE id='$id'";
  $result = $conn->query($query);
  if($result  ){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("allocation.php");</script>';
  } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject allocation | Edit</title>
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
<h3><a href="allocation.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;Edit Subject Allocation</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Allocate to :</label>
     
    </div>
    
    <div class="form-group col-md-6">
    <select  id="name" name="allocate_to" value="<?php echo $row['allocated_to']; ?>" class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
      <?php
      $pass = "SELECT * from users";
      $r = $conn->query($pass);
        foreach($r as $ro){
          if($ro['username'] != 'admin'){
            echo '<option>'.$ro['username'].'</option>';
          }
          
        }
        ?>
        
      </select>
  
    </div>
  </div>
  
  
  
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Course Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="title" value="<?php echo $row['subject']; ?>" class="form-control" id="inputEmail4" placeholder="Course Title" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Course code :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="code" value="<?php echo $row['code']; ?>"  placeholder="Course code" class="form-control" id="inputEmail4" required >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Semester :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="sem" value="<?php echo $row['sem']; ?>"  class="form-control" id="inputEmail4" required >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Section :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input style="text-transform:uppercase;" value="<?php echo $row['section']; ?>" type="text" name="sec"  placeholder="section" class="form-control" id="inputEmail4" required >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Year :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="year" value="<?php echo $row['year']; ?>"  class="form-control" id="inputEmail4" required >
    </div>
  </div>
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>