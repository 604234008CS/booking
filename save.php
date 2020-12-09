
<?php 
include_once( 'connectdb.php' );


$resort_name = $_REQUEST['resort_name'];

	for ($i = 1; $i<= (int)$_POST["hdnCount"]; $i++){
		if(isset($_REQUEST['id_booking']))
		{
			if($_POST['id_booking'] != "" && 
					$_POST["name$i"] != "" &&
					$_POST["age$i"] != "" )
			{
			$sql = "INSERT INTO tb_voucher (id ,id_bookink, service_name, note ,status) 
					VALUES (NULL,'".$_REQUEST['id_booking']."','".$_POST["name$i"]."','".$_POST["age$i"]."','9');";
					$query = mysqli_query($con,$sql);

			$in = " UPDATE `tb_report` SET `insurance` = '9'   WHERE `tb_report`.`id_booking` ='" .$_REQUEST['id_booking']. "'";
			$a = mysqli_query( $con, $in );

			}
		}
	}

	echo "<script> alert('ได้ทำการเพิ่มประกันเรียบร้อย!!');window.location.href='report.php?resort_name=$resort_name';</script>";
	mysqli_close($con);

	
?>


