<?php
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF( 'P' , 'mm' , array( 80,210 ) ); 
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("ใบคิดเงินเพิ่มชั่วโมง Istadium");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('angsanaupc');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      define('MYPDF_MARGIN_LEFT',5);
      define('MYPDF_MARGIN_TOP',8);
      define('MYPDF_MARGIN_RIGHT',5);
      define('MYPDF_MARGIN_FOOTER',35);
      $obj_pdf->SetMargins(MYPDF_MARGIN_LEFT,MYPDF_MARGIN_TOP, MYPDF_MARGIN_RIGHT);
      //$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('angsanaupc', '', 13);  
      $obj_pdf->AddPage();
      
      $image_file = K_PATH_IMAGES.'logo.png';
      $obj_pdf->Image($image_file, 18, 4, 45, '', 'png', '', 'c', false, 200, '', false, false, 0, false, false, false);



     
      $connect = mysqli_connect("localhost", "istadium_01", "Aa123654", "istadium_01");   //("localhost", "istadium_01", "Aa123654", "istadium_01");
      $sql1 = "SELECT * FROM member   WHERE UserID ='".$_GET["UserID"]."'";  
      $result1 = mysqli_query($connect, $sql1); 
  

      $content = '';
        while($row1 = mysqli_fetch_array($result1)) 
      { 
//$HH = $row['HH'];
//$H = $row['H'];
//$HHH = $HH-$H;

     $sql = "SELECT * FROM more_hours   WHERE UserID ='".$_GET["UserID"]."'ORDER BY nowMore DESC LIMIT 1 ";  
$result = mysqli_query($connect, $sql); 

    while($row = mysqli_fetch_array($result)) 
      {  

      $content .= '


     <br><h3 align="center">ใบคิดเงินเพิ่มชั่วโมง Istadium</h3>

     <hr>
      <div>
      สนามฟุตซอล I STADIUM 133 ถ.คลองเรียน2<br> 

       ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา<br>
       เบอร์โทรศัพท์ 088 4646 460 เเละ 088 4646 461</div>
     <hr>
     <h3 align="center">ราคาเพิ่มชั่วโมง / ข้อมูลสมาชิก('.$row['Status1'].')</h3>
 <table border="0" cellspacing="0" cellpadding="2">               

      <tr>
     <br> <th width="100%"><strong>เลขที่ใบเสร็จ:</strong>'        .$row['UserID'].''.date('-dmY-Hi',strtotime($row['nowMore'])).'</th>
    
  </tr>     
    <tr>
      <th width="60%"><strong>เลขที่สมาชิก :</strong></th> 
      <th width="40%">  '.$row1['UserID'].'</th> 
    </tr>

    <tr>
      <th width="60%"><strong>ชื่อ :</strong></th>
      <th width="40%">  '.$row1['Name'].'</th>
    </tr>
        
    <tr>    
      <th width="60%"><strong>Username  :</strong></th>
      <th width="40%">  '.$row1['Username'].'</th>
    </tr> 

    <tr>
      <th width="60%"><strong>เบอร์โทรศัพท์:</strong></th>
      <th width="40%">  '.$row1['phone'].'</th>
    </tr>
    <tr>
      <th width="60%"><strong>LINE:</strong></th>
      <th width="40%">  '.$row1['LINE'].'</th>
    </tr>
    <tr>
      <th width="60%"><strong>Facebook:</strong></th>
      <th width="40%">  '.$row1['Facebook'].'</th>
    </tr>

    '; 

  $content .= '

    <tr>
      <th width="60%"><strong>ชั่วโมงที่เหลือจากรอบที่เเล้ว:</strong></th>
      <th width="40%"> '.$row['HHH'].'ชั่วโมง</th>
    </tr>
     <tr>
      <th width="60%"><strong>จำนวนชั่วโมงที่เพิ่มใหม่:</strong></th>
      <th width="40%">'.$row['H'].'ชั่วโมง</th>
    </tr>
     <tr>
      <th width="60%"><strong>จำนวนชั่วโมงคงเหลือสุทธิ:</strong></th>
      <th width="40%">'.$row1['HHH'].' ชั่วโมง</th>
    </tr>

    <tr>
    <th width="60%"><strong>จำนวนเงิน:</strong></th>
      <th width="40%" ><strong></strong>'.$row['THB'].'.00บาท</th>
    </tr>

      ';  $content .= ' </table> <br><hr>'; 

       }
     }
      //$content .= fetch_data();  
     



      $obj_pdf->writeHTML($content);
      $name = 'Invoice-'.$ww.'.pdf';
      $obj_pdf->Output($name, 'I');  
?>