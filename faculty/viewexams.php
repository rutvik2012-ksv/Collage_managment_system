
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
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';
  include 'connection.php';
  if(isset($_POST['enter']))
  {
  $sem = $_POST['sem'];
  $field= $_POST['dep'];
  $code = $_POST['code'];
  $sql = "SELECT * FROM `exams` where sem='$sem' and field='$field' and subject_code='$code'";
  $result = mysqli_query($conn,$sql);

  }
?>
   
        <!-- End of Topbar -->

  


        <!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Subject Exam  </h1>


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
            
          <th>Field_name</th>
          <th>exam_type</th>
        <th>Date</th>
            <th>Total marrks</th>

            <th>passing marks</th>
            
            <th>action</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
        <th>Field_name</th>
          <th>exam_type</th>
        <th>Date</th>
            <th>Total marrks</th>

            <th>passing marks</th>
            
            <th>action</th>
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
            <td><?php echo $row['field'] ?></td>
            <td><?php echo $row['exam'] ?></td>
            <td><?php echo $row['examdate'] ?></td>
            <td><?php echo $row['marks'] ?></td>
            <td><?php echo $row['min_marks'] ?></td>
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewmarks.php" method="post">     
 <input type="hidden" name="code" value="<?php echo $code; ?>" class="homebutton" />      
 <input type="hidden" name="exam" value="<?php echo $row['exam']; ?>" class="homebutton" /> 
 <input type="hidden" name="sem" value="<?php echo $row['sem']; ?>" class="homebutton" /> 
 <input type="hidden" name="dep" value="<?php echo $row['field']; ?>" class="homebutton" /> 
 <input type="hidden" name="examdate" value="<?php echo $row['examdate']; ?>" class="homebutton" />                           
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="submit" value="view" data-toggle="tooltip" data-placement="top" title="view">View</button>
 </form>
                                                </li>

                                               
                                            </ul>
          </tr>
         <?php
         }
        }
      
        ?>
        </tbody>
      </table>
  </div>
</div>

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

</html>
