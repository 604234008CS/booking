<!DOCTYPE html>
<html>
    <?php include "head.php";  
    include_once('connectdb.php');
    error_reporting(0);
    if ($_REQUEST['resort_name'] != "") {
        $resort_name =$_REQUEST['resort_name'];
        $all = 'noall';

        if ($_REQUEST["date_star"] == "") {
            $date_star = date("Y-m-d");
            $date_end = date("Y-m-d");
        }else{
            $date_star = $_REQUEST["date_star"];
            $date_end = $_REQUEST["date_end"];
        }
        

    }else{

        $all = 'all';
        $resort_name = 'โปรดเลือกที่พัก...';
        $date_star = '';
        $date_end = '';
    }
    

    ?>

    <body>
   <!-- 	
    <div class="pre-loader">
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
                            <img src="vendors/images/banner-img.png" alt="" />
                        </div>
                        <div class="col-md-8">
                            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                Welcome Akira Lipe , Ananya Lipe , Thechic Lipe
                                <div class="weight-600 font-30 text-blue">รายงานการจอง</div>
                            </h4>
                        </div>
                    </div>
                </div>


                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">ปริ้นรายงานการจองตามช่วงเวลา</h4>
                    </div> 

                    <div class="pd-20 card-box mb-30">
                    
                    <form action="excel.php"  method="post">
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ที่พัก</h4></label>
                                    <select class="custom-select col-12" name="resort_name"> 
                                        <option value="1">ทั้งหมด</option>
                                         <?php  
                                        $sql1 ="SELECT * FROM `tb_resort` ";
                                        $query1 = mysqli_query($con,$sql1);
                                        while ($results1 = mysqli_fetch_assoc($query1)) {  ?>

                                            <option value="<?php echo $results1["resort_name"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">วันที่เริ่มต้น</h4></label>
                                    <input type="date" class="form-control"  name="date_star">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">วันที่สิ้นสุด</h4></label>
                                    <input type="date" class="form-control"  name="date_end">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">Export</h4></label>
                                    <button type="submit" class="btn btn-warning form-control">Export</button>
                                </div>
                            </div>
                            
                          
                          
                        </div>
                    </form>
                    </div>

                  
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">รายงานการจอง</h4>
                    </div>


                    <div class="pd-20 card-box mb-30">
                    
                    <form action="report.php" method="POST">
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ที่พัก</h4></label>
                                     <select class="custom-select col-12" name="resort_name">
                                        <option selected=""><?php echo $resort_name ?></option>
                                        <?php  
                                        $sql1 ="SELECT * FROM `tb_resort` ";
                                        $query1 = mysqli_query($con,$sql1);
                                        while ($results1 = mysqli_fetch_assoc($query1)) {  ?>
                                            <option value="<?php echo $results1["resort_name"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">วันที่เริ่มต้น</h4></label>
                                    <input type="date" class="form-control"  name="date_star" value="<?php echo $date_star ?>">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">วันที่สิ้นสุด</h4></label>
                                    <input type="date" class="form-control"  name="date_end" value="<?php echo $date_end ?>">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ค้นหา</h4></label>
                                    <button type="submit" class="btn btn-info form-control" style="color:#fff">ค้นหา</button>  
                                </div>
                            </div>
                            
                          
                          
                        </div>
                    </form>
                    </div>


                  
                   
                    <div class="pb-20 table-responsive">
                         <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline">
                            <thead>
                                <tr align="center">
                                    <th class="table-plus datatable-nosort">เลขที่ Booking</th>
                                    <!-- <th>เดือน</th> -->
                                    <th>วันที่ทำรายการ</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>เบอร์โทร</th>
                                    <th>สถานที่เข้าพัก</th>
                                    <th>เเพคเกจ</th>
                                   <!--  <th>จำนวนห้อง</th>
                                    <th>เตียงเสริม</th>
                                    <th>จำนวนลูกค้า</th> -->
                                    <th>วันที่เช็ดอิน</th>
                                    <th>วันที่เช็คเอาท์</th>
                                    <!-- <th>ยอดขาย</th>
                                    <th>มัดจำคงเหลือ</th>
                                    <th>ยอดสุทธิ</th>
                                    <th>เรือ</th>
                                    <th>รถ</th>
                                    <th>ดำน้ำ</th>
                                    <th>สถานะการชำระเงิน</th>
                                    <th>สถานะการเข้าพัก</th>
                                    <th>วันที่เก็บเงินมัดจำ</th>
                                    <th>ต้นทุน</th>
                                    <th>% COM</th>
                                    <th>มูลค่าคอมมิชชั่น</th>
                                    <th>กำไขขาดทุน</th>
                                    <th>หมายเหตุ</th> -->
                                    <th>สถานะการชำระเงิน</th>
                                    <th>สถานะการเข้าพัก</th>
                                 <!--   <th>รายงานรถ</th>
                                     <th>รายงานเรือ</th>
                                    <th>รายงานดำน้ำ</th>
                                    <th>รายงานประกัน</th>
                                    <th>รายงานห้องพัก</th> -->
                                    
                                    <th>รายงาน</th>

                                </tr>
                            </thead>
                            <tbody>

                                
                                    <?php  
                                    //$sql ="SELECT * FROM `tb_resort` ";
                                   

                                    if ($all == 'all') {
                                      $sql ="SELECT * FROM tb_report ";
                                    }else {

                                        if ($_REQUEST["resort_name"] == "1") {
                                          $sql ="SELECT *  FROM tb_report  WHERE transaction_date >= '$date_star' AND transaction_date <= '$date_end' ";
                                        }else{
                                           $sql ="SELECT *  FROM tb_report  WHERE transaction_date >= '$date_star' AND transaction_date <= '$date_end' AND room_name = '$resort_name'";  
                                        }
                                    
                                    }
                                    




                                    $query = mysqli_query($con,$sql);
                                    while ($results = mysqli_fetch_assoc($query)) {  
    $typ_ser = $results["typ_ser"];
    $txt_ser ="";
    $dch1=0;
    $dch2=0;
    if($typ_ser!=""){
             $typ_ser = substr($typ_ser, 1);
             $ex = explode(":",$typ_ser);
             if($ex[0]){$dch1=1;}
             if($ex[1]){$dch2=1;}
    }else{
      $txt_ser = "";
    }
                                     

                                        ?>





                                <tr align="center">
                                    <td class="table-plus" style="padding-left: 40px!important;text-align:left!important"><?php echo $results["id_booking"]; ?> <?php if($results["noid_booking"]!=""){echo "<font color='#17a2b8'>&#9888;</font>";}else{echo "&nbsp;";}?></td>
                                    <!-- <td><?php //echo $results["month"]; ?></td> -->
                                    <td><?php echo $results["transaction_date"]; ?></td>
                                    <td><?php echo $results["name"]; ?></td>
                                    <td><?php echo $results["phone"]; ?></td>
                                    <td><?php echo $results["room_name"]; ?></td>
                                    <td><?php echo $results["package"]; ?></td>
                                  <!--   <td><?php //echo $results["number_of_rooms"]; ?></td>
                                    <td><?php //echo $results["extrabed"]; ?></td>
                                    <td><?php //echo $results["customers"]; ?></td> -->
                                    <td><?php echo $results["checkin"]; ?></td>
                                    <td><?php echo $results["checkout"]; ?></td>
                                   <!--  <td><?php //echo $results["Sales"]; ?></td>
                                    <td><?php //echo $results["deposit"]; ?></td>
                                    <td><?php //echo $results["sum"]; ?></td>
                                    <td><?php //echo $results["car"]; ?></td>
                                    <td><?php //echo $results["boat"]; ?></td>
                                    <td><?php //echo $results["diving"]; ?></td>
                                    <td><?php //echo $results["payment_status"]; ?></td>
                                    <td><?php //echo $results["occupancy_status"]; ?></td>
                                    <td><?php //echo $results["collection_date"]; ?></td>
                                    <td></td>
                                    <td><?php //echo $results["com"]; ?></td>
                                    <td><?php //echo $results["commission_value"]; ?></td>
                                    <td></td>
                                    <td><?php //echo $results["note"]; ?></td>  -->

                                    <td>
                                        <?php   
                                        $stdata = 0;
                                        if ($results["report_status"] == "2") {$stdata = 1; ?>
                                            <b style="color:green"> ชำระเงินเรียบร้อย</b>
                                        <?php }elseif ($results["report_status"] == "3") { $stdata = 1;?>
                                             <b style="color:green"> ชำระเงินเรียบร้อย</b>
                                        <?php }else{ 
                                           if ($results["deposit"] !=0)  { 
                                            ?>
                                            <a data-toggle="modal" data-target="#myModal<?php echo $results["id"]; ?>" type="button"  class="btn btn-info" style="color:#fff">จ่ายมัดจำ</a>
                                           <!--  <b style="color: red;">จ่ายมัดจำ</b> -->
                                        <?php }} ?>
                                        
                                    </td>
                                    <td>
                                        <?php

                                        $today = date("Y-m-d ");  
                                        $timestamp1 = strtotime($today);
                                        $checkin = strtotime($results["checkin"]);
                                        if ($checkin <= $timestamp1) { ?>
                                            <b> เข้าพักแล้ว</b>
                                        <?php }else{ ?>
                                            <b style="color: red;">ยังไม่เข้าพัก</b>
                                        <?php }
                                    
                                     ?>
                                         
                                     </td>
                                    <td>





                                    
                                    <?php if ($results["car"] == 400 ) { ?>


                                        <?php if($stdata == 1 && $dch1==1) { ?>
                                           <a target="" data-toggle="modal" data-target="#myModalcar<?php echo $results["id"]; ?>" type="button"  class="btn btn-warning">ออกใบ BOOK รถ</a>
                                        <?php }else if ($results["deposit"] !=0 && $dch1==1)  { ?>
                                            <a data-toggle="modal" data-target="#myModal" type="button"  class="btn btn-danger" style="color:#fff">ค้างค่ามัดจำ <b style="color:yellow">รถ</b></a>
                                        <?php }else if ($results["report_status"] == '2') { ?>
                                            <b style="color: red;">ชำระเงินเรียบร้อย</b>
                                        <?php }else{ ?>
                                            <a target="" data-toggle="modal" data-target="#myModalcar<?php echo $results["id"]; ?>" type="button"  class="btn btn-warning">ออกใบ BOOK รถ</a>
                                       <?php } ?>

                                    <?php  }else if ($results["car"] == 1) { ?>
                                         <a target="_blank" href="report4.php?id=<?php echo $results['id']; ?>&type=รถ&status=1" type="button"  class="btn btn-success">รายงานรถ</a>
                                    <?php } else {?>
                                        <a target="" href="#" type="button"  class="btn btn-danger">BOOK รถ</a>
                                    <?php } ?>
                                    
                                    
                                    <?php if ($results["boat"] == 800 ) { ?>

                                        <?php if ($stdata == 1 && $dch2==1) { ?>
                                            <a target="" data-toggle="modal" data-target="#myModalboat<?php echo $results["id"]; ?>" type="button"  class="btn btn-warning">ออกใบ BOOK เรือ</a>
                                        <?php }else if ($results["deposit"] !=0 && $dch2==1)  { ?>
                                            <a data-toggle="modal" data-target="#myModal" type="button"  class="btn btn-danger" style="color:#fff">ค้างค่ามัดจำ <b style="color:yellow">เรือ</b></a>
                                        <?php }else if ($results["report_status"] == '2') { ?>
                                            <b style="color: red;">ชำระเงินเรียบร้อย</b>
                                        <?php }else{ ?>
                                             <a target="" data-toggle="modal" data-target="#myModalboat<?php echo $results["id"]; ?>" type="button"  class="btn btn-warning">ออกใบ BOOK เรือ</a>
                                       <?php } ?>



                                    <?php  }else if ($results["boat"] == 1) { ?>
                                        <a target="_blank" href="report4.php?id=<?php echo $results['id']; ?>&type=เรือ&status=2" type="button"  class="btn btn-success">รายงานเรือ</a>
                                    <?php }else {?>
                                         <a target="" href="#" type="button"  class="btn btn-danger">BOOK เรือ</a>
                                    <?php } ?> 



                                    <?php if ($results["diving"] >= 200  ) { ?>


                                        <?php if ($stdata == 1) { ?>
                                            <a target="" data-toggle="modal" data-target="#myModaldiving<?php echo $results["id"]; ?>" type="button"  class="btn btn-warning">ออกใบ BOOK ดำน้ำ</a>
                                        <?php }else if ($results["deposit"] !=0)  { ?>
                                            <a data-toggle="modal" data-target="#myModal" type="button"  class="btn btn-danger" style="color:#fff">ค้างค่ามัดจำ <b style="color:yellow">ดำน้ำ</b></a>
                                        <?php }else if ($results["report_status"] == '2') { ?>
                                            <b style="color: red;">ชำระเงินเรียบร้อย</b>
                                        <?php }else{ ?>
                                              <a target="" data-toggle="modal" data-target="#myModaldiving<?php echo $results["id"]; ?>" type="button"  class="btn btn-warning">ออกใบ BOOK ดำน้ำ</a>
                                       <?php } ?>

                                        
                                       
                                    <?php  }else if ($results["diving"] == 1 ) { ?>
                                        <a target="_blank" href="report3.php?id=<?php echo $results['id']; ?>&type=ดำน้ำ" type="button"  class="btn btn-success">รายงานดำน้ำ</a>
                                    <?php }else{?>
                                        <a target="" href="#" type="button"  class="btn btn-danger">BOOK ดำน้ำ</a>
                                    <?php } ?>
         




                                        

                                    
                                    
                                    <a target="_blank" href="report2.php?id=<?php echo $results['id']; ?>" type="button"  class="btn btn-success">รายงานห้องพัก</a>


                                    
                                        <a target="_blank" href="report5.php?id=<?php echo $results['id']; ?>" type="button"  class="btn btn-success">รายงาน</a>


                                    
                                        <?php if ($results['insurance'] == "9") { ?>
                                          <a target="_blank" href="reportinsurance.php?id_booking=<?php echo $results['id_booking']; ?>" type="button"  class="btn btn-success">รายงานประกันภัย</a>
                                        <?php }else{ ?>
                                            <a target="_blank" href="addinsurance.php?id_booking=<?php echo $results['id_booking']; ?>&resort_name=<?php echo $results['room_name']; ?>" type="button"  class="btn btn-info">ออกใบประกันภัย</a>
                                        <?php } ?>
                                    </td>









<!-- มัดจำที่เหลือModal -->
  <div class="modal" id="myModal<?php echo $results["id"]; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">จ่ายค่ามัดจำที่เหลือ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    <form action="add_1.php" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
         
             <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">เลขที่ booking </h4></label>

                        <input type="text" class="form-control" name="id_booking" id="id_booking" value="<?php echo $results["id_booking"]; ?>"  readonly/>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">จ่ายเเล้ว</h4></label>
                        <input type="numbeer" class="form-control" name="Sales" id="Sales" value="<?php echo $results["Sales"]; ?>" readonly/>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">จ่ายค่ามัดจำที่เหลือ</h4></label>
                        <?php 
                        $balance = $results["sum"]-$results["Sales"]; 
                        ?>
                        <input type="numbeer" class="form-control" name="deposit" id="deposit" value="<?php echo $balance; ?>"/>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ราคาสุทธิ</h4></label>
                        <input type="numbeer" class="form-control" name="sum" id="sum" value="<?php echo $results["sum"]; ?>" readonly/>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                       <label><h4 class="text-blue h4">slip </h4></label>
                        <input type="file" class="form-control" name="file" id="file" placeholder="ระบุ slip" required>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">หมายเหตุ</h4></label>
                        <input type="text" class="form-control" name="note" id="note" value="" />
                        <input hidden type="text" class="form-control" name="type" id="type" value="thechic" />

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="บันทึก" style="color: #fff;">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>





 <!-- The Modal -->
  <div class="modal" id="myModalcar<?php echo $results["id"]; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ออกใบBOOK</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
 <form action="book.php" method="POST">
        <div class="modal-body">
         
             <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ผู้ให้บริการ</h4></label>
                        <input type="text" class="form-control" name="service_name" id="service_name" value="" />
                    </div>
                </div>
                <!-- <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">วันเข้าพัก</h4></label>
                        <input type="date" class="form-control" name="voucher_date" id="voucher_date" value="" />
                    </div>
                </div> -->
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">หมายเหตุ</h4></label>
                        <input type="text" class="form-control" name="note" id="note" value="" />
                        <input hidden class="form-control" name="id_booking" id="id_booking" value="<?php echo $results["id_booking"]; ?>" />
                        <input hidden class="form-control" name="type" id="type" value="1" />

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="บันทึก" style="color: #fff;">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   <!-- The Modal -->
  <div class="modal" id="myModalboat<?php echo $results["id"]; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ออกใบBOOK</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
 <form action="book.php" method="POST">
        <div class="modal-body">
         
             <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ผู้ให้บริการ</h4></label>
                        <input type="text" class="form-control" name="service_name" id="service_name" value="" />
                    </div>
                </div>
                <!-- <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">วันเข้าพัก</h4></label>
                        <input type="date" class="form-control" name="voucher_date" id="voucher_date" value="" />
                    </div>
                </div> -->
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">หมายเหตุ</h4></label>
                        <input type="text" class="form-control" name="note" id="note" value="" />
                        <input hidden class="form-control" name="id_booking" id="id_booking" value="<?php echo $results["id_booking"]; ?>" />
                        <input hidden class="form-control" name="type" id="type" value="2" />

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="บันทึก" style="color: #fff;">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   <!-- The Modal -->
  <div class="modal" id="myModaldiving<?php echo $results["id"]; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ออกใบBOOK</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
 <form action="book.php" method="POST">
        <div class="modal-body">
         
             <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ผู้ให้บริการ</h4></label>
                        <input type="text" class="form-control" name="service_name" id="service_name" value="" />
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">วันเข้าพัก</h4></label>
                        <input type="date" class="form-control" name="voucher_date" id="voucher_date" value="" />
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">หมายเหตุ</h4></label>
                        <input type="text" class="form-control" name="note" id="note" value="" />
                        <input hidden class="form-control" name="id_booking" id="id_booking" value="<?php echo $results["id_booking"]; ?>" />
                        <input hidden class="form-control" name="type" id="type" value="3" />

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="บันทึก" style="color: #fff;">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
                                     </tr>           




                                    <?php  } ?>


                                

                            </tbody>
                        </table>
                    </div>
                </div>

                





  


    

                <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>
