<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include 'config.php';
$from_date = $_GET['w1'];
$to_date = $_GET['w2'];
$query = "SELECT * FROM teaching WHERE userid='".$_SESSION['userid']."' AND year BETWEEN $from_date AND $to_date ORDER BY year DESC";
$result = $conn->query($query);
$rows = $result->num_rows;
if(!$rows){
    echo '<script>alert("You have no records during specified period");</script>';
    echo '<script>document.location.replace("teaching.php");</script>';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Teaching during <?php echo $from_date; ?> - <?php echo $to_date; ?></title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<header id="header" class="fixed-top">
   <div class="container">

     <div class="logo float-left">
       <h1 class="text-light"><a  href="teaching.php"><i   class="fas fa-angle-left"></i>&nbsp;<span>Teaching during <?php echo $from_date; ?> - <?php echo $to_date; ?> </span></a></h1>
     </div>

     

   </div>
 </header> <br><br><br><br>
 <div class="container">
	<table id="example" class="table table-responsive" style="width:100%">
        <thead  class="thead-dark">
            <tr>
            <th scope="col">Course Title</th>
      <th scope="col">Course Code</th>
      <th scope="col">Semester</th>
      <th scope="col">Semester-type</th>
      <th scope="col">Year</th>
      <th scope="col">L</th>
      <th scope="col">T</th>
      <th scope="col">P</th>
      <th scope="col">Total Hours</th>
      
            </tr>
        </thead>
        <tbody>

        <?php 
        foreach($result as $row){
            echo '<tr>
            <th scope="row">'.$row['subject'].'</th>
            <td>'.$row['code'].'</td>
            <td>'.$row['sem'].'</td>
            <td>'.$row['sem_type'].'</td>
            <td>'.$row['year'].'</td>
            <td>'.$row['l'].'</td>
            <td>'.$row['t'].'</td>
            <td>'.$row['p'].'</td>
            <td>'.$row['hours'].'</td>
            
          </tr>';
        }

        ?>
            
        </tbody>
    </table></div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'colvis' ]
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
</body>
</html>