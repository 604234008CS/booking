<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
include("tcpdf/class/class_curl.php");

// การตั้งค่าข้อความ ที่เกี่ยวข้องให้ดูในไฟล์ 
// tcpdf / config /  tcpdf_config.php 



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('voucher ห้องพัก');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Khrmtis ltinerary Co.,Ltd  เลขที่ - Khemtis0001', '1168 หมูที่ 2 ตําบลปากนํ้า อําเภอละงู จังหวัดสตูล 91110');
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('angsanaupc', '', 14);



/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        
        font-size: 24pt;
        
    }
    p.first {
      
        font-size: 12pt;
    }
    p.first span {
       
        font-style: italic;
    }
    p#second {
       
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        
    }
    table.first {
       
        font-family: angsanaupc;
   
    }
    td {
       
        
    }
    td.second {
        
    }
    div.test {
       
        
        font-family: angsanaupc;
        
        
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>



<br />

<table class="first" cellpadding="4" cellspacing="6"><br /><br />
 <tr>
  <td width="25%" align="center">วันจอง</td>
  <td width="25%" align="center">10 ตุลาคม  2020 </td>
  <td width="25%" align="center">วันหมดอายุ</td>
  <td width="25%" align="center"> 10 ตุลาคม  2021</td>
 
 </tr>
 <tr>
  <td width="25%" align="center">ชื่อ</td>
  <td width="75%" align="center">ซาอีมี แซฮะ</td>
 
 </tr>
 <tr>
  <td width="25%" align="center">เบอร์โทร</td>
  <td width="25%" align="center">0878815462</td>
  <td width="25%" align="center">LINE/FB</td>
  <td width="25%" align="center"> -</td>
 
 </tr>
 <tr>
  <td width="25%" align="center">ทริปเที่ยว</td>
  <td width="25%" align="center">- </td>
  <td width="25%" align="center">By</td>
  <td width="25%" align="center"> -</td>
 
 </tr>
 <tr>
  <td width="25%" align="center">โรงเเรม</td>
  <td width="25%" align="center">Akira</td>
  <td width="25%" align="center">ปรเภทห้อง</td>
  <td width="25%" align="center"> Akira</td>
 
 </tr>
  <tr>
  <td width="25%" align="center">จํานวนวัน</td>
  <td width="25%" align="center">7 วัน 6 คืน</td>
  <td width="25%" align="center">จํานวนหอง</td>
  <td width="25%" align="center"> 2</td>
 
 </tr>
  <tr>
  <td width="25%" align="center">เตียงเสริม</td>
  <td width="25%" align="center"></td>
  <td width="25%" align="center">จํานวนลูกค้า</td>
  <td width="25%" align="center"> 2</td>
 
 </tr>
   <tr>
  <td width="25%" align="center">วันที่เขาพัก</td>
  <td width="25%" align="center">10-10-2020</td>
  <td width="25%" align="center">วันที่เช็ดเอาท</td>
  <td width="25%" align="center"> 10-10-2020</td>
 
 </tr>
   <tr>
  <td width="25%" align="center">รายละเอียดเเพคเกจ</td>
  <td width="25%" align="center">9880</td>
  <td width="25%" align="center">ราคา/Price</td>
  <td width="25%" align="center"> 19760</td>
 
 </tr>
   <tr>
  <td width="25%" align="center">รวม/Total</td>
  <td width="25%" align="center">19760</td>
  
 
 </tr>
    <tr>
  <td width="25%" align="center">หมายเหตุ /Total</td>
  <td width="75%" align="center">*******</td>
  
 
 </tr>
 
</table>
<p color="red">*** ราคานี้ไมรวมคาธรรมเนียมเขาชมอุทยาน ***</p>
<p color="red">*** This prive not include National park fee ***</p>



  <div >
    <ul style="font-size: 15px;">
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
        <td align="center" width="50%" style="font-size: 15px;align-items: center;">คุณ <?php echo $name;?></td>
        <td align="center" width="50%" style="font-size: 15px;align-items: center;">คุณเดียร์</td>
      </tr>
      <tr align="center">
        <td align="center" width="50%" style="font-size: 15px;align-items: center;">ลูกค้า</td>
        <td align="center" width="50%" style="font-size: 15px;align-items: center;">ฝ่ายขาย</td>
      </tr>
      <tr align="center">
        <td align="center" width="50%" style="font-size: 15px;align-items: center;">Customer</td>
        <td align="center" width="50%" style="font-size: 15px;align-items: center;">Sales</td>
      </tr>
    </tbody>
  </table>

EOF;
// define some HTML content with style






// add a page
$pdf->AddPage();



// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+