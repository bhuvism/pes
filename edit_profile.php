<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$query = "SELECT * FROM profile WHERE userid='".$_SESSION['userid']."' ";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if(isset($_POST['btn'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $department  = $_POST['dept'];
  $qualification = $_POST['qualification'];
  $doa = $_POST['doa'];
  $designation = $_POST['designation'];
  $contactno = $_POST['contactno'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $research_area = $_POST['research_area'];
  $emp_code = $_POST["emp_code"];
  $adhar = $_POST["adhar"];
  $pan = $_POST["pan"];

  $query = "UPDATE profile SET name='$name',email='$email',department='$department',doa='$doa',qualification='$qualification',designation='$designation',dob='$dob',contactno='$contactno',address='$address',research_area='$research_area',emp_code='$emp_code',adhar='$adhar',pan='$pan' WHERE userid='".$_SESSION['userid']."';  ";
  $result = $conn->query($query);
  if($result){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("welcome.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Edit</title>
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
          <h3><a href="welcome.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;Edit Profile Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" value="<?php echo $row['name'] ; ?>" name="name" class="form-control" id="inputEmail4" placeholder="Name" required>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Email :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="email" name="email"  value="<?php echo $row['email'] ; ?>" class="form-control" id="inputEmail4" placeholder="your email" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Department :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="dept" class="form-control" placeholder="Choose.." required>
        <option selected>Choose..</option>
        <option>Computer Science and Engineering</option>
        <option>Electronics and Communication Engineering</option>
        <option>Information Science and Engineering</option>
        <option>Electricals and  Electronics Engineering</option>
        <option>Mechanical Engineering</option>
        <option>Automobile Engineering</option> 
        <option>Civil Engineering</option>
        <option>Industrial and Production Engineering</option>      
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Date of Appointment :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="date" name="doa" value="<?php echo $row['doa'] ; ?>" class="form-control" id="inputEmail4" required >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Qualification :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="qualification" value="<?php echo $row['qualification'] ; ?>" class="form-control" id="inputEmail4" placeholder="your qualification" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Designation :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="designation" value="<?php echo $row['designation'] ; ?>" class="form-control" id="inputEmail4" placeholder="your current position">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Employee code :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="emp_code" class="form-control" id="inputEmail4" value="<?php echo $row['emp_code'] ; ?>" placeholder="Employee Code" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Adhar Number :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="adhar" class="form-control" id="inputEmail4" value="<?php echo $row['adhar'] ; ?>" placeholder="Adhar Number" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">PAN Number :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="pan" class="form-control" id="inputEmail4" value="<?php echo $row['pan'] ; ?>" placeholder="PAN Number" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Research Area :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="research_area" value="<?php echo $row['research_area'] ; ?>" class="form-control" id="inputEmail4" placeholder="your Research Area" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Contact Number :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="contactno" value="<?php echo $row['contactno'] ; ?>" class="form-control" id="inputEmail4" required >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Date of birth :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="date" name="dob" value="<?php echo $row['dob'] ; ?>" class="form-control" id="inputEmail4" required >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Address :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="address" value="<?php echo $row['address'] ; ?>" class="form-control" id="inputEmail4" placeholder="address" required>
    </div>
  </div>
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>