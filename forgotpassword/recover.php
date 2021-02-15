<?php
include '../admin/connection.php';
echo "yess";
    if(isset($_POST['submit']))
    {
        echo "yessss";
        $email=$_POST['email'];
        $sql="SELECT `id`, `email`, `password`, `is_admin`, `is_faculty`, `is_student` FROM `authentication` WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
        $token=$row['id'];
       
        if($num>0)
        {
            // Please specify your Mail Server - Example: mail.example.com.
            echo "yesss";
            
            // Please specify the return address to use

            $to_email = $email;
            $subject = "Reset Your Password -VSITR";
            $body = " Hey,You have requested for the reset password link here it is the link for update your password http://localhost/ppp/forgotpassword/resetpassword.php?token=".$token."";
            $headers = "From: rutvikkachhadiya36@gmail.com";
            
            if (mail($to_email, $subject, $body, $headers)) {
                echo "nooo";
                echo "Email successfully sent to $to_email...";
                header('location:../');
            }
            else 
            {
                echo"no";
            }
        }   
    else {
        ECHO "NOOO";
    }
    }
?>