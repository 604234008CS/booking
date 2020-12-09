<!DOCTYPE html>
<html>
    <?php include "head.php"; ?>
<?php 
    $page = 'index';
    session_start(); 
    if($_SESSION['Username'] == "")
{
    echo "<script> alert('Please Login!!');window.location.href='login.php';</script>";
    exit();
}?>
     <?php

include_once('connectdb.php');
error_reporting(level);
$name = $_REQUEST[ 'name' ];
$name_roomtype = $_REQUEST[ 'name_roomtype' ];
$Checkin = $_REQUEST[ 'Checkin' ];
$Checkout = $_REQUEST[ 'Checkout' ];
$car = $_REQUEST[ 'car' ];
$boat = $_REQUEST[ 'boat' ];
$diving = $_REQUEST[ 'diving' ];
$adult = $_REQUEST[ 'adult' ];
$older_children = $_REQUEST[ 'older_children' ];
$child = $_REQUEST[ 'child' ];

$Checkin55 = isset($_POST['Checkin']) ? $_POST['Checkin'] : '';
$Checkout55 = isset($_POST['Checkout']) ? $_POST['Checkout'] : '';
$datetime1 = new DateTime($Checkin55);
$datetime2 = new DateTime($Checkout55);
$interval = $datetime1->diff($datetime2);
// $diff_result = $interval->format('%y ปี %m เดือน  %d วัน');
$diff_result = $interval->format('%d');



if ($car == "on" ) {
    $car = "ได้เพิ่มรถ";
    $car_num = "500" ;


}else{
    $car = "";
    $car_num = "0" ;
}

if ($boat == "on" ) {
    $boat = "ได้เพิ่มเรือ";
    $boat_num = "1000" ;
}else{
    $boat = "";
    $boat_num = "0" ;
}


if ($diving == "on" ) {
    $diving = "ได้เพิ่มดำน้ำ";
    $diving_num = "500" ;
}else{
    $diving = "";
    $diving_num = "0" ;
}


if ($older_children >= "1" ) {
    if ($name_roomtype == "9" OR $name_roomtype == "10") {
        if ($car != "" && $boat != "" && $diving != "") {
    $sum_adult = $car_num + $boat_num + $diving_num; 
      $sum = ($car_num + $boat_num + $diving_num); 
      $text = "";
   }else{
    $sum_adult = $car_num + $boat_num + $diving_num;
    $sum = $car_num + $boat_num + $diving_num;
    $text = "";
   }
    }else{
            if ($car != "" && $boat != "" && $diving != "") {
    $sum_adult = $car_num + $boat_num + $diving_num; 
      $sum = ($car_num + $boat_num + $diving_num)-1000; 
      $text = "(ส่วนลด 1,000 ต่อท่าน)";
   }else{
    $sum_adult = $car_num + $boat_num + $diving_num;
    $sum = $car_num + $boat_num + $diving_num;
    $text = "";
   }
    }
   
}else{
    $sum_adult = $car_num + $boat_num + $diving_num;
    $sum = $car_num + $boat_num + $diving_num;
    $text = "";
}



 ?>

    <body>
<!--         <div class="pre-loader">
    		<div class="pre-loader-box">
    			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
    			<div class='loader-progress' id="progress_div">
    				<div class='bar' id='bar1'></div>
    			</div>
    			<div class='percent' id='percent1'>0%</div>
    			<div class="loading-text">
    				กำลังตรวจสอบ...
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
                                <div class="weight-600 font-30 text-blue">รายละเอียดเช็คราคาห้องพักของแต่ละรีสอร์ท</div>
                            </h4>
                        </div>
                    </div>
                </div>



