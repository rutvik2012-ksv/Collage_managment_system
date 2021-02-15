
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Collage managment system</title>
  

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
 

</head>
<?php
  include 'session.php';
  include 'sidebar.php';
  include 'navbar.php';
  include 'connection.php';

  
?>
<?php
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM `requests` WHERE `user_id`='$id' ORDER BY id DESC";
       $result=mysqli_query($conn,$sql);
           
          $counter =1;
  
?>
<body>
    

<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Request panel</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">my requests
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Request for</th>
      <th scope="col">time</th>
      <th scope="col">status</th>
      <th scope="col">Decline reason</th>

    </tr>
  </thead>
  <tbody>
  <?php
        
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_array($result))
          {
            $newDate = (new DateTime($row['time']))->format('d-m-Y');
            $new = $row['is_aprooved'];
        ?>
         <?php  if(is_null($new))
        {?>
    <tr class="table-light">
    <th scope="row"><?php echo $counter;  $counter=$counter+1;?></th>
      <td><?php echo $row['certificate_type'];?></td>
      <td><?php echo $newDate;?></td>
      <td>pending</td>
      <td><?php echo $row['message'];?></td>
    </tr>
        <?php }?>
        <?php if($new=='1')
        {?>
    <tr class="table-success">
    <th scope="row"><?php echo $counter;  $counter=$counter+1;?></th>
      <td><?php echo $row['certificate_type'];?></td>
      <td><?php echo $newDate;?></td>
      <td><?php echo "Aprooved";?></td>
      <td><?php echo $row['message'];?></td>
    </tr>
        <?php }?>
        <?php  if($new=='0')
        {?>
    <tr class="table-danger">
      <th scope="row"><?php echo $counter;
      $counter=$counter+1;?></th>
      <td><?php echo $row['certificate_type'];?></td>
      <td><?php echo $newDate;?></td>
      <td>Rejected</td>
      <td><?php echo $row['message'];?></td>
    </tr>
        <?php }?>
        
        <?php  if($row['is_aprooved']=NULL)
        {?>
    <tr class="table-light">
    <th scope="row"><?php echo $counter;  $counter=$counter+1;?></th>>
      <td><?php echo $row['certificate_type'];?></td>
      <td><?php echo $newDate;?></td>
      <td>pending</td>
      <td><?php echo $row['message'];?></td>
    </tr>
        <?php }?>
   
   
    <?php
         }
        
      }
        ?>
  </tbody>
</table>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div></body>
</html>