<?php
 include 'connection.php';
 if(isset($_POST['edit']))
 {
     $id=$_POST['id'];
     $emarks= $_POST['emarks'];
   $code = $_POST['code'];
   $sem = $_POST['sem'];
   $field = $_POST['field'];
   $exam = $_POST['exam'];
   $date= $_POST['examdate'];
   echo $id;
   echo $emarks;
   echo $code;
   echo $sem;
   echo $field;
   echo $exam;
   echo $date;
  $sql= "UPDATE `student_marks` SET `marks`='$emarks' WHERE sem='$sem' and field='$field' and exam='$exam' and id='$id'  and examdate='$date' and subject_code='$code'";
  $result =mysqli_query($conn,$sql);
  header('location:manageresult.php');
 }


?>