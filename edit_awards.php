<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM awards WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
if(isset($_POST['btn'])){
    $name = $_POST['name'];
  $date= $_POST['date'];
  $agency = $_POST['agency'];
  
  $year = date('Y',strtotime($date));

    $query = "UPDATE awards SET title='$name',date='$date',agency='$agency',year='$year' WHERE id='$id'";
  $result = $conn->query($query);

  if($result){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("awards.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awards | Edit</title>
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
          <h3><a href="awards.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp; Edit Award Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4"> Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="name" value="<?php echo $row['title']; ?>" class="form-control" id="inputEmail4" placeholder="title of the workshop" required>
    </div>
  </div>
  
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Date :</label><br>
      
     
    </div>
    <div class="form-group col-md-6">
    
    
    <input type="date" name="date" value="<?php echo $row['date']; ?>" class="form-control" id="inputEmail4" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4"> Agency/Institution Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="agency" value="<?php echo $row['agency']; ?>" class="form-control" id="inputEmail4" placeholder="awarded by">
    </div>
  </div>
  
  
  
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>