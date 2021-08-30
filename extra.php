<div id="collapse_'.$row['id'].'" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
    <div id="'.$row['id'].'" class="card-body">
      <h5 class="text-center">Reports on Academic and Research Activities</h5>
      <small>Academic Activities :</small><br>
      <table   class="table table-responsive" style="width:100%">
<thead class="thead-dark">
  <tr>
  
  <th scope="col"> Teaching Records (Details of Courses taught by '.$row['username'].') </th>
   
    
  </tr>
</thead>
<tbody>';
   
  $pass = "SELECT * FROM teaching WHERE userid='".$row['id']."'";
  $tres = $conn->query($pass);
  foreach($tres as $trow){
    echo '<tr>
    <td>'.$trow['subject'].'</td>';
    echo '</tr>';
  }
  
  echo '</tbody>
</table>
<small>Research Guidance(Candidates Awarded/Pursuing Ph.D / M.Sc., Engg./M.Phil ) :</small><br>
<table   class="table table-responsive" style="width:100%">
  <thead class="thead-dark">
    <tr >
    <th scope="col"> Degree </th>
    <th scope="col"> Ph.D </th>
    <th scope="col"> M.Sc., Engg., M.Tech </th>
    <th scope="col"> M.Phil </th>
      
    </tr>
  </thead>
  <tbody>';
  
    echo '<tr class="text-center">
    <th>Awarded</th>
    <td>Nil</td>
    <td>3</td>
    <td>Nil</td>';
    
    echo '</tr>';
    echo '<tr class="text-center">
    <th>Pursuing</th>
    <td>Nil</td>
    <td>Nil</td>
    <td>Nil</td>';
    
    echo '</tr>';
  
  
  echo '</tbody>
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
  <tbody>';
  
    echo '<tr>
    <td>--</td>
    <td>--</td>
    <td>--</td>
    <td>--</td>';
    
    echo '</tr>';
    
  
  
  echo '</tbody>
</table>
<small>Research Publications in referred Journals and Conferences/Symposia :</small><br>
<table   class="table table-responsive" style="width:100%">
  <thead class="thead-dark">
    <tr>
    <th scope="col"> Number of publications in </th>
    <th scope="col"> National </th>
    <th scope="col"> International </th>
    
    </tr>
  </thead>
  <tbody>';
  
    echo '<tr>
    <th>Journals</th>
    <td>--</td>
    <td>3</td>
    ';
    
    echo '</tr>';
    echo '<tr>
    <th>Conferences / Symposia</th>
    <td--</td>
    <td>--</td>
    <td>--</td>
    ';
    
    echo '</tr>';
  
  
  echo '</tbody>
</table>
';

     echo ' </div>
     <div class="text-center">
     <button class=" btn btn-primary" data-id="'.$row['id'].'" onclick="printdiv(this)">Print</button></div>
    </div><br>
  </div>
  


'; 