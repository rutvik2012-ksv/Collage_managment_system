
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
  $id = $_SESSION['id'];

  $sql1= "SELECT sem,department FROM `student_info` where id='$id'";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_array($result1);
  $sem = $row1['sem'];
  $dep = $row1['department'];
  $sql= "SELECT * FROM `student_subject` where id='$id' and sem='$sem' and field='$dep'";
  $result = mysqli_query($conn,$sql);
 
  $num = mysqli_num_rows($result);
  
?>
   
        <!-- End of Topbar -->

  


        <!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">My subject</h1>


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
          <th>subject_code</th>
          <th>Subject_name</th>
        
            <th>View Result</th>

            
          </tr>
        </thead>
        <tfoot>
        <tr>
        <th>subject_code</th>
          <th>Subject_name</th>
        
            <th>View Result</th>

           
          </tr>
        </tfoot>
        <tbody>
        <?php
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
             <?php   if(!("" == trim($row['sub1']))){?>
          <tr>
            <td><?php echo $row['sub1'] ?></td>
            <td><?php $code= $row['sub1'] ;
             $sql2="SELECT `id`, `subject_code`, `subject_name`, `elective`, `sem`, `field`, `fid` FROM `subject` WHERE field='$dep' and sem='$sem' and subject_code='$code'";
             $result2=mysqli_query($conn,$sql2);
             $row3=mysqli_fetch_array($result2);
             echo $row3['subject_name'];
             ?></td>
            
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewcurrentresult.php" method="GET">     
 <input type="hidden"   name="c" value="<?php echo $row['sub1'] ?>" class="homebutton" />                                
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="v"  data-toggle="tooltip" data-placement="top" title="view">view result</button>
 </form>
        </li>
        </td>
          </tr> <?php }?>
          <?php   if(!("" == trim($row['sub2']))){?>
          <tr>
            <td><?php echo $row['sub2'] ?></td>
            <td><?php $code= $row['sub2'] ;
             $sql2="SELECT `id`, `subject_code`, `subject_name`, `elective`, `sem`, `field`, `fid` FROM `subject` WHERE field='$dep' and sem='$sem' and subject_code='$code'";
             $result2=mysqli_query($conn,$sql2);
             $row3=mysqli_fetch_array($result2);
             echo $row3['subject_name'];
             ?></td>
            
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewcurrentresult.php" method="GET">     
 <input type="hidden"  name="c"  value="<?php echo $row['sub2'] ?>" class="homebutton" />                                
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="v" data-toggle="tooltip" data-placement="top" title="view">view result</button>
 </form>
        </li>
        </td>
          </tr> <?php }?>
          <?php   if(!("" == trim($row['sub3']))){?>
          <tr>
            <td><?php echo $row['sub3'] ?></td>
            <td><?php $code= $row['sub3'] ;
             $sql2="SELECT `id`, `subject_code`, `subject_name`, `elective`, `sem`, `field`, `fid` FROM `subject` WHERE field='$dep' and sem='$sem' and subject_code='$code'";
             $result2=mysqli_query($conn,$sql2);
             $row3=mysqli_fetch_array($result2);
             echo $row3['subject_name'];
             ?></td>
            
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewcurrentresult.php" method="GET">     
 <input type="hidden"  name="c"  value="<?php echo $row['sub3'] ?>" class="homebutton" />                                
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="v"  data-toggle="tooltip" data-placement="top" title="view">view result</button>
 </form>
        </li>
        </td>
          </tr> <?php }?>
          <?php   if(!("" == trim($row['sub4']))){?>
          <tr>
            <td><?php echo $row['sub4'] ?></td>
            <td><?php $code= $row['sub4'] ;
             $sql2="SELECT `id`, `subject_code`, `subject_name`, `elective`, `sem`, `field`, `fid` FROM `subject` WHERE field='$dep' and sem='$sem' and subject_code='$code'";
             $result2=mysqli_query($conn,$sql2);
             $row3=mysqli_fetch_array($result2);
             echo $row3['subject_name'];
             ?></td>
            
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewcurrentresult.php" method="GET">     
 <input type="hidden" name="c"  value="<?php echo $row['sub4'] ?>" class="homebutton" />                                
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="v"  data-toggle="tooltip" data-placement="top" title="view">view result</button>
 </form>
        </li>
        </td>
          </tr> <?php }?>
          <?php   if(!("" == trim($row['sub5']))){?>
          <tr>
            <td><?php echo $row['sub5'] ?></td>
            <td><?php $code= $row['sub5'] ;
             $sql2="SELECT `id`, `subject_code`, `subject_name`, `elective`, `sem`, `field`, `fid` FROM `subject` WHERE field='$dep' and sem='$sem' and subject_code='$code'";
             $result2=mysqli_query($conn,$sql2);
             $row3=mysqli_fetch_array($result2);
             echo $row3['subject_name'];
             ?></td>
            
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewcurrentresult.php" method="GET">     
 <input type="hidden" name="c" value="<?php echo $row['sub5'] ?>" class="homebutton" />                                
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="v"  data-toggle="tooltip" data-placement="top" title="view">view result</button>
 </form>
        </li>
        </td>
          </tr> <?php }?>
          <?php   if(!("" == trim($row['sub6']))){?>
          <tr>
            <td><?php echo $row['sub6'] ?></td>
            <td><?php $code= $row['sub6'] ;
             $sql2="SELECT `id`, `subject_code`, `subject_name`, `elective`, `sem`, `field`, `fid` FROM `subject` WHERE field='$dep' and sem='$sem' and subject_code='$code'";
             $result2=mysqli_query($conn,$sql2);
             $row3=mysqli_fetch_array($result2);
             echo $row3['subject_name'];
             ?></td>
            
            <td>
            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
 <form action="viewcurrentresult.php" method="GET">     
 <input type="hidden"  name="c"  value="<?php echo $row['sub6'] ?>" class="homebutton" />                                
 <button class="btn btn-primary btn-sm rounded-0" type="submit" name="v"  data-toggle="tooltip" data-placement="top" title="view">view result</button>
 </form>
        </li>
        </td>
          </tr>
          <?php }?>
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
