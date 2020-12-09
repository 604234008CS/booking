<?php
session_start();
include_once( "connectdb.php" );
if(!isset($_SESSION['UserID']))
{
	echo "<script> alert('Please Login!!');window.location.href='index.php';</script>";
	exit();
}
$type = $_REQUEST['type'];
if (!empty($_FILES)){
	// if ( $type == "sl" ) {


	// for($i=0;$i<count($_FILES["file"]["name"]);$i++)
	// {
	// 	if($_FILES["file"]["name"][$i] != "")
	// 	{
	// 		if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],"../img/".$_FILES["file"]["name"][$i]))
	// 		{
				
	// 		}
	// 	}
	// }
	// 			$fileName = $_FILES["file"]["name"][0];
	// 			$fileName1 = $_FILES["file"]["name"][1];
	// 			$fileName2 = $_FILES["file"]["name"][2];
	// 		//insert file information into db table
	// 		$mysql_insert = "INSERT INTO bg (link,Description, status,link1,link2)VALUES('" . $fileName . "','" . $_REQUEST['detail' ] . "','1','" . $fileName1 . "','" . $fileName2 . "')";
	// 		mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
	// 		//echo $uploaded_file; 
	// 		header('Location: manage_slide.php');
		

	// }
	if ( $type == "sl" ) {
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$upload_dir = "../img/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO bg (link,Description, status,type)VALUES('" . $fileName . "','" . $_REQUEST['detail' ] . "','1','" . $_REQUEST['home' ] . "')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $uploaded_file; 
			header('Location: manage_slide.php');
		}

	} else if ( $type == "ga" ) {
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$idroom = $_REQUEST['room'];
		$upload_dir = "../img/imgroom/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO img_room (ID_room,link, status)VALUES('".$idroom."','" . $fileName . "','1')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $uploaded_file;
			//echo $mysql_insert;
			header('Location: manage_gallery.php');
		}

	} else if ( $type == "dining" ) {
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$idroom = $_REQUEST['room'];
		$upload_dir = "../img/imgroom/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO img_room (ID_room,link, status)VALUES('".$idroom."','" . $fileName . "','1')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $uploaded_file;
			//echo $mysql_insert;
			header('Location: dining.php');
		}

	} else if ( $type == "Romance" ) {
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$idroom = $_REQUEST['room'];
		$upload_dir = "../img/imgroom/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO img_room (ID_room,link, status)VALUES('".$idroom."','" . $fileName . "','1')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $uploaded_file;
			//echo $mysql_insert;
			header('Location: romance.php');
		}

	}else if ( $type == "activities" ) {
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$idroom = $_REQUEST['room'];
		$upload_dir = "../img/imgroom/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO img_room (ID_room,link, status)VALUES('".$idroom."','" . $fileName . "','1')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $uploaded_file;
			//echo $mysql_insert;
			header('Location: activities.php');
		}

	}

	else if($type=="ga360"){
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$idroom = $_REQUEST['room'];
		$upload_dir = "../img/img360/";
		$uploaded_file = $upload_dir . $fileName;
		$id360 =	mysqli_query( $con, "SELECT ID_room FROM gallery360 where ID_room = '".$idroom."'" );
		$rowcount = mysqli_num_rows($id360);
		if($rowcount>0){
			if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
					//insert file information into db table
				$mysql_insert ="UPDATE gallery360 SET link = '".$fileName."' WHERE ID_room = '".$idroom."'";
					//$mysql_insert = "INSERT INTO gallery360 (ID_room,link, status)VALUES('".$idroom."','" . $fileName . "','1')";
				mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
					//echo $mysql_insert;
				header('Location: manage_gallery360.php');

			}
			
		}else if($rowcount<=0){
			
			
			if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
					//insert file information into db table
					//$mysql_insert ="UPDATE gallery360 SET link = '".$fileName."' WHERE ID_room = '".$idroom."'";
				$mysql_insert = "INSERT INTO gallery360 (ID_room,link, status)VALUES('".$idroom."','" . $fileName . "','1')";
				mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
					//echo $mysql_insert;
				header('Location: manage_gallery360.php');

			}
			
		}
		



	}

	else if($type=="adroom"){
		$fileName = $_FILES[ 'file' ][ 'name' ];


		$name_room_th = $_REQUEST['name_room_th'];
		
		
		$name_room_en = $_REQUEST['name_room_en'];
		$name_room_cn = $_REQUEST['name_room_cn'];
		$detail_room_th = $_REQUEST['detail_room_th'];
		$detail_room_en = $_REQUEST['detail_room_en'];
		$detail_room_cn = $_REQUEST['detail_room_cn'];
		$price_room = $_REQUEST['price_room'];
		$total_room = $_REQUEST['total_room'];
		$upload_dir = "../img/imgroom/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO room (name_room_th, name_room_en, name_room_cn, detail_room_th, detail_room_en, detail_room_cn, price_room,total_room,image_room)VALUES('".$name_room_th."','".$name_room_en."','".$name_room_cn."','".$detail_room_th."','".$detail_room_en."','".$detail_room_cn."','".$price_room."','".$total_room."','" . $fileName . "')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $_FILES[ 'file' ][ 'tmp_name' ];
			header('Location: rooms.php');

		}

	}else if($type=="package"){
		$fileName = $_FILES[ 'file' ][ 'name' ];
		$name_package = $_REQUEST['name_package'];
		$det_package = $_REQUEST['det_package'];
		$pri_pk = $_REQUEST['pri_pk'];
		$upload_dir = "../img/";
		$uploaded_file = $upload_dir . $fileName;
		if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file ) ) {
			//insert file information into db table
			$mysql_insert = "INSERT INTO package (name_package,det_package,img_package,pri_package)VALUES('".$name_package."','".$det_package."','" . $fileName . "','" . $pri_pk . "')";
			mysqli_query( $con, $mysql_insert )or die( "database error:" . mysqli_error( $con ) );
			//echo $_FILES[ 'file' ][ 'tmp_name' ];
			echo "<script> alert('บันทึกเรียบร้อย!!');window.location.href='package.php';</script>";

		}

	}else if($type=="editpackage"){
		$id_package = $_REQUEST['id_package'];
		$name_package = $_REQUEST['name_package'];
		$det_package = $_REQUEST['det_package'];
		$edit_image_room=$_FILES['file']['name'];
		$pri_pk = $_REQUEST['pri_pk'];
		if(empty($_FILES['file']['name'])){
			
			
			$sqledit = "UPDATE package SET name_package = '$name_package', det_package = '$det_package', pri_package = '$pri_pk' WHERE id_package = $id_package";

		
			if(mysqli_query( $con, $sqledit)){

				echo "<script> alert('บันทึกเรียบร้อย!!');window.location.href='package.php';</script>";
			}
			
			
		}else{

			$upload_dir = "../img/imgroom/";
			$uploaded_file = $upload_dir . $edit_image_room;

			$sqledit = "UPDATE package SET name_package = '$name_package', det_package = '$det_package', img_package = '$edit_image_room', pri_package = '$pri_pk'  WHERE id_package = $id_package";
			if(move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $uploaded_file )){
				mysqli_query( $con, $sqledit);
				echo "<script> alert('บันทึกเรียบร้อย!!');window.location.href='package.php';</script>";
			}
		}
	}
	else if($type=="editroom"){
		$edit_ID_room=$_REQUEST['edit_ID_room'];
		$edit_name_room_th=$_REQUEST['edit_name_room_th'];
		$edit_name_room_en=$_REQUEST['edit_name_room_en'];
		$edit_name_room_cn=$_REQUEST['edit_name_room_cn'];
		$edit_detail_room_th=$_REQUEST['edit_detail_room_th'];
		$edit_detail_room_en=$_REQUEST['edit_detail_room_en'];
		$edit_detail_room_cn=$_REQUEST['edit_detail_room_cn'];
		$edit_price_room=$_REQUEST['edit_price_room'];
		$edit_total_room=$_REQUEST['edit_total_room'];
		$edit_image_room=$_FILES['edit_image_room']['name'];
		if(empty($_FILES['edit_image_room']['name'])){
			
			
			$sqledit = "UPDATE room SET name_room_th = '$edit_name_room_th', name_room_en = '$edit_name_room_en', name_room_cn = '$edit_name_room_cn', detail_room_th = '$edit_detail_room_th', detail_room_en = '$edit_detail_room_en', detail_room_cn = '$edit_detail_room_cn', price_room = '$edit_price_room', total_room = '$edit_total_room' WHERE ID_room = $edit_ID_room";
			if(mysqli_query( $con, $sqledit)){

				header('Location: rooms.php');
			}
			
			
		}else{

			$upload_dir = "../img/imgroom/";
			$uploaded_file = $upload_dir . $edit_image_room;

			$sqledit = "UPDATE room SET name_room_th = '$edit_name_room_th', name_room_en = '$edit_name_room_en', name_room_cn = '$edit_name_room_cn', detail_room_th = '$edit_detail_room_th', detail_room_en = '$edit_detail_room_en', detail_room_cn = '$edit_detail_room_cn', price_room = '$edit_price_room', total_room = '$edit_total_room', image_room = '$edit_image_room' WHERE ID_room = $edit_ID_room";
			if(move_uploaded_file( $_FILES[ 'edit_image_room' ][ 'tmp_name' ], $uploaded_file )){
				mysqli_query( $con, $sqledit);
				header('Location: rooms.php');
			}
		}
	}



}

