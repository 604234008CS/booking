<!DOCTYPE html>
<html>
    <?php include "head.php"; ?>

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
                                <div class="weight-600 font-30 text-blue">เพิ่มที่พัก , ประเภทห้องพัก , ราคาห้องพัก</div>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">เพิ่มที่พัก , ประเภทห้องพัก , ราคาห้องพัก</h4>
                        </div>
                    </div>
                    <form action="add_1.php">
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ที่พัก</h4></label>
                                    <select class="custom-select col-12">
                                        <option selected="">โปรดเลือกที่พัก...</option>
                                        <option value="1">Akira Lipe</option>
                                        <option value="2">Ananya Lipe</option>
                                        <option value="3">Thechic Lipe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ประเภทห้องพัก</h4></label>
                                   <select class="custom-select col-12">
                                        <option selected="">โปรดเลือกประเภทที่พัก...</option>
                                        <option value="1" style="color: red;">Superior Pool View (Akira)</option>
                                        <option value="2" style="color: red;">Deluxe Pool View (Akira)</option>
                                        <option value="3" style="color: red;">Superior Pool Access (Akira)</option>
                                        <option value="4" style="color: red;">Deluxe Pool Access (Akira)</option> 
                                        <option value="5" style="color: red;">Villa Suite (Akira)</option>

                                        <option value="6" style="color: blue;">Deluxe Pool View (Ananya)</option>
                                        <option value="7" style="color: blue;">Deluxe Pool Access (Ananya)</option>
                                        <option value="8" style="color: blue;">Family Suite Pool Access (Ananya)</option>

                                        <option value="9" style="color: green;">Exclusive Double Bed (The Chic)</option>
                                        <option value="10" style="color: green;">Single Mixed Dorm (The Chic)</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ราคา</h4></label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                            	<input class="btn btn-primary" type="submit" value="บันทึก">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">เพิ่มราคา รถ , เรือ , ดำน้ำ</h4>
                        </div>
                    </div>
                    <form>
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">รถ</h4></label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">เรือ</h4></label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label><h4 class="text-blue h4">ดำน้ำ</h4></label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                            	<input class="btn btn-primary" type="submit" value="บันทึก">
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
