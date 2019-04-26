<?php 
session_start();

if(session_destroy()){
header( 'Location:../html/adminlogin.php');
    }
exit;
?>