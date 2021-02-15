
<?php
    include 'connection.php';
    $showalert = false;
    $message = "";
    $done = false;
    if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $email= $_POST['email'];
        $name = $_POST['name'];
        $date =  $_POST['date'];
        
        $gender = $_POST['gender'];
    
        $state = $_POST['state'];
        $address1 = $_POST['address1'];
        $address2= $_POST['address2'];
   
        $city = $_POST['city'];
        $country= $_POST['country'];
        $dep = $_POST['field'];
        if($dep=='computer')
            $field ="CE";
         if($dep=='computer science')
          $field ="CSE";
         if($dep=='it')
          $field = "IT";
         if($dep=='mechanical')
         $field="ME";
         if($dep=='civil')
         $field ="CI";
        $mno = $_POST['m_no'];
        $jyear =date("Y");
        

      // to print the information and get idea what is name and tmp name
              //print_r($photo);
        $sql =" SELECT * FROM `faculty_info` WHERE email='$email'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        $sql1 =" SELECT * FROM `faculty_info` WHERE department='$dep'";
        $result1 = mysqli_query($conn,$sql1);
        $num1 = mysqli_num_rows($result1);
        $counter = $num1 +1;
      $enr_num = $jyear.$field.$counter;
        if($num == 1)
        {
           $message = "faculty is already in our record please check email or enr_num to verify";
          $showalert = true;
        }
        else{
            // name of folder in which we will store data
       
        
        //insert query
        $sql = "INSERT INTO `faculty_info`(`id`, `email`, `name`, `gender`, `department`, `dob`, `ad1`, `ad2`, `mno`, `city`, `state`, `country`,`jyear`) VALUES('$enr_num','$email', '$name','$gender','$dep','$date','$address1','$address2','$mno','$city', '$state', '$country','$jyear')";
        //execute query
        $result =mysqli_query($conn,$sql);
        $sql2 = "INSERT INTO `authentication`(`id`,`email`,`is_admin`, `is_faculty`, `is_student`) VALUES ('$enr_num','$email',0,1,0)";
        $result2 = mysqli_query($conn,$sql2);
        if($result && $result2)
        {
            $done = true;
            $message = "the faculty record has been entered in our record" ;        
        }
        else{
            $showalert=true;
            $message = "Due to some technical error we can not add dada!please try again";
            
        }
        
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
  

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>

 
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

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
       
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
         <center>   <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i> New Faculty</h2> </center>
              
              <form class="form-sample" action="" method="POST" enctype='multipart/form-data'>
                <p class="card-description"> Personal info </p>
                <div class="row">
               <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Adress</label>
                      <div class="col-sm-9">
                        <input type="email" name ="email" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="address1" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                      <div class="col-sm-9">
                        <input type="date" name ="date" class="form-control" placeholder="dd/mm/yyyy"  required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="address2" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" required>Gender</label>
                      <div class="col-sm-4">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="male"  > Male </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="female"> Female </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mobile no</label>
                      <div class="col-sm-9">
                        <input type="text" name="m_no" class="form-control" />
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department</label>
                      <div class="col-sm-9">
                        <select name="field" class="form-control" required>
                          <option value="computer">Computer</option>
                          <option value="computer science">Computer Science</option>
                          <option value="it">IT</option>
                          <option value="mechanical">Mechanical</option>
                          <option value="civil">Civil</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                        <input type="text" name="city" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">State</label>
                      <div class="col-sm-9">
                        <input type="text" name="state" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- <p class="card-description"> Address </p> -->
                
                <div class="row">
                
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                        <select name="country" class="form-control" required>
                          <option value="india">india</option>
                          <option value="italy">Italy</option>
                          <option value="russia">Russia</option>
                          <option value="britian">Britain</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <center> 
                           <button type="submit" name="submit"  class="btn btn-success mr-2">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                          </center>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
