<!DOCTYPE html>
<?php include_once('../connectdb.php');
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set("Asia/Bangkok");
$lang = $_REQUEST['lang'];

if($lang =='en'){
	include('../en.php');
	
	$nr="name_room_en";
		$dt="detail_room_en";
	$fde="detail_en";
	
}else if($lang =='th'){
	include('../th.php');
	
	$nr="name_room_th";
		$dt="detail_room_th";
	$fde="detail_th";
}else if($lang =='cn'){
	include('../cn.php');
	
	$nr="name_room_cn";
		$dt="detail_room_cn";
	$fde="detail_cn";
}		
?>




<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
  <meta name="keywords" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">

  <meta name="author" content="Ansonika">
  <title>THE CHIC LIPE | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน | โฮสเทลสุดหรูราคาถูก</title>
  <meta name="description" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
<meta name="subject" CONTENT="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
<meta name="author" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
<meta name="copyright" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
<meta name="distribution" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
<meta name="robots" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">
<meta name="rating" content="เดอะชิคหลีเป๊ะ,ที่พักหลีเป๊ะ,โรงแรมหลีเป๊ะ,รีสอร์ทหลีเป๊ะ,รีสอรท์ Lipe,koh lipe,Thechic lipe , | แพ็คเกจเกาะหลีเป๊ะ 3วัน 2 คืน , โฮสเทลสุดหรูราคาถูก ">

	<!-- Favicons-->
	<link rel="icon" type="image/png" href="../assets/img/favicon.png"/>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="css/base.css" rel="stylesheet">







	<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->
<section>
    	 <div class="layer"></div>
    <header>
    <div class="container">
        <div class="row">
            <div class="col--md-3 col-sm-3 col-xs-3">
                <a href="../index.php" id="logo">
                <img src="../img/logo1.png" width="190" height="23" alt="" data-retina="true">
                </a>
            </div>
            <nav  class="col--md-9 col-sm-9 col-xs-9">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
           
            <ul id="lang_top">
				
                               <?php if($_REQUEST["lang"]=='en'){
echo "<li class='page-item'> <a class='active' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=en'>EN</a></li> ";			 
echo "<li class='page-item'><a class='page-link' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=th'>TH</a></li> ";			echo "<li class='page-item'><a class='page-link' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=cn'>CN</a></li> ";			 
											}else if($_REQUEST["lang"]=='th'){
echo "<li class='page-item'> <a class='page-link' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=en'>EN</a></li> ";			 
echo "<li class='page-item'> <a class='active' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=th'>TH</a></li> ";
	echo "<li class='page-item'><a class='page-link' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=cn'>CN</a></li> ";	
					}else if($_REQUEST["lang"]=='cn'){
echo "<li class='page-item'> <a class='page-link' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=en'>EN</a></li> ";			 
echo "<li class='page-item'> <a class='page-link' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=th'>TH</a></li> ";
	echo "<li class='page-item'><a class='active' href ='room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=cn'>CN</a></li> ";	
					} ?>
             
            </ul>
            <div class="main-menu">
                <div id="header_menu">
                     <img src="img/logo750.png" width="250" height="50" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                <ul class="nav navbar-nav navbar-right">
                    <!--<a href="javascript:void(0);" class="show-submenu">Home<i class="icon-down-open-mini"></i></a>
                    <ul>
                        <li><a href="index.html">Home Booking</a></li>
                        <li><a href="index_5.html">Home Booking date 2</a></li>
                        <li><a href="index_4.html">Home Carousel</a></li>
                        <li><a href="index_2.html">Home Layer Slider</a></li>
                        <li><a href="index_6.html">Home Video bg</a></li>
                        <li><a href="index_3.html">Home Text Rotator</a></li>
                    </ul>
                    </li>-->
