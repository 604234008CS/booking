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
                        <form action="pricerooms.php" method="POST" name="myform">
                          <div class="form-group">
                            <label><h4 class="text-blue h4">ที่พัก</h4></label>
                            <select class="custom-select col-12" name="id" onchange="myform.submit()">
                                <option selected="">โปรดเลือกที่พัก...</option>
                                <?php  
                                $sql1 ="SELECT * FROM `tb_resort` ";
                                $query1 = mysqli_query($con,$sql1);
                                while ($results1 = mysqli_fetch_assoc($query1)) {  ?>
                                    <option value="<?php echo $results1["id"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                                <?php  } ?>
                            </select>

                        </div>
        
                        </form>
                        
                    </div>
                   
                    <div class="pb-20">
   









    <div id="main">
       
<style>
    #dp .scheduler_default_cellparent, .scheduler_default_cell.scheduler_default_cell_business.scheduler_default_cellparent {
        background: #f3f3f3;
    }

</style>


<div style="float:left; width:150px">
	<div id="nav"></div>
</div>
<div style="margin-left: 150px">
	<div id="dp"></div>
</div>
<div >
    <a href="#" id="previous" > <<< Previous</a>
    |
    <a href="#" id="today">Today</a>
    |
    <a href="#" id="next">  Next >>> </a>
</div>

<div id="print"></div>

	<hr style="border: 1px solid">


<form class="form-inline center" action="file_upload.php" method="get">
	<div class="form-group"> 
		<label for="email">เลือกชื่อห้องพัก :</label>
		<?php 
	$sqlnameroom = "SELECT * FROM tb_roomtype WHERE `id_resort` = '".$id."'" ;
	$renameroom = mysqli_query( $con, $sqlnameroom );
?>
	<select name="idroom" class="form-control" id="id_room" >
		<?php while($snameroom = mysqli_fetch_assoc( $renameroom )){
			echo "<option value='".$snameroom['id']."'>".$snameroom['name_roomtype']."</option>"; } ?>
	</select>
	</div>

  <div class="form-group">
    <label for="email">วันที่เริ่มต้น:</label>
   <input type="date"  class="form-control"name="start">
  </div>
  <div class="form-group">
    <label for="pwd">วันที่สิ้นสุด:</label>
    <input type="date" class="form-control" name="end">
  </div>
  <input type="hidden" class="form-control" name="type" value="de">
  <button type="submit" class="btn btn-info">ลบ</button>
</form>

<hr style="border: 1px solid">






                    </div>
                </div>

                

    

                <div class="footer-wrap pd-20 mb-20 card-box">Welcome Akira Lipe , Ananya Lipe , Thechic Lipe <a href="https://ananyalipe.com" target="_blank">แบบฟอร์มเช็คราคาห้องพักของแต่ละรีสอร์ท</a></div>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>
































<link type="text/css" rel="stylesheet" href="scheduler/helpers/demo.css?v=2018.4.3442" />
<link type="text/css" rel="stylesheet" href="scheduler/helpers/media/layout.css?v=2018.4.3442" />
<link type="text/css" rel="stylesheet" href="scheduler/helpers/media/elements.css?v=2018.4.3442" />
<!-- <script src="scheduler/helpers/jquery-1.12.2.min.js" type="text/javascript"></script> -->
<script src="scheduler/js/daypilot-all.min.js?v=2018.4.3442" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="scheduler/themes/areas.css?v=2018.4.3442" />         
<link type="text/css" rel="stylesheet" href="scheduler/themes/month_white.css?v=2018.4.3442" />    
<link type="text/css" rel="stylesheet" href="scheduler/themes/month_green.css?v=2018.4.3442" />   
<link type="text/css" rel="stylesheet" href="scheduler/themes/month_transparent.css?v=2018.4.3442" /> 
<link type="text/css" rel="stylesheet" href="scheduler/themes/month_traditional.css?v=2018.4.3442" /> 
<link type="text/css" rel="stylesheet" href="scheduler/themes/navigator_8.css?v=2018.4.3442" />   
<link type="text/css" rel="stylesheet" href="scheduler/themes/navigator_white.css?v=2018.4.3442" />   
<link type="text/css" rel="stylesheet" href="scheduler/themes/calendar_transparent.css?v=2018.4.3442" />    
<link type="text/css" rel="stylesheet" href="scheduler/themes/calendar_white.css?v=2018.4.3442" />    
<link type="text/css" rel="stylesheet" href="scheduler/themes/calendar_green.css?v=2018.4.3442" />    
<link type="text/css" rel="stylesheet" href="scheduler/themes/calendar_traditional.css?v=2018.4.3442" />
<link type="text/css" rel="stylesheet" href="scheduler/themes/scheduler_8.css?v=2018.4.3442" />
<link type="text/css" rel="stylesheet" href="scheduler/themes/scheduler_white.css?v=2018.4.3442" />   
<link type="text/css" rel="stylesheet" href="scheduler/themes/scheduler_green.css?v=2018.4.3442" />   
<link type="text/css" rel="stylesheet" href="scheduler/themes/scheduler_blue.css?v=2018.4.3442" />    
<link type="text/css" rel="stylesheet" href="scheduler/themes/scheduler_traditional.css?v=2018.4.3442" />
<link type="text/css" rel="stylesheet" href="scheduler/themes/scheduler_transparent.css?v=2018.4.3442" />    



 



