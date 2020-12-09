<?php
session_start(); 
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("ใบประกัน");  
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
      $obj_pdf->SetFont('angsanaupc', '', 15);  
      $obj_pdf->AddPage();
      
      $image_file = K_PATH_IMAGES.'viriyah-logo.png';
      $obj_pdf->Image($image_file, 18, 4, 100, '', 'png', '', 'c', false, 400, '', false, false, 0, false, false, false);


      
      $date = date("d-m-Y");






    $content .= '
    <table class="first" cellpadding="4" cellspacing="6">
    <tr>
        <td width="30%" > </td>
        <td width="40%"> </td> 
        <td width="30%" align="center">
            <b style="font-size: 1.3em;">วันที่ '.$date.'</b><br>
        </td>
    </tr>
    </table>
  
    '; 

     $content .= '
    
    <table class="first" cellpadding="4" cellspacing="6">
    <tr>
        
        <td  width="20%" ><b style="font-size: 1em;">ชื่อผู้ถือกรรมธรรม์</b></td>
        <td  width="30%" align="center;">บริษัท เข็มทิศ ไอทินเนอระรี จำกัด</td>
        <td  width="25%" ><b style="font-size: 1em;">เลขกรรมธรรม์</b></td>
        <td  width="25%" align="center">04519-20181/POL/000005-557</td> 
    </tr>
     <tr>
        <td  width="19%" ><b style="font-size: 1em;">จำนวนนักท่องเที่ยว</b></td>
        <td  width="6%" align="center">2</td>
        <td  width="10%" ><b style="font-size: 1em;">คน</b></td>
        <td  width="15%" align="center"><b style="font-size: 1em;">จำนวนมัคคุเทศก์</b></td>  
        <td  width="10%" align="center">0</td>  
        <td  width="10%" align="center"><b style="font-size: 1em;">คน</b></td>  
        <td  width="10%" align="center"><b style="font-size: 1em;">รวม</b></td>  
        <td  width="10%" align="center">2</td>  
        <td  width="10%" align="center"><b style="font-size: 1em;">คน</b></td>  

    </tr>
    <tr>
      <td  width="30%" ><b style="font-size: 1em;">วันคุ้มครองตามโปรแกรมทัวร์ จำนวน</b></td>
      <td  width="10%" align="center">3</td>
      <td  width="15%" ><b style="font-size: 1em;">วัน          วันที่เริ่ม</b></td>
      <td  width="20%" align="center">11/12/63 เวลา 08.30 น.</td>
      <td  width="10%" align="center"><b style="font-size: 1em;">สิ้นสุดวันที่</b></td>
      <td  width="20%" align="center">13/12/63 เวลา 17.30 น.</td>


    </tr>

  
</table>

  '; 



      $connect = mysqli_connect("localhost", "thechic_resort", "Aa123654", "thechic_resort");   //("localhost", "istadium_01", "Aa123654", "istadium_01");
      $sql1 = "SELECT * FROM tb_voucher   WHERE id_bookink ='".$_GET["id_booking"]."' AND status ='9'";  
      $result1 = mysqli_query($connect, $sql1); 
      

      $content1 = '';
        while($row1 = mysqli_fetch_array($result1)) 
      { 



  $content1 .= '
<br><br><br>
<style>
.tdd tr th{
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<table style="width:100%" class="tdd">
<tr >
    <th >ลำดับ</th>
    <th >ชื่อ - สกุล</th> 
    <th >อายุ</th>
  </tr> ';





   $content1 .= '   <tr >
    <th >1</th>
    <th >'.$row1['service_name'].'</th> 
    <th >'.$row1['note'].'</th>
  </tr> ';
  } 

 $content1 .= ' 
</table>


  ';
 
   
      //$content1 .= fetch_data();  
     



      $obj_pdf->writeHTML($content);
       $obj_pdf->writeHTML($content1);
      $name = 'Invoice-'.$id_booking.'.pdf';
      $obj_pdf->Output($name, 'I');  
?>