<li class="active"><a href="../index.php" data-nav-section="welcome"><?php echo $home;?></a></li>
<li class="active"><a href="../index.php" data-nav-section="welcome"><?php echo $booking;?></a></li>
<li class="active"><a href="../index.php" data-nav-section="welcome"><?php echo $lifestyle;?></a></li>
<li class="active"><a href="../gallery1.php?lang=<?php echo $lang;?>" data-nav-section="welcome"><?php echo $gallery;?></a></li>
<li class="active"><a href="../index.php" data-nav-section="welcome"><?php echo $room;?></a></li>


<li class="active"><a href="../index.php" data-nav-section="welcome"><?php echo $location;?></a></li>
<li class="active"><a href="../PACKAGE.php" data-nav-section="welcome"><?php echo $package;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge blink_me" style="background-color: #f44336; position: absolute;  top: 10px;  right: 0px;  font-weight: 300;  padding: 3px 6px; }"> Hot!! </span></a></li>
<li><a onClick="footFunction();"><?php echo $contact;?></a></li>


                </ul>
						<script type="text/javascript">

function footFunction(){ 
 document.getElementById("myAnchor").focus();
	
}
</script>
            </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
    </header>
</section>

	<!-- SubHeader =============================================== -->
	<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="../img/DSC_0940.JPG" data-natural-width="1200" data-natural-height="350">
		<div id="subheader">
			<h1>The Chic Lipe</h1>
		</div>
		<!-- End subheader -->
	</section>
	<!-- End section -->
	<!-- End SubHeader ============================================ -->



<?php 

$checkin3 = $_REQUEST['checkin'];

$checkout3 = $_REQUEST['checkout'];


$people = $_REQUEST['people'];
$night = $_REQUEST['night'];


  

 
   $date = $_REQUEST['checkin'];
    $date = strtotime($date);
   $checkin = date('Y-m-d', $date);

   $date = $_REQUEST['checkout'];
    $date = strtotime($date);
   $checkout = date('Y-m-d', $date);


?>
<?php 
if ($checkin3 == "") {
 echo "<script> alert('Please select a date first.!!');window.location.href='../index.php';</script>";
}elseif ($checkout3 == "") {
 echo "<script> alert('Please select a date first.!!');window.location.href='../index.php';</script>";
}elseif ($people =="") {
echo "<script> alert('Please select a date first.!!');window.location.href='../index.php';</script>";
}else{

}

?>

	<div class="container margin_60">
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<div class="row">
						<?php   
 $sqlnum = "SELECT ID_room FROM room";
$sqlqu = mysqli_query( $con, $sqlnum );		
$num = mysqli_num_rows($sqlqu);
					
    				

  $sumroom =0;

