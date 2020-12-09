<?php
session_start(); 
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("voucher ห้องพัก");  
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
      
      $image_file = K_PATH_IMAGES.'logo.png';
      $obj_pdf->Image($image_file, 18, 4, 35, '', 'png', '', 'c', false, 200, '', false, false, 0, false, false, false);


      
     
      //$connect = mysqli_connect("localhost", "thechic_resort", "Aa123654", "thechic_resort");  
      $connect = mysqli_connect("localhost", "root", "", "booking");  
     
      $sql1 = "SELECT * FROM tb_report   WHERE id ='".$_GET["id"]."'";  
      $result1 = mysqli_query($connect, $sql1); 
  		

      $content = '';
        while($row1 = mysqli_fetch_array($result1)) 
      { 

		$sumcustomers = $row1['sum']/$row1['customers'];
		$id_booking = $row1['id_booking'];


     $sql2 = "  SELECT * FROM `tb_voucher` WHERE `id_bookink` LIKE '".$row1['id_booking']."' AND `status` LIKE '".$_GET["status"]."'"; 
      $result2 = mysqli_query($connect, $sql2); 

       while($row2 = mysqli_fetch_array($result2)) 

      { 

    $content .= '
      <table class="first" cellpadding="4" cellspacing="6">
    <tr>
        <td width="30%" >
          
        </td>
        <td width="50%">
            <b style="font-size: 1.2em;">Khemtis Itinerary Co.,Ltd.</b><br />
            <b style="font-size: 0.9em;">1168 หมูที่  2 ตำบลปากน้ำ อำเภอละงู จังหวัดสตลู 91110</b><br />
            <b style="font-size: 0.9em;">Office : 061-6207959, 061-6207923</b><br />
            <b style="font-size: 0.9em;">E- mail : sale@khemtis.com, Website : www.khemtis.com</b><br />
            <b style="font-size: 0.9em;">ใบอนุญำตประกอบธุรกิจนำเทียว : 42/00299</b><br />
        </td>


        <td width="20%" align="center">
            <b style="font-size: 1.2em;">BOOKING</b><br>
            <b style="font-size: 1.2em;color: red;">CONFIRMATION</b>
        </td>
        </tr>
    </table>
    <hr>
    '; 

		 $content .= '
    <table class="first" cellpadding="4" cellspacing="6">
    <tr>
        
        <td width="25%" ><b style="font-size: 1em;">เอกสารการจอง : <br> Booking of :</b></td>
        <td  style="font-size: 1.2em;color: red;" width="25%" align="center;">'.$_GET["type"].'</td>
        <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">ชื่อผู้ให้บริการ : <br> Agent :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">'.$row2['service_name'].'</td> 
    </tr>
     <tr>
        <td width="25%" ><b style="font-size: 1em;">วันที่จอง : <br> Booking Date :</b></td>
        <td width="25%" align="center">'.$row1['transaction_date'].'</td>
        <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">ประเภทห้องพัก : <br> Room Type  :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">'.$row1['name_resort'].'</td>  

    </tr>
    <tr>
       <td width="25%" ><b style="font-size: 1em;">เลขที่เอกสาร : <br> Booking ID  :</b></td>
        <td width="25%" align="center">'.$row1['id_booking'].'</td>
        <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">จำนวนห้อง : <br> Number of Room  :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">'.$row1['number_of_rooms'].'</td>
    </tr>

    <tr>
        <td width="25%" ><b style="font-size: 1em;">ชื่อลูกค้า : <br> Client  :</b>    </td>
        <td width="25%" align="center">'.$row1['name'].'</td>
        <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">จำนวนวัน : <br> Number of Package  :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">'.$row1['package'].'</td>

        
    </tr>
    <tr>
        <td width="25%" ><b style="font-size: 1em;">เบอร์โทร : <br> Phone Number   :</b></td>
        <td width="25%" align="center">'.$row1['phone'].'</td>
        <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">เตียงเสริม  : <br> Number of Extra Beds  :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">-</td>
 
    </tr>
    <tr>
    <td width="25%" ><b style="font-size: 1em;">จำนวนลูกค้า : <br> Number of Clien  :</b></td>
        <td width="25%" align="center">'.$row1['customers'].'</td>
         <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">ผู้ใหญ่  : <br> Number of Adults  :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">'.$row1['customers'].'</td>
    </tr>
 
    <tr>
        <td width="25%" >  <b style="font-size: 1em;">วันที่เขาพัก : <br> Arrival :</b></td>
        <td width="25%" align="center">'.$row1['checkin'].'</td>
        <td style="background-color: #DCDCDC" width="25%" ><b style="font-size: 1em;">เด็ก : <br> Number of Children :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">-</td>
        
    </tr>
    <tr>
       
        <td width="25%"><b style="font-size: 1em;">วันที่เช็ดเอาท : <br> Departure  :</b></td>
        <td width="25%" align="center">'.$row1['checkout'].'</td>
        <td style="background-color: #DCDCDC" width="25%"><b style="font-size: 1em;">อายุของเด็ก  : <br> Age of Children  :</b></td>
        <td style="background-color: #DCDCDC" width="25%" align="center">-</td>
    </tr>


    <tr style="background-color: #DCDCDC">
        <td width="25%" ><b style="font-size: 1em;">หมายเหตุ :</b></td>
        <td width="75%" align="center">'.$row1['note'].'</td>
    </tr>
   
</table>

 	'; 

	$content .= '

<br>
<br>
<br>
<br>
<br>
<br>
<br>

		<table width="100%" align="center" >
		    <tbody align="center">
		        <tr align="center">
		            <td align="center" width="50%" style="font-size: 15px; align-items: center;"> </td>
		            <td align="center" width="50%" style="font-size: 15px; align-items: center;">'.$_SESSION["Name"].'</td>
		        </tr>
		        <tr align="center">
		            <td align="center" width="50%" style="font-size: 15px; align-items: center;"></td>
		            <td align="center" width="50%" style="font-size: 15px; align-items: center;">Tel : 061-6207959</td>
		        </tr>
		        
		    </tbody>
		</table>

	';
  }
     }
      //$content .= fetch_data();  
     



      $obj_pdf->writeHTML($content);
      $name = 'Invoice-'.$id_booking.'.pdf';
      $obj_pdf->Output($name, 'I');  
?>