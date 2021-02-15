<?php
        include 'connection.php';
        include 'links.php';
        if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
        $sem = $_POST['sem'];
        $dep = $_POST['field'];
        $c1 = $_POST['c1'];
        $n1 = $_POST['n1'];
        $c2 = $_POST['c2'];
        $n2 = $_POST['n2'];
        $c3 = $_POST['c3'];
        $n3 = $_POST['n3'];
        $c4 = $_POST['c4'];
        $n4 = $_POST['n4'];
        $c5 = $_POST['c5'];
        $n5 = $_POST['n5'];
        $c6 = $_POST['c6'];
        $n6 = $_POST['n6'];
        
        if(!("" == trim($_POST['c1']) || "" == trim($_POST['n1'])))
        {
            $sql = "SELECT *  FROM `subject` WHERE subject_name='$n1' AND subject_code='$c1' AND sem='$sem' AND  field='$dep'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
           
            if($num == 1)
            {
                echo ' <div class="alert alert-danger" role="alert">
               this subject is already in our record !please check it out
              </div>';   
                  header('location:addsubject.php');
                  exit;  
            }
            else
            {
            $sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `sem`, `field`) VALUES ('$c1','$n1','$sem','$dep')";
            $result =mysqli_query($conn,$sql);
            if($result)
            {
              echo ' <div class="alert alert-success" role="alert">
               this subject is  notalready in our record !please check it out
              </div>';
              header('location:addsubject.php');
              exit; 

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