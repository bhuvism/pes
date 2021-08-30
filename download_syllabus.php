<?php 
$course_code = $_GET["course_code"];

include 'config.php';

$query = "SELECT * FROM syllabus WHERE course_code='$course_code'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$file = $row["filename"];
$filepath = "syllabus/" . $file;
if(file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    echo "downloaded";
    die();
} else {
    echo "Not downloaded";
    http_response_code(404);
    die();
}

?>