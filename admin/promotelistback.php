<?php
include 'connection.php';
    if(isset($_POST['submit']))
    {
        $sem = $_POST['sem'];
        
        $sem = $sem +1;
        foreach($_POST['check'] as $value)
        {
            $sql="UPDATE `student_info` SET `sem`='$sem' WHERE id='$value'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "done";
            }
        }
        header('location:promoteform.php');
    }
    if(isset($_POST['demote']))
    {
        $sem = $_POST['sem'];
        
        $sem = $sem - 1;
        foreach($_POST['check'] as $value)
        {
            $sql="UPDATE `student_info` SET `sem`='$sem' WHERE id='$value'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "done";
            }
        }
        header('location:demoteform.php');
    }

?>