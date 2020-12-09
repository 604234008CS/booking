<!DOCTYPE html>
<html>
    <?php include "head.php"; 
    include_once('connectdb.php');

    $name =  $_POST['name'];
    $name_roomtype =  $_POST['name_roomtype'];
    $days =  $_POST['days'];
    $bed =  $_POST['bed'];
    $adult =  $_POST['adult'];
    $older_children =  $_POST['older_children'];
    $child =  $_POST['child'];
    $Checkin =  $_POST['Checkin'];
    $Checkout =  $_POST['Checkout'];
    $sum =  $_POST['sum'];
    $com =  $_POST['com'];
    $commission_value =  $_POST['commission_value'];
    $car_num =  $_POST['car_num'];
    $boat_num =  $_POST['boat_num'];
    $diving_num =  $_POST['diving_num'];
    $insurance =  $_REQUEST['insurance'];
    $extrabed=  $_REQUEST['extrabed'];
    $typser = $_POST["typser"];



?>

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
                            <img src="vendors/images/banner-img.png" alt="" />
                        </div>
                        <div class="col-md-8">
                            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                BOOKING Khemtis ltinerary Co.,Ltd
                                
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    
                    <form action="addbooking.php" enctype="multipart/form-data" method="post" name="form1" id="form1">
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">ชื่อ </h4></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="ระบุชื่อ" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">เบอร์โทรศัพท์ </h4></label>
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="ระบุเบอร์โทรศัพท์" required>
                                </div>
                            </div>
                             <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">LINE / FACEBOOK</h4></label>
                                    <input type="text" class="form-control" name="line" id="line" placeholder="ระบุเบอร์LINE" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">ทริปเที่ยว </h4></label>
                                    <select class="custom-select col-12" id="adult" name="adult">
                                        <option value=""></option>
                                        <option value="หลีเป๊ะโซนใน">หลีเป๊ะโซนใน</option>
                                        <option value="หลีเป๊ะโซนนอก">หลีเป๊ะโซนนอก</option>
                                         <option value="หลีเป๊ะโซนนอก + โซนใน">หลีเป๊ะโซนใน + โซนนอก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">บริการโดย </h4></label>
                                     <select class="custom-select col-12" id="By" name="By">
                                        <option value=""></option>
                                        <option value="เรือไม้ (JOIN)">เรือไม้ (JOIN)</option>
                                        <option value="เรือไม้ (PRIVATE)">เรือไม้ (PRIVATE)</option>
                                    </select>
                                   
                                </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">slip </h4></label>
                                    <input type="file" class="form-control" name="file" id="file" placeholder="ระบุ slip" required>
                                </div>
                            </div>
                           <!--  <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">ประกัน </h4></label>
                                    <input type="text" class="form-control" name="insurance" id="insurance" placeholder="ระบุ ประกัน" required="">
                                </div>
                            </div> -->
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">สิทธิประโยนช์ที่ได้รับ </h4></label><textarea id="note" name="note" class="form-control" rows="4" cols="50" placeholder="ระบุ หมายเหตุ" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">รายละเอียดเเพคเกจ </h4></label><textarea id="details" name="details" class="form-control" rows="4" cols="50"></textarea>
             
                                </div>
                            </div>

               




<script language="javascript">
       
  function a(){    
      
       var int1 = document.getElementById("sum").value;
       var int2 = document.getElementById("Sales").value;      
       var n1 = parseInt(int1);
       var n2 = parseInt(int2);                  
       if ((isNaN(n1))||(isNaN(n2))){
        document.getElementById("deposit").setAttribute("color","red");
        var deposit55 = document.getElementById("deposit").value = s;
        document.getElementById("deposit").value = "ERROR";
        
       }    
       else {         
          s=n1-n2;      
          document.getElementById("deposit").setAttribute("color","green");
          var deposit55 = document.getElementById("deposit").value = s;
          document.getElementById("deposit").value = deposit55;

       }
      }

