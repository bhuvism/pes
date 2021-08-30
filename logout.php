<?php
session_start();
if(isset($_SESSION['userid']) || isset($_SESSION['admin_userid'])){
    session_destroy();
    header('location:index.php');
    exit;
}
?>