<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $sem =$_POST['sem'];
        $field = $_POST['field'];
        $id = $_POST['id'];
        $elective1="";
        $elective2="";
        $elective3="";
        $elective4="";
        $elective5="";
        $elective6="";
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
       echo $elective1;
    echo $elective2;
    echo $elective3;
    echo $elective4;
    echo $elective5;
    echo $elective6;
    $sql="INSERT INTO `student_subject`(`id`, `sem`, `field`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`) VALUES ('$id',
    '$sem','$field','$elective1','$elective2','$elective3','$elective4','$elective5','$elective6')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header('location:home.php');
        exit;
    }
    else
    {
        
        include '404.php';
    }
    }
    else{
        echo "no";
    }
    
?>