</script>



                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">จ่ายมัดจำ </h4></label>
                                   <input   type="text" class="form-control" name="Sales" id="Sales" value="" onchange="a()" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">คงเหลือ </h4></label>
                                    <input   type="text" class="form-control" name="deposit" id="deposit" value="<?php echo $sum; ?>" readonly />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">ราคารวมทั้งหมด </h4></label>
                                   <input   type="number" min="<?php echo $sum; ?>" class="form-control" name="sum" id="sum" value="<?php echo $sum; ?>" onchange="a()"/>
                                </div>
                            </div>


                     <!--    <?php if ($car_num != 0 ) { ?>
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label><h4 class="text-blue h4"> ผู้บริการรถ</h4></label>
                                        <input type="text" class="form-control" name="Carrier_name" id="Carrier_name" placeholder="ระบุ ผู้บริการ">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">หมายเหตุ </h4></label>
                                    <input type="text" class="form-control" name="Carrier_name_note" id="Carrier_name_note" placeholder="ระบุ หมายเหตุ">
                                </div>
                            </div>
                        <?php  }else{?>

                        <?php } ?>
                            
                        <?php if ($boat_num != 0 ) { ?>
                            

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">ผู้บริการเรือ </h4></label>
                                    <input type="text" class="form-control" name="note" id="note" placeholder="ระบุ ผู้บริการ">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">หมายเหตุ </h4></label>
                                    <input type="text" class="form-control" name="note" id="note" placeholder="ระบุ หมายเหตุ">
                                </div>
                            </div>
                        <?php  }else{?>

                        <?php } ?> 

                            

                        <?php if ($diving_num != 0 ) { ?>
                            

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">ผู้บริการดำน้ำ </h4></label>
                                    <input type="text" class="form-control" name="note" id="note" placeholder="ระบุ ผู้บริการ">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">วันที่ดำน้ำ </h4></label>
                                    <input type="text" class="form-control" name="note" id="note" placeholder="ระบุ วันที่ดำน้ำ">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">หมายเหตุ </h4></label>
                                    <input type="text" class="form-control" name="note" id="note" placeholder="ระบุ หมายเหตุ">
                                </div>
                            </div>
                        <?php  }else{?>

                        <?php } ?>     -->

                            

                            

                           

        <input hidden type="text" name="typser" value="<?php echo$typser; ?>">
        <input hidden  type="text" name="room_name" id="room_name" value="<?php echo $name ; ?>" />
        <input hidden  type="text" name="days" id="days" value="<?php echo $days ;?> " />
        <input hidden  type="text" name="name_roomtype" id="name_roomtype" value="<?php echo $name_roomtype?>" />
        <input hidden  type="text" name="package" id="package" value="<?php echo $days; ?>" />
        <input hidden  type="text" name="number_of_rooms" id="number_of_rooms" value="<?php echo $bed ?>" />
        <input hidden  type="text" name="customers" id="customers" value="<?php echo $adult; ?>" />
        <input  hidden  type="text" name="older_children" id="older_children" value="<?php echo $older_children; ?>" />
        <input  hidden type="text" name="child" id="child" value="<?php echo $child; ?>" />
        <input hidden  type="text" name="checkin" id="checkin" value="<?php echo $Checkin ; ?>" />
        <input hidden  type="text" name="checkout" id="checkout" value="<?php echo $Checkout ; ?>" />
        <input hidden  type="text" name="insurance" id="insurance" value="<?php echo $insurance; ?>">
   
        <input hidden  type="text" name="car_num" id="car_num" value="<?php echo $car_num ; ?>" />
        <input hidden  type="text" name="boat_num" id="boat_num" value="<?php echo $boat_num ; ?>" />
        <input hidden  type="text" name="diving_num" id="diving_num" value="<?php echo $diving_num ; ?>" />
        <input hidden  type="text" name="commission_value" id="commission_value" value="<?php echo $commission_value; ?>" />
        <input hidden  type="text" name="com" id="com" value="<?php echo $com; ?>" />
        <input hidden  type="text" name="extrabed" id="extrabed" value="<?php echo $extrabed; ?>" />
        





                            <div class="col-md-4 col-sm-12">
                                <input type="text" name="type" id="type" hidden="" value="addresort">
                                <button type="button" onclick="submit();"  class="btn btn-warning">บันทึก</button> 
                            </div>
                            
                            
                        </div>
                    </form>
                </div>

             

                <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
            </div>
        </div>
        <script type="text/javascript">
            function submit() {
                document.getElementById('form1').submit();
                }
        </script>

        <?php include "footer.php"; ?>
    </body>
</html>


