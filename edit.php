<!DOCTYPE html>
<html>
<?php include "head.php";
include_once('connectdb.php');

if ($_REQUEST['id'] != "") {
    $id = $_REQUEST['id'];
} else {
    $id = "Akira";
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
                            <div class="weight-600 font-30 text-blue">แก้ไขราคาห้องพัก</div>
                        </h4>
                    </div>
                </div>
            </div>

            <script>
                function autotable(value) {
                    // console.log(value);
                    $.ajax({
                        url: "ajaxdata.php?page=edit&&name=" + value,
                        type: "GET",
                        success: function(result) {
                            let ajaxdata = JSON.parse(result);
                            console.log(ajaxdata);
                            // $("#name_roomtype").empty();
                            // for (let i = 0; i < ajaxdata.length; i++) {
                            //     // console.log(ajaxdata[i]);
                            //     $("#name_roomtype").append("<option value=" + ajaxdata[i]['id'] + ">" + ajaxdata[i]['name_roomtype'] + "</option>");
                            // }
                            // console.log(result);
                        }
                    });
                }
            </script>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">แก้ไขราคาห้องพัก</h4>
                </div>
                <div class="col-md-4 col-sm-12" style="padding-bottom: 20px;">
                    <form action="edit.php" method="POST" name="myform">
                        <div class="form-group">
                            <label>
                                <h4 class="text-blue h4">ที่พัก</h4>
                            </label>
                            <select class="custom-select col-12" name="id" onchange="myform.submit()">
                                <option selected="">โปรดเลือกที่พัก...</option>
                                <?php
                                $sql1 = "SELECT * FROM `tb_resort` ";
                                $query1 = mysqli_query($con, $sql1);
                                while ($results1 = mysqli_fetch_assoc($query1)) {  ?>
                                    <option value="<?php echo $results1["resort_name"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                                <?php  } ?>
                            </select>

                        </div>
                        <!-- <button type="submit" class="btn btn-warning">ค้นหา</button> -->
                    </form>

                </div>

                <div class="pb-20">
                    <table class="data-table table hover multiple-select-row nowrap" id="mytable">
                        <thead>
                            <tr align="center">
                                <th class="table-plus datatable-nosort">ลำดับ</th>
                                <th>ชื่อรีสอร์ท</th>
                                <th>ประเภทห้องพัก</th>
                                <th>ราคาปกติ</th>
                                <th>ราคาเตียงเสริม</th>
                                <th>จำนวนผู้เข้าพัก</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            //$sql ="SELECT * FROM `tb_resort` ";
                            $sql = "SELECT * FROM tb_resort INNER JOIN tb_roomtype ON tb_resort.id=tb_roomtype.id_resort WHERE tb_resort.resort_name = '" . $id . "' ";
                            $query = mysqli_query($con, $sql);
                            $i = 1;
                            while ($results = mysqli_fetch_assoc($query)) {  ?>
                                <tr align="center">
                                    <td><?php echo $i; ?></td>
                                    <td class="table-plus"><?php echo $results["resort_name"]; ?></td>
                                    <td><?php echo $results["name_roomtype"]; ?></td>
                                    <td><?php echo $results["price_roomtype"]; ?></td>

                                    <td><?php echo $results["extrabed"]; ?></td>
                                    <td><?php echo $results["capacity"]; ?></td>
                                    <td><button type="button" data-toggle="modal" data-target="#myModal<?php echo $results["id"]; ?>" class="btn btn-warning">แก้ไข</button></td>
                                    <td>
                                        <form action="add_1.php" method="POST">
                                            <input hidden="" class="form-control" name="id" id="id" value="<?php echo $results["id"]; ?>" />
                                            <input hidden type="text" name="resort_name" value="<?php echo $results["resort_name"]; ?>">
                                            <input hidden="" class="form-control" name="type" id="type" value="deletename_roomtypet" />
                                            <input class="btn btn-danger" type="submit" value="ลบ" style="color: #fff;" onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่!!')">

                                        </form>

                                    </td>



                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $results["id"]; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        แก้ไขข้อมูลห้อง
                                                        <b style="color: red"><?php echo $results["name_roomtype"]; ?></b>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="add_1.php" method="POST">
                                                    <div class="modal-body row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <h4 class="text-blue h4">ประเภทห้องพัก</h4>
                                                                </label>
                                                                <input type="text" class="form-control" name="name_roomtype" id="name_roomtype" value="<?php echo $results["name_roomtype"]; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <h4 class="text-blue h4">ราคาปกติ</h4>
                                                                </label>
                                                                <input type="number" class="form-control" name="price_roomtype" id="price_roomtype" value="<?php echo $results["price_roomtype"]; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <h4 class="text-blue h4">ราคาเตียงเสริม</h4>
                                                                </label>
                                                                <input type="number" class="form-control" name="extrabed" id="extrabed" value="<?php echo $results["extrabed"]; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <h4 class="text-blue h4">จำนวนคนเข้าพัก</h4>
                                                                </label>
                                                                <input type="number" class="form-control" name="capacity" id="capacity" value="<?php echo $results["capacity"]; ?>" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input hidden type="text" name="type" value="edit">
                                                        <input hidden type="text" name="resort_name" value="<?php echo $results["resort_name"]; ?>">
                                                        <input hidden type="text" name="id" value="<?php echo $results["id"]; ?>">
                                                        <input class="btn form-control btn-primary" type="submit" value="บันทึก" style="color: #fff;">
                                                        <input class="btn form-control btn-danger" type="submit" value="Close" style="color: #fff;">
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>






                                </tr>

                                <?php  $i++; ?>

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