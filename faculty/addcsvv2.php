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
<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';
  
?>
<?php
    if(isset($_POST['next']) && isset($_POST['field']) && isset($_POST['sem']))
    {
      
        $sem = $_POST['sem'];
        $dep = $_POST['field'];
       
        $sql = "SELECT `subject_code`, `subject_name`, `sem`, `field` FROM `subject` WHERE sem='$sem' AND field='$dep'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);    
?>
      <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
        <form id="demo-form2" action="addcsvback.php" method="post" enctype='multipart/form-data'  data-parsley-validate class="form-horizontal form-label-left">
        <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i>Select subject</h2>

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
<div class="form-group row">
<label class="col-sm-3 col-form-label"> type</label>
                      <div class="col-md-6 col-sm-6">
                      <select name="type" class="form-control" required>
                      <option value="60">Lacture</option>  
                      <option value="120">Lab</option>  
                      </select>  
    

                        
                     
                      </div>
</div>
<!-- sem -->


<div class="form-group row">
<label class="col-sm-3 col-form-label">Lacture date</label>
                      <div class="col-md-6 col-sm-6">
                    


                        <input type="date" name ="date" class="form-control" placeholder="dd/mm/yyyy"  required />
                     
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">upload csv file</label>
                      <div class="col-md-6 col-sm-6">
                    


                    
                        <input type="file"  name="spreadsheet"  class="form-control" class="file-upload-default">
                        
                     
                      </div>
</div>
<!-- subject --> 

<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="submit" class="btn btn-primary">Enter</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
    <?php } ?>
    <!-- insert data into table php code -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
