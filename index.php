<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<?php 
	include_once('connectdb.php');
	$page = 'index';
	session_start(); 
	error_reporting(0);
	if($_SESSION['Username'] == "")
{
	echo "<script> alert('Please Login!!');window.location.href='login.php';</script>";
	exit();
}?>


<body>



<!-- 	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->
<?php include "header.php"; ?>




	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome Khemtis Booking <div class="weight-600 font-30 text-blue">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</div>
						</h4>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
							<div class="widget-data">
								 <?php 
								 $date1 = date("Y/m/d") ;
								 $date2 = date("m") ;
								// echo $date1 = date("2020-10-27") ;
								 $i1 = 0;

                                        $sql11 ="SELECT * FROM `tb_report` WHERE `transaction_date` = '".$date1."'";
                                        $query11 = mysqli_query($con,$sql11);
                                        while ($results11 = mysqli_fetch_assoc($query11)) {  ?>
                                        	
    							<?php $i1++; } ?>
								<div class="h4 mb-0"><?php echo $i1; ?></div>
								<div class="weight-600 font-14">จำนวน Booking วันนี้</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
						
							<div class="widget-data">
								<?php 
										$i2 = 0;
                                        $sql22 ="SELECT * FROM `tb_report` WHERE `month` = '".$date2."'";
                                        $query22 = mysqli_query($con,$sql22);
                                        while ($results22 = mysqli_fetch_assoc($query22)) {  ?>

                                        	

    							<?php  $i2++; } ?>
    							<div class="h4 mb-0"><?php echo $i2; ?></div>
								<div class="weight-600 font-14">จำนวน Booking เดือนนี้</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
							<div class="widget-data">
								<?php 
										$i3 = 0;
                                        $sql22 ="SELECT * FROM `tb_report` ";
                                        $query22 = mysqli_query($con,$sql22);
                                        while ($results22 = mysqli_fetch_assoc($query22)) {  ?>
                                        	
                                <?php $i3++; } ?>
                                <div class="h4 mb-0"><?php echo $i3; ?></div>
								<div class="weight-600 font-14">จำนวน Booking  ทั้งหมด</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		<!-- 	<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div> -->




			<div class="footer-wrap pd-20 mb-20 card-box">
				Welcome Khemtis Booking <a href="https://www.khemtis.com/booking" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a>
			</div>
		</div>
	</div>
	

	<?php include "footer.php"; ?>

	
</body>
</html>