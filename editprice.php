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
                            <div class="weight-600 font-30 text-blue">แก้ไขราคาต่างๆ</div>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <label>
                    <h4 class="text-blue h4">เพิ่มอื่นๆ</h4>
                </label>
                <div class="card-header">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">เพิ่ม</button>
                </div>
                <!--              <form action="add_1.php" method="POST">
                        <div class="row" style="padding-top: 35px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">เพิ่มรีสอร์ท</h4></label>
                                    <input type="text" class="form-control" name="resort_name" id="resort_name" placeholder="ชื่อรีสอร์ท">
                                    
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="text" name="type" id="type" hidden="" value="addresort">
                                <button type="submit" class="btn btn-warning">บันทึก</button> 
                            </div>
                            
                            
                        </div>
                    </form>
            -->

                <table class="table">
                    <thead>
                        <tr align="center">
                            <th style="width: 5%" class="table-plus datatable-nosort">ลำดับ</th>
                            <th style="width: 10%">ชื่อรีสอร์ท</th>
                            <th style="width: 5%">ราคา</th>
                            <th style="width: 5%">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sql = "SELECT * FROM tb_car_boat_diving  ";
                        $query = mysqli_query($con, $sql);
                        $i = 1;
                        while ($results = mysqli_fetch_assoc($query)) {  ?>


                            <tr align="center">
                                <td class="table-plus"><?php echo $i; ?></td>
                                <td><?php echo $results["name"]; ?></td>
                                <td><?php echo $results["price"]; ?></td>
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
                                                                        <h4 class="text-blue h4">ชื่อ</h4>
                                                                    </label>
                                                                    <input hidden="" class="form-control" name="id" id="id" value="<?php echo $results["id"]; ?>" />
                                                                    <input hidden="" class="form-control" name="type" id="type" value="editprice" />
                                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $results["name"]; ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <h4 class="text-blue h4">ราคา</h4>
                                                                    </label>
                                                                    <input type="number" class="form-control" name="price" id="price" value="<?php echo $results["price"]; ?>" />
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

                            </tr>

                            <?php $i++; ?>
                        <?php  } ?>




                    </tbody>
                </table>
            </div>



            <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
        </div>
    </div>



    <div class="modal" id="myModal">
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
                                        <h4 class="text-blue h4">ชื่อ</h4>
                                    </label>
                                    <input hidden="" class="form-control" name="type" id="type" value="addprice" />
                                    <input type="text" class="form-control" name="name" id="name" value="" required />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>
                                        <h4 class="text-blue h4">ราคา</h4>
                                    </label>
                                    <input type="number" class="form-control" name="price" id="price" value="" required />
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
    <?php include "footer.php"; ?>
</body>

</html>