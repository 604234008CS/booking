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


                <form action="add_1.php" id="frmMain" name="frmMain" method="post">





                    <div class="row" style="padding-top: 35px;">
                        <div class="col-md-12 col-sm-12">
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

                        <div class="col-md-12 col-sm-12">



                            <table class="table" id="myTable">
                                <!-- head table -->
                                <thead>
                                    <tr>
                                        <!--  <td width="91"> <div align="center">ลำดับ </div></td> -->
                                        <td width="98">
                                            <div align="center">ประเภทห้องพัก</div>
                                        </td>
                                        <td width="198">
                                            <div align="center">ราคาปกติ </div>
                                        </td>
                                        <td width="198">
                                            <div align="center">ราคาเตียงเสริม </div>
                                        </td>
                                        <td width="198">
                                            <div align="center">จำนวนผู้เข้าพัก </div>
                                        </td>

                                    </tr>
                                </thead>
                                <!-- body dynamic rows -->
                                <tbody></tbody>
                            </table>
                            <br />
                            <input class="btn btn-warning" type="button" id="createRows" value="Add">
                            <input class="btn btn-danger" type="button" id="deleteRows" value="Del">
                            <input class="btn btn-success" type="button" id="clearRows" value="Clear">
                            <input hidden type="text" id="hdnCount" name="hdnCount">
                            <input type="text" class="form-control" name="type" id="type" value="addroomtype" hidden />
                            <input class="btn btn-primary" type="submit" value="บันทึก" style="color: #fff;">


                        </div>



                    </div>



                </form>
            </div>







            <script src="vendors/scripts/jquery-latest.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {

                    var rows = 1;
                    $("#createRows").click(function() {
                        var tr = "<tr>";
                        // tr = tr + "<td><input class='form-control' type='text' name='ids"+rows+"' id='ids"+rows+"' size='5' ></td>";
                        tr = tr + "<td><input class='form-control' type='text' name='name_roomtype" + rows + "' id='name_roomtype" + rows + "' size='20' required></td>";
                        tr = tr + "<td><input class='form-control' type='text' name='price_roomtype" + rows + "' id='price_roomtype" + rows + "' size='10' pattern='([0-9]{,})' title='กรุณาใส่ข้อมูลให้ถูกต้อง' required></td>";
                        tr = tr + "<td><input class='form-control' type='text' name='extrabed" + rows + "' id='extrabed" + rows + "' size='10' pattern='([0-9]{,})' title='กรุณาใส่ข้อมูลให้ถูกต้อง' required></td>";
                        tr = tr + "<td><input class='form-control' type='text' name='capacity" + rows + "' id='capacity" + rows + "' size='10' pattern='([0-9])' title='กรุณาใส่ข้อมูลให้ถูกต้อง' required></td>";

                        tr = tr + "</tr>";
                        $('#myTable > tbody:last').append(tr);

                        $('#hdnCount').val(rows);
                        rows = rows + 1;
                    });

                    $("#deleteRows").click(function() {
                        if ($("#myTable tr").length != 1) {
                            $("#myTable tr:last").remove();
                        }
                    });

                    $("#clearRows").click(function() {
                        rows = 1;
                        $('#hdnCount').val(rows);
                        $('#myTable > tbody:last').empty(); // remove all
                    });

                });
            </script>












        </div>



        <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
    </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>