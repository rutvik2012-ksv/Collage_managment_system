<?php
    include 'connection.php';
    include 'session.php';
    if(isset($_POST['submit']))
    {
        $sem = $_POST['sem'];
        $dep = $_POST['dep'];
        $date = $_POST['date'];
        $code = $_POST['code'];
        $count =$_POST['count'];
        date_default_timezone_set("Asia/Kolkata");
        $cyear = date("Y");
        $cmonth= date("m");
       
        if($cmonth==1)
        {
            $ccmonth="january";
        }
        if($cmonth==2)
        {
            $ccmonth="February";
        }
        if($cmonth==3)
        {
            $ccmonth="March";
        }
        if($cmonth==4)
        {
            $ccmonth="April";
        }
        if($cmonth==5)
        {
            $ccmonth="May";
        }
        if($cmonth==6)
        {
            $ccmonth="june";
        }
        if($cmonth==7)
        {
            $ccmonth="july";
        }
      
        if($cmonth==8)
        {
            $ccmonth="August";
        } 
        if($cmonth==9)
        {
            $ccmonth="September";
        }
        if($cmonth==10)
        {
            $ccmonth="October";
        }
        if($cmonth==11)
        {
            $ccmonth="November";
        }
        if($cmonth==12)
        {
            $ccmonth="December";
        }
        $sql0="SELECT * FROM `lactures` WHERE sem='$sem' and field='$dep' and cyear='$cyear' and subject_code='$code' and cmonth='$ccmonth'";
        $result0= mysqli_query($conn,$sql0);
       
        if(mysqli_num_rows($result0)==0)
        {
            $sql1="INSERT INTO `lactures`( `subject_code`, `lacture`, `sem`, `field`, `cyear`,`cmonth`) VALUES ('$code','1','$sem','$dep','$cyear','$ccmonth')";
            $result1=mysqli_query($conn,$sql1);
            if($result1)
            {
                echo "done";
            }

        }
        else
        {
            $row0 = mysqli_fetch_array($result0);
            $lec = $row0['lacture'];
            $lec = $lec+1;
            $sql1="UPDATE `lactures` SET `lacture`=2  WHERE sem='$sem' and field='$dep' and cyear='$cyear' and subject_code='$code' and cmonth='$ccmonth'";
            $result1=mysqli_query($conn,$sql1);
            if($result1)
            {
                echo "done";
            }
        }
        for($i=0; $i < $count; $i++)
        {
            $id = $_POST['id'][$i];
           if(isset($_POST['check'][$i]))
           {
               $sql="INSERT INTO `student_attendance`( `id`, `subject_code`, `sem`,`field`,`date`, `present`,`cyear`, `cmonth`) VALUES ('$id','$code','$sem','$dep','$date',1,'$cyear','$ccmonth')";
               $result=mysqli_query($conn,$sql);
           }
           else
           {
            $sql="INSERT INTO `student_attendance`( `id`, `subject_code`,`sem`,`field` ,`date`, `present`,`cyear`, `cmonth`) VALUES ('$id','$code','$sem','$dep','$date',0,'$cyear','$ccmonth')";
            $result=mysqli_query($conn,$sql);
           }
        }
        header('location:addattendance.php');

    }
?>