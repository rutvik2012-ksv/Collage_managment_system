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
<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';
?>


<center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

        <form id="demo-form2" action="editstudentsubjectlist.php" method="post" data-parsley-validate class="form-horizontal form-label-left">
        <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i>Enter Details</h2>


<!-- department -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <select name="field" class="form-control" required>
                        <option></option>
                          <option value="computer">Computer</option>
                          <option value="computer science">Computer Science</option>
                          <option value="it">IT</option>
                          <option value="mechanical">Mechanical</option>
                          <option value="civil">Civil</option>
                        </select>
                      </div>
</div>
<!-- sem -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sem<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                    
                        <select name="sem" class="form-control" required>
                        <option></option>
                          <option value="1">sem1</option>
                          <option value="2">sem2</option>
                          <option value="3">sem3</option>
                          <option value="4">sem4</option>
                          <option value="5">sem5</option>
                          <option value="6">sem6</option>
                          <option value="7">sem7</option>
                          <option value="8">sem8</option>
                        </select>
                      </div>
</div>



<!-- subject -->
 


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="done" class="btn btn-primary">Enter</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
       <!-- end page content -->

<!-- insert data into table php code -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
