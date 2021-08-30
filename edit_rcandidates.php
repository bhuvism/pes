<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM rcandidates WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
if(isset($_POST['btn'])){
    $name = $_POST['name'];
  $usn = $_POST['usn'];
  $title  = $_POST['title'];
  $year = $_POST['year'];
  $status = $_POST['status'];
  $com_year = $_POST['yr_of_completion'];
   
if($com_year == ''){
    $query = "UPDATE rcandidates SET name='$name',usn='$usn',title='$title',reg_year='$year',status='$status',com_year=NULL WHERE id='$id'";
  $result = $conn->query($query);
} else {
    $query = "UPDATE rcandidates SET name='$name',usn='$usn',title='$title',reg_year='$year',status='$status',com_year='$com_year' WHERE id='$id'";
    $result = $conn->query($query);
}
  
  if($result){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("research_candidates.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research candidates | Edit</title>
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
          <h3><a href="research_candidates.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp; Edit Research candidates Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4"> Research Candidate Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="inputEmail4" placeholder="Research Candidate Name" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">USN :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="usn" value="<?php echo $row['usn']; ?>" class="form-control" id="inputEmail4" placeholder="University Seat Number" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" id="inputEmail4" placeholder="title of the research" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Registration Year :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="number" name="year" value="<?php echo $row['reg_year']; ?>" class="form-control" id="inputEmail4" placeholder="year">
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
    <input type="number" value="<?php echo $row['com_year']; ?>" name="yr_of_completion" class="form-control"  id="inputEmail4" >
    <small style="color:white;"><strong>*if completed</strong></small>
    </div>
  </div>
 
  
  
  <button type="submit" name="btn" class="btn btn-primary">Apply Changes</button>
</form>
        </div><br>
</body>
</html>