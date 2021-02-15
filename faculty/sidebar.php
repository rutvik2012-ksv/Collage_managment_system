<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Collage managment system</title>
  

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin<sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
       INFORMATION
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-book-reader"></i>
          <span>students</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> students</h6>
            <a class="collapse-item" href="studentlist.php">Student list</a>
            <a class="collapse-item" href="addstudents.php">Add students</a>
            <a class="collapse-item" href="addexcel.php">Upload excelsheet</a>
          </div>
        </div>
      </li>

      
    
       <!-- Nav Item - Utilities Collapse Menu -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities1">
          <i class="	fas fa-chalkboard-teacher"></i>
          <span>Faculty</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities1" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Faculty</h6>
            <a class="collapse-item" href="facultylist.php">Faculty list</a>
            <a class="collapse-item" href="addfaculty.php">Add Faculty</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-book-open"></i>
          <span>Subjects</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Subjects</h6>
            <a class="collapse-item" href="viewsubject.php">view subject</a>
            <a class="collapse-item" href="managesubject.php">Manage subject</a>
            <a class="collapse-item" href="addsubject.php">Add Subject</a>
          </div>
        </div>
      </li>
       <!-- Divider -->
       <hr class="sidebar-divider">
     
        <!-- Heading -->
        <div class="sidebar-heading">
          Result
        </div>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities0" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-book-open"></i>
          <span>Results</span>
        </a>
        <div id="collapseUtilities0" class="collapse" aria-labelledby="headingUtilities0" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Results</h6>
            <a class="collapse-item" href="addresult.php">Add result</a>
            <a class="collapse-item" href="manageresult.php">Manage Result</a>
            <a class="collapse-item" href="viewresult.php">view Result</a>
            <a class="collapse-item" href="finalresult.php">Final Result</a>
          </div>
        </div>
  </li>

  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities90" aria-expanded="true" aria-controls="collapseUtilities90">
          <i class="fas fa-book-open"></i>
          <span>attendance</span>
        </a>
        <div id="collapseUtilities90" class="collapse" aria-labelledby="headingUtilities90" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Add attendance</h6>
            <a class="collapse-item" href="addattendance.php">Manual attendance</a>
            <a class="collapse-item" href="addcsvv.php">upload csv file</a>
            <a class="collapse-item" href="monthattendance.php">view monthly attendance</a>
            <a class="collapse-item" href="generalatt1.php">view General attendance</a>
            
          </div>
        </div>
  </li>
      
     
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     
   
   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <?php
    include 'connection.php';
  ?>

    <!-- End of Sidebar -->
