

 
<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';

  ?>
  

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
        <div class="container">
        <form class="form-sample" action="genexcel.php" method="POST" >
        <div class="messages"></div>
        <div class="controls">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                 
                    <label >Course</label>
                    <select name="field" class="form-control" required>
                    <option value="all">All</option>
                          <option value="computer">Computer</option>
                          <option value="computer science">Computer Science</option>
                          <option value="it">IT</option>
                          <option value="mechanical">Mechanical</option>
                          <option value="civil">Civil</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <label >Sem</label>
                    <select name ="sem" class="form-control">
                    <option value="all">All</option>
                          <option value="1">sem1</option>
                          <option value="2">sem2</option>
                          <option value="3">sem3</option>
                          <option value="4">sem4</option>
                          <option value="5">sem5</option>
                          <option value="6">sem6</option>
                          <option value="7">sem7</option>
                          <option value="8">sem8</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <label >Student type</label>
                    <select name ="fee" class="form-control">
                    <option value="all">All</option>
                          <option value="TFWS">TFWS</option>
                          <option value="paid">PAID</option>
                          
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                    <label >Gender</label>
                    <select name ="gender" class="form-control">
                    <option value="all">All</option>
                    <option value="male">male</option>
                          <option value="female">Female</option>
                          </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                    
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

      <div class="row">            <div class="col-md-12">
               
            </div>
        </div></div>
        <button type="submit" name="search" class="btn btn-success btn-lg">Generate Report</button>
        
    </form>
</div>
<br><br><br><br><b></b>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Collage managment system</title>
  

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
 

</head>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Collage managment system</title>
  

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
 

</head>
<?php
  
  include 'connection.php';
  if(isset($_POST['search']))
  {
      $sem= $_POST['sem'];
      $dep = $_POST['field'];
      $fee = $_POST['fee'];
      $gen = $_POST['gender'];
     
      $sql="SELECT * FROM `student_info` WHERE id is not NULL";
      if($sem!="all")
      {
          $sql .=" and sem='$sem'";
      }
      if($dep!="all")
      {
          $sql .=" and department='$dep'";
      }
      if($fee!="all")
      {
          $sql .=" and fee_type='$fee'";
      }
      if($gen!="all")
      {
          $sql .=" and gender='$gen'";
      }
      $result=mysqli_query($conn,$sql);
?>
   
        <!-- End of Topbar -->

  


        <!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><b>Student Information</b></h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
          <th>student id</th>
        <th>email</th>
            <th>Name</th>

            <th>Mobile_no</th>
            <th>Department</th>
            
          </tr>
        </thead>
        <tfoot>
        <tr>
            
     
          </tr>
        </tfoot>
        <tbody>
        <?php
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>

          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['student_email'] ?></td>
            <td><?php echo $row['student_name'] ?></td>
            <td><?php echo $row['mobile_no'] ?></td>
            <td><?php echo $row['department'] ?></td>
            
      
          </tr>
         <?php
         }
        }
      
        ?>
        </tbody>
      </table>
  </div>
</div>
<form action="excel.php" method="post">
<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-12 col-sm-6 offset-md-10">
  <input type="hidden" name="query" value="<?php echo $sql; ?>" class="homebutton" />  
    <button type="submit" name="submit" class="btn btn-success btn-lg">Import To Excel</button>
  </div>
</div></form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>

      <!-- End of Main Content -->

      <!-- Footer -->
     
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
   <!-- Page level plugins -->
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>
<?php } ?>
</html>
