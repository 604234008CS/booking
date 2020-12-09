<!DOCTYPE html>
<html lang="en">
<?php  
session_start();   
if($_SESSION['Status1']!="admin") {  
    echo "<META HTTP-EQUIV=Refresh content=0;URL=login.php>";  
 }  
?>  
<?php include_once( "../connectdb.php" );error_reporting(E_ALL & ~E_NOTICE);?>
<head>
<title>Admin Istadium</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/maruti-style.css" />
<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
   <script src="script123.js"></script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Maruti Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<?php include_once('menu.php');?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="member.php" class="current">ข้อมูลสมาชิก</a> </div>
    <h1>ข้อมูลสมาชิก 
       <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                   <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_user">เพิ่มสมาชิก</button>
                     <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_user_admin">เพิ่มAdmin</button>
                  <?php } ?> 
     
    </h1>
                                    <div class="center">
                                     
                                    </div>
  </div>

<?php
  include"member/database.class.php";
  
  //new database
  $db = new Database();
  
  if(isset($_POST['search_user'])){
    //get search user
   // $get_user = $db->search_user($_POST['search_member']);
    
  }else{
    
    //call method getUser
    //$get_user = $db->get_all_user();
  }
?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>ข้อมูลสมาชิก Istadium</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered ">
            <thead>
                <tr>             
                  <th><h4>ลำดับ</h4></th>
                  <th><h4>รหัสสมาชิก</h4></th>
                  <th><h4>Username</h4></th>
                  <th><h4>ชื่อ</h4></th>
                  <th><h4>เบอร์โทรศัพท์</h4></th>
                  <th><h4>ID LINE</h4></th>
                  <th><h4>Facebook</h4></th>
                  <th><h4>ชัวโมงที่เหลือ</h4></th>
                  <th><h4>ชัวโมงที่เล่นไป</h4></th>
                  <th><h4>ชัวโมงที่เพิ่ม</h4></th>
                  <th><h4>ชัวโมงคงเหลือสุทธิ</h4></th>
                  <th><h4>สถานะ</h4></th>

                  <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                  <th><h4>เพิ่มชั่วโมง</h4></th>
                  <?php } ?> 

                  <th><h4>ปริ้นใบเพิ่มชัวโมง</h4></th>
                  <th><h4>แก้ไข</h4></th>
                   <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                  <th><h4>แก้ไขชั่วโมง</h4></th>
                  <?php } ?> 
                 

                  <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                  <th><h4>ลบ</h4></th>
                  <?php } ?> 
                 
                </tr>
            </thead>
            <tbody>
                <?php 
           
  $sql = ( "SELECT * FROM member WHERE Status1 = 'member'" );
    $i = 1 ;       
   $res = mysqli_query( $con, $sql );
    while ( $user = mysqli_fetch_assoc( $res ) ) {  

     ?>
                    <tr>
                     
                      <td style="text-align: center;"><?php echo $i; ?></td>
                      <td><center><?php echo $user['member_code'];?></center></td>
                      <td><center><?php echo $user['Username'];?></center></td>
                      <td><center><?php echo $user['Name'];?></center></td>
                      <td><center><?php echo $user['phone'];?></center></td>
                      <td><center><?php echo $user['LINE'];?></center></td>
                      <td><center><?php echo $user['Facebook'];?></center></td>
                      <td><center><?php echo $user['HHH'];?></center></td>

                      <td><center><?php echo $user['HH'];?></center></td>

                      <td><center><?php echo $user['H'];?></center></td>
                   <td><center><?php echo $user['HHH'];?></center></td>

                      <td><center><?php echo $user['Status1'];?></center></td>
                       
                      <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                          <?php if ($user['HH'] == 'Adminmembe' or $user['HH'] == 'Admin' or $user['HH'] == 'Adminm')  {?>
                          <td><center>------------------</center></td>
                          <?php } else{ ?>
                         
                          <td><center><a class="btn btn-info" data-toggle="modal" data-target="#myModal555" onclick="edit(<?php echo $user['UserID'];?>,'<?php echo $user['HHH']; ?>');">เพิ่มชัวโมง</a></li> </center></td>
                          <?php } ?>  
                      <?php } ?>


                      <?php if ($user['HH'] == 'Adminmembe' or $user['HH'] == 'Admin' or $user['HH'] == 'Adminm')  {?>
                        <td><center>------------------</center></td>
                        <?php } else{ ?>
                        <td><center><a href="tcpdf.php?UserID=<?php echo $user['UserID']; ?>" class="btn btn-success btn-xs"><i class="icon-print"></i></a></center></td>
                      <?php } ?> 
             
                      
                      <?php if ($user['HH'] == 'Adminmembe' or $user['HH'] == 'Admin' or $user['HH'] == 'Adminm')  {?>
                        <td><center>----------</center></td>
                        <?php } else{ ?>
                        <td><center><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return show_edit_user(<?php echo $user['UserID']?>);"><i class="icon-edit"></i></button></center></td>
                      <?php } ?> 


                    <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                          <?php if ($user['HH'] == 'Adminmembe' or $user['HH'] == 'Admin' or $user['HH'] == 'Adminm')  {?>
                          <td><center>------------------</center></td>
                          <?php } else{ ?>
                         
                          <td><center><a href="HH.php?mm=<?php echo $user['nowMore']?>&UserID=<?php echo $user['UserID']?>" class="btn btn-info" >เเก้ไข</a></center></td>
                          <?php } ?>  
                      <?php } ?>

                      <?php if ($_SESSION["HH"] == 'Adminmembe') {?>
                        <td><center><button class="btn btn-danger btn-xs" onclick="return delete_user(<?php echo $user['UserID'];?>);"><i class="icon-remove"></i></button></center></td>
                      <?php } ?>
                      
                  </tr>  
                  

               <?php $i++; }  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal Add User -->
    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 999999;">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มสมาชิก</h4>
        </div>
        <div class="modal-body">
          <form id="add_user_form">
             <div class="form-group">
            <label ><b>Facebook</b></label>
            <input type="text" class="span5" name="Facebook"  placeholder="ระบุ Facebook">
            </div>
              <div class="form-group">
            <label ><b>LINE</b></label>
            <input type="text" class="span5" name="LINE"  placeholder="ระบุ LINE">
            <input type="hidden" class="span5" name="HH"  value="0">
            </div>
            <div class="form-group">
            <label ><b>Username</b></label>
            <input type="text" class="span5" name="Username"  placeholder="ระบุ Username" value="">
            </div>
            <div class="form-group">
            <label ><b>Password</b></label>
            <input type="text" class="span5" name="Password"  placeholder="ระบุ Password" value="">
            </div>
              <div class="form-group">
            <label ><b>Name</b></label>
            <input type="text" class="span5" name="Name"  placeholder="ระบุ Name" required="">
            </div>
           

                <input type="hidden" class="span5" name="Status1" value="member">

              <div class="form-group">
            <label ><b>เบอร์โทรศัพท์</b></label>
            <input type="text" class="span5" name="phone"  placeholder="ระบุ เบอร์โทรศัพท์" required="">
            </div>
            
             

          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return add_user_form();">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
    </div>

     <!-- Modal Add User -->
    <div class="modal fade" id="add_user_admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่ม Admin</h4>
        </div>
        <div class="modal-body">
          <form id="add_user_form" method="post" action="add_admin.php" >
            <div class="form-group">
            <label ><b>Username</b></label>
            <input type="text" class="span5" name="Username"  placeholder="ระบุ Username" required="">
            </div>
            <div class="form-group">
            <label ><b>Password</b></label>
            <input type="text" class="span5" name="Password"  placeholder="ระบุ Password" required="">
            </div>
              <div class="form-group">
            <label ><b>Name</b></label>
            <input type="text" class="span5" name="Name"  placeholder="ระบุ Name" required="">
            </div>
           

                <input type="hidden" class="span5" name="Status1" value="admin">

              <div class="form-group">
            <label ><b>เบอร์โทรศัพท์</b></label>
            <input type="text" class="span5" name="phone"  placeholder="ระบุ เบอร์โทรศัพท์" required="">
            </div>
               <div class="form-group">
            <label ><b>Facebook</b></label>
            <input type="text" class="span5" name="Facebook"  placeholder="ระบุ Facebook">
            </div>
              <div class="form-group">
            <label ><b>LINE</b></label>
            <input type="text" class="span5" name="LINE"  placeholder="ระบุ LINE">
            </div>
             <div class="form-group">
            <label ><b>Status</b></label>