<?php 
        $i =1;
        $sql ="SELECT * FROM `tb_roomtype` WHERE `id` = '".$name_roomtype."'";
        $query = mysqli_query($con,$sql);
        while ($results = mysqli_fetch_assoc($query)) { 



$source = $Checkin;
$date = new DateTime($source);
$date_checkin_m = $date->format('m'); 
$date_checkin_d = $date->format('D');
$diff = $diff_result-1;
$arrDate= [];
for ($i=0; $i <= $diff; $i++) { 


array_push($arrDate,  date ("Y-m-d", strtotime("+$i days", strtotime($Checkin)))) ; 
 $datedate55 = date ("Y-m-d", strtotime("+$diff days", strtotime($Checkin)));
 $sql55 ="SELECT * FROM `priceroom` WHERE `date_start` = '".$datedate55."'";
        $query55 = mysqli_query($con,$sql55);
        while ($results55 = mysqli_fetch_assoc($query55)) { 
              $sum_price_room += $results55["price_room"];

        }

}

echo $sum_price_room;     // ค่าทั้งหมด
//print_r($arrDate);
//echo $date_checkin_d;
 //$datedate = date ("Y-m-d", strtotime("+$diff days", strtotime($Checkin)));





if ($date_checkin_m == "10") {

$sumd= 0;

for ($i=0; $i < sizeof($arrDate); $i++) { 
    if ($arrDate[$i]=="Sun") {
       $sumd += $results["price_friday"];
}else if($arrDate[$i]=="Mon"){
    $sumd += $results["price_monday"];
}else if($arrDate[$i]=="Tue"){

    $sumd += $results["price_monday"];

}else if($arrDate[$i]=="Wed"){
   $sumd += $results["price_monday"];

}else if($arrDate[$i]=="Thu"){
    $sumd += $results["price_monday"];
}else if($arrDate[$i]=="Fri"){
    $sumd += $results["price_friday"];
}else if($arrDate[$i]=="Sat"){
    $sumd += $results["price_friday"];
}
}
// echo $sumd;


     
        if ($name_roomtype == "10") {
            $price_roomtype  =  $results["price_monday"]*$diff_result;
        }else {
            if ($adult % 2 == 0) {
                $price_roomtype  =  (($sumd/2)*$diff_result)/$adult;
            }else{
                if ($adult == 3) {
                    $price_roomtype  =  ((($sumd)+($results["extrabed"]*$diff_result)))/$adult;
                }
                else if ($adult == 5) {
                    $price_roomtype  =  ((($sumd*2)+($results["extrabed"]*$diff_result)))/$adult;
                }
                else if ($adult == 7) {
                    $price_roomtype  =  ((($sumd*3)+($results["extrabed"]*$diff_result)))/$adult;
                }
                else if ($adult == 9) {
                    $price_roomtype  =  ((($sumd*4)+($results["extrabed"]*$diff_result)))/$adult;
                }
                else if ($adult == 11) {
                    $price_roomtype  =  ((($sumd*5)+($results["extrabed"]*$diff_result)))/$adult;
                }
            }
        }
       
}else{

        if ($adult % 2 == 0) {
            $price_roomtype  =  ($results["price_roomtype"]/2)*$diff_result;
        }else{
            if ($adult == 3) {
                $price_roomtype  =  ((($results["price_roomtype"])+$results["extrabed"])*$diff_result)/$adult;
            }
            else if ($adult == 5) {
                $price_roomtype  =  ((($results["price_roomtype"]*2)+$results["extrabed"])*$diff_result)/$adult;
            }
            else if ($adult == 7) {
                $price_roomtype  =  ((($results["price_roomtype"]*3)+$results["extrabed"])*$diff_result)/$adult;
            }
            else if ($adult == 9) {
                $price_roomtype  =  ((($results["price_roomtype"]*4)+$results["extrabed"])*$diff_result)/$adult;
            }
            else if ($adult == 11) {
                $price_roomtype  =  ((($results["price_roomtype"]*5)+$results["extrabed"])*$diff_result)/$adult;
            }
        }
}


    

            

         


            ?>




                <div class="pd-20 card-box mb-30">
                    <form action="add_1.php">
                        <div class="row" style="padding-top: 35px;padding-bottom: 20px;">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                  
                                    <label><h4 class="text-blue h4">ที่พัก</h4></label>
                                    <input type="text" name="" class="form-control" value="<?php echo $name ; ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ประเภทห้องพัก</h4></label>
                                    <input type="text" name="" class="form-control" readonly="" value="<?php echo $results["name_roomtype"]?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">Checkin</h4></label>
									<input type="text" name="" class="form-control" readonly="" value="<?php echo $Checkin ; ?>">
                                </div>
                            </div>
                             <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">Checkout</h4></label>
									<input type="text" name="" class="form-control" readonly="" value="<?php echo $Checkout ; ?>">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
								<label class="weight-600"><h4 class="text-blue h4">เเพ็คเเกตเสริม</h4></label>
								<input type="text" name="" class="form-control" readonly="" value="<?php echo $car; ?> <?php echo$boat; ?> <?php echo $diving ; ?>">
                            </div>
                            
                        </div>
                    </form>



                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">ราคาคิดตามเปอร์เซ็นค่าคอม</h4>
                        </div>
                        
                    </div>
                    <table class="table table-bordered" >
                        <thead align="center">
                            <tr>
                                <th scope="col">ประเภท</th>
                                <th scope="col" onClick="menubar('table20')">ราคาขาย 20%</th><th style="background-color: red;color: #fff;" scope="col" onClick="menubar('table20')">ค่าคอม 5%</th>
                                <th scope="col" onClick="menubar('table15')">ราคาขาย 15%</th><th style="background-color: red;color: #fff;" scope="col" onClick="menubar('table15')">ค่าคอม 3%</th>
                                <th scope="col" onClick="menubar('table10')">ราคาขาย 10%</th><th style="background-color: red;color: #fff;" scope="col" onClick="menubar('table10')">ค่าคอม 1%</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <th scope="row">ผู้ใหญ่</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                        <?php  
                                          $sum_20 = (($price_roomtype*20)/100)+$price_roomtype;
                                          echo  number_format(($sum_20),2) ;?> 
                                    </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                        <?php  
                                          $sum_15 = (($price_roomtype*15)/100)+$price_roomtype;
                                          echo  number_format(($sum_15),2) ;?>  
                                    </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                        <?php  
                                          $sum_10 = (($price_roomtype*10)/100)+$price_roomtype;
                                          echo  number_format(($sum_10),2) ;?>  
                                    </span>
                                </th><th scope="row">-</th>
                              

                            </tr>
                            <?php if ($car != "") { ?>
                            <tr>
                                <th scope="row">ค่ารถไป-กลับ ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($boat != "") { ?>
                            <tr>
                                <th scope="row">ค่าเรือไป-กลับ ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       1000
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                       1000
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                       1000
                                   </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($diving != "") { ?>
                            <tr>
                                

                                <th scope="row">ค่าดำน้ำ ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>

                            <tr style="background-color: red;">
                                <th scope="row" style="color: #fff;">ราคารวมสำหรับ <br>ผู้ใหญ่ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                        <?=number_format((($sum_20+$sum_adult)),2)?>
                                    </span>
                                </th><th scope="row"><?=number_format((($sum_20+$sum_adult)*5/100),2)?></th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                        <?=number_format((($sum_15+$sum_adult)),2)?>
                                    </span>
                                 </th><th scope="row"><?=number_format((($sum_15+$sum_adult)*3/100),2)?></th>
                                <th scope="row">
                                    <span class="badge badge-success">

                                        <?=number_format((($sum_10+$sum_adult)),2)?>
                                    </span>
                                </th><th scope="row"><?=number_format((($sum_10+$sum_adult)*1/100),2)?></th>
                            </tr>

                     


                            <?php if ($older_children != "") { ?>
                            <tr>
                                <th scope="row">เด็ก อายุ 4-10 ปี </th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       <?php  
                                          $older_children_20 = (((($results["extrabed"]*$diff_result)*20)/100)+($results["extrabed"]*$diff_result));
                                          echo  number_format(($older_children_20),2) ;?>
                                            
                                    </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                        <?php  
                                          $older_children_15 = (((($results["extrabed"]*$diff_result)*15)/100)+($results["extrabed"]*$diff_result));
                                           echo  number_format(($older_children_15),2) ;?> 
                                       
                                    </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                        <?php  
                                          $older_children_10 = (((($results["extrabed"]*$diff_result)*10)/100)+($results["extrabed"]*$diff_result));
                                           echo  number_format(($older_children_10),2) ;?> 

                                    </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>
                            <?php if ($child != "") { ?>
                            <tr>
                                <th scope="row">เด็ก อายุ 0-3 ปี (ฟรี)</th>
                                <th scope="row"><span class="badge badge-primary">-</span></th>
                                <th scope="row"><span class="badge badge-secondary">-</span></th>
                                <th scope="row"><span class="badge badge-success">-</span></th>
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($car != "") { ?>

                            <tr>
                                <th scope="row">ค่ารถไป-กลับ ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($boat != "") { ?>
                            <tr>
                                <th scope="row">ค่าเรือไป-กลับ ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       1000
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                       1000
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                       1000
                                   </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($diving != "") { ?>
                            <tr>
                                

                                <th scope="row">ค่าดำน้ำ ต่อท่าน</th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                                <th scope="row">
                                    <span class="badge badge-success">
                                       500
                                   </span>
                                </th><th scope="row">-</th>
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($older_children != "") { ?>
                            <tr style="background-color: red;">
                                <th scope="row" style="color: #fff;">ราคารวมสำหรับ <br>เด็ก อายุ 3-10 ปี ต่อท่าน <?php echo $text; ?> </th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                        <?php $older_20 = $older_children_20+$sum ; ?>
                                        <?=number_format(($older_20),2)?>
                                        
                                    </span>
                                </th><th scope="row"><?=number_format((($older_20)*5/100),2)?></th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                         <?php $older_15 = $older_children_15+$sum ; ?>
                                        <?=number_format(($older_15),2)?>
                                    </span>
                                 </th><th scope="row"><?=number_format((($older_15)*3/100),2)?></th>
                                <th scope="row">
                                    <span class="badge badge-success">

                                        <?php $older_10 = $older_children_10+$sum ; ?>
                                        <?=number_format(($older_10),2)?>
                                    </span>
                                </th><th scope="row"> <?=number_format((($older_10)*1/100),2)?></th>
                            </tr>
                            <?php }else{ } ?>
                             


                           <!--  <tr>
                                <th scope="row">ราคารวมสำหรับ <br>ผู้ใหญ่ <?php echo $adult; ?> คน <br>เด็ก อายุ 3-10 ปี <?php echo $older_children; ?> คน </th>
                                <th scope="row">
                                    <span class="badge badge-primary">
                                        <?=number_format(($sum_20*$adult)+($older_children_20*$adult),2)?>
                                    </span>
                                </th>
                                <th scope="row">
                                    <span class="badge badge-secondary">
                                        <?=number_format((($sum_15+$older_children_15)),2)?>
                                    </span>
                                 </th>
                                <th scope="row">
                                    <span class="badge badge-success">

                                        <?=number_format((($sum_10+$older_children_10)),2)?>
                                    </span>
                                </th>
                            </tr> -->
                           
                        </tbody>
                    </table>

                    <div>
                        <div class="pull-center">
                            <h5 class="text-blue h5">รายละเอียดค่าใช้จ่าย   จำนวน <?php echo $diff_result+1; ?> วัน <?php echo $diff_result; ?> คืน </h5>
                            <h5 class="text-blue h5">จำนวนห้อง <?php 
                            if ($adult % 2 == 0) {
                                $bed = ($adult/2);
                               echo $bed; echo "ห้อง"; 
                            }else{
                                $bed = ($adult-1)/2;

                                echo $bed; echo "ห้อง  เตียงเสริม 1 เตียง ";
                            } 

                            ?> </h5>
                            <h5 class="text-blue h5">จำนวน ผู้ใหญ่ <?php echo $adult; ?> คน <br>เด็ก อายุ 3-10 ปี  <?php echo $older_children; ?> คน <br>เด็ก อายุ 0-3 ปี (ฟรี) <?php echo $child; ?> คน</h5>
                        </div>


<!--   form  ราคา 20%  -->
<div id="table20" style="height: 90%; display: none;">
    <h4 class="text-blue h4" align="center">ราคา 20%</h4>
    <table class="table table-bordered">
        <thead align="center">
            <tr>
                <th scope="col">ชื่อรีสอร์ด</th>
                <th scope="col">ประเภทห้องพัก</th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <th scope="row"><?php echo $name ; ?></th>
                <th scope="row"><?php echo $results["name_roomtype"]?></th>
            </tr>

            <?php if ($older_children != "") { ?>
            <tr>
                <th scope="row"></th>
                <th scope="row">Extra Bed</th>
            </tr>
            <?php }else{ } ?>

            <?php if ($car != "") { ?>
            <tr>
                <th scope="row">ค่ารถ</th>
                <th scope="row"><?php echo $car?></th>
            </tr>
            <?php }else{ } ?>

            <?php if ($boat != "") { ?>
            <tr>
                <th scope="row">ค่าเรือ</th>
                <th scope="row"><?php echo $boat?></th>
            </tr>
            <?php }else{ } ?>

            <?php if ($diving != "") { ?>
            <tr>
                <th scope="row">ค่าดำน้ำ</th>
                <th scope="row"><?php echo $diving?></th>
            </tr>
            <?php }else{ } ?>

            <tr>
                <th scope="row">
                    จำนวน ผู้ใหญ่
                    <?php echo $adult; ?>
                    คน <br />
                    เด็ก อายุ 3-10 ปี
                    <?php echo $older_children; ?>
                    คน <br />
                    เด็ก อายุ 0-3 ปี (ฟรี)
                    <?php echo $child; ?>
                    คน
                </th>
                <th scope="row">
                    <?=number_format(($sum_20*$adult)+($older_children_20*$older_children)+(($sum_adult*($_REQUEST[ 'adult' ])+($_REQUEST[ 'older_children' ]*$sum))),2)?>
                </th>
            </tr>
            <tr>
                <th scope="row">ค่าคอมรวม 5%</th>
                <th scope="row">
                    <?php
                                         $a =($sum_20*$adult)+($older_children_20*$older_children)+(($sum_adult*($_REQUEST[ 'adult' ])+($_REQUEST[ 'older_children' ]*$sum)))
                                     ?>
                    <?=number_format((($a)*5/100),2)?>
                </th>
            </tr>
        </tbody>
    </table>
        
    
    <div class="col-md-12 col-sm-12" style="padding-top: 20px;">
    <form action="booking.php" method="POST">
        <input hidden type="text" name="name" id="name" value="<?php echo $name ; ?>" />
        <input hidden type="text" name="name_roomtype" id="name_roomtype" value="<?php echo $results["name_roomtype"]?>" />
        <input hidden type="text" name="days" id="days" value="<?php echo $diff_result+1; ?> วัน <?php echo $diff_result; ?> คืน" />
        <input hidden type="text" name="bed" id="bed" value="<?php echo $bed ?>" />
        <input hidden type="text" name="adult" id="adult" value="<?php echo $adult; ?>" />
        <input hidden type="text" name="older_children" id="older_children" value="<?php echo $older_children; ?>" />
        <input hidden type="text" name="child" id="child" value="<?php echo $child; ?>" />
        <input hidden type="text" name="Checkin" id="Checkin" value="<?php echo $Checkin ; ?>" />
        <input hidden type="text" name="Checkout" id="Checkout" value="<?php echo $Checkout ; ?>" />
        <input hidden type="text" name="sum" id="sum" value="<?php echo $a ; ?>" />
        <input hidden type="text" name="commission_value" id="commission_value" value="<?php echo (($a)*5/100) ; ?>" />

        <input hidden type="text" name="car_num" id="car_num" value="<?php echo $car_num ; ?>" />
        <input hidden type="text" name="boat_num" id="boat_num" value="<?php echo $boat_num ; ?>" />
        <input hidden type="text" name="diving_num" id="diving_num" value="<?php echo $diving_num ; ?>" />
        <input hidden type="text" name="com" id="com" value="5%" />


        <input class="btn btn-primary" type="submit" value="BOOKING" />
    </form>    
    </div>
</div>







                      <div id="table15" style="height: 90%;display: none;">
                        <h4 class="text-blue h4" align="center">ราคา 15%</h4>
                    <table class="table table-bordered" >
                        
                        <thead align="center">
                            <tr>
                                <th scope="col">ชื่อรีสอร์ด</th>
                                <th scope="col">ประเภทห้องพัก</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <th scope="row"><?php echo $name ; ?></th>
                                <th scope="row"><?php echo $results["name_roomtype"]?></th>
                                
                            </tr>

                            <?php if ($older_children != "") { ?>
                            <tr>
                                <th scope="row"></th>
                                <th scope="row">Extra Bed</th>
                            </tr>
                            <?php }else{ } ?>


                            <?php if ($car != "") { ?>
                            <tr>
                                <th scope="row">ค่ารถ</th>
                                <th scope="row"><?php echo $car?></th>
                                
                                
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($boat != "") { ?>
                            <tr>
                                <th scope="row">ค่าเรือ</th>
                                <th scope="row"><?php echo $boat?></th>
                                
                                
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($diving != "") { ?>
                            <tr>
                                <th scope="row">ค่าดำน้ำ</th>
                                <th scope="row"><?php echo $diving?></th>
                                
                                
                            </tr>
                            <?php }else{ } ?>

                            

                            <tr>
                                <th scope="row">จำนวน ผู้ใหญ่ <?php echo $adult; ?> คน <br>เด็ก อายุ 3-10 ปี  <?php echo $older_children; ?> คน <br>เด็ก อายุ 0-3 ปี (ฟรี) <?php echo $child; ?> คน</th>
                                <th scope="row"><?=number_format(($sum_15*$adult)+($older_children_15*$older_children)+(($sum_adult*($_REQUEST[ 'adult' ])+($_REQUEST[ 'older_children' ]*$sum))),2)?></th>
                                
                                
                            </tr>
                            <tr>
                                <th scope="row">รวมค่าคอม 3%</th>
                                <th scope="row">
                                        <?php
                                            $aa = ($sum_15*$adult)+($older_children_15*$older_children)+(($sum_adult*($_REQUEST[ 'adult' ])+($_REQUEST[ 'older_children' ]*$sum)));
                                         ?>
                                    <?=number_format((($aa)*3/100),2)?>
                                </th>
                                
                                
                            </tr>

                            
                            
                            
                           
                        </tbody>
                    </table>
                    <div class="col-md-12 col-sm-12" style="padding-top: 20px;">
                        <form action="booking.php" method="POST">
                            <input hidden type="text" name="name" id="name" value="<?php echo $name ; ?>" />
                            <input hidden type="text" name="name_roomtype" id="name_roomtype" value="<?php echo $results["name_roomtype"]?>" />
                            <input hidden type="text" name="days" id="days" value="<?php echo $diff_result+1; ?> วัน <?php echo $diff_result; ?> คืน" />
                            <input hidden type="text" name="bed" id="bed" value="<?php echo $bed ?>" />
                            <input hidden type="text" name="adult" id="adult" value="<?php echo $adult; ?>" />
                            <input hidden type="text" name="older_children" id="older_children" value="<?php echo $older_children; ?>" />
                            <input hidden type="text" name="child" id="child" value="<?php echo $child; ?>" />
                            <input hidden type="text" name="Checkin" id="Checkin" value="<?php echo $Checkin ; ?>" />
                            <input hidden type="text" name="Checkout" id="Checkout" value="<?php echo $Checkout ; ?>" />
                            <input hidden type="text" name="sum" id="sum" value="<?php echo ($sum_15)+($sum_adult)*2 ; ?>" />
                            <input hidden type="text" name="commission_value" id="commission_value" value="<?php echo (($a)*3/100) ; ?>" />
                            <input hidden type="text" name="car_num" id="car_num" value="<?php echo $car_num ; ?>" />
                            <input hidden type="text" name="boat_num" id="boat_num" value="<?php echo $boat_num ; ?>" />
                            <input hidden type="text" name="diving_num" id="diving_num" value="<?php echo $diving_num ; ?>" />
                            <input hidden type="text" name="com" id="com" value="3%" />

                            <input class="btn btn-primary" type="submit" value="BOOKING" />
                        </form>    
                    </div>
                </div>
                <div id="table10" style="height: 90%;display: none;">
                        <h4 class="text-blue h4" align="center">ราคา 10%</h4>
                    <table class="table table-bordered" >
                        
                        <thead align="center">
                            <tr>
                                <th scope="col">ชื่อรีสอร์ด</th>
                                <th scope="col">ประเภทห้องพัก</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <th scope="row"><?php echo $name ; ?></th>
                                <th scope="row"><?php echo $results["name_roomtype"]?></th>
                                
                            </tr>

                            <?php if ($older_children != "") { ?>
                            <tr>
                                <th scope="row"></th>
                                <th scope="row">Extra Bed</th>
                            </tr>
                            <?php }else{ } ?>


                            <?php if ($car != "") { ?>
                            <tr>
                                <th scope="row">ค่ารถ</th>
                                <th scope="row"><?php echo $car?></th>
                                
                                
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($boat != "") { ?>
                            <tr>
                                <th scope="row">ค่าเรือ</th>
                                <th scope="row"><?php echo $boat?></th>
                                
                                
                            </tr>
                            <?php }else{ } ?>

                            <?php if ($diving != "") { ?>
                            <tr>
                                <th scope="row">ค่าดำน้ำ</th>
                                <th scope="row"><?php echo $diving?></th>
                                
                                
                            </tr>
                            <?php }else{ } ?>


                            <tr>
                                <th scope="row">จำนวน ผู้ใหญ่ <?php echo $adult; ?> คน <br>เด็ก อายุ 3-10 ปี  <?php echo $older_children; ?> คน <br>เด็ก อายุ 0-3 ปี (ฟรี) <?php echo $child; ?> คน</th>
                                <th scope="row"> <?=number_format(($sum_10*$adult)+($older_children_10*$older_children)+(($sum_adult*($_REQUEST[ 'adult' ])+($_REQUEST[ 'older_children' ]*$sum))),2)?>  </th>
                                
                                
                            </tr>
                            <tr>
                                <th scope="row">รวมค่าคอม 1%</th>
                                <th scope="row">
                                        <?php
                                            $aaa = ($sum_10*$adult)+($older_children_10*$older_children)+(($sum_adult*($_REQUEST[ 'adult' ])+($_REQUEST[ 'older_children' ]*$sum)));
                                         ?>
                                    <?=number_format((($aaa)/100),2)?>
                                </th>
                                
                                
                            </tr>

                            
                            
                            
                           
                        </tbody>
                    </table>

                        <div class="col-md-12 col-sm-12" style="padding-top: 20px;">
                        <form action="booking.php" method="POST">
                            <input hidden type="text" name="name" id="name" value="<?php echo $name ; ?>" />
                            <input hidden type="text" name="name_roomtype" id="name_roomtype" value="<?php echo $results["name_roomtype"]?>" />
                            <input hidden type="text" name="days" id="days" value="<?php echo $diff_result+1; ?> วัน <?php echo $diff_result; ?> คืน" />
                            <input hidden type="text" name="bed" id="bed" value="<?php echo $bed ?>" />
                            <input hidden type="text" name="adult" id="adult" value="<?php echo $adult; ?>" />
                            <input hidden type="text" name="older_children" id="older_children" value="<?php echo $older_children; ?>" />
                            <input hidden type="text" name="child" id="child" value="<?php echo $child; ?>" />
                            <input hidden type="text" name="Checkin" id="Checkin" value="<?php echo $Checkin ; ?>" />
                            <input hidden type="text" name="Checkout" id="Checkout" value="<?php echo $Checkout ; ?>" />
                            <input hidden type="text" name="sum" id="sum" value="<?php echo ($sum_10)+($sum_adult)*2 ; ?>" />
                            <input hidden type="text" name="commission_value" id="commission_value" value="<?php echo (($a)/100) ; ?>" />
                            <input hidden type="text" name="car_num" id="car_num" value="<?php echo $car_num ; ?>" />
                            <input hidden type="text" name="boat_num" id="boat_num" value="<?php echo $boat_num ; ?>" />
                            <input hidden type="text" name="diving_num" id="diving_num" value="<?php echo $diving_num ; ?>" />
                            <input hidden type="text" name="com" id="com" value="1%" />
                            <input class="btn btn-primary" type="submit" value="BOOKING" />
                        </form>  
                    </div>
                </div>



                        
                    </div>
                    
                </div>

          
           
           
<?php }  ?>
              

                <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
            </div>
        </div>

        <?php include "footer.php"; ?>



        <script type="text/javascript">
            function menubar(action) {

    if (action == 'table20') {
        $('#table20').show();
        $('#table15').hide();
        $('#table10').hide();
       
    } else if (action == 'table15') {
        $('#table20').hide();
        $('#table15').show();
        $('#table10').hide();;

    } else if (action == 'table10') {
        $('#table20').hide();
        $('#table15').hide();
        $('#table10').show();

    }
}

        </script>
    </body>
</html>
