<!DOCTYPE html>
<html>
<?php include "head.php";
include_once('connectdb.php');

error_reporting(0);
?>



<body>
  <!--    <div class="pre-loader">
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
              <div class="weight-600 font-30 text-blue">เช็คราคาห้องพักของแต่ละรีสอร์ท</div>
            </h4>
          </div>
        </div>
      </div>

      <div class="pd-20 card-box mb-30">

        <?php if ($_POST['display'] == "block") { ?>
          <form action="Checkpricec.php" method="post" style="display: none;" name="form">
          <?php } else { ?>
            <form action="Checkpricec.php" method="post">
            <?php } ?>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label>
                  <h4 class="text-blue h4">ที่พัก</h4>
                </label>
                <select class="custom-select col-12" id="id" name="id" required="" onchange="form.submit()">
                  <option selected="">โปรดเลือกที่พัก...</option>
                  <?php
                  $sql1 = "SELECT * FROM `tb_resort` ";
                  $query1 = mysqli_query($con, $sql1);
                  while ($results1 = mysqli_fetch_assoc($query1)) {
                    $id = $results1["id"]; ?>
                    <option value="<?php echo $results1["id"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                  <?php  } ?>
                </select>

              </div>
            </div>
            <div class="col-md-6 col-sm-12">

              <input class="btn btn-primary" type="text" value="block" name="display" hidden="">
              <!-- <input class="btn btn-primary" type="submit" value="ตรวจสอบ"> -->
            </div>
            </form>


            <?php if ($_POST['display'] == "block") {
              $id = $_POST['id'];
              $id_tb_resort = $_POST['id'];

            ?>
              <form action="Checkpricec_detail.php" method="post">
              <?php } else { ?>
                <form action="Checkpricec_detail.php" method="post" style="display: none;">
                <?php } ?>

                <div class="row" style="padding-top: 35px;">

                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">ที่พัก</h4>
                      </label>

                      <!-- <?php
                            $sql5 = "SELECT * FROM `tb_resort` WHERE `id` = '" . $_POST['id'] . "'";
                            $query5 = mysqli_query($con, $sql5);
                            while ($results5 = mysqli_fetch_assoc($query5)) {  ?>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $results5["resort_name"]; ?>">
                      <?php  } ?> -->

                      <script>
                        function autoselect(value) {
                          // console.log(value);
                          $.ajax({
                            url: "ajaxdata.php?page=checkprice&&id=" + value,
                            type: "GET",
                            success: function(result) {
                              let ajaxdata = JSON.parse(result);
                              // console.log(ajaxdata);
                              $("#name_roomtype").empty();
                              for (let i = 0; i < ajaxdata.length; i++) {
                                // console.log(ajaxdata[i]);
                                $("#name_roomtype").append("<option value=" + ajaxdata[i]['id'] + ">" + ajaxdata[i]['name_roomtype'] + "</option>");
                              }
                              // console.log(result);
                            }
                          });
                        }
                      </script>


                      <select class="custom-select col-12" id="id" name="id" onchange="autoselect(this.value)">
                        <?php
                        $sql5 = "SELECT * FROM `tb_resort` WHERE `id` = '" . $_POST['id'] . "'";
                        $query5 = mysqli_query($con, $sql5);
                        $results5 = mysqli_fetch_assoc($query5);
                        echo "<option value='$results5[id]'>$results5[resort_name]</option>";

                        ?>

                        <?php

                        $sql5 = "SELECT * FROM tb_resort";
                        $query5 = mysqli_query($con, $sql5);
                        while ($results1 = mysqli_fetch_assoc($query5)) : ?>

                          <option value="<?php echo $results1["id"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                        <?php endwhile; ?>
                      </select>

                      <!-- 
                      <select class="custom-select col-12" id="name" name="name" required="">
                                        <option selected="">โปรดเลือกที่พัก...</option>
                                        <?php
                                        $sql1 = "SELECT * FROM `tb_resort` ";
                                        $query1 = mysqli_query($con, $sql1);
                                        while ($results1 = mysqli_fetch_assoc($query1)) {
                                          $id = $results1["id"]; ?>
                                        <option value="<?php echo $results1["id"]; ?>"><?php echo $results1["resort_name"]; ?></option>
                                        <?php  } ?>
                                    </select> -->
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">ประเภทห้องพัก</h4>
                      </label>
                      <select class="custom-select col-12" id="name_roomtype" name="name_roomtype" required="">
                        <!-- <option value="">โปรดเลือกประเภทที่พัก...</option> -->
                        <?php
                        $sql2 = "SELECT * FROM `tb_roomtype` WHERE `id_resort` = '" . $_POST['id'] . "'";
                        $query2 = mysqli_query($con, $sql2);
                        while ($results2 = mysqli_fetch_assoc($query2)) {  ?>
                          <option value="<?php echo $results2["id"]; ?>"><?php echo $results2["name_roomtype"]; ?></option>
                        <?php  } ?>
                      </select>

                    </div>
                  </div>



                  <input hidden type="text" name="id_tb_resort" value="<?php echo $id_tb_resort; ?>">

                  <script>
                    $(document).ready(function() {

                      let startday = document.getElementById("type1-start").value
                      var d = new Date(startday);
                      // console.log(d.getFullYear());
                      var year = d.getFullYear();
                      var month = d.getMonth();
                      var day = d.getDay();
                      if (month < 10) {
                        month = "0" + month;
                      }
                      if (day < 10) {
                        day = "0" + day;
                      }
                      let fulldate = year + "-" + month + "-" + day;
                      console.log(fulldate);
                    });
                  </script>



                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">Checkin</h4>
                      </label>

                      <div id="id_startCalendar" class="calendar-widget default-today" data-next="#id_deadlineCalendar" date-min="today" tabindex="-1">
                        <div class="input-wrapper">
                          <label for="type1-start">Starting Date</label>
                          <input class="date-field form-control" id="type1-start" type="text" placeholder="Starting Date" name="Checkin" readonly>
                        </div>



                        <div class="calendar-wrapper" style="border:solid 1px #000">
                          <div class="dual-calendar">
                            <div class="calendar">
                              <div class="calendar-header">
                                <div class="prev-btn">
                                  <i class="material-icons">
                                  </i> </div>
                                <div class="month-text">
                                  <p>September 2018</p>
                                </div>
                              </div>
                              <div class="calendar-body">
                                <div class="date-table">
                                  <div class="date-table-header">
                                    <div class="day sunday">S</div>
                                    <div class="day">M</div>
                                    <div class="day">T</div>
                                    <div class="day">W</div>
                                    <div class="day">T</div>
                                    <div class="day">F</div>
                                    <div class="day saturday">S</div>
                                  </div>
                                  <div class="date-table-body">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="calendar plus-one">
                              <div class="calendar-header">
                                <div class="month-text">
                                  <p>September</p>
                                </div>

                                <div class="next-btn">
                                  <i class="material-icons">></i>
                                </div>
                              </div>
                              <div class="calendar-body">
                                <div class="date-table">
                                  <div class="date-table-header">
                                    <div class="day sunday">S</div>
                                    <div class="day">M</div>
                                    <div class="day">T</div>
                                    <div class="day">W</div>
                                    <div class="day">T</div>
                                    <div class="day">F</div>
                                    <div class="day saturday">S</div>
                                  </div>
                                  <div class="date-table-body">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">Checkout</h4>
                      </label>

                      <div id="id_deadlineCalendar" class="calendar-widget linked" tabindex="-1" data-link="#id_startCalendar" date-min="link">
                        <div class="input-wrapper">
                          <label for="type1-deadline">Deadline</label>
                          <input class="date-field form-control" id="type1-deadline" name="Checkout" type="text" placeholder="Deadline" readonly>
                        </div>
                        <div class="calendar-wrapper" style="border:solid 1px #000">
                          <div class="dual-calendar">
                            <div class="calendar">
                              <div class="calendar-header">
                                <div class="prev-btn">
                                  <i class="material-icons">
                                  </i> </div>
                                <div class="month-text">
                                  <p>September 2018</p>
                                </div>
                              </div>
                              <div class="calendar-body">
                                <div class="date-table">
                                  <div class="date-table-header">
                                    <div class="day sunday">S</div>
                                    <div class="day">M</div>
                                    <div class="day">T</div>
                                    <div class="day">W</div>
                                    <div class="day">T</div>
                                    <div class="day">F</div>
                                    <div class="day saturday">S</div>
                                  </div>
                                  <div class="date-table-body">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="calendar plus-one">
                              <div class="calendar-header">
                                <div class="month-text">
                                  <p>September</p>
                                </div>

                                <div class="next-btn">
                                  <i class="material-icons">></i>
                                </div>
                              </div>
                              <div class="calendar-body">
                                <div class="date-table">
                                  <div class="date-table-header">
                                    <div class="day sunday">S</div>
                                    <div class="day">M</div>
                                    <div class="day">T</div>
                                    <div class="day">W</div>
                                    <div class="day">T</div>
                                    <div class="day">F</div>
                                    <div class="day saturday">S</div>
                                  </div>
                                  <div class="date-table-body">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

















                  <style type="text/css">
                    .inputs {
                      height: 200px;
                      width: 500px;

                      display: flex;
                      flex-direction: column;
                      align-items: flex-start;

                      /*   border: 1px solid white; */
                    }

                    .inputs>* {
                      margin-bottom: 48px;
                    }

                    .inputs input {
                      font-family: "Nunito";
                      font-size: 90%;
                    }

                    /* ============================ */
                    /* Type 1 */
                    /* ============================ */

                      {
                      display: flex;
                      flex-direction: column;
                    }

                    .fields {
                      display: flex;
                    }



                    .date-field {
                      cursor: pointer;
                    }

                    .calendar-widget {
                      position: relative;
                    }

                    .calendar-widget:focus {
                      outline: none;
                    }

                    .calendar-wrapper {
                      display: none;
                      position: absolute;
                      top: 100%;
                      left: 0;
                      padding-top: 8px;

                      z-index: 2;
                    }

                    .dual-calendar {
                      display: flex;
                      /*   height: 300px; */

                      border-radius: 3px;
                      padding: 16px;
                      box-shadow: var(--shadow-2dp);
                      background-color: white;
                    }

                    .dual-calendar .calendar:first-child {
                      margin-right: 16px;
                    }

                    .calendar {
                      width: auto;
                    }

                    .calendar-header {
                      position: relative;
                      height: 40px;
                      display: flex;
                      align-items: center;
                      justify-content: center;
                    }

                    .month-text {
                      font-family: "Nunito";
                      color: var(--gray-700);
                    }

                    .prev-btn,
                    .next-btn {
                      cursor: pointer;
                      position: absolute;
                      top: 50%;

                      transform: translateY(-50%);
                      z-index: 1;

                      width: 36px;
                      height: 36px;
                      display: flex;
                      align-items: center;
                      justify-content: center;

                      border: none;
                      border-radius: 50px;
                      box-shadow: var(--shadow-2dp);
                      background-color: var(--primary);
                      color: white;

                      transition: background-color 0.2s, box-shadow 0.2s;
                    }

                    .prev-btn:hover,
                    .next-btn:hover {
                      box-shadow: var(--shadow-4dp);
                      background-color: var(--primary-md);
                    }

                    .prev-btn:active,
                    .next-btn:active {
                      box-shadow: var(--shadow-8dp);
                      background-color: var(--primary-lt);
                    }

                    .prev-btn.disabled,
                    .next-btn.disabled {
                      cursor: default;
                      box-shadow: none;
                      background-color: var(--gray-300);
                      color: var(--gray-500);
                    }

                    .prev-btn *,
                    .next-btn * {
                      user-select: none;
                    }

                    .prev-btn {
                      left: 0;
                    }

                    .next-btn {
                      right: 0;
                    }

                    .date-table-header {
                      display: flex;
                      justify-content: space-between;
                      width: 100%;
                      margin-top: 8px;
                    }

                    .day {
                      user-select: none;
                      display: flex;
                      align-items: center;
                      justify-content: center;

                      width: 40px;
                      height: 40px;

                      font-weight: 700;

                      color: var(--gray-700);
                    }

                    .day.saturday {
                      color: var(--primary);
                    }

                    .day.sunday {
                      color: var(--secondary);
                    }


                    /* Date Styling */
                    .date-table-row {
                      display: flex;
                      height: 40px;
                      justify-content: space-between;
                    }

                    .date {
                      cursor: pointer;
                      position: relative;
                      display: flex;
                      flex-direction: column;
                      align-items: center;

                      width: 40px;
                      height: 40px;
                      transition: color 0.2s;
                    }

                    /* DO NOT CHANGE THE ORDER */

                    .date.sunday {
                      color: var(--secondary);
                    }

                    .date.today {
                      color: var(--primary);
                    }

                    .date.selected {
                      color: white;
                    }

                    .date.disabled {
                      color: var(--gray-300);
                    }

                    .date.empty {
                      cursor: default;
                      user-select: none;
                    }

                    .date * {
                      cursor: pointer;
                      user-select: none;
                    }

                    .date.disabled * {
                      cursor: not-allowed;
                    }

                    .date .help-text {
                      position: absolute;
                      top: 0;

                      display: none;
                      align-items: flex-start;
                      justify-content: center;

                      width: 100%;
                      height: 15px;
                      font-size: 10px;
                      z-index: 1;
                    }

                    .date .date-text {
                      display: flex;
                      justify-content: center;
                      align-items: center;

                      width: 100%;
                      height: 100%;

                      font-size: 90%;

                      z-index: 1;
                    }

                    .date .date-ripple {
                      position: absolute;
                      top: 50%;
                      left: 50%;
                      transform: translate(-50%, -50%) scale(0);

                      width: 40px;
                      height: 100%;
                      background-color: transparent;

                      will-change: transform;

                      transition: transform 0.18s cubic-bezier(0, .75, .5, 1), background-color 0.2s;
                    }

                    .date .date-ripple.no-transition {
                      transition: none;
                    }

                    .date.hover .date-ripple {
                      background-color: var(--gray-300);
                      transform: translate(-50%, -50%) scale(1);
                    }

                    .date.in-range .date-ripple {
                      background-color: var(--primary-lightest);
                      transform: translate(-50%, -50%) scale(1);
                    }

                    .date.selected .date-ripple {
                      background-color: var(--primary);
                      transform: translate(-50%, -50%) scale(1);
                    }
                  </style>



                  <script type="text/javascript">
                    // Time variable queries.
                    let today = new Date()
                    // All the date should be a NUMBER type!!



                    // Variable for storing the selected date data.
                    let selDate, selMonth, selYear;

                    // To store the date today.
                    // Variables with "curr" represents the current displayed data.
                    let currYear = thisYear = today.getFullYear();
                    let currMonth = thisMonth = new Month(today.getMonth());
                    let currDate = today.getDate();
                    let startDay = new Date(thisMonth.index, thisYear, 1).getDay()

                    // Element queries
                    const calendarWidgets = document.querySelectorAll(".calendar-widget");

                    // ==================================================================
                    // _________________________ OBJECTS ________________________________
                    // ==================================================================
                    function Month(index) {
                      const shortNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
                      const longNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                      const numberofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

                      if (currYear % 4 === 0) {
                        numberofDays[1] = 29;
                      }

                      index = index > 11 ? 0 : index;
                      index = index < 0 ? 11 : index;

                      this.index = index;
                      this.shortName = shortNames[index];
                      this.longName = longNames[index];
                      this.length = numberofDays[index];
                    }

                    // =======================================
                    // _____________ FUNCTIONS _______________
                    // =======================================

                    function getMonthIndex(name) {
                      const shortMonthTable = {
                        "jan": 0,
                        "feb": 1,
                        "mar": 2,
                        "apr": 3,
                        "may": 4,
                        "june": 5,
                        "july": 6,
                        "aug": 7,
                        "sept": 8,
                        "oct": 9,
                        "nov": 10,
                        "dec": 11
                      };

                      const longMonthTable = {
                        "january": 0,
                        "february": 1,
                        "march": 2,
                        "april": 3,
                        "may": 4,
                        "june": 5,
                        "july": 6,
                        "august": 7,
                        "september": 8,
                        "october": 9,
                        "november": 10,
                        "december": 11
                      };
                      name = name.toLowerCase();
                      let index = shortMonthTable[name];
                      if (index === undefined) {
                        index = longMonthTable[name];
                      };
                      return index;
                    }

                    function getStartDay(year, month) {
                      const startDay = new Date(year, month.index, 1).getDay()
                      return startDay
                    }

                    function getSelDate(year, month) {
                      // console.log(year === selYear);
                      // console.log(month.index === selMonth.index);
                      if (year === selYear && month.index === selMonth.index) {
                        return selDate
                      }
                    }

                    function getToday(year, month) {
                      if (year === thisYear && month.index === thisMonth.index) {
                        return today.getDate();
                      }
                    }

                    function updateSelData(e, dateField) {
                      let fullDate = dateField.value.split(" ");
                      let selData = [];
                      if (fullDate !== "") {
                        selDate = Number(fullDate[0]);
                        selMonth = new Month(getMonthIndex(fullDate[1]));
                        selYear = Number(fullDate[2]);
                        selData = [selDate, selMonth, selYear];
                      }

                      return selData;
                    }

                    function updateDateField(e, fullDate, dateField) {
                      /* Update the date field of the widget
                       * The date arguments should be a formatted date of DD MMMM YYYY
                       */
                      if (e) {
                        // console.log(`Update Date Field called by: ${e.target.tagName}.${e.target.className}`)
                      }

                      dateField.value = fullDate;
                      return fullDate;
                    }

                    // Cell UI Animation

                    function clearSelCell(calendar) {
                      // For single calendar, input the div with calendar class as the arguments, for dual calendar, input the div with "dual-calendar" class as arguments.
                      const cells = calendar.querySelectorAll(".date.selected");
                      cells.forEach(cell => {
                        cell.classList.remove("selected");
                      })
                    }

                    function highlightCellRange(currCell, calendar) {
                      //For dual calendar, input the div with "dual-calendar" class as arguments.
                      clearSelCell(calendar);

                      let currFullDate = currCell.closest(".calendar").querySelector(".month-text p").textContent.split(" ");
                      const currYear = Number(currFullDate[1]);
                      const currMonth = currFullDate[0];
                      const currDate = Number(currCell.querySelector(".date-text").textContent);
                      currFullDate = new Date(`${currDate} ${currMonth} ${currYear}`)
                      const cells = calendar.querySelectorAll(".date");

                      cells.forEach(cell => {
                        let cellFullDate, cellYear, cellMonth, cellDate;

                        if (!(cell.classList.contains("empty") || cell.classList.contains("disabled"))) {
                          cellFullDate = cell.closest(".calendar").querySelector(".month-text p").textContent.split(" ");
                          cellYear = Number(cellFullDate[1]);
                          cellMonth = cellFullDate[0];
                          cellDate = Number(cell.querySelector(".date-text").textContent);
                          cellFullDate = new Date(`${cellDate} ${cellMonth} ${cellYear}`);

                          // console.log(cellFullDate);
                          // console.log(currFullDate);
                          if (cellFullDate < currFullDate) {
                            cell.classList.add("in-range");
                          } else {
                            cell.classList.remove("in-range");
                          }
                        }
                      })
                    }

                    function drawTable(e, calendar) {
                      // console.log(`Draw Table called by: ${e.target.tagName}.${e.target.className}`);
                      let month = currMonth;
                      let year = currYear;

                      if (calendar.classList.contains("plus-one")) {
                        monthIndex = currMonth.index + 1;
                        month = new Month(monthIndex);
                        if (monthIndex > 11) {
                          year++;
                        }
                      }

                      const widget = calendar.closest(".calendar-widget");

                      // Change Table Month Name
                      const monthText = calendar.querySelector(".month-text p");
                      monthText.textContent = `${month.longName} ${year}`

                      // Defining variables to create the date table
                      let monthDays = month.length;
                      let start = getStartDay(year, month);
                      let count = 1 - start;
                      let currSelDate = getSelDate(year, month);
                      let todayDate = getToday(year, month);
                      let minDate = widget.getAttribute("date-min");
                      if (minDate !== null) {
                        if (minDate === "today") {
                          minDate = [todayDate, month.index, year];
                        } else if (minDate === "link") {
                          const linkedWidget = document.querySelector(widget.getAttribute("data-link"));
                          const linkedDateField = linkedWidget.querySelector(".date-field");
                          minDate = linkedDateField.value.split(" ");
                          let monthIndex = getMonthIndex(minDate[1]);
                          minDate[1] = monthIndex;
                          console.log(`Linked min Date is: ${minDate}`);
                        } else {
                          minDate = minDate.split("-")
                        }

                        if (year === Number(minDate[2]) && month.index === minDate[1]) {
                          minDate = minDate[0]
                        } else {
                          minDate = undefined;
                        }
                      }

                      // console.log(`Min Date is: ${minDate}`)

                      // console.log(`Current Selected Date: ${currSelDate}`)
                      const tableBody = calendar.querySelector(".date-table-body");
                      while (count <= monthDays) {
                        let row = document.createElement("div"); // Create date rows
                        row.setAttribute("class", "date-table-row");

                        let dayCount = 0; // variable to keep track of the day (e.g. Monday, Tuesday, ... Sunday)

                        // Date cell creation
                        for (i = 0; i < 7; i++) {
                          let cell = document.createElement("div");
                          cell.setAttribute("class", "date");

                          if (count < 1) {
                            cell.classList.add("empty");
                          } else if (count > monthDays) {
                            cell.classList.add("empty");
                          } else {
                            let cellRipple = document.createElement("div"); // Ripple effect, not important
                            let helpText = document.createElement("p"); // Originally intended to show the today's date. Removed.
                            let cellText = document.createElement("p"); // The number inside each date cell

                            cellRipple.setAttribute("class", "date-ripple");
                            cellText.setAttribute("class", "date-text");
                            helpText.setAttribute("class", "help-text");

                            cellText.textContent = count; // Output the current date

                            if (count === todayDate) {
                              helpText.textContent = "today";
                              cell.classList.add("today"); // mark today's date
                            }

                            if (count < minDate) {
                              cell.classList.add("disabled");
                            }

                            // Add a sign showing which date is selected.
                            if (count === currSelDate) {
                              cell.classList.add("selected");
                              cellRipple.classList.add("selected");
                            }

                            if (dayCount === 0) {
                              cell.classList.add("sunday");
                            }

                            cell.appendChild(cellRipple);
                            cell.appendChild(helpText);
                            cell.appendChild(cellText);

                            if (!(cell.classList.contains("disabled") || cell.classList.contains("empty"))) {
                              if (widget.classList.contains("linked")) {
                                cell.addEventListener("mouseenter", function() {
                                  highlightCellRange(cell, calendar.closest(".dual-calendar"));
                                  cell.classList.add("in-range");
                                })
                              } else {
                                cell.addEventListener("mouseenter", function() {
                                  cell.classList.add("hover");
                                })
                                cell.addEventListener("mouseleave", function() {
                                  cell.classList.remove("hover");
                                })
                              }

                              cell.addEventListener("click", function(e) {
                                e.stopPropagation();

                                clearSelCell(calendar.closest(".dual-calendar"));
                                cell.classList.add("selected"); //change the cell state to active

                                let dateField = widget.querySelector(".date-field");
                                let fullDate = `${cellText.textContent} ${month.longName} ${year} `
                                updateDateField(e, fullDate, dateField);
                                updateSelData(e, dateField);
                                hideCalendar(e, cell.closest(".calendar-widget"));
                                if (widget.hasAttribute("data-next")) {
                                  nextCalendarWidget(e, widget);
                                }
                              })
                            }
                          }

                          row.appendChild(cell);
                          count++;
                          dayCount++;
                        }
                        tableBody.appendChild(row);
                      }
                    }

                    function clearTable(e, calendar) {
                      // if (e){
                      //   console.log(`Clear table called by: ${e.target.tagName}.${e.target.className}`)
                      // }

                      const tableRows = calendar.querySelectorAll(".date-table-row");
                      if (tableRows.length) {
                        tableRows.forEach(row => {
                          row.remove();
                        })
                      }
                    }


                    function editBtnListener(widget, minData, maxData) {
                      // console.log(`Edit Btn Listener called.`)
                      // Query the minimum and maximum date from the html data-attributes;
                      let minYear, minMonth, maxYear, maxMonth;
                      if (minData) {
                        minYear = minData["minYear"];
                        minMonth = minData["minMonth"];
                      } else if (widget.getAttribute("date-min") === "today") {
                        minYear = thisYear;
                        minMonth = thisMonth;
                      } else if (widget.getAttribute("date-min") === "link") {
                        const linkedWidget = document.querySelector(widget.getAttribute("data-link"));
                        const linkedDateField = linkedWidget.querySelector(".date-field");
                        minData = linkedDateField.value.split(" ");
                        minYear = Number(minData[2]);
                        minMonth = new Month(getMonthIndex(minData[1]));
                      }

                      // console.log(`Current Year: ${currYear}, Minimum Year: ${minYear}`);
                      // console.log(`Current Month: ${currMonth.index}, Minimum Month: ${minMonth.index}`);
                      // console.log(currMonth.index === minMonth.index);


                      if (maxData) {
                        maxYear = maxData["maxYear"];
                        maxMonth = maxData["maxMonth"];
                      } else {
                        maxYear = thisYear + 1;
                        maxMonth = new Month(thisMonth.index - 1);
                      }

                      const prevBtn = widget.querySelector(".prev-btn");
                      const nextBtn = widget.querySelector(".next-btn");
                      // Remove the click event listener from previous month button if it's the minimum month the user can select.
                      if (currYear === minYear && currMonth.index === minMonth.index) {
                        prevBtn.removeEventListener("click", prevMonth);
                        prevBtn.classList.add("disabled");
                        // console.log("Prev Button Disabled");
                        prevBtn.setAttribute("data-has-listener", "false");
                      } else {
                        if (prevBtn.getAttribute("data-has-listener") === "false") {
                          prevBtn.addEventListener("click", prevMonth);
                          console.log("Prev Button Enabled");
                        }
                        prevBtn.classList.remove("disabled");
                        prevBtn.setAttribute("data-has-listener", "true");
                      }

                      // Remove the click event listener from the next month button if it's the maximum month the user can select.
                      if (currYear === maxYear && currMonth.index === maxMonth.index) {
                        nextBtn.removeEventListener("click", nextMonth);
                        nextBtn.classList.add("disabled");
                        console.log("Listener Removed");
                        nextBtn.setAttribute("data-has-listener", "false");
                      } else {
                        if (nextBtn.getAttribute("data-has-listener") === "false") {
                          nextBtn.addEventListener("click", nextMonth);
                          console.log("Listener Added");
                        }
                        nextBtn.classList.remove("disabled");
                        nextBtn.setAttribute("data-has-listener", "true");

                      }
                    }


                    function hideCalendar(e, widget) {
                      if (e) {
                        // console.log(`Hide Calendar called by: ${e.target.tagName}.${e.target.className}`);
                      }

                      const calendarWrapper = widget.querySelector(".calendar-wrapper");

                      widget.setAttribute("data-active", "false");
                      calendarWrapper.style.display = null;
                    }

                    function toggleCalendar(e, widget) {
                      // console.log(`Toggle Calendar called by: ${e.target.tagName}.${e.target.className}`);

                      const isActive = widget.getAttribute("data-active") === "true";
                      const dateField = widget.querySelector(".date-field");
                      const calendarWrapper = widget.querySelector(".calendar-wrapper");
                      const calendars = calendarWrapper.querySelectorAll(".calendar");
                      const calendarPadding = Number(window.getComputedStyle(calendars[0]).getPropertyValue("padding-bottom").replace(/px/, ''));
                      const calendarMargin = Number(window.getComputedStyle(calendars[0]).getPropertyValue("margin-top").replace(/px/, ''));

                      let wrapperHeight, calendarHeight;

                      if (isActive) {
                        // console.log("toggle-off");
                        widget.classList.remove("active");
                        widget.setAttribute("data-active", "false");
                        dateField.classList.remove("active");

                        // Collapse the calendar wrapper
                        calendarWrapper.style.display = null;
                      } else {
                        calendarWrapper.style.display = 'flex';

                        // console.log("toggle-on");
                        widget.classList.add("active");
                        widget.setAttribute("data-active", "true");
                        dateField.classList.add("active");

                        if (dateField.value !== "") {
                          updateSelData(e, dateField);
                          currMonth = selMonth;
                          currYear = selYear;
                        }

                        // console.log(`Selected Date: ${selDate} ${selMonth.shortName} ${selYear}`);

                        calendars.forEach(calendar => {
                          clearTable(e, calendar);
                          drawTable(e, calendar);
                        })

                        // Next and Previous Month Buttons Listener
                        const nextBtn = widget.querySelector(".next-btn");
                        const prevBtn = widget.querySelector(".prev-btn");

                        nextBtn.addEventListener("click", nextMonth);
                        prevBtn.addEventListener("click", prevMonth);
                        nextBtn.setAttribute("data-has-listener", "true");
                        prevBtn.setAttribute("data-has-listener", "true");

                        let minData;

                        if (widget.classList.contains("linked")) {
                          const prevWidget = document.querySelector(widget.getAttribute("data-link"));
                          const prevDateField = prevWidget.querySelector(".date-field");
                          const prevFullDate = prevDateField.value.split(" ");
                          const minYear = Number(prevFullDate[2]);
                          const minMonth = new Month(getMonthIndex(prevFullDate[1]));
                          minData = {
                            "minYear": minYear,
                            "minMonth": minMonth
                          }
                        }
                        editBtnListener(widget, minData);
                      }

                      return;
                    }

                    function nextCalendarWidget(e, widget) {
                      if (e) {
                        // console.log(`Next Widget called by: ${e.target.tagName}.${e.target.className}`)
                      }
                      // The current widget data
                      const dateField = widget.querySelector(".date-field");

                      const nextId = widget.getAttribute("data-next");
                      const nextWidget = document.querySelector(nextId);
                      const nextDateField = nextWidget.querySelector(".date-field");

                      //Change the value only if it is empty
                      if (nextDateField.value === "") {
                        nextDateField.value = dateField.value;
                      }

                      //If the next widget date existing value is smaller than the date value of the current widget, change it to the current widget date value.
                      const currDate = new Date(dateField.value);
                      const nextDate = new Date(nextDateField.value);

                      if (nextDate < currDate) {
                        nextDateField.value = dateField.value;
                      }

                      nextWidget.click();
                      nextWidget.focus();
                      return;
                    }

                    function changeMonth(e, calendar, direction) {
                      if (e) {
                        // console.log(`Next Month called by: ${e.target.tagName}.${e.target.className}`);
                      }
                      let calendars;

                      let currMonthIndex;
                      if (direction === "next") {
                        currMonthIndex = currMonth.index + 1;
                        currMonth = new Month(currMonthIndex);
                        currMonthIndex > 11 ? currYear++ : currYear;
                      } else {
                        currMonthIndex = currMonth.index - 1;
                        currMonth = new Month(currMonthIndex);
                        currMonthIndex < 0 ? currYear-- : currYear;
                      }

                      if (calendar.classList.contains("dual-calendar")) {
                        calendars = calendar.querySelectorAll(".calendar");
                        calendars.forEach(calendar => {
                          clearTable(e, calendar);
                          drawTable(e, calendar);
                        })
                      } else {
                        clearTable(e, calendar);
                        drawTable(e, calendar);
                      }

                      editBtnListener(calendar.closest(".calendar-widget"));
                    }

                    function nextMonth(e) {
                      changeMonth(e, e.target.closest(".dual-calendar"), "next");
                    }

                    function prevMonth(e) {
                      // console.log("previous");
                      changeMonth(e, e.target.closest(".dual-calendar"), "prev");
                    }

                    // ==================================================================
                    // ________________________ LISTENERS _______________________________
                    // ==================================================================
                    calendarWidgets.forEach(widget => {
                      // If the widget has the "default-today" class, sets its value to today's date.
                      const dateField = widget.querySelector(".date-field");

                      if (widget.classList.contains("default-today")) {
                        dateField.readonly = false;
                        dateField.value = `${currDate} ${thisMonth.longName} ${thisYear}`;
                        dateField.readonly = true;
                      }

                      const calendarWrapper = widget.querySelector(".calendar-wrapper");
                      const calendars = widget.querySelectorAll(".calendar");

                      // Not sure if OK to use
                      calendarWrapper.addEventListener("click", function(e) {
                        // Stop all the click event from bubbling to the widget.
                        e.stopPropagation();
                      });

                      widget.addEventListener("click", function(e) {
                        toggleCalendar(e, widget)
                      })

                      //Hide on focus out
                      let focusOutFunction;
                      widget.addEventListener("focusout", function(e) {
                        focusOutFunction = setTimeout(function() {
                          // console.log("focusout");
                          // hideCalendar(e, widget);
                        }, 0);
                      })

                      // If the next object that was focused in is a member of the widget, cancel the focusout function.
                      widget.addEventListener("focusin", function(e) {
                        // console.log(`${e.target.tagName}.${e.target.className} focus in.`);
                        clearTimeout(focusOutFunction);
                      })
                    })
                  </script>








                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">ผู้ใหญ่</h4>
                      </label>
                      <select class="custom-select col-12" id="adult" name="adult">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">เด็ก อายุ 4-10 ปี</h4>
                      </label>
                      <select class="custom-select col-12" id="older_children" name="older_children">
                        <option value="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label>
                        <h4 class="text-blue h4">เด็ก อายุ 0-3 ปี</h4>
                      </label>
                      <select class="custom-select col-12" id="child" name="child">
                        <option value="">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                  </div>




                  <div class="col-md-3 col-sm-12">
                    <label class="weight-600">
                      <h4 class="text-blue h4">ประเภทการดำน้ำ</h4>
                    </label>
                    <?php
                    $sql11 = "SELECT * FROM `tb_car_boat_diving` WHERE `status` = '9'";
                    $query11 = mysqli_query($con, $sql11);
                    while ($results11 = mysqli_fetch_assoc($query11)) {
                      $diving1 = $results11["price"];
                    } ?>

                    <?php
                    $sql22 = "SELECT * FROM `tb_car_boat_diving` WHERE `status` = '99'";
                    $query22 = mysqli_query($con, $sql22);
                    while ($results22 = mysqli_fetch_assoc($query22)) {
                      $diving2 = $results22["price"];
                    } ?>
                    <?php
                    $sql33 = "SELECT * FROM `tb_car_boat_diving` WHERE `status` = '999'";
                    $query33 = mysqli_query($con, $sql33);
                    while ($results33 = mysqli_fetch_assoc($query33)) {
                      $diving3 = $results33["price"];
                    } ?>


                    <div class="custom-control custom-radio mb-5">
                      <input type="radio" id="diving1" name="diving" class="custom-control-input" value="<?php echo $diving1 ?>">
                      <label class="custom-control-label" for="diving1">ดำน้ำโซนใน</label>
                    </div>
                    <div class="custom-control custom-radio mb-5">
                      <input type="radio" id="diving2" name="diving" class="custom-control-input" value="<?php echo $diving2 ?>">
                      <label class="custom-control-label" for="diving2">ดำน้ำโซนนอก</label>
                    </div>
                    <div class="custom-control custom-radio mb-5">
                      <input type="radio" id="diving3" name="diving" class="custom-control-input" value="<?php echo $diving3 ?>">
                      <label class="custom-control-label" for="diving3">ดำน้ำโซนใน + โซนนอก</label>
                    </div>
                  </div>



                  <div class="col-md-2 col-sm-12">
                    <label class="weight-600">
                      <h4 class="text-blue h4">เเพคเกจเสริม</h4>
                    </label>
                    <div class="custom-control custom-checkbox mb-12">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="car">
                      <label class="custom-control-label" for="customCheck1">รถ</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-12">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" name="boat">
                      <label class="custom-control-label" for="customCheck2">เรือ</label>
                    </div>


                    <div class="custom-control custom-checkbox mb-12">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" name="insurance" checked disabled>
                      <label class="custom-control-label" for="customCheck6">ประกันภัย</label>
                    </div>

                  </div>
                  <div class="col-md-12 col-sm-12">
                    <input class="btn btn-primary" type="submit" value="ตรวจสอบ">
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