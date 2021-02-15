
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
  if(isset($_POST['done']))
  {
  $sem=$_POST['sem'];
  $dep=$_POST['field'];
  $sql = "SELECT * FROM `student_info` where sem='$sem' and department='$dep'";
  $result = mysqli_query($conn,$sql);
  $sql5 = "SELECT COUNT(subject_name) FROM `subject`where sem='$sem' and field='$dep' GROUP BY elective";
  $result5 = mysqli_query($conn,$sql5);
  $num5 = mysqli_num_rows($result5);
  
  }
?>
   
        <!-- End of Topbar -->

  


        <!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><B>Student Result</b></h1>


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

          <?php
          $counter=1;
          $exe="elective";
           while($counter<=$num5)
           {
            $elective = $exe.$counter;
          $sql20="SELECT * FROM `subject` WHERE sem='$sem' and field='$dep' and elective='$elective'";
          $result20=mysqli_query($conn,$sql20);
          $counter =$counter+1;
          if(mysqli_num_rows($result20))
          { 
          ?>
            <th>
            <?php while($row21=mysqli_fetch_array($result20))
            {
                echo $row21['subject_name']."/";
            }?>
            </th>
            <?php
          }
          }?>
              
          

          </tr>
        </thead>
        <tfoot>
        <tr>
        <th>Enrollment number</th>

        <?php
          $counter=1;
          $exe="elective";
           while($counter<=$num5)
           {
            $elective = $exe.$counter;
          $sql20="SELECT * FROM `subject` WHERE sem='$sem' and field='$dep' and elective='$elective'";
          $result20=mysqli_query($conn,$sql20);
          $counter =$counter+1;
          if(mysqli_num_rows($result20))
          { 
          ?>
            <th colspan="1">
            <?php while($row21=mysqli_fetch_array($result20))
            {
                echo $row21['subject_name']."/";
            }?>
            </th>
            <?php
          }
          }?>
          </tr>
        </tfoot>
        <tbody>
        <?php
        if(mysqli_num_rows($result)>0)
        {
            
          while($row = mysqli_fetch_array($result))
          {
            $id=$row['id'];
              
              $sql7="SELECT * FROM `student_marks` WHERE id='$id' and sem='$sem' and field='$dep' and exam!='class' ";
              $result7=mysqli_query($conn,$sql7);
              $num7=mysqli_num_rows($result7);
            
              $num9 = $num5*4;
             if($num7==$num9)
             {
                $id=$row['id'];
                 $sql16="SELECT * FROM `student_subject` WHERE id='$id' and sem='$sem' and field='$dep'";
                $result16=mysqli_query($conn,$sql16);
                $row16 = mysqli_fetch_array($result16);
                $sub1= $row16['sub1'];
                $sub2= $row16['sub2'];
                $sub3= $row16['sub3'];
                $sub4= $row16['sub4'];
                $sub5= $row16['sub5'];
                $sub6= $row16['sub6'];

        ?>

          <tr>
          <td><?php echo $id;?></td>
          <td colspan="1"> 
            <?php if(!("" == trim($sub1) ))
            {
                
               
                $sql30="SELECT * FROM `student_marks` WHERE subject_code='$sub1' and id='$id' and sem='$sem' and field='$dep' and exam!='class'";
                
                $result30=mysqli_query($conn,$sql30);
                $total=0;
                while($row30=mysqli_fetch_array($result30))
                {
                    $total=$total+$row30['marks'];
                }
                echo $total;
                
               
                
            }
            ?> </td>
             <td>
            <?php if(!("" == trim($sub2) ))
            {
                
               
                $sql30="SELECT * FROM `student_marks` WHERE subject_code='$sub2' and id='$id' and sem='$sem' and field='$dep' and exam!='class'";
                
                $result30=mysqli_query($conn,$sql30);
                $total=0;
                while($row30=mysqli_fetch_array($result30))
                {
                    $total=$total+$row30['marks'];
                }
                echo $total;
                
               
                
            }
            ?> </td>




            <td>
            <?php if(!("" == trim($sub3) ))
            {
                
               
                $sql30="SELECT * FROM `student_marks` WHERE subject_code='$sub3' and id='$id' and sem='$sem' and field='$dep' and exam!='class'";
                
                $result30=mysqli_query($conn,$sql30);
                $total=0;
                while($row30=mysqli_fetch_array($result30))
                {
                    $total=$total+$row30['marks'];
                }
                echo $total;
                
               
                
            }
            ?> </td>
              <td>
            <?php if(!("" == trim($sub4) ))
            {
                
               
                $sql30="SELECT * FROM `student_marks` WHERE subject_code='$sub4' and id='$id' and sem='$sem' and field='$dep' and exam!='class'";
                
                $result30=mysqli_query($conn,$sql30);
                $total=0;
                while($row30=mysqli_fetch_array($result30))
                {
                    $total=$total+$row30['marks'];
                }
                echo $total;
                
               
                
            }
            ?> </td>
              <td>
            <?php if(!("" == trim($sub5) ))
            {
                
               
                $sql30="SELECT * FROM `student_marks` WHERE subject_code='$sub5' and id='$id' and sem='$sem' and field='$dep' and exam!='class'";
                
                $result30=mysqli_query($conn,$sql30);
                $total=0;
                while($row30=mysqli_fetch_array($result30))
                {
                    $total=$total+$row30['marks'];
                }
                echo $total;
                
               
                
            }
            ?> </td>
              <td>
            <?php if(!("" == trim($sub6) ))
            {
                
               
                $sql30="SELECT * FROM `student_marks` WHERE subject_code='$sub6' and id='$id' and sem='$sem' and field='$dep' and exam!='class'";
                
                $result30=mysqli_query($conn,$sql30);
                $total=0;
                while($row30=mysqli_fetch_array($result30))
                {
                    $total=$total+$row30['marks'];
                }
                echo $total;
                
               
                
            }
            ?> </td>


           

          </tr>
         <?php
         }
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
