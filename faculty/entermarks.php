
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
  if(isset($_POST['next']) && isset($_POST['dep']) && isset($_POST['sem']))
  {    
    $sem = $_POST['sem'];
    $dep = $_POST['dep'];
    $code = $_POST['code'];
    $exam = $_POST['exam'];
    $date =$_POST['date'];
    $marks = $_POST['marks'];
    $pmarks=$_POST['pmarks'];
    $cyear =date("Y");
    // echo $date;
    if($exam=="class")
    {
      $sql0 = "SELECT * FROM `exams` WHERE subject_code='$code' AND sem='$sem' and examdate='$date' and field='$dep' and exam_year='$cyear' and exam='$exam' ";
      $result0 = mysqli_query($conn,$sql0);
    }
    else{
    $sql0 = "SELECT * FROM `exams` WHERE subject_code='$code' AND sem='$sem' and field='$dep' and exam_year='$cyear' and exam='$exam' ";
    $result0 = mysqli_query($conn,$sql0);
  }
  
    $s="SELECT `subject_code`, `subject_name`, `sem`, `field`, `fid` FROM `subject` WHERE sem='$sem' AND field='$dep' and subject_code='$code'";
    
    $r = mysqli_query($conn,$s);
    $ro = mysqli_fetch_array($r);
    $sname=$ro['subject_name'];
    // echo $sname;
    if(mysqli_num_rows($result0)==0 )
    {
        $sql11="INSERT INTO `exams`(`subject_name`, `subject_code`, `examdate`, `exam`, `sem`, `field`, `marks`,`min_marks`,`exam_year`) VALUES ('$sname','$code','$date','$exam','$sem','$dep','$marks','$pmarks','$cyear')";
        $result11=mysqli_query($conn,$sql11);
      
    }
   $sql12="SELECT `id`, `subject_code`, `exam`, `examdate`, `marks`, `is_enter` FROM `student_marks` WHERE subject_code='$code' AND exam='$exam' AND  is_enter=1  and cyear='$cyear' and is_again=1 and sem='$sem' and field='$dep'";
   $result12=mysqli_query($conn,$sql12);
   $num12=mysqli_num_rows($result12);
   if(mysqli_num_rows($result12)==0)
   {
    $sql = "SELECT * FROM `student_subject` inner join student_info on student_info.id=student_subject.id where student_info.sem='$sem' and student_info.department='$dep' AND (sub1='$code' or sub2='$code' or sub3='$code' or sub4='$code' or sub5='$code' or sub6='$code')";
    $result = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($exam!="class"){
    $sql20="UPDATE `exams` SET `examdate`='$date',`marks`='$marks',`min_marks`='$pmarks',`exam_year`='$cyear' WHERE subject_code='$code' and sem='$sem' and field='$dep' and exam='$exam'";
    $result20=mysqli_query($conn,$sql20);}
 
  }
  else
  {
    $sql="SELECT `id`,`subject_code`, `exam`, `examdate`, `marks`, `is_enter` FROM `student_marks` WHERE subject_code='$code' AND exam='$exam' AND examdate='$date' and sem='$sem' and field='$dep' and is_enter=0";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    // echo $num;

  }
}
?>
   
        <!-- End of Topbar -->

  

        <!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Subject Name  :<?php echo $ro['subject_name'];?></h1>

<form action="entermarksback.php" method="post">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo"Sem:" ;echo $sem ; echo "    field:"; echo $dep; ?>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <input type="hidden" name="code" value="<?php echo $code; ?>"/>
    <input type="hidden" name="count" value="<?php echo $num; ?>"/>
    <input type="hidden" name="sem" value="<?php echo $sem; ?>"/>
    <input type="hidden" name="dep" value="<?php echo $dep; ?>"/>
    <input type="hidden" name="date" value="<?php echo $date; ?>"/>
    <input type="hidden" name="exam" value="<?php echo $exam; ?>"/>
    <input type="hidden" name="tmarks" value="<?php echo $marks; ?>"/>
    <input type="hidden" name="pmarks" value="<?php echo $pmarks; ?>"/>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            
            <th>enrollment</th>
            <th>Name</th>
            <th>marks</th>
            
          </tr>
        </thead>
        <tfoot>
        <tr>
            
             
        <th>enrollment</th>
            <th>Name</th>
            <th>marks</th>
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
            <td><?php
                    $req=$row['id'];
                    $sql1="SELECT  `student_name`FROM `student_info` WHERE id='$req'";
                    $result1=mysqli_query($conn,$sql1);
                    $row1 = mysqli_fetch_array($result1);
                    echo $row1['student_name'];

                ?></td>
                <td> 
                <?php echo"
                <input type='hidden' name='sid[]'value='".$row['id']."'/>
                <input type='text' name='smarks[]' /></td>";?>
    
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
