<!DOCTYPE html>
<html>
<?php include "head.php";
include_once('connectdb.php'); ?>

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
                            <div class="weight-600 font-30 text-blue">เพิ่มรีสอร์ท</div>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">

                <form action="add_1.php" method="POST">
                    <div class="row" style="padding-top: 35px;">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-blue h4">เพิ่มรีสอร์ท</h4>
                                </label>
                                <input type="text" class="form-control" name="resort_name" id="resort_name" placeholder="ชื่อรีสอร์ท" required>

                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <input type="text" name="type" id="type" hidden="" value="addresort">
                            <button type="submit" class="btn btn-warning">บันทึก</button>
                        </div>


                    </div>
                </form>

                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr align="center">
                            <th style="width: 5%" class="table-plus datatable-nosort">ลำดับ</th>
                            <th style="width: 25%">ชื่อรีสอร์ท</th>
                            <th style="width: 5%">แก้ไข</th>
                            <th style="width: 5%"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        //$sql ="SELECT * FROM `tb_resort` ";
                        $sql = "SELECT * FROM tb_resort  ";
                        $query = mysqli_query($con, $sql);
                        $i = 1;
                        while ($results = mysqli_fetch_assoc($query)) {  ?>





                            <tr align="center">
                                <td class="table-plus"><?php echo $i; ?></td>
                                <td><?php echo $results["resort_name"]; ?></td>
                                <td>


                                    <!-- The Modal -->
                                    <div class="modal" id="myModal<?php echo $results["id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">แก้ไขชื่อรีสอร์ท</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="add_1.php" method="POST">
                                                    <div class="modal-body">

                                                        <div class="modal-body row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <h4 class="text-blue h4">ชื่อรีสอร์ท</h4>
                                                                    </label>
                                                                    <input hidden="" class="form-control" name="id" id="id" value="<?php echo $results["id"]; ?>" />
                                                                    <input hidden="" class="form-control" name="type" id="type" value="editresort" />
                                                                    <input type="text" class="form-control" name="resort_name" id="resort_name" value="<?php echo $results["resort_name"]; ?>" />
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

                                    <a target="_blank" data-toggle="modal" data-target="#myModal<?php echo $results["id"]; ?>" type="button" class="btn btn-success">แก้ไข</a>
                                </td>
                                <td>
                                    <form action="add_1.php" method="POST">
                                        <input hidden="" class="form-control" name="id" id="id" value="<?php echo $results["id"]; ?>" />
                                        <input hidden="" class="form-control" name="type" id="type" value="deleteresort" />
                                        <input class="btn btn-danger" type="submit" value="ลบ" style="color: #fff;" onclick="return confirm('ต้องการจะลบข้อมูลนี้หรือไม่ !!')">

                                    </form>

                                </td>
                            </tr>

                            <?php $i++; ?>
                        <?php  } ?>




                    </tbody>
                </table>
            </div>



            <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>