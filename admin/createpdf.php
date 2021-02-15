<?php
include 'connection.php';
    if(isset($_POST['accept']))
    {
            
        $setid= $_POST['id'];
        $sql1 = "UPDATE `requests` SET `is_aprooved`=1 WHERE id='$setid'";
        $result1=mysqli_query($conn,$sql1);

        $sql2="SELECT * FROM `requests` WHERE id='$setid'";
        $result2=mysqli_query($conn,$sql2);
        $row = mysqli_fetch_array($result2);
        $setid = $row['user_id'];


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
        $g="Mr.";
      }
      else
      {
        $g="Ms.";
      }
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
     $data .='<div class="container" style="margin-left: 30px;margin-right: 30px;">';

       $data .= '<img src="images/download.png" alt="no">';
     
      $data .='<hr style="background-color: black;">';
       $data .=' <div class="row">';

    $data.='   <div class="col-sm-3" style="float: left;"><b>SrNo: ';
    $data.=$row['user_id'];
    $data.='</b></div>';
     
     $data.='  <div class="col-sm-3" style="float: right;"><b>Date:</b>'.$ApprovedDate.'</div>
   </div>';
   $data .='</div><br>
   ';
   $data .=' <div style="text-align: center; font-style:Wide Latin;font-weight: bolder;  " class="col-sm-12">
   <h2><u>BONAFIDE CERTIFICATE</u> </h2>    
</div> <br><br>';

     $data .='<div class="col-sm-12" style="font-size: 20px; text-indent: 100px; text-align: justify; font-style: Wide Latin;line-height: 200%;">
     This is to certify that '.$g.'<u>'.$name.'</u> enrollment no <u>'.$id.'</u> is a bonafide student of <u>BE</u> semester <u>'.$row['sem'].'</u> of <u>'.$row['department'].'</u> Department, Vidush somany institue of technology and research,kadi,Mahesana during the academic year <u>'.$pyear.'-'.$cyear.'</u>
  ';

  $data .=' <div class="row" style="float: left;">
  <div class="col-sm-9"></div>
  <div style="text-align: right; font-weight: bold; font-size: 16px;">
  <div class="col-sm-3"><img src="images/nn.jpeg" alt="no"  width="100" height="100"><br><b>Principal</b><br>VSITR KADI<br>
</div> </div>';
//   $data .='
//   <div style="font-weight: bold; font-size: 18px;"><b>Principal</b></div></div>
//   <div style="margin-left: 400px;">
//   <div style="font-size: 18px;">VSITR KADI</div>
// </div>';
  $data .='</div>';
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