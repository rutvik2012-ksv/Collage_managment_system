<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';

  ?>
<?php
$showalert=false;
$done=false;
$message="";
    if(isset($_POST['edit_btn']))
    {
        include 'connection.php';
        $id = $_POST['id'];
       
        $sql = "SELECT * FROM `faculty_info` WHERE id='$id'";
        $result = mysqli_query($conn,$sql);
      
         
          $row = mysqli_fetch_array($result); 
          
           $newDate =date("d-m-Y",strtotime($row['dob']));
           $gender = $row['gender'];
          
           $newDate = (new DateTime($row['dob']))->format('Y-m-d');
        
    }
    else{
        echo"no";
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
         <center>   <h2 class="card-title" class="fab fa-accusoft"> <i class="fab fa-accusoft"></i> Edit Faculty</h2> </center>
              
              <form class="form-sample" action="editfacultyback.php" method="POST" enctype='multipart/form-data'>
                <p class="card-description"> Personal info </p>
                <div class="row">
               <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="<?php echo $row['name'];?>"class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Adress</label>
                      <div class="col-sm-9">
                        <input type="email" name ="email" value="<?php echo $row['email'];?>" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="address1" value="<?php echo $row['ad1'];?>" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                      <div class="col-sm-9">
                        <input type="date" name ="date" value="<?php echo $newDate;?>" class="form-control" placeholder="dd/mm/yyyy"  required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="address2" value="<?php echo $row['ad2'];?>" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" required>Gender</label>
                      <div class="col-sm-4">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="male"  <?php if (($gender)=='male' ) echo "checked='checked'"; ?>  > Male </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="female"  <?php if (($gender)=='female' ) echo "checked='checked'"; ?> > Female </label>
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
                        <input type="text" name="m_no" value="<?php echo $row['mno'];?>" class="form-control" />
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department</label>
                      <div class="col-sm-9">
                        <select name="field" class="form-control" required>
                          <option value="computer" <?php if($row['department']=="computer") echo 'selected="selected"'; ?>>Computer</option>
                          <option value="computer science"  <?php if($row['department']=="computer science") echo 'selected="selected"'; ?>>Computer Science</option>
                          <option value="it"  <?php if($row['department']=="it") echo 'selected="selected"'; ?>>IT</option>
                          <option value="mechanical" <?php if($row['department']=="mechanical") echo 'selected="selected"'; ?>>Mechanical</option>
                          <option value="civil" <?php if($row['department']=="civil") echo 'selected="selected"'; ?>>Civil</option>
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
                        <input type="text" name="city" value="<?php echo $row['city'];?>" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">State</label>
                      <div class="col-sm-9">
                        <input type="text" name="state" value="<?php echo $row['state'];?>" class="form-control" />
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
                  <input type="hidden" name="id" value="<?php echo $id; ?>" class="homebutton" />
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
