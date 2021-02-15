
 <?php
include 'connection.php';
include 'session.php';
    if(isset($_POST['generate']))
    {
            
        $setid= $_POST['id'];
      

        

    //pdf format

        $sql2="SELECT * FROM `student_info` WHERE id='$setid'";
        $result2=mysqli_query($conn,$sql2);
        $row = mysqli_fetch_array($result2);
        $name =$row['student_name'];
        $id =$row['id'];
        $filename = $id;
        $filename .="bonafide.pdf";
      if($row['gender']=='male')
      {
        $g="his";
      }
      else
      {
        $g="her";
      }
      $studentname=$row['student_name'];
      $adress = $row['address1'];
      $city = $row['city'];
      $state=$row['state'];
      $sem =$row['sem'];
      $id=$_SESSION['id'];
      $sql133="SELECT `id`, `email`, `name`, `gender`, `department`, `dob`, `ad1`, `ad2`, `mno`, `city`, `state`, `country`, `jyear` FROM `faculty_info` WHERE id='$id'";
      $result133=mysqli_query($conn,$sql133);
      $row133=mysqli_fetch_array($result133);
      $fname=$row133['name'];
      $femail = $row133['email'];
      $fno = $row133['mno'];

      $course = $row['department'];
     $ApprovedDate=date("d-m-Y");
     $pyear = date("Y");
     $cyear =date("Y") + 1;
     $data=' <style type="text/css">
     .table-bordered{
      border:1px solid black;
      width: 100%;   
       border-collapse: collapse;

     }
     td{
      border:1px solid black;
      padding: 5px;
     }
     
    }
   </style>';
   $ApprovedDate=date("d-m-Y");
   $pyear = date("Y");
   $cyear =date("Y") + 1;
   $data=' 
   <center>
   <div style="width: 500px;">
   <img src="../admin/images/download.png" alt="no"></div>  </center>
              
           <div class="row" style="float: left;">
           <div class="col-sm-9"></div>
           <div style="text-align: right; font-weight: bold; font-size: 13px;">
           <div class="col-sm-3"><b>Date:</b> '.$ApprovedDate.'
        </div> </div>
            
           <div class="row">
               <div class="col-sm-3">
               To,<br>'.$studentname.'<br>'.$adress.'
          <br>'.$city.',<br>'.$state.'<br> Dear Parents,
               </div>
               <div style="text-align:left; font-weight: bold; font-size: 13px;">
             <b>Subject:</b><u>Regarding less attendance in education</u> </div>   
           </div>   
           <div>
           Sir/Madam,
           </div>
           <div>';
   $data .='</div>
   ';
    $data .='<div class="col-sm-12" style="font-size: 15px; text-indent: 100px; text-align:left; font-style: Wide Latin;line-height: 200%;">
     Your ward '.$setid.' Enr no.<u>'.$setid.' </u>is studying at our institue in  sem  <u>'.$sem.'</u> in B.E.'.$course.' Engineering  and the academic semester has already commenced ,but ,'.$g.' attendance in the whole semester is not suffcient.With this letter,it is brought to your notice that if'.$g.' irregularity remains the same,We may be forced to take appropriate steps,regarding allowing '.$g.'in final examination as per university norms.you are informed personally contact the undersigned mentor,within 7 working days from the receipt of the letter.
  ';
  $data .='
 with best wishes and bright future of your ward.<br>Thank you. </div>
  </div>
  ';
  $data .=' <div class="row" style="float: left;">
  <div class="col-sm-9"></div>
  <div style="text-align: right; font-weight: bold; font-size: 16px;">
  <div class="col-sm-3"><b>Prof. '.$fname.'</b><br>Email:'.$femail.'<br>M:'.$fno.'<br>Class Councilar,Mentor.
</div> </div>';
 
        require_once("tcpdf_min/tcpdf.php");
        $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(370, 200), true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false);  
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('helvetica', '', 12);  
        $obj_pdf->AddPage();  
        $content = $data;
        $obj_pdf->writeHTML($content, true, false, true, false, '');  
        ob_clean();
        $obj_pdf->Output($filename, 'D');             
        ob_clean();
        header('location:requests.php');
        
    }

    if(isset($_POST['decline']))
    {
      $setid= $_POST['id'];
      $message=$_POST['message'];
        $sql1 = "UPDATE `requests` SET `is_aprooved`=0 ,`message`='$message' WHERE id='$setid'";
        $result1=mysqli_query($conn,$sql1); 
        header('location:requests.php');
    }
        
       
        
    
?>
