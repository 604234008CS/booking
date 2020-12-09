<!DOCTYPE html>
<html>
    <?php include "head.php"; 
    include_once('connectdb.php');?>

    <body>

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
                                
                                <div class="weight-600 font-30 text-blue">แก้ไขข้อมูลส่วนตัว</div>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    
                    <form action="add_1.php" method="POST">
                        <div class="row" style="padding-top: 35px;">
                            
                             <?php  
                                    //$sql ="SELECT * FROM `tb_resort` ";
                                    $sql ="SELECT * FROM adminlog  WHERE `UserID` = ".$_SESSION["UserID"]."";
                                    $query = mysqli_query($con,$sql);
                                    while ($results = mysqli_fetch_assoc($query)) {  ?>

                             <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Username </h4></label>
                                   <input type="text" name="Username" id="Username " value="<?php echo $results["Username"]; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Password </h4></label>
                                    <input type="text" name="Password" id="Password" value="<?php echo $results["Password"]; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                     <label><h4 class="text-blue h4">Name </h4></label>
                                    <input type="text" name="Name" id="Name" value="<?php echo $results["Name"]; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="type" id="type" value="edit_personal" class="form-control" hidden>
                                    <input type="text" name="UserID" id="UserID" value="<?php echo $results["UserID"]; ?>" class="form-control" hidden>
                                    <button type="submit" class="btn btn-warning">บันทึก</button> 
                                </div>
                            </div>

                           
                                  
                                   
                             
                          
                     <?php  } ?>       
                            
                        </div>
                    </form>
           
                      
                    </div>

             

                <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>
