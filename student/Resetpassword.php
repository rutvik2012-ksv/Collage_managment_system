<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $cp = $_POST['cp'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
    $id = $_POST['id'];
 
    if($np==$cnp )
    {
      
        $sql333="UPDATE `authentication` SET `password`='$np' WHERE id='$id'";
        $result=mysqli_query($conn,$sql333);
    }
    else
    {

    }
}

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
  
?>
   
        <!-- End of Topbar -->
        <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title" class="fab fa-accusoft"> Reset password</h2>
        <form id="demo-form2" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">

<input type="hidden" value="<?php echo $id;?>" name="id">
<!-- department -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Current Password <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="password" id="newPass" name="cp" class="form-control">
                      </div>
</div>
<!-- sem -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">New Password <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="password" id="newPass" name="np" class="form-control">
                      </div>
</div>
<!-- subject -->
 
<div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Conform New Password <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="password" id="newPass" name="cnp" class="form-control">
                      </div>
</div>

<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-3">
    
    <button type="submit" name="submit" class="btn btn-primary">Change password</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
  <span>Copyright &copy; Your Website 2020</span>
</div>
</div>
</footer>
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
