
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
      $dep = $_POST['dep'];
      $code = $_POST['code'];
      $date = $_POST['date'];

  $sql = "SELECT * FROM `student_subject` inner join student_info on student_info.id=student_subject.id where student_info.sem='$sem' and student_info.department='$dep' AND (sub1='$code' or sub2='$code' or sub3='$code' or sub4='$code' or sub5='$code' or sub6='$code')";
    $result = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    // echo $num;
  }
?>
   
        <!-- End of Topbar -->

  


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function()
        {
            $("#form1 #select-all").click(function()
            {
                $("#form1 input[type='checkbox']").prop('checked',this.checked);
            });
        });
        </script>


        <!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Student attendance</h1>

<form  action="attendanceback.php" id="form1" method="post">
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
            
          <th>Enrollment number</th>
        <th>email</th>
        
        <th>
            <input type="checkbox" id="select-all" />Select all
        </th>

           
          </tr>
        </thead>
        <tfoot>
        <tr>
            
        <th>Enrollment number</th>
        <th>Name</th>
           

        <th></th>
            
          </tr>
        </tfoot>
        <tbody>
        <?php
        if(mysqli_num_rows($result)>0)
        {$i=1;
          while($row = mysqli_fetch_array($result))
          {
        ?>

          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['student_name'] ?></td>
            <input type="hidden" name="sem" value="<?php echo $sem;?>"/>
            <input type="hidden" name="dep" value="<?php echo $dep;?>"/>
            <input type="hidden" name="count" value="<?php echo $num;?>"/>
            <input type="hidden" name="date" value="<?php echo $date;?>"/>
            <input type="hidden" name="code" value="<?php echo $code;?>"/>
            
            <td> <input type="checkbox" name="check[]" value="1"/>present</td>
             <input type="hidden" name="id[]" value="<?php echo $row['id'];?>"/>
            
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
<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-12 col-sm-6 offset-md-11">
    
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Enter</button>
  </div>
</div>
</form>
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
