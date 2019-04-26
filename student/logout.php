<?php 
session_start();

if(session_destroy()){
header( 'Location:../html/studentlogin.php');
    }
exit;
?>