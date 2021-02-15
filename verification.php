<?php
        include 'admin/connection.php';
        $loggedin = false;
        if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
                $email = $_POST['email'];
                $password = $_POST['pwd'];
                echo $email;
                echo $password;
                $sql = "SELECT * FROM `authentication` where email='$email' and  `password`='$password'";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);
                $id = $row['id'];
                $email = $row['email'];
                $admin = $row['is_admin'];
                $faculty = $row['is_faculty'];
                $student = $row['is_student'];
               
                echo $id;
                $num = mysqli_num_rows($result);
                if($num == 1)
                {
                        $loggedin = true;
                        session_start();
                        $_SESSION['loggedin'] = $loggedin;
                        $_SESSION['id'] = $id ;
                        $_SESSION['email'] = $email;
                        
                        if($admin == 1)
                        {
                                echo"done";
                                header('location:admin/home.php');
                        }
                        if($faculty == 1)
                        {
                                header('location:faculty/home.php');
                        }
                        if($student == 1)
                        {
                                header('location:student/home.php');
                        }
                } 
        }
 ?>