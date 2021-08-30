<?php 
     session_start();
     if(!isset($_SESSION['admin_userid'])){
         header('location:index.php');
     }
     include 'config.php';
     
     $id = $_GET['w1'];
     $name = "SELECT * FROM USERS WHERE id='$id'";
     $res = $conn->query($name);
     $username = $res->fetch_assoc();


     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Info | CSE</title>
    <link href="assets/img/Logo.png" rel="icon">
  <link href="assets/img/Logo.png" rel="apple-touch-icon">


  <script>
  function printdiv(e){
    var id = e.getAttribute("data-id");
    var divContents = document.getElementById(id).innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body > <br>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
  }  
	
     </script>
</head>
<body>
<div class="container-fluid">
    
     
  <div  class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
         <div id="<?php $id; ?>" class="card-body">
           <h5 class="text-center">Reports on Academic and Research Activities</h5>
           <small>Academic Activities :</small><br>
           <table   class="table table-responsive" style="width:100%">
     <thead class="thead-dark">
       <tr>
       
       <th scope="col"> Teaching Records (Details of Courses taught by '.$username['username'].') </th>
        
         
       </tr>
     </thead>
     <tbody>
        <?php
       $pass = "SELECT * FROM teaching WHERE userid='".$id."'";
       $tres = $conn->query($pass);
       foreach($tres as $trow){
         echo '<tr>
         <td>'.$trow['subject'].'</td>
         </tr>';
       } ?>
       
    </tbody>
     </table>
     <small>Research Guidance(Candidates Awarded/Pursuing Ph.D / M.Sc., Engg./M.Phil ) :</small><br>
     <div class="container">
     <table id="example" class="table table-responsive" style="width:100%">
       <thead class="thead-dark">
         <tr >
         <th scope="col"> Degree </th>
         <th scope="col"> Ph.D </th>
         <th scope="col"> M.Sc., Engg., M.Tech </th>
         <th scope="col"> M.Phil </th>
           
         </tr>
       </thead>
       <tbody>
       
        <tr class="text-center">
         <th>Awarded</th>
         <td>Nil</td>
         <td>3</td>
         <td>Nil</td>
         
     </tr>
     <tr class="text-center">
         <th>Pursuing</th>
         <td>Nil</td>
         <td>Nil</td>
         <td>Nil</td>
         
         </tr>
       
       
       </tbody>
     </table>
     <small>Sponsered Research Projects(List of Projects taken up /completed and funds receiver & funding sources ) :</small><br>
     <table   class="table table-responsive" style="width:100%">
       <thead class="thead-dark">
         <tr>
         <th scope="col"> Project Title </th>
         <th scope="col"> Project funded by </th>
         <th scope="col"> Grants Sanctioned </th>
         <th scope="col">Grants Received </th>
           
         </tr>
       </thead>
       <tbody>
      <tr>
         <td>--</td>
         <td>--</td>
         <td>--</td>
         <td>--</td>
         
       </tr>
         
       
      </tbody>
     </table></div>
     <small>Research Publications in referred Journals and Conferences/Symposia :</small><br>
     <table   class="table table-responsive" style="width:100%">
       <thead class="thead-dark">
         <tr>
         <th scope="col"> Number of publications in </th>
         <th scope="col"> National </th>
         <th scope="col"> International </th>
         
         </tr>
       </thead>
       <tbody>
     <tr>
         <th>Journals</th>
         <td>--</td>
         <td>3</td>
         
         
      </tr>
     <tr>
         <th>Conferences / Symposia</th>
         <td--</td>
         <td>--</td>
         <td>--</td>
         
         
      </tr>
       
      </tbody>
     </table>
     
     
         </div>
          <div class="text-center">
          <button class=" btn btn-primary" data-id="'.$id.'" onclick="printdiv(this)">Print</button></div>
         </div><br>
       </div>  
       
     
     
    
     
   
     </div>
     
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


