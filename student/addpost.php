
<?php
        include 'connection.php';
        if(isset($_POST['submit']) && isset($_FILES['photo']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
            session_start();
            $id = $_SESSION['id'];
            
            $sql = "SELECT `admin_name` FROM admin_info WHERE id='$id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $name= $row['admin_name'];
            
            $photo = $_FILES['photo'];
            $mes = $_POST['desc'];
            date_default_timezone_set('Asia/Kolkata');
            $date =  date('Y-m-d H:i:s');
            $folder = "../post/admin_post/";

            $filename = $photo['name'];
            $tempname = $photo['tmp_name'];
    
            //giving path to the store data
            $folder = "../post/admin_post/". $filename;  
            
            // to upload file in folder
            move_uploaded_file($tempname,$folder);
            $sql = "INSERT INTO `post`( `user_id`, `post_name`, `post_photo`, `post_msg`, `post_time`, `admin_post`, `faculty_post`) VALUES ( '$id', '$name', '$folder','$mes' ,'$date' ,'1','0')";
            //execute query
            $result =mysqli_query($conn,$sql);
            if($result)
            {
              header('location:home.php');
                exit;
            }
          
             
        
        }
?>