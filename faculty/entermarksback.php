<?php
include 'connection.php';
    if(isset($_POST['submit']))
    {
        $count=$_POST['count'];
        $sem =$_POST['sem'];
        $dep=$_POST['dep'];
        $code=$_POST['code'];
        $date=$_POST['date'];
        $exam =$_POST['exam'];
        $tmarks = $_POST['tmarks'];
        $pamrks = $_POST['pmarks'];
        for($i=0; $i < $count; $i++)
        {
            $id=$_POST['sid'][$i];
            $sql1="SELECT `number`, `id`, `subject_code`, `exam`, `examdate`, `marks`, `is_enter` FROM `student_marks` WHERE id='$id' and subject_code='$code' and exam='$exam' and examdate='$date'";
            $result1=mysqli_query($conn,$sql1);
            $num =mysqli_num_rows($result1);
            $cyear=date("Y");

            //the student marks has been added or the blank space is there if no then go to if part else else aprt
            if($num==0)
            {
                if($exam=='mid' || $exam=='final' || $exam=='viva' || $exam=='internal')
                {
                    $again=1;
                }
                else
                {
                    $again=0;
                }
            if(!("" == trim($_POST['smarks'][$i]) ))
            {
                $marks= $_POST['smarks'][$i];
                $sql="INSERT INTO `student_marks`( `id`,`sem`,`field`, `subject_code`, `exam`, `examdate`,`total_marks`, `marks`,`min_marks`,`cyear`, `is_enter`,`is_again`) VALUES ('$id','$sem','$dep','$code','$exam','$date','$tmarks','$marks','$pamrks','$cyear',1,'$again')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    echo "done";
                }
            }
            else{
            
                $sql="INSERT INTO `student_marks`( `id`,`sem`,`field`, `subject_code`, `exam`, `examdate`,`total_marks`, `min_marks`,`cyear`, `is_enter`) VALUES ('$id','$sem','$dep','$code','$exam','$date','$tmarks','$pamrks','$cyear',0)";
                $result=mysqli_query($conn,$sql);
              
                if($result)
                {
                    echo "not done";
                }
            }
        }
        else
        {
            if($exam=='mid' || $exam=='final' || $exam='viva' || $exam='internal')
                {
                    $again=1;
                }
                else
                {
                    $again=0;
                }
            if(!("" == trim($_POST['smarks'][$i]) ))
            {
                $marks= $_POST['smarks'][$i];
                $sql="UPDATE `student_marks` SET `cyear`='$cyear',`is_again`='$again',`marks`='$marks',`is_enter`=1 WHERE id='$id' and subject_code='$code' and exam='$exam' and examdate='$date'";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    echo "done";
                }
            }
            
        }
        }
      header('location:addresult.php');
    }


?>