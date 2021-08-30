<?php
include 'config.php';

$sem = $_GET["sem"];
  $query  = "SELECT * FROM timetable WHERE semester='$sem' && section='A'
  ORDER BY 
     CASE
          WHEN day = 'Monday' THEN 1
          WHEN day = 'Tuesday' THEN 2
          WHEN day = 'Wednesday' THEN 3
          WHEN day = 'Thursday' THEN 4
          WHEN day = 'Friday' THEN 5
          WHEN day = 'Saturday' THEN 6
     END ASC,
     CASE
          WHEN time = '9-9:55' THEN 1
          WHEN time = '9:55-10:50' THEN 2
          WHEN time = '9:55-1:05' THEN 2
          WHEN time = '3:10-4:05' THEN 3
         
     END  ASC
  
   ";
  $result = $conn->query($query);
  $obj2 = array();
  $obj->name="Bhuvan";
  foreach($result as $row){
       if($obj->{$row["day"]}){
          $obj2->time=$row["time"];
          $obj2->subject=$row["subject"];
          $obj2->faculty=$row["faculty"];
         
          array_push($obj->{$row["day"]},$obj2);
       } else {
            $obj2->time=$row["time"];
            $obj2->subject=$row["subject"];
            $obj2->faculty=$row["faculty"];
           
          $obj->{$row["day"]}=array($obj2);
     }
  }

//  $json = '{
//      "book": [
  
//         {
//            "id": "01",
//            "language": "Java",
//            "edition": "third",
//            "author": "Herbert Schildt"
//         },
  
//         {
//            "id": "07",
//            "language": "C++",
//            "edition": "second",
//            "author": "E.Balagurusamy"
//         }
  
//      ],
//      "bikes":[
//           {
//                "model":"2020"
//           },
//           {
//                "model":"2021"
//           }
//      ]
//   }';

  header('Content-type: application/json');
echo json_encode($obj) ;



?>