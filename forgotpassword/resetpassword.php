<?php
include '../admin/connection.php';

if(isset($_POST['submit']))
{
    
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
   
    $id= $_POST['id'];
 
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
  

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>
  

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
 

</head>
<?php
 
  if(isset($_GET['token']))
  {
      $id=$_GET['token'];
    
  }
  
?>
   
        <!-- End of Topbar -->
        <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title" class="fab fa-accusoft"> Reset password</h2>
        <form id="demo-form2" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
<input type="hidden" name='id' value="<?php echo $id;?>">

<!-- department -->
 -->
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
<!-- - Bootstrap core JavaScript--> 
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
