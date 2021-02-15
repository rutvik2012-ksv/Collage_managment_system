<?php
        include 'session.php';
        include 'connection.php';
        if(isset($_POST['submit']))
        {
            $email= $_POST['email'];
            $name = $_POST['name'];
            $date =  $_POST['date'];
            
            $field = $_POST['field'];
            $gender = $_POST['gender'];
            $sem = $_POST['sem'];
            $fees= $_POST['fees'];
            $state = $_POST['state'];
            $address1 = $_POST['address1'];
            $address2= $_POST['address2'];
            $enr_num = $_POST['enr_num'];
            $city = $_POST['city'];
            $country= $_POST['country'];
            $men = $_POST['mentor'];
            $mno = $_POST['m_no'];
            
           
            $sql = "UPDATE `student_info` SET `student_name`='$name',`student_email`='$email',`department`='$field' ,`sem`='$sem',`gender`='$gender',`dob`='$date',`mentor`= '$men',`mobile_no`='$mno',`address1`='$address1 ',`address2`=' $address2',`city`= '$city',`state`= '$state',`country`='$country',`fee_type`='$fees' WHERE `student_info`.`id` = '$enr_num'";
            $result = mysqli_query($conn,$sql);
           
            if($result)
            {
                echo"done";
                header('location:studentlist.php');
            }
        }

?>
