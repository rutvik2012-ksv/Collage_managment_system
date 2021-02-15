<?php
include 'session.php';
include 'connection.php';
include 'sidebar.php';
include 'navbar.php';
?>
<?php


include 'connection.php';
$showalert = false;
    $message = "";
    $done = false;
if(isset($_POST['edit']))
{
    $sem= $_POST['sem'];
    $dep = $_POST['dep'];
    $sid =  $_POST['sid'];
    $sname =$_POST['sname'];
    $fid = $_POST['fid'];
    $sql="SELECT `id`, `email`, `name`, `gender`, `department`, `dob`, `ad1`, `ad2`, `mno`, `city`, `state`, `country`, `jyear` FROM `faculty_info` WHERE id='$fid'";
    $result1=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result1)>0)
    {
    
   
    $sql = "UPDATE `subject` SET `fid`='$fid' WHERE sem='$sem' and field='$dep' and subject_code='$sid'";
    $result = mysqli_query($conn,$sql);
    
    if($result)
    {
        echo"done";
        header('location:studentlist.php');
    }
    else{
      $showalert=true;
      $message = "Due to some technical error we can not add dada!please try again";
        
    }
  }
  else {
    $message = "faculty id is not valid";
    $showalert = true;
  }
}
?>


<?php
    if(isset($_POST['edit_btn']))
    {
        
            
        $code = $_POST['id'];
        $sem = $_POST['sem'];
        $dep =$_POST['field'];
        $_SESSION['editfacsem'] = $sem;
        $_SESSION['editfacf'] = $dep;
        $_SESSION['editfacc']= $code;
        
        
    }  
     $sem= $_SESSION['editfacsem'] ;
    $dep =$_SESSION['editfacf'] ;
     $code= $_SESSION['editfacc'];
    $sql = "SELECT * FROM `subject` WHERE subject_code='$code' and sem='$sem' and field='$dep'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
       
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
  

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
    
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
         <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i>Edit subjectfaculty</h2>
         </center>
         <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
        <form id="demo-form2" action=""  method="post" data-parsley-validate class="form-horizontal form-label-left">


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
                      <input type="text" value="<?php echo  $row["subject_name"];?>" name="sname" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Faculty id<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['fid'];?>" name="fid" class="form-control" required />
                      </div>
</div>



<!-- subject -->
 


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="edit" class="btn btn-success">Edit</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

      
