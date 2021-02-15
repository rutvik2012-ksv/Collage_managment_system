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
    if(isset($_POST['submit']) && isset($_FILES['file1']) && $_SERVER["REQUEST_METHOD"] == "POST")
      
       $id=$_SESSION['id'];
       $photo = $_FILES['file1'];
       $folder1 = "../student_data/";
       $sql =" SELECT * FROM `requests`";
       $result = mysqli_query($conn,$sql);
       $num = mysqli_num_rows($result);
       $counter = $num +1;
       $feere ="bonafide_fee_recipt_";
       $exe = ".pdf";
        $filename1 = $id.$feere.$counter.$exe;
        $tempname = $photo['tmp_name'];

        //giving path to the store data
        $folder1 = "../student_data/". $filename1;  
        
        // to upload file in folder
        move_uploaded_file($tempname,$folder1);

        $photo = $_FILES['file2'];
       $folder2 = "../student_data/";
       $sql =" SELECT * FROM `requests`";
       $result = mysqli_query($conn,$sql);
       $num = mysqli_num_rows($result);
       $counter = $num +1;
       $feere ="bonafide__id_card_";
       $exe = ".pdf";
        $filename2 = $id.$feere.$counter.$exe;
        $tempname = $photo['tmp_name'];

        //giving path to the store data
        $folder2 = "../student_data/". $filename2;  
        
        // to upload file in folder
        move_uploaded_file($tempname,$folder2);

        $_SESSION['document1'] = $folder1;
        $_SESSION['document2'] = $folder2;

        $sql = "SELECT * FROM `student_info` WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);    
?>

      <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
        <form id="demo-form2" action="bcertiii.php" method="post" data-parsley-validate class="form-horizontal form-label-left">
        <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i>Verify Details</h2>

<div class="form-group row">
<label class="col-sm-3 col-form-label">enrollment number<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $id;?>" name="id" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Name<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['student_name'];?>" name="dep" class="form-control" required />
                      </div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">email<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['student_email'];?>" name="dep" class="form-control" required />
                      </div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">Sem<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['sem'];?>" name="dep" class="form-control" required />
                      </div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Department<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['department'];?>" name="dep" class="form-control" required />
                      </div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">Address<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['address1'];?>" name="dep" class="form-control" required />
                      </div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">Mobile_no<span class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                      <input type="text" value="<?php echo $row['mobile_no'];?>" name="dep" class="form-control" required />
                      </div>
</div>
<!-- department -->



<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-5">
    
    <button type="submit" name="done" class="btn btn-primary">Done</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>
    
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
