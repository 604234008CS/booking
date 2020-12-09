<?php
require_once( 'mpdf/mpdf.php' );


ob_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
  
</head>
<body >


<div class="container" style="font-size: 10px">

  <table >
    <tr class="head">
      <td style="font-size: 14px;">
        &nbsp;&nbsp;&nbsp;<B style="font-size: 20px;">Khrmtis ltinerary Co.,Ltd</B><br>
        &nbsp;&nbsp;&nbsp;1168 หมู่ที่ 2 ตำบลปากน้ำ อำเภอละงู จังหวัดสตูล 91110<br>
        &nbsp;&nbsp;&nbsp;<B>Office    : </B>061-6207959<br>
        &nbsp;&nbsp;&nbsp;Website : www.khemtis.com<br>
        &nbsp;&nbsp;&nbsp;<B>Line   : </B>@Khrmtis<br>
      </td>
      <td style="font-size: 10px;"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td><td style="font-size: 10px;"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td>
      <td style="font-size: 10px;" >
         <img src="logo.png" width="200" height="200" alt=""/>
      </td>
      
    </tr>
  </table>


 

 <div style="font-size: 15px;">
    <b>เอกสารการจอง : </b>  <p style="color: red;"> เรือ </p>     <b> เลขที่เอกสาร  : <?php echo $text ?>  วันที่จอง   : <?php echo date('d-m-Y');?><b>
    <p>ชื่อลูกค้า  : <?php echo $name;?>     จำนวนลูกค้า  : <?php echo $customers;?> </p>
    <p>เบอร์โทร  : <?php echo $phone;?>    </p>
    <p>ชื่อผู้ให้บริการ  : <?php echo $Carrier_name ;?>    </p>
    <p>วันที่เข้าพัก  : <?php echo $checkin;?> วันที่เช็ดเอาท์    <?php echo $checkout;?></p>
    <p>ผู้ใหญ่  : <?php echo $customers;?> เด็ก : - อายุ -></p>
    <p>ประเภทห้องพัก  : - </p>
    <p>จำนวนห้อง -  เตียงเสริม -  จำนวนคืน</p>
    <p>หมายเหตุ : <?php echo $Carrier_name_note;?></p>


    

 </div>

 
  <table width="100%" align="center">
    <tbody align="center">
      <tr align="center">
        <td align="center" width="50%" style="font-size: 10px;align-items: center;"></td>
        <td align="center" width="50%" style="font-size: 10px;align-items: center;"></td>
      </tr>
      <tr align="center">
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">Issue by :</td>
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">Tel :</td>
      </tr>
      <tr align="center">
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">K.อานี</td>
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">061-6207959</td>
      </tr>
    </tbody>
  </table>


  



</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

    

$location = "filePDF/".$text3.".pdf";
$pdf = new mPDF('th', 'A4', '0',  'Inter' );

$pdf->WriteHTML($html, 2);

$pdf->Output($location,'F'); 


?>    