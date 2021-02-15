<?php

include 'session.php';
include 'connection.php';
if(isset($_POST['edit']))
{
    $sem= $_POST['sem'];
    $dep = $_POST['dep'];
    $sid =  $_POST['sid'];
    $sname =$_POST['sname'];
    $fid = $_POST['fid'];
    $sql="SELECT `id`, `email`, `name`, `gender`, `department`, `dob`, `ad1`, `ad2`, `mno`, `city`, `state`, `country`, `jyear` FROM `faculty_info` WHERE id='$fid'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
    
   
    $sql = "UPDATE `subject` SET `fid`='$fid' WHERE sem='$sem' and field='$dep' and subject_code='$sid'";
    $result = mysqli_query($conn,$sql);
    }
    if($result)
    {
        echo"done";
        header('location:studentlist.php');
    }
}
?>