<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$id = $_GET['w1'];
$q = "SELECT * FROM papers WHERE id='$id' ";
$res =  $conn->query($q);
$row = $res->fetch_assoc();
$weblink = NULL;
$indexing_other = NULL;
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $conf = $_POST['conf'];
    $conf_name  = $_POST['conf_name'];
    $pub_det = $_POST['pub_det'];
    $year = $_POST['year'];
    $weblink = $_POST["weblink"];
  $place_of_publication = $_POST["place_of_publication"];
  $indexing = $_POST["indexing"];
  $indexing_other = $_POST["indexing_other"];
    $filename = $_FILES['file']['name'];
    $target = "files/".basename($filename);
if($filename == ''){
    $query = "UPDATE papers SET title='$name',conf='$conf',conf_name='$conf_name',pub_det='$pub_det',year='$year',weblink='$weblink',place_of_publication='$place_of_publication',indexing='$indexing',indexing_other='$indexing_other' WHERE id='$id'";
  $result = $conn->query($query);
} else {
    $query = "UPDATE papers SET title='$name',conf='$conf',conf_name='$conf_name',pub_det='$pub_det',year='$year',file='$filename',weblink='$weblink',place_of_publication='$place_of_publication',indexing='$indexing',indexing_other='$indexing_other' WHERE id='$id'";
    $result = $conn->query($query);
}
  
  if($result){
    echo '<script>alert("Successfully edited");</script>';
    echo '<script>document.location.replace("papers.php");</script>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papers | Edit</title>
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
<script>
function yesnoCheck(that) {
    if (that.value == "Other") {
  
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}</script>
</head>
<body><br>
<header class="section-header">
          <h3><a href="papers.php"><i style="color:white;"  class="fas fa-arrow-alt-circle-left"></i></a>&nbsp; Edit Paper Details</h3>
         
        </header><br>

        <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4"> Title :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="name" value="<?php echo $row['title']; ?>" class="form-control" id="inputEmail4" placeholder="title of the paper" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Conference / Journal :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="conf" class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>Internation Conference</option>
        <option>National Conference</option>
        <option>Internation Journal</option>
        <option>National Journal</option>
        <option>Book Chapter</option>
        <option>Book</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Conference / Journal Name :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="conf_name" value="<?php echo $row['conf_name']; ?>" class="form-control" id="inputEmail4" placeholder="Conference / Journal Name" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Publication Details :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="pub_det" value="<?php echo $row['pub_det']; ?>" class="form-control" id="inputEmail4" placeholder="volume,Issue,Date,ISSN/ISBN,DOI,PP">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Date (Month/Year) :</label> 
     
    </div>
    <div class="form-group col-md-6">
    <input type="month" name="year" value="<?php echo $row['year']; ?>" class="form-control" id="inputEmail4" placeholder="year" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Weblink :</label>
     
    </div>
    <div class="form-group col-md-6">
    <input type="text" name="weblink" class="form-control" value="<?php echo $row['weblink']; ?>" id="inputEmail4" placeholder="weblink" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Place of Publication :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="place_of_publication"  class="form-control" placeholder="Choose.." required>
    <option selected>Choose..</option>
        <option>Indian</option>
        <option>Foriegn</option>
        
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Indexing :</label>
     
    </div>
    <div class="form-group col-md-6">
    <select id="inputState" name="indexing" class="form-control" placeholder="Choose.." onchange="yesnoCheck(this);" required>
    <option selected>Choose..</option>
        <option>UGC Approved</option>
        <option>Scopes</option>
        <option>Web of Science</option>
        <option>Other</option>
       
      </select><br>
      <div id="ifYes" class="form-group col-md-6" style="display: none;">
    <label for="car"></label> <input type="text" id="car" name="indexing_other" /><br />
</div>
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