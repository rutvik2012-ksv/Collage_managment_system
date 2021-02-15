<?php
    include 'connection.php';
    if(isset($_POST['submit']) && isset($_FILES['photo']) && $_SERVER["REQUEST_METHOD"] == "POST")
    {
        $photo = $_FILES['photo'];
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
        $mno = $_POST['m_no'];
        $men = $_POST['mentor'];


      // to print the information and get idea what is name and tmp name
              //print_r($photo);
        $sql =" SELECT * FROM `student_info` WHERE id=$enr_num";
        $result = mysqli_query($sql);
        $num = mysqli_num_rows($result);
        if($num == 1)
        {
            session_start();
            $_SESSION['alert'] = "the student is already in our record !please check it out";
            
        }
        else{
            // name of folder in which we will store data
        $folder = "../student_photo/";

        $filename = $photo['name'];
        $tempname = $photo['tmp_name'];

        //giving path to the store data
        $folder = "../student_photo/". $filename;  
        
        // to upload file in folder
        move_uploaded_file($tempname,$folder);
        
        //insert query
        $sql = "INSERT INTO `student_info` (`id`, `student_name`, `photo`, `student_email`, `department`, `sem`, `gender`, `dob`, `mentor`, `mobile_no`, `address1`, `address2`, `city`, `state`, `country`, `fee_type`,) VALUES ('$enr_num', '$name', '$folder', ' $email', '$field', '$sem ', '$gender ',' $date','$men','$mno', ' $address1', '$address2', '$city', ' $state', ' $country', ' $fees')";
        //execute query
        $result =mysqli_query($conn,$sql);
        $sql2 = "INSERT INTO `authentication`(`id`, `email`, `is_admin`, `is_faculty`, `is_student`) VALUES ('$enr_num',' $email',0,0,1)";
        $result2 = mysqli_query($conn,$sql2);
        if($result && $result2)
        {
           
            header('location:studentlist.php');
            exit;
        }
        else{
            echo "no";
            header('location:addstudents.php');
        }
        
    }
   
        }
  
   
?>