<label class="radio-inline"><input type="radio" class="span5" name="HH" value="Adminmembe">ผู้จัดการ</label>
<label class="radio-inline"><input type="radio" class="span5" name="HH" value="Adminm">รองผู้จัดการ</label>
<label class="radio-inline"><input type="radio" class="span5" name="HH" value="Admin">เเคชเชียร์</label>
   
            </div>
          
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div></form>
      </div>
      </div>
    </div>
    
    <!-- Modal Edit User -->
    <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
        </div>
        <div class="modal-body">
          <div id="edit_form"></div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return edit_user_form();">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
    </div>



<!-- Modal  เพิ่มชั่วโมง-->
<div id="myModal555" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มชั่วโมง</h4>
      </div>
      <div class="modal-body">


<form action="More_hours.php" method="post">
  <div class="form-group">
    <label>ราคา:</label>
    <input type="text" class="span5" name="THB" id="THB" value="" required="">

    <label>จำนวนชั่วโมง:</label>
    <input type="text" class="span5" name="hh" id="hh" value="" required="">

     <label>จำนวนชั่วโมงที่เหลือจากรอบที่เเล้ว:</label>
    <input type="text" class="span5" name="yyyyy" id="yyyyy" value="" readonly="">


    <input type="hidden" class="span5" name="py" id="py" value="H" >
    <input type="hidden" class="span5" name="mm" id="UserID" value="" >

    <input type="hidden" class="span5" name="admin"  value="(ผู้เพิ่มชัวโมงในระบบ <?php echo $_SESSION["Username"] ?>)" >

  </div>

  <button type="submit" class="btn btn-info">ตกลง</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
     function edit(UserID,yyyyy){
    document.getElementById("UserID").value=UserID;
    document.getElementById("yyyyy").value=yyyyy;
};             
</script>


        </div>
      </div>
    </div>

 

  <script src="js/jquery.js"></script>


</body>

</html>


</div>
<?php include_once('footer.php');?>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.tables.js"></script>
</body>
</html>
