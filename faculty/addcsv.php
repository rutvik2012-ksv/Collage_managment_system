
<?php
  include 'session.php';
?>
<?php
include 'sidebar.php';
include 'navbar.php';
?>
<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
                    $filename=$_FILES['spreadsheet']['tmp_name'];
                    
                // Open uploaded CSV file with read-only mode
                $handle = fopen($filename, 'r');
                $handle1= fopen($filename,'r');
                $row = 1;
                  
                  $data = fgetcsv($handle, 1000, ",");
                  $data = fgetcsv($handle, 1000, ",");
                  $enrarray=array();
                  $timess = array();
                  $minutes = array();
                  $counter=0;
                   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
                   //begining of while
                   {
                    if(count($data)==2){
                      for ($c=0; $c < 2; $c++) 
                   //begining of four loop
                      {
                        if($c==0)
                        //if for enr 
                        {
                        $arr= explode('L',$data[$c]);
                        $enr=$arr[0];
                        $flag=false;
                            if(strlen($arr[0])==strlen($data[$c]))
                            {
                                $arr= explode("J",$data[$c]); 
                                $enr=$arr[0];
                                $flag=true;
                            } 
                            if (!in_array($enr, $enrarray))
                            {
                              $enrarray[$counter]=$enr;
                              $minutes[$counter]=0;
                              $counter=$counter+1;
                            } 
                         }
                         if($c==1)
                         {
                           $arr1= explode('P',$data[1]);
                           $time=$arr1[0];
                           if(strlen($arr1[0])==strlen($data[1]))
                            {
                                $arr1= explode("A",$data[1]); 
                                $time=$arr1[0];
                            } 
                            if($flag==true)
                            {
                              //join code
                              $dimension=0;
                              foreach($enrarray as $my => $values)
                              {
                                if($values==$enr)
                                {
                                  $timess[$dimension] = $time;
                                }
                                $dimension=$dimension+1;
                              }
                            }
                            else {
                              //left code
                              $dimension=0;
                              foreach($enrarray as $my => $values)
                              {
                                if($values==$enr)
                                {
                                  $lastjoin = $timess[$dimension];
                                  $currentrime = explode(":",$time);
                                  $currenthour1= $currentrime[0];
                                  $currentmin1 = $currentrime[1];
                               
                                  $lasttime= explode(":",$lastjoin);
                               
                                  $lasthour = $lasttime[0];
                                  $lastmin = $lasttime[1];
                                 
                                  
                                
                                  echo $lastmin;
                                 if($lasthour==$currenthour)
                                 {
                                      $attendmin = $lastmin - $currentmin;
                                     
                                      // echo $attendmin;
                                      $minutes[$dimension] = $minutes[$dimension] + $attendmin;
                                      echo "\n";
                                 }
                                 else {
                                    $beforehourmin = 60 - $lastmin;
                                    $afterhourmin = $currentmin;
                                    $attendmin = $beforehourmin + $afterhourmin;
                                    $minutes[$dimension] = $minutes[$dimension] + $attendmin;
                                 }
                                  
                                }
                                $dimension=$dimension+1;
                              }
                            }

                         }
                      
                      }
                    //   $arr333= explode('P',$data[1]);
                    //   $timestamp = $arr333[0];
                    //  $unique = uniqid();
                    //   $sql="INSERT INTO `csv`(`enr`, `timestamp`,`un`) VALUES ('$enr','$timestamp','$unique')";
                    //   $result=mysqli_query($conn,$sql);
                   }
                  
                  }
                  // print_r($timess);
                  // print_r($enrarray);
                  print_r($minutes);
                   fclose($handle);
                   
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
          <h1 class="h3 mb-4 text-gray-800">Add Student Attendance</h1>

        </div>
         <div class="col-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student data</h4>
                    <form class="form-sample" action="" method="post" enctype='multipart/form-data' >
                      <p class="card-description"> Attendance</p>
                        <div class="form-group">
                        <label>Csv file upload</label>
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
  <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="downloadexcel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> sample sheet</a>
</div> -->
    


  
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