<script>

    var elements = {
        previous: document.getElementById("previous"),
        today: document.getElementById("today"),
        next: document.getElementById("next")
    };

    elements.previous.addEventListener("click", function(e) {
        e.preventDefault();
        changeDate(dp.startDate.addMonths(-1));
    });
    elements.today.addEventListener("click", function(e) {
        e.preventDefault();
        changeDate(DayPilot.Date.today());
    });
    elements.next.addEventListener("click", function(e) {
        e.preventDefault();
        changeDate(dp.startDate.addMonths(1));
    });


    function changeDate(date) {
	 	
        dp.startDate = date.firstDayOfMonth();
		//alert(date.firstDayOfMonth());
        dp.days = dp.startDate.daysInMonth();
		//alert(dp.startDate.daysInMonth());
        dp.resources = [
	<?php 
		 $sql ="SELECT * FROM tb_roomtype WHERE `id_resort` = '".$id."' ";
		 $query = mysqli_query($con,$sql);
		while ($results = mysqli_fetch_assoc($query)) {
		 
		 echo '{ name: "'.$results["name_roomtype"].'", id: "'.$results["id"].'" },';
		}
	?>
       
    ]; // provide event data for the new date range
        dp.update();
    }

</script>

<script type="text/javascript">

	
	 var nav = new DayPilot.Navigator("nav");
    nav.showMonths = 1;
    nav.selectMode = "month";
    nav.onTimeRangeSelected = function(args) {
        dp.startDate = args.start;
        dp.days = args.days;
        dp.update();
    };
    nav.init();

    var dp = new DayPilot.Scheduler("dp");

    // view
    dp.startDate = nav.selectionStart;
    dp.cellGroupBy = "Month";
    dp.days = DayPilot.DateUtil.daysDiff(nav.selectionStart, nav.selectionEnd);
    dp.scale = "Day";
    dp.cellWidthSpec = "Auto";
    dp.timeHeaders = [
        { groupBy: "Month", format: "MMMM yyyy"},
        { groupBy: "Day", format: "ddd d"}
    ];
