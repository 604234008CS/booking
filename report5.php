<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("voucher รวม");  
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
      
$tagvs = array('p' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n'
=> 0)));
$obj_pdf->setHtmlVSpace($tagvs);
$obj_pdf->SetCellPadding(0.02);      
$obj_pdf->setCellHeightRatio(0.98);
$obj_pdf->setCellPaddings( $left = '0', $top = '0', $right = '0', $bottom = '0');

      $image_file = K_PATH_IMAGES.'logo.png';
      $obj_pdf->Image($image_file, 18, 4, 30, '', 'png', '', 'c', false, 100, '', false, false, 0, false, false, false);



     
     // $connect = mysqli_connect("localhost", "thechic_resort", "Aa123654", "thechic_resort");
      $connect = mysqli_connect("localhost", "root", "", "booking");  
      mysqli_set_charset($connect,"utf8");
      $sql1 = "SELECT * FROM tb_report   WHERE id ='".$_GET["id"]."'";  
      $result1 = mysqli_query($connect, $sql1); 
  		

      $content = '';
        while($row1 = mysqli_fetch_array($result1)) 
      { 

		$sumcustomers = $row1['sum']/$row1['customers'];
		$id_booking = $row1['id_booking'];

    if ($row1["report_status"] == '0') {
      $in = '';
    }else if ($row1["report_status"] == '1') {
     $in = '';
    }else{
       $in = "เลขที่  ".$row1["noid_booking"];
    }



$content = '
<table style="padding:0px!important;margin:0px!important;width:100%" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding:0px!important;margin:0px!important;width:25%" rowspan="5">&nbsp;</td>
    <td style="padding:0px!important;margin:0px!important;width:45%;font-size:1.2em;"><b style="font-size: 1.2em;color:black">Khemtis Itinerary Co.,Ltd.</b></td>
    <td style="padding:0px!important;margin:0px!important;width:30%" rowspan="5">
<table style="width:100%">
     <tr>
        <td width="100%" align="center">
            <b style="font-size: 1.2em;color:black">BOOKING</b><br>
            <b style="font-size: 1.2em;color:red;">CONFIRMATION</b><br>
            <b style="font-size: 1.2em;color:red;"> อ้างอิงเลขที่ '.$in.'</b>
        </td>
        </tr>
    </table>

    </td>
  </tr>
  <tr><td style="padding:0px!important;margin:0px!important;height:5px!important">1168 หมูที่  2 ตำบลปากน้ำ อำเภอละงู จังหวัดสตลู 91110</td></tr>
  <tr><td style="padding:0px!important;margin:0px!important">Office : 061-6207959, 061-6207923</td></tr>
  <tr><td style="padding:0px!important;margin:0px!important">E- mail : sale@khemtis.com, Website : www.khemtis.com</td></tr>
  <tr><td style="padding:0px!important;margin:0px!important">ใบอนุญาติประกอบธุรกิจนำเทียว : <b style="font-size: 1.2em;color:black">42/00299</b></td></tr>
</table>



 <table class="first" cellpadding="2" cellspacing="0"  width="100%">
 <tr><td colspan=4><table class="first"  width="100%" cellpadding="0" cellspacing="3"><tr><td style="height:1px;width:100%;border-bottom: 3px solid #99c5d6">&nbsp;</td></tr></table></td></tr>
    <tr style="background-color: #d9d9d9">
        <td width="25%" ><p style="font-size: 1em;color:black;padding:0px;margin:0px">วันจอง :<br> Booking Date   :</p></td>
        <td width="25%" ><b style="font-size: 1.2em;color:black">'.$row1['transaction_date'].'</b></td>
        <td width="25%" ><p style="font-size: 1em;color:black">วันหมดอายุ  :<br> Expiration Date :</p></td>
        <td width="25%" ><b style="font-size: 1.2em;color:black">'.$row1['transaction_date'].'</b></td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0.1" ><tr><td ></td></tr></table>
<table class="first" cellpadding="5" cellspacing="0"  width="100%" style="margin-top:1px!important">
    <tr>
        <td width="25%" style="padding:0px;margin:0px"><p style="font-size: 1em;color:black;padding:0px;margin:0px">เลขที่ใบจอง :<br> Booking ID   :</p></td>
        <td width="25%" style="padding:0px;margin:0px" ><b style="font-size: 1.2em;color:black"> เลขที่ '.$row1['id_booking'].'</b></td>
        <td width="25%" style="background-color: #DCDCDC;padding:0px;margin:0px" ><p style="font-size: 1em;color:black">โรงเเรมที่พัก  :<br> Property :</p></td>
        <td width="25%" style="background-color: #DCDCDC;padding:0px;margin:0px" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['room_name'].'</b></td></tr></table></td>
    </tr>

    <tr> 
   
        <td width="25%" ><p style="font-size: 1em;color:black">ชื่อ :<br> Client  :</p></td>
        <td width="25%" ><b style="font-size: 1.2em;color:black">'.$row1['name'].'</b></td>
         <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">ประเภทห้อง :<br>Room Type  :</p></td>
        <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['name_resort'].'</b></td></tr></table></td>
    </tr>
    <tr>
        <td width="25%" ><p style="font-size: 1em;color:black">ชื่องทางการติดต่อ  :<br> Social Media :</p></td>
        <td width="25%" ><b style="font-size: 1.2em;color:black">'.$row1['line'].'</b></td>
        <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">จำนวนห้อง :<br>Number of Room   :</p></td>
        <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['number_of_rooms'].'</b></td></tr></table></td>
    </tr>
    <tr>
        <td width="25%" ><p style="font-size: 1em;color:black">เบอร์โทร  :<br>Phone Number :</p></td>
        <td width="25%" ><b style="font-size: 1.2em;color:black">'.$row1['phone'].'</b></td>
        <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">จำนวนวัน :<br>Number of Package   :</p></td>
        <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['package'].'</b></td></tr></table></td>
    </tr>
    <tr>
        <td width="25%" ><p style="font-size: 1em;color:black">วันที่เขาพัก :<br>Arrival  :</p></td>
        <td width="25%" ><table  style="border:solid 1px #ccc;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black"> '.$row1['checkin'].'</b></td></tr></table></td>
        <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">เตียงเสริม :<br>Number of Extra Beds :</p></td>
        <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['extrabed'].'</b></td></tr></table></td>
    </tr>
    <tr>
        <td width="25%" ><p style="font-size: 1em;color:black">วันที่เช็ดเอาท :<br>Number of Extra Beds  :</p></td>
        <td width="25%" ><table  style="border:solid 1px #ccc;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black"> '.$row1['checkout'].'</b></td></tr></table></td>
        <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">จํานวนผู้ใหญ่  :<br>Number of Adults  :</p></td>
        <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['customers'].'</b></td></tr></table></td>
      
    </tr>
    <tr>
      <td width="25%" ><p style="font-size: 1em;color:black">ทริปเที่ยว  :<br>Trip :</p></td>
      <td width="25%" ><table  style="border:solid 1px #ccc;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black"> '.$row1['adult'].'</b></td></tr></table></td>
      <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">เด็ก อายุ 4-10 ปี :<br>Age for 4-10 Yrs:</p></td>
      <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['ch1'].'</b></td></tr></table></td>
    </tr>
    <tr>
        <td width="25%" ><p style="font-size: 1em;color:black">บริการโดย :<br>Trip By :</p></td>
        <td width="25%" ><table  style="border:solid 1px #ccc;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black"> '.$row1['Byyy'].'</b></td></tr></table></td>
        <td width="25%" style="background-color: #DCDCDC" ><p style="font-size: 1em;color:black">
เด็ก อายุ 0-3 ปี :<br>Age for 0-3 Yrs:</p></td>
        <td width="25%" style="background-color: #DCDCDC" ><table  style="border:solid 1px #fff;padding:3px;"><tr><td><b style="font-size: 1.2em;color:black">'.$row1['ch2'].'</b></td></tr></table></td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0.1" width="100%"><tr><td ></td></tr></table>
<table class="first" cellpadding="4" cellspacing="0" width="100%"><tr><td>
<table cellpadding="2" cellspacing="0" width="100%">
    <tr style="background-color: #DCDCDC">
        <td width="25%" ><b style="font-size: 1em;color:black">สิทธิประโยนชที่ไดรับ:</b></td>
        <td width="75%" ><b style="font-size: 1.2em;color:black">'.$row1['note'].'</b></td>
    </tr>   
</table>
</td></tr></table>
<table class="first" cellpadding="4" cellspacing="0" width="100%"><tr><td>
    <table class="first" cellpadding="4" cellspacing="0" width="100%" >
    <tr><td colspan="6"><b>รายละเอียดการชำระเงิน(Payment Detail:)</b></td></tr>
    <tr>
        <td width="12%" ><b style="font-size: 1em;color:black">มัดจำ / Dep. :</b></td>
        <td width="15%" style="background-color: #DCDCDC;color:black;text-align:right">'.number_format($row1['Sales'],2).'</td>
        <td width="15%" ><b style="font-size: 1em;color:black">ราคาสุทธิ/ Price :</b></td>
        <td width="20%" style="background-color: #DCDCDC;color:black;text-align:right">'.number_format($row1['sum'],2).'</td>
        <td width="18%" ><b style="font-size: 1em;color:black">ค้างชำระ / Remain :</b></td>
        <td width="20%" style="background-color: #DCDCDC;color:red;text-align:right">'.number_format($row1['deposit'],2).'</td>
    </tr>
    </table>
 </td></tr></table>
 <table class="first" cellpadding="4" cellspacing="0" width="100%"><tr><td>   
     <table class="first" cellpadding="4" cellspacing="0" style="width:100%">
    <tr style="background-color: #DCDCDC">
        <td width="12%" style="background-color:#fff"><b style="font-size: 1em;color:black">รายละเอียดอื่น   :</b></td>
        <td width="88%" ></td>
    </tr>
</table>
</td></tr></table>
    <div style="border: 1px solid gray;font-size: 0.9em;color:black;">
      <b>ข้อกำหนดเเละเงื่อนไข</b><br>
        1. คุณลูกค้าต้องสำรองห้องพักล่วงหน้า 30 วันก่อนเดินทาง<br>
        2. หากคุณลูกค้าต้องการเปลี่ยนแปลง หรือเลื่อนวันเดินทาง ต้องแจ้งล่วงหน้าอย่างน้อย 30 วัน ก่อนวันเดินทาง<br>
        3. โปรแกรมอาจมีการเปลี่ยนแปลงตามความเหมาะสมของสภาพอากาศ<br>
        4. ขอสงวนสิทธิ์ในการไม่คืนเงินลูกค้าทุกกรณี<br>
        5. หากมีการปลี่ยนแปลง ราคาค่าเรือ รถ ลูกด้าต้องเพิ่มส่วนต่างตามราคาจริง<br>
        6. ตามมาตรฐานของโรงแรมจะให้ทำการ Check In 14.00 น. Check Out 12.00 น. หากเกินเวลา ลูกค้าดูแลค่าใช้จ่ายเพิ่มเอง<br>
        7. กรณียังไม่กำหนดวันเข้าพัก กรุณาโทรแจ้งเช็คจองห้องพักก่อนจองตั๋วเดินทาง<br>
        8. หากต้องการพักเพียงคนเดียวต้องเพิ่มราคาตามเรทโรงแรมที่เลือก<br>
        9. บริษัทจะรับผิดชอบตามรายละเอียดใน Voucher เท่านั้น<br>
      </div>
<br><br><br>
 <table class="first" cellpadding="4" cellspacing="0" width="100%">
 <tr>
 <td style="text-align:center">   
 <center>
 ..................................................................<br>
 ลูกค้า<br>
 Client
 </center>
 </td>
 <td style="text-align:center">   
  <center>
  ..................................................................<br>
 ฝ่ายขาย<br>
 Sales
 </center>
 </td>
 </tr>
 </table>
';




     }
//$content .= fetch_data();  height="500"
//$stylesheet = file_get_contents('style.css');
//$obj_pdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
//$obj_pdf->WriteHTML($content,\Mpdf\HTMLParserMode::HTML_BODY);




      $obj_pdf->writeHTML($content);
      $name = 'Invoice-'.$id_booking.'.pdf';
      $obj_pdf->Output($name, 'I');  
?>