<!DOCTYPE html>
<html>
    <?php include "head.php"; 
    include_once('connectdb.php');?>

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
                                Welcome Khemtis Booking
                                <div class="weight-600 font-30 text-blue">เพิ่มรีสอร์ท</div>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    
                    <form action="add_1.php" method="POST">
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Username </h4></label>
                                   <input type="text" name="Username" id="Username " value="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Password </h4></label>
                                    <input type="text" name="Password" id="Password" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Name </h4></label>
                                    <input type="text" name="Name" id="Name" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Name </h4></label>
                                     <select class="custom-select col-12" name="status">
                                        <option value="0">ใหญ่สุด</option>
                                        <option value="1">เซลล์</option>
                                        <option value="2">ฝั่งเกาะ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="text" name="type" id="type" hidden="" value="addpersonal">
                                <button type="submit" class="btn btn-warning">บันทึก</button> 
                            </div>
                            
                            
                        </div>
                    </form>
           
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr align="center">
                                    <th style="width: 5%" class="table-plus datatable-nosort">ลำดับ</th>
                                    <th  style="width: 25%">Username</th>
                                    <th  style="width: 25%">Password</th>
                                    <th  style="width: 25%">ชื่อ</th>
                                    <th  style="width: 5%">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php  
                                    //$sql ="SELECT * FROM `tb_resort` ";
                                    $i =1;
                                    $sql ="SELECT * FROM adminlog  ";
                                    $query = mysqli_query($con,$sql);
                                    while ($results = mysqli_fetch_assoc($query)) {  ?>





                                <tr align="center">
                                    <td class="table-plus"><?php echo $i; ?></td>
                                    <td class="table-plus"><?php echo $results["Username"]; ?></td>
                                    <td><?php echo $results["Password"]; ?></td>
                                    <td><?php echo $results["Name"]; ?></td>
                                    <td>
                                        <form action="add_1.php" method="POST">
                                            <input hidden="" class="form-control" name="UserID" id="UserID" value="<?php echo $results["UserID"]; ?>" />
                                            <input hidden="" class="form-control" name="type" id="type" value="deletepersonal" />
                                            <input class="btn btn-danger" type="submit" value="ลบ" style="color: #fff;">
                                           
                                        </form>

                                    </td>
                                </tr>  


                                 <?php  $i++; } ?>


                                

                            </tbody>
                        </table>
                    </div>

             

                <div class="footer-wrap pd-20 mb-20 card-box">Welcome Khemtis Booking <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>