dp.contextMenu = new DayPilot.Menu({items: [
        {text:"Edit price", onClick: function(args) { 
									//dp.events.edit(args.source);
			
	 var s_pr  = (JSON.parse(JSON.stringify(args.source)).text).split("<br>");
     var pr = prompt("Please enter your price:", s_pr[1]);
  
    if (pr == null || pr == "") {
       
    } else {
        var price = pr;
				var datas = (JSON.stringify(args.source));
									//-----------------------------------------------edit price -----------------
												 $.ajax({
													type: "GET",
													url: "file_upload.php?type=editpriceroom&data="+datas+"&price="+price,
													success: function(result) {
														location.reload();			
														
													},
													error: function(jqXHR, textStatus, err) {
													  //show error message
													  alert('text status ' + textStatus + ', err ' + err);
													}
												  });
    }
            
											
				} 
		},
        {text:"Delete", onClick: function(args) { 
									
								var id=(JSON.parse(JSON.stringify(args.source)).id);
											 $.ajax({
													type: "GET",
													url: "file_upload.php?type=delpriceroom&id="+id,
													success: function(result) {
														location.reload();			
														
													},
													error: function(jqXHR, textStatus, err) {
													  //show error message
													  alert('text status ' + textStatus + ', err ' + err);
													}
												  });
			
			
			
								 } 
		},
        {text:"-"},
      //  {text:"Select", onClick: function(args) { dp.multiselect.add(args.source); } },
    ]});

    //dp.treeEnabled = true;
   // dp.treePreventParentUsage = true;
	

    
        
   
	
	 dp.resources = [
	<?php 
		 $sql ="SELECT * FROM tb_roomtype WHERE `id_resort` = '".$id."'  ";
		 $query = mysqli_query($con,$sql);
		while ($results = mysqli_fetch_assoc($query)) {
		 
		 echo '{ name: "'.$results["name_roomtype"].'", id: "'.$results["id"].'" },';
		}
	?>
       
    ];
	// ------------------------ data event ------------
dp.events.list = [];
   
<?php 
		
