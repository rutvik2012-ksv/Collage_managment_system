<?php
  include 'session.php';
?>
<?php
include 'sidebar.php';
include 'navbar.php';
?>

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
<body>

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Apply for bonofide certificate</h1>

        </div>
         <div class="col-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Current fee receipt</h4>
                    <form class="form-sample" action="bcertii.php" method="post" enctype='multipart/form-data' >
                      <p class="card-description"> only pdf file </p>
                        <div class="form-group">
                        <label>fee receipt upload</label>
                        <input type="file" name="file1" accept="application/pdf" class="file-upload-default">
                        <div class="input-group col-xs-6">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Aadharcard ">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>i card photo</label>
                        <input type="file" name="file2" accept="application/pdf" class="file-upload-default">
                        <div class="input-group col-xs-6">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Aadharcard ">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  value="submit" name="submit" class="btn btn-primary">Upload</button>
					  
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
  
    


  
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
<!--  -->

