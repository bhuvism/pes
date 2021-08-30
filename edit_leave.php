<?php
session_start();
if(!isset($_SESSION['userid']) && !isset($_SESSION['admin_userid'] ) ){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM leaves WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
if(isset($_POST['btn'])){
    $from = $_POST["from"];
    $to = $_POST["to"];
    $type = $_POST["type_of_leave"];
    $no_of_days = $_POST["no_of_days"];
    $session = $_POST["session"];
    $reason = $_POST["reason"];
  
  $query = "UPDATE leaves SET from_date='$from',to_date='$to',type_of_leave='$type',no_of_days='$no_of_days',session='$session',reason='$reason' WHERE id='$id'";
  $result = $conn->query($query);
  if($result && !isset($_SESSION['admin_userid'])){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("leave.php");</script>';
  } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave | Details</title>
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
              echo '<a href="leave.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;';
          }?> Edit Leave Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">From :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="date" name="from" class="form-control" value="<?php echo $row['from_date']; ?>" id="inputEmail4"  required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">To :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="date" name="to" class="form-control" id="inputEmail4" value="<?php echo $row['to_date']; ?>"  required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Type of Leave :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="type_of_leave" class="form-control" value="<?php echo $row['type-of_leave']; ?>" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>CL</option>
        <option>RH</option>
        <option>EL</option>
        <option>SCL</option>
        <option>Others</option>
         
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Number of days :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number"  name="no_of_days" class="form-control" value="<?php echo $row['no_of_days']; ?>" id="inputEmail4" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Session :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="session" class="form-control" value="<?php echo $row['session']; ?>" placeholder="Choose.." >
    <option selected>Choose..</option>
        <option>Morning</option>
        <option>Afternoon</option>
          
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Reason :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="reason" class="form-control" id="inputEmail4" value="<?php echo $row['reason']; ?>" placeholder="Reason" required>
    </div>
  </div>
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>