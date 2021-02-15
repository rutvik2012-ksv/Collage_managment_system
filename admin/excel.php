<?php
    $query=$_POST['query'];
    include 'connection.php';
    $result= mysqli_query($conn,$query);

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=excel.com.xls");


?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
          <th>student id</th>
        <th>email</th>
            <th>Name</th>

            <th>Mobile_no</th>
            <th>Department</th>
            
          </tr>
        </thead>
        <tfoot>
        <tr>
            
     
          </tr>
        </tfoot>
        <tbody>
        <?php
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>

          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['student_email'] ?></td>
            <td><?php echo $row['student_name'] ?></td>
            <td><?php echo $row['mobile_no'] ?></td>
            <td><?php echo $row['department'] ?></td>
            
      
          </tr>
         <?php
         }
        }
      
        ?>
        </tbody>
      </table>