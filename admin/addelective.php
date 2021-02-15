<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';
  include 'connection.php';

?>
<?php
    if(isset($_POST['add']))
    {
        $elective = $_POST['elective'];
        $sem = $_POST['sem'];
        $field = $_POST['field'];
        // echo $sem;
        // echo $field;
        // echo $elective;
    }
?>
<?php
         $showalert = false;
         $done = false;
        if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
        $sem = $_POST['sem'];
        $dep = $_POST['field'];
        $elective = $_POST['elective'];
        $n1 = $_POST['n1'];
        $c1 = $_POST['c1'];
        
        
        if(!("" == trim($_POST['c1']) || "" == trim($_POST['n1'])))
        {
            $sql = "SELECT *  FROM `subject` WHERE subject_name='$n1' AND subject_code='$c1' AND sem='$sem' AND  field='$dep'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
           
            if($num == 1)
            {
               
              $showalert = true;
              $message = "The subject is already in our record!please check it out";
            }
            else
            {
            $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`,`elective`, `sem`, `field`) VALUES ('$c1','$n1','$elective','$sem','$dep')";
            $result =mysqli_query($conn,$sql);
            if($result)
            {
              
              $done = true;
              $message = "the subject is added!";
              ob_clean();
              header('location:elective.php');
              exit;

            }
            else{
              $showalert= true;
              $message = "We are facing some technical issues !please try again";
            }
            }
        }
      }

        // if(!("" == trim($_POST['c2']) || "" == trim($_POST['n2'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c2','$n2','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

        // if(!("" == trim($_POST['c3']) || "" == trim($_POST['n3'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c3','$n3','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

        // if(!("" == trim($_POST['c4']) || "" == trim($_POST['n4'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c4','$n4','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
       
        // }

        // if(!("" == trim($_POST['c5']) || "" == trim($_POST['n5'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c5','$n5','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

        // if(!("" == trim($_POST['c6']) || "" == trim($_POST['n6'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c6','$n6','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

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


   
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <center>
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i> Elective Subject</h2>
        <form id="demo-form2" action="addelectiveback.php" method="post" data-parsley-validate class="form-horizontal form-label-left">


<!-- department -->
<input type="hidden" name="elective" value="<?php echo $elective; ?>"/>
             <input type="hidden" name="sem" value="<?php echo $sem; ?>"/>
             <input type="hidden" name="field" value="<?php echo $field; ?>"/>
             
<div class="form-group row">
  <label for="middle-name" class="col-sm-3 col-form-label">Subject code: <span class="required">*</span></label>
  <div class="col-md-2 col-sm-2 ">
    <input id="middle-name" name="c1" class="form-control" placeholder="Subject code" type="text"  required="required" name="middle-name">
  </div>
  
</div>
<!-- subject -->
 <div class="form-group row">
  <label for="middle-name" class="col-sm-3 col-form-label">Subject name: <span class="required">*</span></label>
  <div class="col-md-6 col-sm-2 ">
    <input id="middle-name" name="n1" class="form-control" placeholder="Subject name" type="text"  required="required" name="middle-name">
  </div>
  
</div>






<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-5 offset-md-1">
    <button class="btn btn-primary" type="button">Cancel</button>
    <button class="btn btn-primary" type="reset">Reset</button>
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
  </div>
</div>

</form>
</div>
  </div>
</div>
</center>

 
      
    

          <!-- Content Row -->

     
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
