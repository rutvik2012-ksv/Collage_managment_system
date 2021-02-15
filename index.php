
<?php
        include 'admin/connection.php';
        $loggedin = false;
        $showalert = false;
    $message = "";
    $done = false;
        if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
                $email = $_POST['email'];
                $password = $_POST['pwd'];
                
                $sql = "SELECT * FROM `authentication` where email='$email' and  `password`='$password'";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);
                if($num==1)
                {
                $id = $row['id'];
                $email = $row['email'];
                $admin = $row['is_admin'];
                $faculty = $row['is_faculty'];
                $student = $row['is_student'];
               
                }
                $num = mysqli_num_rows($result);
                if($num == 1)
                {
                        $loggedin = true;
                        session_start();
                        $_SESSION['loggedin'] = $loggedin;
                        $_SESSION['id'] = $id ;
                        $_SESSION['email'] = $email;
                        
                        if($admin == 1)
                        {
                                echo"done";
                                header('location:admin/home.php');
                        }
                        if($faculty == 1)
                        {
                                header('location:faculty/home.php');
                        }
                        if($student == 1)
                        {
                                header('location:student/home.php');
                        }
                } 
                else {
                  {
                    $showalert=true;
                    $message="Not correct password or email";
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

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<center>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
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
  
 
?>
            <!-- Nested Row within Card Body -->
            <div class="row">
           
              <div class="col-lg-6 "> <img src="vsitr.jpg" alt="" style="margin:100px 100px 90px 80px;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">VSITR LOGIN PAGE</h1>
                  </div>
                  <form action="" class="user" method="POST">
                    <div class="form-group">
                      <input type="email"  name ="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name  ="pwd" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="submit"   class="btn btn-primary btn-user btn-block"> login</button>
                     
                    
                    <hr>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgotpassword/forgotpassword.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  </center>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
