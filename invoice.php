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
      <td><img src="logo.png" width="150" height="150" alt=""/></td>
      <td style="font-size: 10px;">
        &nbsp;&nbsp;&nbsp;<B style="font-size: 16px;">Khrmtis ltinerary Co.,Ltd</B><br>
        &nbsp;&nbsp;&nbsp;1168 หมู่ที่ 2 ตำบลปากน้ำ อำเภอละงู จังหวัดสตูล 91110<br>
        &nbsp;&nbsp;&nbsp;<B>Office    : </B>061-6207959<br>
        &nbsp;&nbsp;&nbsp;<B>ใบอนุญาติประกอบการนำเที่ยว   : </B>42/00299
      </td>
      <td style="font-size: 10px;">
        &nbsp;&nbsp;&nbsp;<B>เลขที่ - <?php echo $text ?><br>
        &nbsp;&nbsp;&nbsp;Website : www.khemtis.com<br>
        &nbsp;&nbsp;&nbsp;<B>Line   : </B>@Khrmtis<br>
      </td>
      
    </tr>
  </table>

 

  <table width="100%" >
    <tbody>
      <tr style="padding-bottom: 10px">
        <td width="30%" style="font-size: 20px;">วันจอง </td>
        <td width="5%" >:</td>
        <td width="15%" style="font-size: 20px;"><?php echo date('d-m-Y');?></td>
        <td width="20%" style="font-size: 20px;">วันหมดอายุ</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;"><?php echo date('d-m-Y');?></td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 20px;">ชื่อ</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $name;?></td>
        <td width="20%" style="font-size: 20px;"></td>
        <td width="10%"></td>
        <td width="20%" style="font-size: 20px;"></td>
      </tr>
      
      <tr>
        <td width="30%" style="font-size: 20px;">เบอร์โทร</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $phone;?></td>
        <td width="20%" style="font-size: 20px;">LINE/FB</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;">-</td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 20px;">ทริปเที่ยว</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $adult;?></td>
        <td width="20%" style="font-size: 20px;">By</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;"><?php echo $By;?></td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 20px;">โรงเเรม</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $room_name;?></td>
        <td width="20%" style="font-size: 20px;">ปรเภทห้อง</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;"><?php echo $room_name;?></td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 20px;">จำนวนวัน</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $days;?></td>
        <td width="20%" style="font-size: 20px;">จำนวนห้อง</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;"><?php echo $number_of_rooms;?></td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 20px;">เตียงเสริม</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $extrabed;?></td>
        <td width="20%" style="font-size: 20px;">จำนวนลูกค้า</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;"><?php echo $customers;?></td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 20px;">ผู้ใหญ่</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 20px;"><?php echo $customers;?></td>
        <td width="20%" style="font-size: 20px;">เด็ก</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 20px;">-</td>
      </tr>
      <tr>
        <td width="30%" style="font-size: 21px;">วันที่เข้าพัก</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 21px;"><?php echo $checkin;?></td>
        <td width="20%" style="font-size: 21px;">วันที่เช็ดเอาท์</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 21px;"><?php echo $checkout;?></td>
      </tr>
      
      <tr>
        <td width="30%" style="font-size: 21px;">มัดจำ/Dep</td>
        <td width="5%">:</td>
        <td width="15%" style="font-size: 21px;"><?php echo $Sale; ?></td>
        <td width="20%" style="font-size: 21px;">ราคา/Price</td>
        <td width="10%">:</td>
        <td width="20%" style="font-size: 21px;"><?php echo $sum; ?></td>
      </tr>
      <tr>
        <td width="20%" style="font-size: 21px;">รายละเอียดเเพคเกจ</td>
        <td width="20%">:</td>
        <td width="60%" style="font-size: 21px;"><?php echo $sum/$customers ; ?></td>
        
      </tr>
      <tr>
        <td width="20%" style="font-size: 21px;">รวม/Total</td>
        <td width="20%">:</td>
        <td width="60%" style="font-size: 21px;"><?php echo $sum; ?></td>
        
      </tr><br><br><br>
      <tr>
        <td width="20%" style="font-size: 21px;">หมายเหตุ</td>
        <td width="20%">:</td>
        <td width="60%" style="font-size: 21px;"><?php echo $note; ?></td>
        
      </tr>
      
    </tbody>
  </table><br>

  <div align="center">
    <p style="font-size: 10px;color: red;">*** ราคานี้ไม่รวมค่าธรรมเนียมเข้าชมอุทยาน ***</p>
    <p style="font-size: 12px;color: red;">*** This prive not include National park fee ***</p>
  </div>

  <div >
    <ul style="font-size: 13px;">
      <b>ข้อกำหนดเเละเงื่อนไข</b>
      <li>1. คุณลูกค้าต้องสำรองห้องพักล่วงหน้า 30 วันก่อนเดินทาง  </li>
      <li>2. หากคุณลูกค้าต้องการเปลี่ยนแปลง หรือเลื่อนวันเดินทาง ต้องแจ้งล่วงหน้าอย่างน้อย 30 วัน ก่อนวันเดินทาง </li>
      <li>3. โปรแกรมอาจมีการเปลี่ยนแปลงตามความเหมาะสมของสภาพอากาศ   </li>
      <li>4. ขอสงวนสิทธิ์ในการไม่คืนเงินลูกค้าทุกกรณี   </li>
      <li>5. หากมีการปลี่ยนแปลง ราคาค่าเรือ รถ ลูกด้าต้องเพิ่มส่วนต่างตามราคาจริง  </li>
      <li>6. ตามมาตรฐานของโรงแรมจะให้ทำการ Check In 14.00 น. Check Out 12.00 น. หากเกินเวลา ลูกค้าดูแลค่าใช้จ่ายเพิ่มเอง </li>
      <li>7. กรณียังไม่กำหนดวันเข้าพัก กรุณาโทรแจ้งเช็คจองห้องพักก่อนจองตั๋วเดินทาง </li>
      <li>8. หากต้องการพักเพียงคนเดียวต้องเพิ่มราคาตามเรทโรงแรมที่เลือก   </li>
      <li>9. บริษัทจะรับผิดชอบตามรายละเอียดใน Voucher  เท่านั้น</li>
    </ul>
  </div>

<br><br>
  <table width="100%" align="center">
    <tbody align="center">
      <tr align="center">
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">คุณ <?php echo $name;?></td>
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">คุณเดียร์</td>
      </tr>
      <tr align="center">
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">ลูกค้า</td>
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">ฝ่ายขาย</td>
      </tr>
      <tr align="center">
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">Customer</td>
        <td align="center" width="50%" style="font-size: 10px;align-items: center;">Sales</td>
      </tr>
    </tbody>
  </table>


  



</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

    

$location = "filePDF/".$text.".pdf";
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');

$pdf->WriteHTML($html, 2);

$pdf->Output($location,'F'); 


?>    