else if($type=="addpriceroom"){
                $obj = json_decode($_REQUEST['data']);
	  $start 	 = explode("T",$obj->{'start'});
	  $end  	 = explode("T",$obj->{'end'});
	  $end  	 =  date( "Y-m-d", strtotime( $end[0]." -1 day" ) );
	  $idroom    = $obj->{'resource'};	
	  $price  	 = $obj->{'text'};
	
	 $cou = ((strtotime($end) - strtotime($start[0]))/60/60/24)+1;
	 $start = $start[0];
		 for( $i=1; $i <= $cou; $i++ ){
			 $sqledit = "INSERT INTO `priceroom`(`id_priceroom`, `date_start`, `ID_room`, `price_room`) VALUES (null,'".$start."','".$idroom."','".$price."')";
			 mysqli_query( $con, $sqledit);
			 $start   =  date( "Y-m-d", strtotime( $start." +1 day" ) );

		 }
	
		 
	}

else if($type=="editpriceroom"){
                $obj = json_decode($_REQUEST['data']);
	  $start 	 = explode("T",$obj->{'start'});
	  $end  	 = explode("T",$obj->{'end'});
	  $end  	 =  date( "Y-m-d", strtotime( $end[0]." -1 day" ) );
	  $idroom    = $obj->{'id'};	
	  $price  	 = $_REQUEST['price'];
	
	
			 echo $sqledit = "UPDATE `priceroom` SET `price_room`='".$price."' WHERE id_priceroom =".$idroom;
			 mysqli_query( $con, $sqledit);
		 
	}
else if($type=="delpriceroom"){
        	
	  $id  	 = $_REQUEST['id'];
	
	
			 echo $sqledit = "DELETE FROM `priceroom` WHERE id_priceroom =".$id;
			 mysqli_query( $con, $sqledit);
		 
	}

		else if($type=="de"){
        	
	  $start = $_REQUEST['start'];
	  $end  = $_REQUEST['end'];
	  $idroom = $_REQUEST['idroom'];

	 $sqledit = "DELETE FROM priceroom WHERE date_start BETWEEN '".$start."'  AND '".$end."' AND ID_room = ".$idroom;


	mysqli_query( $con, $sqledit);
	echo "<script> alert('ได้ทำการลบเรียบร้อย!!');window.location.href='pricerooms.php';</script>";
		 
	}



?>