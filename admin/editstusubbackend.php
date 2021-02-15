<?php 
include 'connection.php';
    if(isset($_POST['edit']))
    {
        $sem = $_POST['sem'];
        $dep=$_POST['field'];
        $id= $_POST['id'];
        $elective1="";
        $elective2="";
        $elective3="";
        $elective4="";
        $elective5="";
        $elective6="";
        echo $sem;
        echo $dep;
    echo $id;
       if(isset($_POST['elective1']))
       {
           $elective1 = $_POST['elective1'];
       }
       if(isset($_POST['elective2']))
       {
           $elective2 = $_POST['elective2'];
       }
       if(isset($_POST['elective3']))
       {
           $elective3 = $_POST['elective3'];
       }
       if(isset($_POST['elective4']))
       {
           $elective4 = $_POST['elective4'];
       }
       if(isset($_POST['elective5']))
       {
           $elective5 = $_POST['elective5'];
       }
       if(isset($_POST['elective6']))
       {
           $elective6 = $_POST['elective6'];
       }
        $sql="UPDATE `student_subject` SET `sub1`='$elective1',`sub2`='$elective2',`sub3`='$elective3',`sub4`='$elective4',`sub5`='$elective5',`sub6`='$elective6' WHERE id='$id' and sem='$sem' and field='$dep'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header('location:editstudentsubject.php');
        }

    }
?>