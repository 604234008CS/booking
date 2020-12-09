<!DOCTYPE html>
<html>
    <?php include "head.php";  
    include_once('connectdb.php');

    if ($_POST['id'] != "") {
        $id =$_POST['id'];
    }else{
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
                                <div class="weight-600 font-30 text-blue">แก้ไขราคาห้องพัก</div>
                            </h4>
                        </div>
                    </div>
                </div>


                                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">แก้ไขราคาห้องพัก</h4>
                    </div>
                    <div class="col-md-4 col-sm-12" style="padding-bottom: 20px;">
                        <form action="edit.php" method="POST">
                          <div class="form-group">
                            <label><h4 class="text-blue h4">ที่พัก</h4></label>
                            <select class="custom-select col-12" name="id">
                                <option selected="">โปรดเลือกที่พัก...</option>
                                <?php  
                                $sql1 ="SELECT * FROM `tb_resort` ";
                                $query1 = mysqli_query($con,$sql1);
                                while ($results1 = mysqli_fetch_assoc($query1)) {  ?>
                                    <option value="<?php echo $results1["id"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                                <?php  } ?>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-warning">ค้นหา</button>  
                        </form>
                        
                    </div>
                   
                    <div class="pb-20">
                        <table class="data-table table hover multiple-select-row nowrap">
                            <thead>
                                <tr align="center">
                                    <th class="table-plus datatable-nosort">ชื่อรีสอร์ท</th>
                                    <th>ประเภทห้อง</th>
                                    <th>ราคา ปกติ</th>
                                    <th>ราคา จันทร์- พฤหัสบดี</th>
                                    <th>ราคา ศุกร์-อาทิตย์</th>
                                    <th>ราคาเตียงเสริม</th>

                                    <th>1st High Season</th>
                                    <th>Peak Season</th>
                                    <th>2st High Season</th>
                                    <th>Green Season</th>

                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                    <?php  
                                    //$sql ="SELECT * FROM `tb_resort` ";
                                    $sql ="SELECT * FROM tb_resort INNER JOIN tb_roomtype ON tb_resort.id=tb_roomtype.id_resort WHERE tb_resort.id = '".$id."' ";
                                    $query = mysqli_query($con,$sql);
                                    while ($results = mysqli_fetch_assoc($query)) {  ?>
                                <tr align="center">
                                    <td class="table-plus"><?php echo $results["resort_name"]; ?></td>
                                    <td><?php echo $results["name_roomtype"]; ?></td>
                                    <td><?php echo $results["price_roomtype"]; ?></td>
                                    <td><?php echo $results["price_monday"]; ?></td>
                                    <td><?php echo $results["price_friday"]; ?></td>
                                    <td><?php echo $results["high_season1"]; ?></td>
                                    <td><?php echo $results["peak_season"]; ?></td>
                                    <td><?php echo $results["high_season2"]; ?></td>
                                    <td><?php echo $results["green_season"]; ?></td>
                                    <td><?php echo $results["extrabed"]; ?></td>
                                    <td><button type="button" data-toggle="modal" data-target="#myModal<?php echo $results["id"]; ?>" class="btn btn-warning">แก้ไขราคาห้อง</button></td>



<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $results["id"]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    แก้ไขราคาห้อง
                    <b style="color: red"><?php echo $results["name_roomtype"]; ?></b>
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="add_1.php" method="POST">
             <div class="modal-body row">

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ราคาปกติ</h4></label>
                        <input type="number" class="form-control" name="price_roomtype" id="price_roomtype" value="<?php echo $results["price_roomtype"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ราคา จันทร์- พฤหัสบดี</h4></label>
                        <input type="number" class="form-control" name="price_monday" id="price_monday" value="<?php echo $results["price_monday"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ราคา ศุกร์-อาทิตย์</h4></label>
                        <input type="number" class="form-control" name="price_friday" id="price_friday" value="<?php echo $results["price_friday"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">ราคาเตียงเสริม</h4></label>
                        <input type="number" class="form-control" name="extrabed" id="extrabed" value="<?php echo $results["extrabed"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">1st High Season</h4></label>
                        <input type="number" class="form-control" name="high_season1" id="high_season1" value="<?php echo $results["high_season1"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">Peak Season</h4></label>
                        <input type="number" class="form-control" name="peak_season" id="peak_season" value="<?php echo $results["peak_season"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">2st High Season</h4></label>
                        <input type="number" class="form-control" name="high_season2" id="high_season2" value="<?php echo $results["high_season2"]; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><h4 class="text-blue h4">Green Season</h4></label>
                        <input type="number" class="form-control" name="green_season" id="green_season" value="<?php echo $results["green_season"]; ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input hidden type="text" name="type" value="edit">
                <input hidden  type="text" name="id" value="<?php echo $results["id"]; ?>">
                <input class="btn form-control btn-primary" type="submit" value="บันทึก" style="color: #fff;">
                <input class="btn form-control btn-danger" type="submit" value="Close" style="color: #fff;"> 
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
