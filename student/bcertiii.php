<?php
        include 'connection.php';
        include 'links.php';
        include 'session.php';
        $showalert = false;
        $done = false;
        if(isset($_POST['done']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
        $id = $_POST['id'];
        date_default_timezone_set("Asia/Kolkata");
        $doc1 = $_SESSION['document1'];
        $doc2 = $_SESSION['document2'];
        $date =   date('Y-m-d H:i:s');
        $sql = "INSERT INTO `requests`(`user_id`, `document1`, `document2`, `certificate_type`, `time`, `is_sent`) VALUES ('$id','$doc1','$doc2','bonafide','$date',1)";
         $result =mysqli_query($conn,$sql);
         $sql2="SELECT * FROM `student_info` WHERE id='$id'";
         $result2=mysqli_query($conn,$sql2);
         $row = mysqli_fetch_array($result2);
         $filename = $id;
         $filename .= "_bonafideapplication.pdf";
         $name = $row['student_name'];
         $Branch = $row['department'];
         $Sem = $row['sem'];
          $address=$row['address1'];
          $mno= $row['mobile_no'];
          $email = $row['student_email'];
            if($result)
            {
              
              $done = true;
              $ApprovedDate=date("d-m-Y");
              $pyear = date("Y");
              $cyear =date("Y") + 1;
              $data=' 
              <center>
              <div style="width: 500px;">
              <img src="../admin/images/download.png" alt="no"></div>  </center>
                    <div class="row"><div class="col-sm-12" style="text-align: center;font-size: 15px;"><b><u>Application For Bonafide Certificate</u></b></div></div>         
                      <div class="row" style="float: right;">
                      <div class="col-sm-9"></div>
                        <div class="col-sm-3"><b>Date:</b>'.$ApprovedDate.'</div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                          To,<br>
                          Principal,<br>
                          vidush somany institue of technology and research,<br>
                          kadi mehsana<br>
                          </div>
                           <div class="col-sm-5"></div>
                      </div>    
                      <div>
                        Respected Sir/Madam,
                      </div>
                      <div style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Subject:</b><u>Request to avail Bonafide Certificate</u>
                     </div>  
                      <div>';
              $data .=' <p style="    text-indent: 50px;">I, <b>'.$name.' </b> of <b>'.$Branch.'</b> , Semester <b>'.$Sem.'</b>request you to issue me Bonafide Certificate. My details are as under for your perusal.</p>
              </div>';
              $data .='<div class="certificatetable">

              <table  style=" text-align: left;
              border-spacing: 0;
              border: 0.1px solid black;
              margin: 20px auto;
              border-radius: .25rem;
            width: 100%;" border=1 frame=void rules=rows class="table">
                <tr>
                  <td colspan="1"><b>Enrollment No :</b></td>
                  <td colspan="3">'.$id.'</td>
                </tr>
                <tr>
                  <td colspan="1"><b>Name :</b></td>
                  <td colspan="3">'.$name.'</td>
                </tr>
                <tr>
                  <td><b>Course :</b></td>
                  <td>BE</td>
                  
                </tr>
                <tr>
                <td><b>Semester :</b></td>
                  <td>'.$Sem.'</td>
                </tr>
                <tr>
                  <td colspan="1"><b>Branch :</b></td>
                  <td colspan="3">'.$Branch.'</td>
                </tr>
                <tr>
                  <td colspan="1"><b>Address :</b></td>
                  <td colspan="3">'.$address.'</td>
                </tr>
                <tr>
                  <td  colspan="1"><b>Contact No  :</b></td>
                  <td colspan="3">'.$mno.'</td>
                  
                </tr>
                <tr>
                <td  colspan="1"><b>Email ID :</b></td>
                  <td colspan="3">'.$email.'</td>
              </tr>
              </table>
              </div>
              <br> 
              <div>
                Thanking You,
              </div>
              <div>
              
                <b>Signature:</b>________________________
                <br>( <b>'.$name.'</b> )
              </div>
    
          </div>';
          $data .='<div class="col-sm-2"></div>
          
          </div> 
          </div>
            </div>
            
            <div class="container">
              <div class="container2">
                <div class="row">
                  <div class="col-sm-2"></div> 
                  <div style="border:1px solid black; padding: 10px; ">
                      <b>Office use only.</b>
                      <br><br><br>
                      ____________________
                      <br>
                      Checked By
                    </div>
                <br>
                <div class="row">
                  <div class="col-sm-2"></div> 
                  <div class="col-sm-8 " style="border:1px solid black;padding: 10px;"> 
                    <b>Documents to be attached</b>
                    <ul style="padding: 10px;">
                      <li>Photocopy of Id card</li>
                      <li>Current semester term fees receipt</li>
                      <li>Bonafide certificate payment receipt of Rs.50 (If you are applying for more than one time in same semester)</li>
                      </ul>
                    </div>
                  <div class="col-sm-2"></div> 
                </div>
              </div>
          </div>
        </div>';
        
                 require_once("tcpdf_min/tcpdf.php");
                 $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(500, 200), true, 'UTF-8', false);
                  // = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
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
                
                 ob_end_clean();
                
                 $obj_pdf->Output($filename, 'D');

            }
            else{
              $showalert= true;
              $message = "We are facing some technical issues !please try again";
            }
            }
?>