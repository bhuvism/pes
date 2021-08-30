<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM workshops2 WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $agency = $_POST['agency'];
    $filename = $_FILES['file']['name'];
    $target = "files/".basename($filename);
    $year = date('Y',strtotime($from_date));
if($filename == ''){
    $query = "UPDATE workshops2 SET title='$name',from_date='$from_date',to_date='$to_date',agency='$agency',year='$year' WHERE id='$id'";
  $result = $conn->query($query);
} else {
    $query = "UPDATE workshops2 SET title='$name',from_date='$from_date',to_date='$to_date',agency='$agency',file='$filename',year='$year' WHERE id='$id'";
    $result = $conn->query($query);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
  
  if($result){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("workshops2.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conducted workshops | Details</title>
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
          <h3><a href="workshops2.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp; Edit conducted workshop Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4"> Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" value="<?php echo $row['title']; ?>" name="name" class="form-control" id="inputEmail4" placeholder="title of the workshop" required>
    </div>
  </div>
  
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Date :</label><br>
      
     
    </div>
    <div class="form-group col-md-6">
    <label for="inputEmail4">From :</label>
    <input type="date" name="from_date" value="<?php echo $row['from_date']; ?>" class="form-control" id="inputEmail4" required>
    <label for="inputEmail4">To :</label>
    <input type="date" name="to_date" value="<?php echo $row['to_date']; ?>" class="form-control" id="inputEmail4" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Sponsored Agency/Institution Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="agency" value="<?php echo $row['agency']; ?>" class="form-control" id="inputEmail4" placeholder="Sponsored Agency/Institution Name">
    </div>
  </div>
  
  
 

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Upload the file :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="file" name="file"  id="inputEmail4" >
    </div>
  </div>
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>