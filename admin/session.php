<?php
  session_start();
  if(!isset($_SESSION['loggedin']))
  { 
    header('location: ../index.php');
    exit;
  }
?>