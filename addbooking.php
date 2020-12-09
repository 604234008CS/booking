<?php
//require( "PHPMailer/class.phpmailer.php" );
//require( "PHPMailer/PHPMailerAutoload.php" );
include_once( 'connectdb.php' );







    $month =  date('m');
    $transaction_date =  date('d-m-Y');
    $name =  $_POST['name'];
    $phone =  $_POST['phone'];
    $line =  $_POST['line'];
    $room_name =  $_POST['room_name'];
    $typser = $_POST['typser'];

    $ch1 =  $_POST['older_children'];
    $ch2 =  $_POST['child'];

    $package =  $_POST['package'];
    $number_of_rooms =  $_POST['number_of_rooms'];
    // $extrabed =  $_REQUEST['extrabed'];
    $customers =  $_POST['customers'];
	
	$checkin =  $_POST['checkin'];
    $checkin1 = strtotime( $checkin );
	$checkin2 = date( 'Y-m-d', $checkin1 );

	$checkout =  $_POST['checkout'];
	$checkout1 = strtotime( $checkout );
	$checkout2 = date( 'Y-m-d', $checkout1 );
    $Sales =  $_POST['Sales'];
    $insurance =  $_POST['insurance'];


    $deposit =  $_POST['sum']-$Sales;

    if ($deposit > 0) {
    	$report_status = 1;
        $d = "มัดจำ";
    }else{
    	$report_status = 0;
         $d = "จ่ายเต็ม";
    }


    $sum =  $_POST['sum'];
    $car =  $_POST['car_num'];
    $boat =  $_POST['boat_num'];
    $diving =  $_POST['diving_num'];

    // $payment_status =  $_REQUEST['payment_status'];
    // $occupancy_status =  $_REQUEST['occupancy_status'];
    // $collection_date =  $_REQUEST['collection_date'];
    $com =  $_POST['com'];
    $commission_value =  $_POST['commission_value'];
    $note =  $_POST['note'];
    $details =  $_POST['details'];
    $Byyy = $_POST['By'];
    $days = $_POST['days'];
    $fileName = $_FILES[ 'file' ][ 'name' ];
    if ($_REQUEST['extrabed'] == "") {
    	$extrabed =  "";
    }else{
    	$extrabed =  $_POST['extrabed'];
    }
    $adult =  $_POST['adult'];


    
    // $Carrier_name_note = $_REQUEST['Carrier_name_note'];
	$name_roomtype = $_POST['name_roomtype'];

    $upload_dir = "img/slips/";
	$uploaded_file = $upload_dir . $fileName;



if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
}
	//insert file information into db table
    // echo	$strSQL = "INSERT INTO `tb_report` (`id`, `id_booking`,`month`, `transaction_date`, `name`, `phone`, `room_name`, `package`, `number_of_rooms`,`extrabed`, `customers`,`checkin`,`checkout`,`Sales`,`deposit`,`sum`,`car`,`boat`,`diving`,`payment_status`,`occupancy_status`,`collection_date`,`com,commission_value`,`insurance`,`slip`,`note`) 
    //VALUES (NULL, '5','$month',NOW(), '$name', '$phone', '$room_name', '$package', '$number_of_rooms','$extrabed', '$customers','$checkin2 ', '$checkout2' , '$Sales', '$deposit', '$sum', '$car', '$boat', '$diving', '1', '1', NOW(), '$com', '$commission_value' , '$insurance', '$fileName', '$note');";


 $strSQL ="INSERT INTO `tb_report` (`id`, `id_booking`, `month`, `transaction_date`, `name`, `phone`, `line`, `room_name`, `name_resort`, `package`, `number_of_rooms`, `extrabed`, `customers`, `checkin`, `checkout`, `Sales`, `deposit`, `sum`, `car`, `boat`, `diving`, `payment_status`, `occupancy_status`, `collection_date`, `com`, `commission_value`, `adult`, `insurance`, `slip`,`note`,`details`,`Byyy`,`noid_booking`,`report_status`,ch1,ch2,typ_ser,status_pay)  VALUES (NULL, '','$month',NOW(), '$name', '$phone', '$line', '$room_name','$name_roomtype', '$package', '$number_of_rooms','$extrabed', '$customers','$checkin2 ', '$checkout2' , '$Sales', '$deposit', '$sum', '$car', '$boat', '$diving', '1', '1', NOW(), '$com', '$commission_value' , '$adult', '$insurance', '$fileName','$note','$details','$Byyy','','$report_status',$ch1,$ch2,'$typser',1);";






		$objQuery = mysqli_query( $con, $strSQL );
			
			if ( $objQuery === TRUE ) {
			$last = "SELECT * FROM tb_report ORDER BY id DESC LIMIT 1";
			$re = mysqli_query( $con, $last );
			$ss = mysqli_fetch_assoc( $re );
			$resort_name = $ss[ 'room_name' ];

			$num = substr("0000".$ss[ 'id' ], -4);
			$text = "".$num;
		    $text1 = "".$num;
			
			

			$in = " UPDATE `tb_report` SET `id_booking` = '".$text."' WHERE `tb_report`.`id` ='" . $ss[ 'id' ] . "'";
			$a = mysqli_query( $con, $in );
            }
    echo "<script> window.location.href = 'report.php?resort_name=$resort_name'</script > ";


/*

            //----------------------- LINE-------------------https://thechiclipe.com/form_resort/report5.php?id=1------------------------------\ninvoice: http://tsuslowhostel.com/filePDF/" . $idb . ".pdf"
    $Token = "3CE5IOOxiuntE6OtBxXAMAgkJjgcl01ibxvAQSZBjvp";
    $message = "\nเลขที่ ".$text."\nชื่อลูกค้า :" . $name . " \nโรงเเรมที่จอง: " . $room_name . "\nวันที่เช็คอิน: " . $checkin . "\nวันที่เช็คเอาท์: " . $checkout . "\nสถานะการชำระเงิน ".$d."\nยอดเงินในการชำระ: " . $Sales . "\nติดต่อ: " . $phone. "\nInvoice: https://thechiclipe.com/form_resort/report5.php?id=". $ss[ 'id' ];



    $lineapi = $Token; // ใส่ token key ที่ได้มา
    $mms = trim( $message ); // ข้อความที่ต้องการส่ง
    
    date_default_timezone_set( "Asia/Bangkok" );
    $chOne = curl_init();
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify" );
    // SSL USE 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0 );
    //POST 
    curl_setopt( $chOne, CURLOPT_POST, 1 );
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms" );
    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1 );
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $lineapi . '', );
    curl_setopt( $chOne, CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1 );
    $result = curl_exec( $chOne );
    //Check error 
    if ( curl_error( $chOne ) ) {
        echo "<script> alert(''error:'" . curl_error( $chOne ) . "');</script>";
    } else {
        $result_ = json_decode( $result, true );
        // echo "status : ".$result_['status']; echo "message : ". $result_['message'];
    }
    curl_close( $chOne );

    //------------------------------------end LINE----------------------------------------------













			echo "<script> window.location.href = 'report.php?resort_name=$resort_name'</script > ";

		}
			
		}



*/


		














?>
