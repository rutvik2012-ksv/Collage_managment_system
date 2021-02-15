<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="file.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
 ?>
 <br>
 <html>
 <body>

 <table style="width:100%" border='1'>
  <tr>
    <th>Enrollment number</th>
    <th>Student name</th> 
    <th>email</th>
    <th>department</th>
    <th>sem</th>
    <th>Gender</th>
    <th>Date</th>
    <th>Mentor</th>
    <th>Mobile_no</th>
    <th>adress 1</th>
    <th>adress 2</th>
    <th>city</th>
    <th>state</th>
    <th>country</th>
    <th>fee type</th>
  </tr>
 
</table>
   
</body>
</html>
 