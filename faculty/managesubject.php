
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
  <script src="jquery.js"></script>
</head>

<?php
    include 'connection.php';
    $showalert = false;
    $message = "";
    $done = false;
    if(isset($_POST['got']) && $_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $sem= $_POST['sem'];
        $dep = $_POST['dep'];
        $fid =  $_POST['fid'];
        
        $fname = $_POST['fname'];
    
        $sid = $_POST['sid'];
        $sname = $_POST['sname'];
     
        $sql =" SELECT * FROM `subject` WHERE subject_code='$sid'";
      // to print the information and get idea what is name and tmp name
              //print_r($photo);
        $sql =" SELECT `fid` FROM `subject` WHERE subject_code='$sid'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        
      
     
        if($row['fid']!= "")
        {
           $message = "subjet is already  assigned in our record please check !";
          $showalert = true;
          
        }
        else{
            // name of folder in which we will store data
       
        
       
        $sql = "UPDATE `subject` SET `subject_code`='$sid',`subject_name`='$sname',`sem`='$sem',`field`='$dep',`fid`='$fid'  where subject_code='$sid' and `subject_name`='$sname' and `sem`='$sem' and `field`='$dep'";
        //execute query
        $result =mysqli_query($conn,$sql);
       
        if($result)
        {
            $done = true;
            $message = "the subject record has been entered in our record" ;   
               
        }
        else{
            $showalert=true;
            $message = "Due to some technical error we can not add dada!please try again";  
        }
        
    }    
}
  
?>


<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';
  
?>
 <?php
  if($showalert)
  {
    echo '<div class="alert alert-danger" role="alert">
    <strong>WARNING!</strong> '.$message.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if($done)
  {
    echo '<div class="alert alert-success" role="alert">
    <strong>SUCCESS!</strong> '.$message.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
 
?>
   <center>
        <!-- End of Topbar -->
        <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i>Assign faculty</h2>
        </center>
        <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

        <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">


<!-- department -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <select name="field" class="form-control" required>
                        <option></option>
                          <option value="computer">Computer</option>
                          <option value="computer science">Computer Science</option>
                          <option value="it">IT</option>
                          <option value="mechanical">Mechanical</option>
                          <option value="civil">Civil</option>
                        </select>
                      </div>
</div>
<!-- sem -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sem<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                    
                        <select name="sem" class="form-control" required>
                        <option></option>
                          <option value="1">sem1</option>
                          <option value="2">sem2</option>
                          <option value="3">sem3</option>
                          <option value="4">sem4</option>
                          <option value="5">sem5</option>
                          <option value="6">sem6</option>
                          <option value="7">sem7</option>
                          <option value="8">sem8</option>
                        </select>
                      </div>
</div>



<!-- subject -->
 


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="next" class="btn btn-secondary">Next<i class='fas fa-angle-double-right'></i></button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
<?php
    if(isset($_POST['next']) && isset($_POST['field']) && isset($_POST['sem']))
    {
      
        $sem = $_POST['sem'];
        $dep = $_POST['field'];
        $_SESSION['sem'] = $sem;
        $_SESSION['field'] = $dep;
        $sql = "SELECT `subject_code`, `subject_name`, `sem`, `field` FROM `subject` WHERE sem='$sem' AND field='$dep'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);    
?>
      <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
        <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">


<!-- department -->
<div class="form-group row">
                      <label class="col-sm-3 col-form-label">Subject <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <select name="code" class="form-control" required>
                        <?php  foreach ($result as $subject){
?>
            <option value="<?php echo $subject["subject_code"];?>"><?php echo " ". $subject["subject_code"]."-". $subject["subject_name"];?>
    </option>   
    <?php } ?>
    
                        </select>    
                      </div>
</div>
<!-- sem -->


<div class="form-group row">
<label class="col-sm-3 col-form-label">Faculty id<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" name="fid" class="form-control" required />
                      </div>
</div>

<!-- subject -->
 


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="next2" class="btn btn-secondary">Next<i class='fas fa-angle-double-right'></i></button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
    <?php } ?>
    </center>
<?php
    if(isset($_POST['next2']) && isset($_POST['code']) && isset($_POST['fid']))
    {
      
        $code = $_POST['code'];
        $id = $_POST['fid'];
        $sem  =$_SESSION['sem'];
        $dep = $_SESSION['field'] ;
         $sql = "SELECT `subject_code`, `subject_name`, `sem`, `field` FROM `subject` WHERE subject_code='$code'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);    
        $sql ="SELECT  `name` FROM `faculty_info` WHERE id='$id'";
        $result1=mysqli_query($conn,$sql);
        $row1=mysqli_fetch_array($result1); 
?>
      <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
        <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">


<!-- department -->

<!-- sem -->
<div class="form-group row">
<label class="col-sm-3 col-form-label">sem<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $sem;?>" name="sem" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Department<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $dep;?>" name="dep" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">subject code<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $code;?>" name="sid" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">subject name<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row["subject_name"];?>" name="sname" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Faculty id<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $id;?>" name="fid" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Faculty name<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text"   value="<?php echo $row1['name'];?>" name="fname" class="form-control" required />
                      </div>
</div>


<!-- subject -->
 


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="got" class="btn btn-success">Done</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
    <?php } ?>
   
     
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Footer -->

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
