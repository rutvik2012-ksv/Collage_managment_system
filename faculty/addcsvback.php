   
  <?php
       include 'connection.php';
      if(isset($_POST['submit']))
      {                
                $sem= $_POST['sem'];
                $dep=$_POST['dep'];
                $code= $_POST['code'];
                $date = $_POST['date'];
                $lacmin=$_POST['type'];
                date_default_timezone_set("Asia/Kolkata");
                $cyear = date("Y");
                $cmonth= date("m");
               
                if($cmonth==1)
                {
                    $ccmonth="january";
                }
                if($cmonth==2)
                {
                    $ccmonth="February";
                }
                if($cmonth==3)
                {
                    $ccmonth="March";
                }
                if($cmonth==4)
                {
                    $ccmonth="April";
                }
                if($cmonth==5)
                {
                    $ccmonth="May";
                }
                if($cmonth==6)
                {
                    $ccmonth="june";
                }
                if($cmonth==7)
                {
                    $ccmonth="july";
                }
              
                if($cmonth==8)
                {
                    $ccmonth="August";
                } 
                if($cmonth==9)
                {
                    $ccmonth="September";
                }
                if($cmonth==10)
                {
                    $ccmonth="October";
                }
                if($cmonth==11)
                {
                    $ccmonth="November";
                }
                if($cmonth==12)
                {
                    $ccmonth="December";
                }
                $sql = "SELECT * FROM `student_subject` inner join student_info on student_info.id=student_subject.id where student_info.sem='$sem' and student_info.department='$dep' AND (sub1='$code' or sub2='$code' or sub3='$code' or sub4='$code' or sub5='$code' or sub6='$code')";
                 $result = mysqli_query($conn,$sql);
                        $per=(($lacmin*65)/100);
                      $filename=$_FILES['spreadsheet']['tmp_name'];
                      
                  // Open uploaded CSV file with read-only mode
                  $handle = fopen($filename, 'r');
                  $handle1= fopen($filename,'r');
                  $row = 1;
                    
                    $data = fgetcsv($handle, 1000, ",");
                    $data = fgetcsv($handle, 1000, ",");
                    $arr13= explode('P',$data[1]);
                    $startingtime1=$arr13[0];
                    if(strlen($arr13[0])==strlen($data[1]))
                     {
                         $arr13= explode("A",$data[1]); 
                         $startingtime1=$arr13[0];
                     } 
                     $startingtime = explode(":",$startingtime1);
                     $starthour1=filter_var($startingtime[0], FILTER_SANITIZE_NUMBER_INT);
                                    $starthour = (int)$starthour1;
                                    $startmin1 = filter_var($startingtime[1], FILTER_SANITIZE_NUMBER_INT);
                                    $startmin = (int)$startmin1;
                     
                      // echo $startmin;
                    $enrarray=array();
                    $timess = array();
                    $minutes = array();
                    $status = array();
                    $present = array();
                    $counter=0;
                     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
                     //begining of while
                     {
                      if(count($data)==2){
                        for ($c=0; $c < 2; $c++) 
                     //begining of four loop
                        {
                          if($c==0)
                          //if for enr 
                          {
                          $arr= explode('L',$data[$c]);
                          $enr=$arr[0];
                          $flag=false;
                              if(strlen($arr[0])==strlen($data[$c]))
                              {
                                  $arr= explode("J",$data[$c]); 
                                  $enr=$arr[0];
                                  $flag=true;
                              } 
                              if (!in_array($enr, $enrarray))
                              {
                                $enrarray[$counter]=$enr;
                                $minutes[$counter]=0;
                                $counter=$counter+1;
                              } 
                           }
                           if($c==1)
                           {
                             $arr1= explode('P',$data[1]);
                             $time=$arr1[0];
                             if(strlen($arr1[0])==strlen($data[1]))
                              {
                                  $arr1= explode("A",$data[1]); 
                                  $time=$arr1[0];
                              } 
                              if($flag==true)
                              {
                                //join code
                                $dimension=0;
                                foreach($enrarray as $my => $values)
                                {
                                  if($values==$enr)
                                  {
                                    $timess[$dimension] = $time;
                                    $status[$dimension]=1;
                                  }
                                  $dimension=$dimension+1;
                                }
                              }
                              else {
                                //left code
                                $dimension=0;
                                foreach($enrarray as $my => $values)
                                {
                                  if($values==$enr)
                                  {            
                                    $lastjoin = $timess[$dimension];
                                    $currentrime = explode(":",$time);
                                    $currenthour1=filter_var($currentrime[0], FILTER_SANITIZE_NUMBER_INT);
                                    $currenthour = (int)$currenthour1;
                                    $currentmin1 = filter_var($currentrime[1], FILTER_SANITIZE_NUMBER_INT);
                                    $currentmin = (int)$currentmin1;
                                    // echo $currentmin;
                                    // echo gettype($currentmin),"<br>";
                                    // echo $currenthour;
                                    // echo gettype($currenthour);
                                    $status[$dimension]=0;
                                    
  
                                    $lasttime= explode(":",$lastjoin);
                                    $lasthour1=filter_var($lasttime[0], FILTER_SANITIZE_NUMBER_INT);
                                    $lasthour = (int)$lasthour1;
                                    $lastmin1 = filter_var($lasttime[1], FILTER_SANITIZE_NUMBER_INT);
                                    $lastmin = (int)$lastmin1;
                                  
                                    
                                   if($lasthour==$currenthour)
                                   {
                                        $attendmin =$currentmin-$lastmin;
                                      
                                        // echo $attendmin;
                                        $minutes[$dimension] = $minutes[$dimension] + $attendmin;
                                        // echo "\n";
                                   }
                                   else {
                                      $beforehourmin = 60 - $lastmin;
                                      $afterhourmin = $currentmin;
                                      $attendmin = $beforehourmin + $afterhourmin;
                                      $minutes[$dimension] = $minutes[$dimension] + $attendmin;
                                   }
                                    
                                  }
                                  $dimension=$dimension+1;
                                }
                              }
  
                           }
                        
                        }
                      //   $arr333= explode('P',$data[1]);
                      //   $timestamp = $arr333[0];
                      //  $unique = uniqid();
                      //   $sql="INSERT INTO `csv`(`enr`, `timestamp`,`un`) VALUES ('$enr','$timestamp','$unique')";
                      //   $result=mysqli_query($conn,$sql);
                     }
                    
                    }
                    for($i=0;$i<$counter;$i++)
                    {
                      $enrarray[$i] = strtolower($enrarray[$i]);
                      $enrarray[$i] = trim($enrarray[$i]);
                    }
   if(mysqli_num_rows($result)>0)
           {
          while($row = mysqli_fetch_array($result))
                  {
                      $id=$row['id'];
                     if (!in_array($id, $enrarray))
                     {

                        $sql1="INSERT INTO `student_attendance`( `id`, `subject_code`,`sem`,`field` ,`date`, `present`,`cyear`, `cmonth`) VALUES ('$id','$code','$sem','$dep','$date',0,'$cyear','$ccmonth')";
                        $result1=mysqli_query($conn,$sql1);
                     }
                  }
            }
                for($i=0;$i<$counter;$i++)
                    {
                      if($status[$i]==1)
                      {
                        $lastjoin=$timess[$i];
                        $lasttime= explode(":",$lastjoin);
                                    $lasthour1=filter_var($lasttime[0], FILTER_SANITIZE_NUMBER_INT);
                                    $lasthour = (int)$lasthour1;
                                    $lastmin1 = filter_var($lasttime[1], FILTER_SANITIZE_NUMBER_INT);
                                    $lastmin = (int)$lastmin1;
                                    if($lastmin>=$startmin && $starthour==$lasthour)
                                    {
                                  $mycurrentmin= $lacmin -($lastmin - $startmin);
                              
                                    }
                                    else if($lastmin>=$startmin && $starthour!=$lasthour)
                                     {
                                      $mycurrentmin= ($lacmin/2) -($lastmin - $startmin );
                                      
                                    }
                                    else if($startmin>=$lastmin && $starthour==$lasthour)
                                    {
                                      $mycurrentmin= $lacmin -((60 - $startmin)+ $lastmin);
                                     
                                    }
                                    else {
                                      $mycurrentmin= ($lacmin/2) -((60 - $startmin)+ $lastmin);
                                     
                                    }
                                  $minutes[$i] = $minutes[$i] + $mycurrentmin;
                      }
                     
                      $id=$enrarray[$i];
                      if($minutes[$i]>$per)
                      {
                        $present[$i]=1;
                        $present22=$present[$i];
                        $sql="INSERT INTO `student_attendance`( `id`, `subject_code`, `sem`,`field`,`date`, `present`,`cyear`, `cmonth`) VALUES ('$id','$code','$sem','$dep','$date','$present22','$cyear','$ccmonth')";
                        $result=mysqli_query($conn,$sql);
                      }
                      else {
                        $present[$i]=0;
                        $present22=$present[$i];
                        $sql="INSERT INTO `student_attendance`( `id`, `subject_code`,`sem`,`field` ,`date`, `present`,`cyear`, `cmonth`) VALUES ('$id','$code','$sem','$dep','$date','$present22','$cyear','$ccmonth')";
                         $result=mysqli_query($conn,$sql);
                      }
                      
                    }
                    print_r($present);
                     fclose($handle);
                     header('location:addcsvv.php');
                     
      }
  ?>