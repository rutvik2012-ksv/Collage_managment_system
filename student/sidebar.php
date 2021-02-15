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
        <div class="sidebar-brand-text mx-3">Student <sup></sup></div>
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
        Result and Attendance
        </div>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-book-reader"></i>
          <span>My results</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> My result</h6>
            <a class="collapse-item" href="currentsemresult.php">Current sem</a>
            <a class="collapse-item" href="previoussemresult.php">Previous sem</a>
           
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo22" aria-expanded="true" aria-controls="collapseTwo22">
          <i class="fas fa-book-reader"></i>
          <span>My Attendance</span>
        </a>
        <div id="collapseTwo22" class="collapse" aria-labelledby="headingTwo22" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> My Attendance</h6>
            <a class="collapse-item" href="currentsematt.php">Current sem</a>
            <a class="collapse-item" href="previoussematt.php">Previous sem</a>
           
          </div>
        </div>
      </li>
      
      
     
      <!-- Divider -->
      <hr class="sidebar-divider">
 
       <div class="sidebar-heading">
        additional
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
          <i class="fas fa-book-open"></i>
          <span>Apply for certificate</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities3" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Apply for certificate</h6>
            <a class="collapse-item" href="bcerti.php">bonofide certificate</a>
            
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-book-reader"></i>
          <span>Forms</span>
        </a>
        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> forms</h6>
            <a class="collapse-item" href="fillelectiveform.php">elective form</a>
           
          </div>
        </div>
      </li>

      
    
       <!-- Nav Item - Utilities Collapse Menu -->
      

      
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
