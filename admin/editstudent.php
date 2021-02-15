
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
    if(isset($_POST['edit_btn']))
    {
        include 'connection.php';
        $id = $_POST['id'];
        $sql = "SELECT * FROM `student_info` WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1)
        {
      
          $row = mysqli_fetch_array($result); 
          // echo$id;
           $newDate =date("d-m-Y",strtotime($row['dob']));
           $gender = $row['gender'];
           $name= $row['student_name'];
          $enr= $row['id'];
          $email = $row['student_email'];
          $dep=$row['department'];
           $newDate = (new DateTime($row['dob']))->format('Y-m-d');
           $ad2=$row['address2'];
           $ad1=$row['address1'];
        }
    }
    else{
        echo"no";
    }
?>
      <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?php echo $name;?></h4>
              <form class="form-sample" action="editedstudent.php" method="POST" enctype='multipart/form-data'>
                <p class="card-description"> Personal info </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ENR NUM</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $enr;?>" name="enr_num" class="form-control"  />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Adress</label>
                      <div class="col-sm-9">
                        <input type="email"   value="<?php echo $email;?>" name ="email" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $name;?>"  name="name" class="form-control"  />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                      <div class="col-sm-9">
                      
                        <input type="date" name ="date" value="<?php echo $newDate;?>"  class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department</label>
                      <div class="col-sm-9">
                        <select name="field" class="form-control" required>
                          <option value="computer" <?php if($dep=="computer") echo 'selected="selected"'; ?>>Computer</option>
                          <option value="computer science" <?php if($dep=="computer science") echo 'selected="selected"'; ?>>Computer Science</option>
                          <option value="it" <?php if($dep=="it") echo 'selected="selected"'; ?>>IT</option>
                          <option value="mechanical" <?php if($dep=="mechanical") echo 'selected="selected"'; ?>>Mechanical</option>
                          <option value="civil" <?php if($dep=="civil") echo 'selected="selected"'; ?>>Civil</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" required>Gender</label>
                      <div class="col-sm-4">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" <?php if (($gender)=='male' ) echo "checked='checked'"; ?>     value="male" > Male </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender"  <?php if (($gender)=='female' ) echo "checked='checked'"; ?> value="female"> Female </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">sem</label>
                      <div class="col-sm-9">
                        <select name ="sem" class="form-control">
                          <option value="1"  <?php if($row['sem']=="1") echo 'selected="selected"'; ?>>sem1</option>
                          <option value="2" <?php if($row['sem']=="2") echo 'selected="selected"'; ?>>sem2</option>
                          <option value="3" <?php if($row['sem']=="3") echo 'selected="selected"'; ?>>sem3</option>
                          <option value="4" <?php if($row['sem']=="4") echo 'selected="selected"'; ?>>sem4</option>
                          <option value="5" <?php if($row['sem']=="5") echo 'selected="selected"'; ?>>sem5</option>
                          <option value="6" <?php if($row['sem']=="6") echo 'selected="selected"'; ?>>sem6</option>
                          <option value="7" <?php if($row['sem']=="7") echo 'selected="selected"'; ?>>sem7</option>
                          <option value="8" <?php if($row['sem']=="8") echo 'selected="selected"'; ?>>sem8</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">student</label>
                      <div class="col-sm-4">
                        <div class="form-radio">
                          <label class="form-check-label" >
                            <input type="radio" class="form-check-input"  name="fees" id="membershipRadios1"  <?php if (($row['fee_type'])=='TFWS' ) echo "checked='checked'"; ?> value="TFWS" > TFWS </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-radio">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="fees" id="membershipRadios2"   <?php if (($row['fee_type'])=='Paid' ) echo "checked='checked'"; ?> value="Paid"> PAID</label>
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
                        <input type="text" value="<?php echo $row['mobile_no'];?>"  name="m_no" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mentor</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $row['mentor'];?>"  name="mentor" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- <p class="card-description"> Address </p> -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 1</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $ad1;?>"  name="address1" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">State</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $row['state'];?>"   name="state" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 2</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $ad2;?>"  name="address2" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $row['city'];?>"  name="city" class="form-control" required />
                      </div>
                    </div>
                  </div>
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
                           <button type="submit" name="submit"  class="btn btn-success mr-2">EDIT</button>
                          <button class="btn btn-light">Cancel</button>
                          </center>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>    <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
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