$sql_pr ="SELECT * FROM priceroom";
		 $query_pr = mysqli_query($con,$sql_pr);
		while ($pr = mysqli_fetch_assoc($query_pr)) {
			// // Checkin.ID_room, Price_room
			// $sql_booking ="SELECT * FROM `booking` ";		
			// 	 $query_booking = mysqli_query($con,$sql_booking);
			// 	 $sqlnumrow = mysqli_num_rows($query_booking);
			// 	 while($results_booking = mysqli_fetch_assoc($query_booking)){
			// 	//Booking
					
			// 				$sql = ( "SELECT * FROM room where ID_room = ".$pr["ID_room"]);
   //  						$res = mysqli_query( $con, $sql );
							
   //  						while ( $r = mysqli_fetch_assoc( $res ) ) {	 
			// 					$chechkin = $pr["date_start"];
			// 					$checkout = date( "Y-m-d", strtotime( $chechkin." -1 day") );
			// 			 		$sqln ="SELECT *, SUM(num_room) AS sumroom FROM booking WHERE STATUS <= 2 AND( ( checkin BETWEEN '$chechkin 12:01:00' AND '$checkout 12:00:00' ) OR( checkout BETWEEN '$checkout 12:01:00' AND '$chechkin 12:00:00' ) OR( '$chechkin 12:01:00' BETWEEN checkin AND checkout ) OR( '$chechkin 12:00:00' BETWEEN checkin AND checkout ) ) AND booking.ID_room = ".$pr["ID_room"];
								
								
			// 							$sqlcount = mysqli_query($con,$sqln);
		 //                                if($resu = mysqli_fetch_array($sqlcount)){
			// 								$sq ="SELECT *, SUM(num_room) AS sumroom1 FROM booking WHERE STATUS <= 2 AND(  checkout BETWEEN '$checkout 12:01:00' AND '$chechkin 12:00:00' ) AND booking.ID_room = ".$pr["ID_room"];
			// 								  $sqlc = mysqli_query($con,$sq);

			// 								  if($rs = mysqli_fetch_array($sqlc)){
			// 									  $rs =$rs['sumroom1'];
			// 									  $balance_r =   $resu['sumroom']-$rs ;
			// 								  }else{
			// 									  $balance_r = $resu['sumroom'] ;
			// 								  }
											  
									   		
			// 							}
								
			// 						$sum = $r['total_room'] - $balance_r;
			// 			}
			// 	'.$sum.'<br>'	}
				
			
				echo 'var e = {
					start: "'.$pr["date_start"].'T00:00:00",
					end: "'.$pr["date_start"].'T00:00:00",
					id: "'.$pr["id_priceroom"].'",
					resource:"'.$pr["ID_room"].'",
					text: "'.$pr["price_room"].'",
					bubbleHtml: "'.$pr["price_room"].'",
				};
				dp.events.list.push(e);';
			
		
		}

		
	?>
        
    

   dp.eventMovingStartEndEnabled = true;
   dp.eventResizingStartEndEnabled = true;
   dp.timeRangeSelectingStartEndEnabled = true;

    // event moving
   /*dp.onEventMoved = function (args) {
        dp.message("Moved: " + args.e.text());
	   alert(JSON.stringify(args.e));
    };

    dp.onEventMoving = function(args) {
        if (args.e.resource() === "A" && args.resource === "B") {  // don't allow moving from A to B
            args.left.enabled = false;
            args.right.html = "You can't move an event from Room 1 to Room 2";

            args.allowed = false;
        }
        else if (args.resource === "B") {  // must start on a working day, maximum length one day
            while (args.start.getDayOfWeek() === 0 || args.start.getDayOfWeek() === 6) {
                args.start = args.start.addDays(1);
            }
            args.end = args.start.addDays(1);  // fixed duration
            args.left.enabled = false;
            args.right.html = "Events in Room 2 must start on a workday and are limited to 1 day.";
        }

        if (args.resource === "C") {
            var except = args.e.data;
            var events = dp.rows.find(args.resource).events.all();

            var start = args.start;
            var end = args.end;
            var overlaps = events.some(function(item) {
                return item.data !== except && DayPilot.Util.overlaps(item.start(), item.end(), start, end);
            });

            while (overlaps) {
                start = start.addDays(1);
                end = end.addDays(1);

                overlaps = events.some(function(item) {
                    return item.data !== except && DayPilot.Util.overlaps(item.start(), item.end(), start, end);
                });
            }

            if (args.start !== start) {
                args.start = start;
                args.end = end;

                args.left.enabled = false;
                args.right.html = "Start automatically moved to " + args.start.toString("d MMMM, yyyy");
            }

        }

    };*/

    // event resizing
    dp.onEventResized = function (args) {
        dp.message("Resized: " + args.e.text());
    };

    // event creating
    dp.onTimeRangeSelected = function (args) {
        DayPilot.Modal.prompt("New price:", "").then(function(modal) {
            dp.clearSelection();
            var name = modal.result;
            if (!name) return;
            var e = new DayPilot.Event({
                start: args.start,
                end: args.end,
                //id: DayPilot.guid(),
                resource: args.resource,
                text: name
            });
            if(dp.events.add(e)){
				var datas = JSON.stringify(e);
				
		//-----------------------------------------------save price -----------------
					 $.ajax({
						type: "GET",
						url: "file_upload.php?type=addpriceroom&data="+datas,
						success: function(result) {
							 
								alert('Success');
								location.reload();
  								
						},
						error: function(jqXHR, textStatus, err) {
						  //show error message
						  alert('text status ' + textStatus + ', err ' + err);
						}
					  });
			}
            // dp.message("Created");
        });
    };


    dp.onEventMove = function(args) {
        if (args.ctrl) {
            var newEvent = new DayPilot.Event({
                start: args.newStart,
                end: args.newEnd,
                text: "Copy of " + args.e.text(),
                resource: args.newResource,
                id: DayPilot.guid()  // generate random id
            });
            dp.events.add(newEvent);

            // notify the server about the action here

            args.preventDefault(); // prevent the default action - moving event to the new location
        }
    };
	
	
	
	 dp.onBeforeTimeHeaderRender = function(args) {
        if (args.header.level === 1) {
			var ch = (args.header.html).split(" ");
			if(ch[0]==="Sa" || ch[0]==="Su" ){
				args.header.areas = [
                {top: 0,width: 100, bottom: 0, backColor: "rgba(255, 0, 0, .4)"},
            ];
			}
			
            
        }
       
    };
	
	
	
	
	
	

    dp.init();



    function barColor(i) {
        var colors = ["#3c78d8", "#6aa84f", "#f1c232", "#cc0000"];
        return colors[i % 4];
    }
    function barBackColor(i) {
        var colors = ["#a4c2f4", "#b6d7a8", "#ffe599", "#ea9999"];
        return colors[i % 4];
    }

</script>


                </div>
	        </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
	    
	
    var url = window.location.href;
    var filename = url.substring(url.lastIndexOf('/')+1);
    if (filename === "") filename = "index.html";
    $(".menu a[href='" + filename + "']").addClass("selected");

    $(".menu-title").click(function() {
        $(".menu-body").toggle();
        if ($(".menu-body").is(":visible")) {
            scrollTo({
                top: pageYOffset + 100,
                behavior: "smooth"
            });
        }
    });
});
        
</script>

