<?php
include 'connection.php';
if(isset($_POST['delete']))
{
    $id= $_POST['id'];
    $sql="DELETE FROM `student_info` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $sql="DELETE FROM `authentication` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header('location:viewstudent.php');
    }
}
?>