$sql = ( "SELECT * FROM room " );
    $res = mysqli_query( $con, $sql );
    while ( $r = mysqli_fetch_assoc( $res ) ) { 
    	$ID_room = $r[ 'ID_room' ];


		 ?>
					<div class="room_desc clearfix">
						<div class="col-md-7">
							<figure><img src="../img/<?php echo $r['image_room'];?>" alt="" class="img-responsive">
							</figure>
						</div>
						<div class="col-md-5 room_list_desc">
							<h3>
								<?php echo $r[ $nr ];?>
							</h3>
							<p>
								<?php echo $r[ $dt ];?>
							</p>
							<ul>
								<li>
									<div class="tooltip_styled tooltip-effect-4">
										<span class="tooltip-item"><i class="icon_set_2_icon-104"></i></span>
										<div class="tooltip-content">King size bed</div>
									</div>
								</li>
								<li>
									<div class="tooltip_styled tooltip-effect-4">
										<span class="tooltip-item"><i class="icon_set_2_icon-118"></i></span>
										<div class="tooltip-content">Shower</div>
									</div>
								</li>

								<?php if ($r['ID_room'] == 1) {?>
									<li>
									<div class="tooltip_styled tooltip-effect-4">
										<span class="tooltip-item"><i class="icon_set_2_icon-116"></i></span>
										<div class="tooltip-content">Plasma TV</div>
									</div>
								</li>
								<?php }else{?>

								<?php } ?>
 								
							</ul>
							<?php
							$id_room = $r['ID_room'];
							//------------------------------------ ตรวจสอบห้องพัก ----------------------------------

									$sqln ="SELECT *, SUM(num_room) AS sumroom FROM booking WHERE STATUS <= 2 AND( ( checkin BETWEEN '$checkin 12:01:00' AND '$checkout 12:00:00' ) OR( checkout BETWEEN '$checkin 12:01:00' AND '$checkout 12:00:00' ) OR( '$checkin 12:01:00' BETWEEN checkin AND checkout ) OR( '$checkout 12:00:00' BETWEEN checkin AND checkout ) ) AND booking.ID_room = '$id_room'";
		
		                                
		
										$sqlcount = mysqli_query($con,$sqln);
		                                 $resu = mysqli_fetch_array($sqlcount);
		                            
		                              
		
										$sqlnumrow = mysqli_num_rows($sqlcount);


										    
									    $balance = $r[ 'total_room' ] -  $resu['sumroom'];
								   if ( $balance <= 0 ) 
								   { 
								?>
							<a role="button" class="btn btn-lg btn-danger" disabled>sold out</a>

							<?php  }else {   
									   if($r[ 'ID_room' ]==1){ ?>
							<?php if($people/2 > $balance){?>
										   <a role="button" class="btn btn-lg btn-danger" disabled><?php echo $booknow?></a>
										   
									   <?php }else{ ?>

							<a href="booking.php?idroom=<?php echo $r[ 'ID_room' ]."&checkin=".$checkin."&checkout=".$checkout."&people=".$people."&lang=".$_REQUEST["lang"];?>" role="button" class="btn btn-lg btn-danger" ><?php echo $booknow;?></a>
                              <!--  <a role="button" class="btn btn-lg btn-danger" disabled><?php echo $booknow?></a>--><?php  }?>
							
							
							<?php   	}else{?>

				<?php if($people > $balance){?>
										   <a role="button" class="btn btn-lg btn-danger" disabled><?php echo $booknow?></a>
										   
									   <?php }else{ ?>
							<a href="booking.php?idroom=<?php echo $r[ 'ID_room' ]."&checkin=".$checkin."&checkout=".$checkout."&people=".$people."&lang=".$_REQUEST["lang"];?>" role="button" class="btn btn-lg btn-danger" ><?php echo $booknow;?></a>
                           <!--  <a role="button" class="btn btn-lg btn-danger" disabled><?php echo $booknow?></a>-->

							<?php   }	}  
								   }
	     
							
							?>
							
							<?php if($_REQUEST["lang"]=='en'){
echo "<a  href ='../room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=en&idroom=".$r[ 'ID_room' ]."' role='button' class='btn btn-lg btn-primary' >".$roomdetail."</a>";			 
					 
											}else if($_REQUEST["lang"]=='th'){
	 
echo "<a  href ='../room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=th&idroom=".$r[ 'ID_room' ]."' role='button' class='btn btn-lg btn-primary'>".$roomdetail."</a>";
					}else if($_REQUEST["lang"]=='cn'){
	 
echo "<a  href ='../room_detail.php?checkin=".$_REQUEST['checkin']."&checkout=".$_REQUEST['checkout']."&people=".$_REQUEST['people']."&night=".$_REQUEST['night']."&lang=cn&idroom=".$r[ 'ID_room' ]."' role='button' class='btn btn-lg btn-primary'>".$roomdetail."</a>";
					} ?>
							
							
							
						</div>               
                            
                            <?php if($balance<=0){
								echo "No vacancy<br>";}
		    else {
				 if($r[ 'ID_room' ]==1){
				echo "<b>$Our_last <B style='color: #FF0000 ;font-size: 18px;margin:auto; 15%;'>".$balance." </B>$room!</b><br>";
				 }else{
					 echo "<b>$Our_last <B style='color: #FF0000 ;font-size: 18px;margin:auto; 15%;'>".$balance." </B>$Bad!</b><br>";
				 }
				 }


    // -------------  ดึงราคา จากปฏิทิน ที่ตั้งราคาเอง  --------------------
  	$sql_pr ="SELECT * FROM priceroom where date_start = '".$checkin."' AND ID_room = ".$r[ 'ID_room' ];
		 $query_pr = mysqli_query($con,$sql_pr);
		if($pr = mysqli_fetch_assoc($query_pr)) {
			 // -------------- ตัวแปร ราคา ห้อง
			$prroom = $pr["price_room"];
		}else{
			//--------------- ดึงราคาปกติ หากไม่มีในฐานปฎิทิน ------------------
			$sql_p = ( "SELECT * FROM room where ID_room = ".$r[ 'ID_room' ]);
    					$res_p = mysqli_query( $con, $sql_p );
						if($r_p = mysqli_fetch_assoc( $res_p )){
							// -------------- ตัวแปร ราคา ห้อง
							$prroom = $r_p["price_room"];
						}
		}
			

		if($r[ 'ID_room' ]==1){ 
						
			 	
			
						
			
						?>
			<strike><?php echo $normalprice ;?><B style="font-size: 22px;margin:auto; 15%;">THB&nbsp;<?php echo $prroom+1000?></B>/ <?php echo $room; ?></strike> <br> <?php
					echo $specialprice ;?><B style="color: #FF0000 ;font-size: 22px;margin:auto; 15%;">THB&nbsp;<?php echo $prroom?></B>/ <?php echo $room;   
		}else{ ?>

			<strike><?php echo $normalprice ;?><B style="font-size: 22px;margin:auto; 15%;">THB&nbsp;<?php echo $prroom+1000?></B>/ <?php echo $Bad; ?></strike> <br> <?php
			echo $specialprice ;?><B style="color: #FF0000 ;font-size: 22px;margin:auto; 15%;">THB&nbsp;<?php echo $prroom?></B>/ <?php echo $Bad;
		}
						
						
						
						?>
					</div>
					<?php }
	
								   ?>
					
					
					
					

	
								  
					
					
				</div>
				<!-- End row room -->




			</div>
			<div class="col-lg-3 col-md-4 sidebar">

				<div class="theiaStickySidebar">
					<div class="box_style_3" id="general_facilities">
						<h3><?php echo $ReservationDate;?></h3>
							<h5 align="center">
									<?php echo $book;?>
								</h5>
						<ul>
							<label><h3><?php echo $checkins;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h3></label>
							<?php echo $checkin; ?>
							<label><h3><?php echo $checkouts;?> &nbsp;&nbsp;&nbsp;&nbsp;:</h3></label>
							<?php echo $checkout; ?>
						<!--	<label><h3>Nights: &nbsp;&nbsp;&nbsp;&nbsp;:</h3></label>
							<?php echo $night; ?>   -->
							<label><h5><?php echo $peoples;?></h5></label>
							<b><?php echo $people; ?></b> <?php echo $sperson;?><br>
							<center><a href="../index.php" data-nav-section="reservation" class="btn btn-sm btn-danger"><?php echo $Edit;?></a>
							</center>

						</ul>
					</div>
    <?php $font2 = ( "SELECT * FROM fontweb where type='ph' " );
                    $re2 = mysqli_query( $con, $font2 );
    $ro2 = mysqli_fetch_assoc( $re2 );?>

					<div class="box_style_2">
						<i class="icon_set_1_icon-90"></i>
						<h4><?php echo $help;?></h4>
						<a href="tel://<?php echo $ro2[$fde];?>" class="phone"><?php echo $ro2[$fde];?></a>
						<small><?php echo $everyday;?> 9.00am - 7.30pm</small>
					</div>

				</div>
			</div>

		</div>
		<!-- End row -->
	</div>
	<!-- End container -->

        <section >
        <a id="myAnchor" href="#"></a>
              <?php include_once('../footer.php');
?>
          </section>


	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="assets/validate.js"></script>
	<script src="js/functions.js"></script>


	<!-- SPECIFIC SCRIPTS -->
	<script src="js/theia-sticky-sidebar.js"></script>
	<script>
		jQuery( '.sidebar' ).theiaStickySidebar( {
			additionalMarginTop: 80
		} );
	</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126797972-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126797972-1');
</script>

</body>

</html>