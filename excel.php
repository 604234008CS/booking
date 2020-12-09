<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); //*** CSV ***//
header("Content-Disposition: attachment; filename=testing.xls");
?>
<html>
<body>
<?php
include_once('connectdb.php');
	

		$resort_name = $_REQUEST["resort_name"];

	
	
	$date_star = $_REQUEST["date_star"];
	$date_end = $_REQUEST["date_end"];



?>



<table width="600" border="1">
<tr>
<th > <div align="center">ID</div></th>
<th > <div align="center">เลขที่ Booking </div></th>
<th > <div align="center">เดือน </div></th>
<th > <div align="center">วันที่ทำรายการ </div></th>
<th > <div align="center">ชื่อลูกค้า </div></th>
<th > <div align="center">เบอร์โทรศัพท์ </div></th>

<th > <div align="center">สถานที่เข้าพัก </div></th>
<th > <div align="center">แพคเกจ </div></th>
<th > <div align="center">จำนวนห้อง </div></th>
<th > <div align="center">เตียงเสริม </div></th>
<th > <div align="center">จำนวนลูกค้า </div></th>
<th > <div align="center">วันที่เช็คอิน </div></th>
<th > <div align="center">วันที่เช็คเอาท์ </div></th>
<th > <div align="center">ยอดขาย </div></th>
<th > <div align="center">มัดจำคงเหลือ </div></th>
<th > <div align="center">ยอดสุทธิ </div></th>
<th > <div align="center">เรือ </div></th>
<th > <div align="center">รถ </div></th>
<th > <div align="center">ดำน้ำ </div></th>
<th > <div align="center">สถานะการชำระเงิน </div></th>
<th > <div align="center">สถานะการเข้าพัก </div></th>
<th > <div align="center">วันที่เก็บเงินมัดจำ </div></th>
<th > <div align="center">ต้นทุน </div></th>
<th > <div align="center">% Com </div></th>
<th > <div align="center">มูลค่าคอมมิชชั่น </div></th>
<th > <div align="center">กำไรขาดทุน </div></th>
<th > <div align="center">หมายเหตุ </div></th>


</tr>

 <?php  
	if ($_REQUEST["resort_name"] == "1") {
		$sql1 ="SELECT *  FROM tb_report  WHERE transaction_date >= '$date_star' AND transaction_date <= '$date_end' ";
	}else{
	 	$sql1 ="SELECT *  FROM tb_report  WHERE transaction_date >= '$date_star' AND transaction_date <= '$date_end' AND room_name = '$resort_name'";
	}
 




 $query1 = mysqli_query($con,$sql1);
 while ($results1 = mysqli_fetch_assoc($query1)) {  ?>



	<tr>
	<td><div align="center"><?php echo $results1["id"];?></div></td>
	<td><?php echo $results1["id_booking"];?></td>
	<td>
		<?php 
		if ($results1["month"] == '12') {?>
			<p>เดือนธันวาคม</p>
		<?php } else if ($results1["month"] == '2') { ?>
			<p>เดือนมกราคม</p>
		<?php }else if ($results1["month"] == '3') { ?>
			<p>เดือนกุมภาพันธ์</p>
		<?php }else if ($results1["month"] == '4') { ?>
			<p>เดือนมีนาคม</p>
		<?php }else if ($results1["month"] == '5') { ?>
			<p>เดือนเมษายน</p>
		<?php }else if ($results1["month"] == '6') { ?>
			<p>เดือนพฤษาคม</p>
		<?php }else if ($results1["month"] == '7') { ?>
			<p>เดือนมิถุนายน</p>
		<?php }else if ($results1["month"] == '8') { ?>
			<p>เดือนกรกฏาคม</p>
		<?php }else if ($results1["month"] == '9') { ?>
			<p>เดือนสิงหาคม</p>
		<?php }else if ($results1["month"] == '10') { ?>
			<p>เดือนกันยายน</p>
		<?php }else if ($results1["month"] == '11') { ?>
			<p>เดือนตุลาคม</p>
		<?php }else if ($results1["month"] == '11') { ?>
			<p>เดือนพฤศจิกายน</p>
		<?php } ?>
	</td>
	<td><?php echo $results1["transaction_date"];?></td>
	<td><?php echo $results1["name"];?></td>
	<td><?php echo $results1["phone"];?></td>
<!-- 	<td><?php echo $results1["room_name"];?></td> -->
	<td><?php echo $results1["name_resort"];?></td>
	<td><?php echo $results1["package"];?></td>
	<td><?php echo $results1["number_of_rooms"];?></td>
	<td><?php echo $results1["extrabed"];?></td>
	<td><?php echo $results1["customers"];?></td>
	<td><?php echo $results1["checkin"];?></td>
	<td><?php echo $results1["checkout"];?></td>
	<td><?php echo $results1["Sales"];?></td>
	<td><?php echo $results1["deposit"];?></td>
	<td><?php echo $results1["sum"];?></td>
	<td><?php echo $results1["car"];?></td>
	<td><?php echo $results1["boat"];?></td>
	<td><?php echo $results1["diving"];?></td>

	<td>
		<?php   
		if ($results1["Sales"] == $results1["sum"]) { ?>
			<b> ชำระเงินเรียบร้อย</b>
		<?php }else{ ?>
			<b style="color: red;">จ่ายมัดจำ</b>
		<?php } ?>

	 </td>

	<td>
	
		<?php
		$today = date("Y-m-d ");  
		$timestamp1 = strtotime($today);
		 $checkin = strtotime($results1["checkin"]);
		 if ($checkin <= $timestamp1) { ?>
		 	 <b> เข้าพักแล้ว</b>
		 	<?php }else{ ?>
		 		<b style="color: red;">ยังไม่เข้าพัก</b>
		 	<?php } ?>

	</td>
	<td><?php echo $results1["collection_date"];?></td>
	<td>----</td>
	<td><?php echo $results1["com"];?></td>
	<td><?php echo $results1["commission_value"];?></td>
	<td>----</td>

	<td><?php echo $results1["note"];?></td>

	</tr>

 <?php  } ?>


</table>





</body>
</html>