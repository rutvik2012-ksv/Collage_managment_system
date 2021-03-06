
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
  $id = $_SESSION['id'];
  
  include 'connection.php';
  $sql3="SELECT `department`, `sem` FROM `student_info` WHERE id='$id'";
  $result3=mysqli_query($conn,$sql3);
  $row3 = mysqli_fetch_array($result3);
  $gettedsem = $row3['sem'];
  $gettedfield = $row3['department'];
  $sql4="SELECT  `status` FROM `elective_form` WHERE sem='$gettedsem'";
  $result4=mysqli_query($conn,$sql4);
  $row4=mysqli_fetch_array($result4);
  $sql5 = "SELECT COUNT(subject_name) FROM `subject`where sem='$gettedsem' and field='$gettedfield' GROUP BY elective";
    $result5 = mysqli_query($conn,$sql5);
    $num5 = mysqli_num_rows($result5);

    $counter = 1;
    $exe="elective";
    $sql6="SELECT * FROM `student_subject` WHERE sem='$gettedsem' and field='$gettedfield' and id='$id'";
    $result6=mysqli_query($conn,$sql6);
    $num6=mysqli_num_rows($result6);
?>
   <?php if($row4['status']==1 && $num6==0)
   {?>


        <!-- End of Topbar -->
        <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i>Select subject</h2>
        <form id="demo-form2" action="studentsubject.php" method="post" data-parsley-validate class="form-horizontal form-label-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
             <input type="hidden" name="sem" value="<?php echo $gettedsem; ?>"/>
             <input type="hidden" name="field" value="<?php echo $gettedfield; ?>"/>
        <?php
       
       while($counter<=$num5)
       {
        $elective = $exe.$counter;
     ?>
     <?php 
            $elective =$exe.$counter;
            $sql= "SELECT `subject_code`,`subject_name` FROM `subject`where sem='$gettedsem' and field='$gettedfield' and elective='$elective'";
              $result = mysqli_query($conn,$sql);
             
        ?>
<!-- department -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label"><?php echo "subject".$counter; ?> <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <select name="<?php echo $elective; ?>" class="form-control" required>
                        <?php 
            
                while($row = mysqli_fetch_array($result))
                {
                ?>
                          <option value="<?php echo $row['subject_code'];?>"><?php echo $row['subject_name'];?></option>
                <?php } ?>     
                        </select>
                      </div>
</div>
       <?php  $counter = $counter+1;} ?>
<!-- sem -->

<!-- subject -->
 


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-3">
    
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
   <?php } ?>
   <?php if($row4['status']==0)
   {?>
<!-- /.container-fluid -->
<div class="container-fluid">

<!-- 404 Error Text -->
<div class="text-center">
  <div class="error mx-auto" data-text="404">NOt avialable</div>
  <p class="lead text-gray-800 mb-5">Page Not Found</p>
  <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
  <a href="home.php">&larr; Back to Dashboard</a>
</div>

</div>

<?php } ?>
<?php if($num6==1)
   {?>
<!-- /.container-fluid -->
<div class="container-fluid">

<!-- 404 Error Text -->
<div class="text-center">
  <div class="error mx-auto" data-text="404">NOtavialable</div>
  <p class="lead text-gray-800 mb-5">Page Not Found</p>
  <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
  <a href="home.php">&larr; Back to Dashboard</a>
</div>

</div>

<?php } ?>
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