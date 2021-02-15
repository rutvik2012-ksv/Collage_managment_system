<?php
        include 'session.php';
        include 'connection.php';
        if(isset($_POST['submit']))
        {
            $email= $_POST['email'];
            $name = $_POST['name'];
            $date =  $_POST['date'];
            $id= $_POST['id'];
            $gender = $_POST['gender'];
        
            $state = $_POST['state'];
            $address1 = $_POST['address1'];
            $address2= $_POST['address2'];
       
            $city = $_POST['city'];
            $country= $_POST['country'];
            $dep = $_POST['field'];
            $mno = $_POST['m_no'];
           
            $sql = "UPDATE `faculty_info` SET `email`='$email',`name`='$name',`gender`='$gender',`department`='$dep',`dob`='$date',`ad1`='$address1',`ad2`='$address2',`mno`='$mno',`city`='$city',`state`='$state',`country`='$country'WHERE id='$id'";
            $result = mysqli_query($conn,$sql);
           
            if($result)
            {
                echo"done";
                header('location:facultylist.php');
            }
        }

?>