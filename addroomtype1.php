<!DOCTYPE html>
<html>
<?php include "head.php";
include_once('connectdb.php');
if ($_POST['id'] != "") {
    $id = $_POST['id'];
} else {
    $id = "1";
}

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
                            Welcome Akira Lipe , Ananya Lipe , Thechic Lipe
                            <div class="weight-600 font-30 text-blue">เพิ่มประเภทห้องพัก , ราคาห้องพัก</div>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">เพิ่มประเภทห้องพัก , ราคาห้องพัก</h4>
                    </div>
                </div>
                <form action="add_1.php" method="POST">
                    <div class="row" style="padding-top: 35px;">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">ที่พัก</h4>
                                </label>
                                <select class="custom-select col-12" name="id_resort" id="id_resort">
                                    <option selected="">โปรดเลือกที่พัก...</option>
                                    <?php
                                    $sql = "SELECT * FROM `tb_resort` ";
                                    $query = mysqli_query($con, $sql);
                                    while ($results = mysqli_fetch_assoc($query)) {  ?>
                                        <option value="<?php echo $results["id"]; ?>"><?php echo $results["resort_name"]; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">ประเภทห้องพัก</h4>
                                </label>
                                <input type="text" class="form-control" name="name_roomtype" id="name_roomtype" placeholder="ประเภทห้องพัก" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">ราคาปกติ</h4>
                                </label>
                                <input type="number" class="form-control" name="price_roomtype" id="price_roomtype" />
                            </div>
                        </div>
                        <!--  <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ราคา จันทร์- พฤหัสบดี</h4></label>
                                    <input type="number" class="form-control" name="price_monday"  id="price_monday" />
                                </div>
                            </div>
                             <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ราคา ศุกร์-อาทิตย์</h4></label>
                                    <input type="number" class="form-control" name="price_friday" id="price_friday" />
                                </div>
                            </div> -->
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">ราคาเตียงเสริม</h4>
                                </label>
                                <input type="number" class="form-control" name="extrabed" id="extrabed" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">จำนวนผู้เข้าพัก</h4>
                                </label>
                                <input type="number" class="form-control" name="capacity" id="capacity" />
                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">1st High Season</h4></label>
                                    <input type="number" class="form-control" name="high_season1" id="high_season1" value="<?php echo $results["high_season1"]; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">Peak Season</h4></label>
                                    <input type="number" class="form-control" name="peak_season" id="peak_season" value="<?php echo $results["peak_season"]; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">2st High Season</h4></label>
                                    <input type="number" class="form-control" name="high_season2" id="high_season2" value="<?php echo $results["high_season2"]; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">Green Season</h4></label>
                                    <input type="number" class="form-control" name="green_season" id="green_season" value="<?php echo $results["green_season"]; ?>" />
                                </div>
                            </div> -->
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">บันทึก</h4>
                                </label>
                                <input type="text" class="form-control" name="type" id="type" value="addroomtype" hidden />
                                <input class="btn form-control btn-primary" type="submit" value="บันทึก" style="color: #fff;">
                            </div>
                        </div>


                    </div>
                </form>





            </div>



            <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>