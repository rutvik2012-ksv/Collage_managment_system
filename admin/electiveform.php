<?php
include 'connection.php';
  if(isset($_POST['enable']))
{
  $sem = $_POST['sem'];
  $sql1="UPDATE `elective_form` SET `status`=1 WHERE sem='$sem'";
  $result1 =mysqli_query($conn,$sql1);
}

if(isset($_POST['disable']))
{
  $sem = $_POST['sem'];
  $sql2="UPDATE `elective_form` SET `status`=0 WHERE sem='$sem'";
  $result2 =mysqli_query($conn,$sql2);
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
  $sql="SELECT * FROM `elective_form` ORDER BY sem";
  $result =mysqli_query($conn,$sql);
?>
<body>
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><b>Elective Form Status</b></h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">status
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">

<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Sem </th>
      <th scope="col">Current_Status</th>
      <th scope="col">Change_Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
        
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_array($result))
          {
           
        ?>
    <tr>
     
      <td><?php echo "sem".$row['sem'];?></td>
      <td
      ><?php if($row['status']==0)
      { ?> <p class="text-danger">disable</p>
      <?php }?>
      <?php
      if($row['status']==1)
      {
      ?>
        <p class="text-success">enable</p>
      <?php } ?>
        </td>
      <td>
      
      <?php if($row['status']==0)
      { ?>
      <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                <form action="" method="post" style="display:inline-block;">
             <input type="hidden" name="sem" value="<?php echo $row['sem']; ?>"/>
            
             <input type="submit" name="enable" value="enable" class="btn btn-success btn-md center-block" />
            </form>
                                                </li>

                                            </ul>
      <?php } ?>
      <?php if($row['status']==1)
      { ?>
      <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                <form action="" method="post" style="display:inline-block;">
            <input type="hidden" name="sem" value="<?php echo $row['sem']; ?>"/>
            
             <input type="submit" name="disable" value="disable" class="btn btn-danger btn-md center-block" />
            </form>
                                                </li>

                                            </ul>
      <?php } ?>
     
        </td>
      
      
      </td>
    </tr>
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

</div>
</body>
</html>