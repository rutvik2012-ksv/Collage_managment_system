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
    if(isset($_POST['submit']))
       {
        $rid=$_POST['id'];
        $_SESSION['neededid'] = $rid;
        $sql1 = "SELECT * FROM `requests` WHERE id='$rid'";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($result1);  
        $id=$row1['user_id']; 
       }
       if(isset($_SESSION['neededid']))
       {
        $rid= $_SESSION['neededid'] ;
        $sql1 = "SELECT * FROM `requests` WHERE id='$rid'";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($result1);  
        $id=$row1['user_id'];    
       }

        

        $sql = "SELECT * FROM `student_info` WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result); 
        $img="<a target='_blank' href='".$row1['document1']."'>Aadhar card </a> ";  
        $img2="<a target='_blank' href='".$row1['document2']."'>id card </a> ";
?>

      <h2 class="card-title" class="fab fa-accusoft"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-accusoft"></i>verify information</h2>
      <center>  <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
        
        
        <table class="table table-sm">
  <thead>
   
  </thead>
  <tbody>
    <tr>
    
      <th scope="row">Enrollment number</th>
      <td colspan="10"><?php echo $id?></td>
     
     
    </tr>
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $row['student_name'];?></td>
      
    </tr>
    <tr>
      <th scope="row">email</th>
      <td><?php echo $row['student_email'];?></td>
      
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $row['address1'];?></td>
      
    </tr>
    <tr>
      <th scope="row">sem</th>
      <td><?php echo $row['sem'];?></td>
      
    </tr>
    <tr>
      <th scope="row">Department</th>
      <td><?php echo $row['department'];?></td>
      
    </tr>
    <tr>
      <th scope="row">mobile_no</th>
      <td><?php echo $row['mobile_no'];?></td>
      
    </tr>
    <tr>
      <th scope="row">certificate</th>
      <td colspan="2"><?php echo $row1['certificate_type'];?></td>
      
    </tr>

    <tr>
      <th scope="row">Aadhar card</th>
      <td colspan="2"><?php echo $img;?></td>
      
    </tr>
    <tr>
      <th scope="row">id card</th>
      <td colspan="2"><?php echo $img2;?></td>
      
    </tr>
  </tbody>
</table>
<!-- department -->

<!-- 
<div class="row">
    <div class="col-sm-12 text-center">

                                                
 <form action="createpdf.php" method="post">     
 <input type="hidden" name="id" value="<?php echo $row1['id'] ?>" class="homebutton" />                                
 
    <button type="submit" name="accept"  class="btn btn-success btn-md center-block" onclick="if (!confirm('Are you sure?')) { return false }"><span>Accept</span></button>  
         
         </form> 
     </div>
</div>
 
<button id="btnClear" name="decline" class="btn btn-danger btn-md center-block" Style="width: 100px;" OnClick="btnClear_Click" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Decline</button> -->
<form action="createpdf.php" method="post" style="display:inline-block;">
             <input type="hidden" name="id" value="<?php echo $row1['id'] ?>"/>
             
             <input type="submit" name="accept" value="Accept" class="btn btn-success btn-md center-block" onclick="if (!confirm('Are you sure?')) { return false }"/>
            </form>


            <input type="hidden" name="id" value="<?php echo $row1['id'] ?>"/>
             <input type="submit" name="decline" value="Decline" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-danger btn-md center-block"/>
           
</div>
  </div>
</div>
</center>
<script>
function myFunction() {
  confirm("are you sure!");
}
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="exampleModalLabel">Decline Reason</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
<!-- form start -->
        <form action="createpdf.php" method ="POST"> 
        <input type="hidden" name="id" value="<?php echo $row1['id'] ?>"/>
            
          <div class="form-group">
            <label for="message-text" class="control-label">Reason:</label>
            <textarea class="form-control" name="message" id="message-text"></textarea>
          </div>
           <div class="modal-footer">
          
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  value="submit" name="decline" class="btn btn-danger btn-md center-block">Send</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
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
