<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "project2";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$database_name);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      header("Location: error.php");
      exit();
    }
   
    
?>