<?php
  include 'session.php';
?>
<?php
include 'sidebar.php';
include 'navbar.php';
?>
<?php
    include 'connection.php';
    include '../Classes/PHPExcel/IOFactory.php';
   //Check valid spreadsheet has been uploaded
if(isset($_FILES['spreadsheet'])){
    if($_FILES['spreadsheet']['tmp_name']){
    if(!$_FILES['spreadsheet']['error'])
    {
    
        $inputFile = $_FILES['spreadsheet']['tmp_name'];
        $extension = strtoupper(explode(".", $_FILES['spreadsheet']['name'])[1]);
        if($extension == 'XLSX' || $extension == 'xls'){
    
            //Read spreadsheeet workbook
            try {
                 $inputFileType = PHPExcel_IOFactory::identify($inputFile);
                 $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                     $objPHPExcel = $objReader->load($inputFile);
            } catch(Exception $e) {
                    die($e->getMessage());
            }
    
            //Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            //start outter loop
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
            {
             $highestRow = $worksheet->getHighestRow();
            //Loop through each row of the worksheet in turn
            for ($row = 1; $row <= $highestRow; $row++)
            {   
                    //  Read a row of data into an array
                    $enr_num = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                    $name =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                    $email=  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                    $field = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $sem =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                    $gender =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                    $date =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                    $date = str_replace('/', '-', $date);
                    $date =  date("Y-m-d", strtotime($date));
                    $men =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                    $mno =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                    $address1 =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
                    $address2=  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                    $city =  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
                    $state = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
                    $country=  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
                    $fees=  mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
            }
                                




                    //verifing data
                    $sql =" SELECT * FROM `student_info` WHERE id='$enr_num'";
                    $result = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);
                 
                    if($num == 1)
                    {
                       $message = "student is already in our record please check email or enr_num to verify";
                      $showalert = true;
                    }
                    else{
                       //Insert into database
                        $sql = "INSERT INTO `student_info` (`id`, `student_name`,`student_email`, `department`, `sem`, `gender`, `dob`,  `mentor`, `mobile_no`, `address1`, `address2`, `city`, `state`, `country`, `fee_type`) VALUES ('$enr_num', '$name',  '$email', '$field', '$sem ', '$gender ',' $date','$men ','$mno',' $address1', '$address2', '$city', ' $state', ' $country', ' $fees')";
                        $result = mysqli_query($conn,$sql);
                        $sql2 = "INSERT INTO `authentication`(`id`, `email`, `is_admin`, `is_faculty`, `is_student`) VALUES ('$enr_num',' $email',0,0,1)";
                        $result2 = mysqli_query($conn,$sql2);
                    }
           //end of outter loop
        }
        }
        else{
          echo '<div class="alert alert-danger" role="alert">
          <strong>WARNING!</strong> please upload XLSX OR ODS FILE
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
    }
    else{ 
        
      echo '<div class="alert alert-danger" role="alert">
      <strong>WARNING!</strong> '.$_FILES['spreadsheet']['error'].'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
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

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add Student information</h1>

        </div>
         <div class="col-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student data</h4>
                    <form class="form-sample" action="" method="post" enctype='multipart/form-data' >
                      <p class="card-description"> Personal info </p>
                        <div class="form-group">
                        <label>Excel sheet upload</label>
                        <input type="file" name="spreadsheet" class="file-upload-default">
                        <div class="input-group col-xs-6">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Aadharcard ">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  value="submit" name="submit" class="btn btn-primary">Upload</button>
					  
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <a href="downloadexcel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> sample sheet</a>
</div>
    


  
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
<!--  -->