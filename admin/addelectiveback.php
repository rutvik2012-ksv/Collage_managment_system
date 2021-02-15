<?php
         $showalert = false;
         $done = false;
         include 'connection.php';
        if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
        $sem = $_POST['sem'];
        $dep = $_POST['field'];
        $elective = $_POST['elective'];
        $n1 = $_POST['n1'];
        $c1 = $_POST['c1'];
        
        
        if(!("" == trim($_POST['c1']) || "" == trim($_POST['n1'])))
        {
            $sql = "SELECT *  FROM `subject` WHERE subject_name='$n1' AND subject_code='$c1' AND sem='$sem' AND  field='$dep'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
           
            if($num == 1)
            {
               
              $showalert = true;
              $message = "The subject is already in our record!please check it out";
            }
            else
            {
            $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`,`elective`, `sem`, `field`) VALUES ('$c1','$n1','$elective','$sem','$dep')";
            $result =mysqli_query($conn,$sql);
            if($result)
            {
              
              $done = true;
              $message = "the subject is added!";
           
              header('location:elective.php');
              exit;

            }
            else{
              $showalert= true;
              $message = "We are facing some technical issues !please try again";
            }
            }
        }
      }

        // if(!("" == trim($_POST['c2']) || "" == trim($_POST['n2'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c2','$n2','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

        // if(!("" == trim($_POST['c3']) || "" == trim($_POST['n3'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c3','$n3','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

        // if(!("" == trim($_POST['c4']) || "" == trim($_POST['n4'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c4','$n4','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
       
        // }

        // if(!("" == trim($_POST['c5']) || "" == trim($_POST['n5'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c5','$n5','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

        // if(!("" == trim($_POST['c6']) || "" == trim($_POST['n6'])))
        // {
        //     $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c6','$n6','$sem','$dep')";
        //     $result =mysqli_query($conn,$sql);
        // }

?>