<?php
require( "PHPMailer/class.phpmailer.php" );
require( "PHPMailer/PHPMailerAutoload.php" );
include_once( 'connectdb.php' );




    $month =  date('m');
    $transaction_date =  date('d-m-Y');
    $type = $_REQUEST['type']; 
    $service_name =  $_REQUEST['service_name'];

    $note =  $_REQUEST['note'];
    $id_booking =  $_REQUEST['id_booking'];
    
    if ($_REQUEST['voucher_date'] == "") {
    	$voucher_date =  "2020-11-03";
    }else{
    	$voucher_date =  $_REQUEST['voucher_date'];
    }
	


		//insert file information into db table

	// echo	$strSQL = "INSERT INTO `tb_report` (`id`, `id_booking`,`month`, `transaction_date`, `name`, `phone`, `room_name`, `package`, `number_of_rooms`,`extrabed`, `customers`,`checkin`,`checkout`,`Sales`,`deposit`,`sum`,`car`,`boat`,`diving`,`payment_status`,`occupancy_status`,`collection_date`,`com,commission_value`,`insurance`,`slip`,`note`) 
 //           VALUES (NULL, '5','$month',NOW(), '$name', '$phone', '$room_name', '$package', '$number_of_rooms','$extrabed', '$customers','$checkin2 ', '$checkout2' , '$Sales', '$deposit', '$sum', '$car', '$boat', '$diving', '1', '1', NOW(), '$com', '$commission_value' , '$insurance', '$fileName', '$note');";



 $strSQL ="INSERT INTO `tb_voucher` (`id`, `id_bookink`, `service_name`, `voucher_date`, `note`, `status`) VALUES (NULL, '$id_booking' , '$service_name', '$voucher_date', '$note' , '$type');";







		$objQuery = mysqli_query( $con, $strSQL );
			
			if ( $objQuery === TRUE ) {
			$last = "SELECT * FROM tb_report WHERE id_booking ='".$id_booking."'";
			$re = mysqli_query( $con, $last );
			$ss = mysqli_fetch_assoc( $re );
			 $resort_name = $ss[ 'room_name' ];
			
			if ($type == '1') {
			echo	$in = " UPDATE `tb_report` SET `car` = '1'   WHERE `tb_report`.`id` ='" . $ss[ 'id' ] . "'";
			}else if ($type == '2') {
				$in = " UPDATE `tb_report` SET `boat` = '1'   WHERE `tb_report`.`id` ='" . $ss[ 'id' ] . "'";
			}else{

				$in = " UPDATE `tb_report` SET `diving` = '1'   WHERE `tb_report`.`id` ='" . $ss[ 'id' ] . "'";
			}

			



			$a = mysqli_query( $con, $in );











			echo "<script> window.location.href = 'report.php?resort_name=$resort_name';</script > ";

		}
			







		








?>
