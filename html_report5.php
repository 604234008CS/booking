<style>
    h1 {
        font-size: 24pt;
    }
    p.first {
        font-size: 12pt;
    }
    p.first span {
        font-style: italic;
    }
    p#second {
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
    }
    table.first {
        font-family: angsanaupc;
    }
    td {
    }
    td.second {
    }
    div.test {
        font-family: angsanaupc;

        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>

<?php
include("dbconnect.php");
        $i=1;

    $sql="SELECT * FROM  tb_report WHERE id = '1' ";
        $result = $mysqli->query($sql); if($result && $result->num_rows>0){ while($row = $result->fetch_assoc()){ $sumcustomers = $row['sum']/$row['customers']; ?>
<table class="first" cellpadding="4" cellspacing="6">
    <tr>
        <td width="15%" align="center">
            <img src="logo.png" />
        </td>
        <td width="50%">
            <b style="font-size: 1em;">Khrmtis ltinerary Co.,Ltd</b><br />
            <b style="font-size: 0.8em;">1168 หมูที่ 2 ตําบลปากนํ้า อําเภอละงู จังหวัดสตูล 91110</b><br />
            <b style="font-size: 0.8em;">Office : 061-6207959</b><br />
            <b style="font-size: 0.8em;">email : sale@khemtis.com</b><br />
            <b style="font-size: 0.8em;">ใบอนุญาติประกอบะุระกิจท่องเที่ยว : 42/00299</b><br />
        </td>
        <td width="35%">
            <b style="font-size: 0.8em;">
                เลขที่ :
                <?=$row['id_booking']?>
            </b>
            <br />
            <b style="font-size: 0.8em;">Sele : 061-6207923</b><br />
            <b style="font-size: 0.8em;">Website : www.khemtis.com</b><br />
            <b style="font-size: 0.8em;">Line : @khemtis</b><br />
        </td>
    </tr>
</table>

<table class="first" cellpadding="4" cellspacing="6">
    <tr>
        <td width="25%" align="center">วันจอง</td>
        <td width="25%" align="center"><?=$row['transaction_date']?></td>
        <td width="25%" align="center">วันหมดอายุ</td>
        <td width="25%" align="center"><?=$row['transaction_date']?></td>
    </tr>

    <tr>
        <td width="25%" align="center">ชื่อ</td>
        <td width="50%" align="center"><?=$row['name']?></td>
    </tr>
    <tr>
        <td width="25%" align="center">เบอร์โทร</td>
        <td width="25%" align="center"><?=$row['phone']?></td>
        <td width="25%" align="center">LINE/FB</td>
        <td width="25%" align="center">-</td>
    </tr>
    <tr>
        <td width="25%" align="center">ทริปเที่ยว</td>
        <td width="25%" align="center">-</td>
        <td width="25%" align="center">By</td>
        <td width="25%" align="center">-</td>
    </tr>
    <tr>
        <td width="25%" align="center">โรงเเรม</td>
        <td width="25%" align="center"><?=$row['room_name']?></td>
        <td width="25%" align="center">ปรเภทห้อง</td>
        <td width="25%" align="center"><?=$row['room_name']?></td>
    </tr>
    <tr>
    	<td width="25%" align="center">แพดเกจ</td>
        <td width="25%" align="center"><?=$row['package']?></td>
        <td width="25%" align="center">จํานวนหอง</td>
        <td width="25%" align="center"><?=$row['number_of_rooms']?></td>
    </tr>
    <tr>
        <td width="25%" align="center">เตียงเสริม</td>
        <td width="25%" align="center"><?=$row['extrabed']?></td>
        <td width="25%" align="center">จํานวนลูกค้า</td>
        <td width="25%" align="center"><?=$row['customers']?></td>
    </tr>
    <tr>
        <td width="25%" align="center">วันที่เขาพัก</td>
        <td width="25%" align="center"><?=$row['checkin']?></td>
        <td width="25%" align="center">วันที่เช็ดเอาท</td>
        <td width="25%" align="center"><?=$row['checkout']?></td>
    </tr>
    <tr>
        <td width="25%" align="center">มัดจำ</td>
        <td width="25%" align="center">
            <?=  $deposit;?>
        </td>
        <td width="25%" align="center">ราคา/Price</td>
        <td width="25%" align="center"><?=$row['sum']?></td>
    </tr>
    <tr>
        <td width="25%" align="center">รายละเอียดเเพคเกจ</td>
        <td width="25%" align="center"><?=  $sumcustomers;?>*2</td>

        <td width="25%" align="center">รวม/Total</td>
        <td width="25%" align="center"><?=$row['sum']?></td>
    </tr>

    <tr>
        <td width="25%" align="center">หมายเหตุ /Total</td>
        <td width="75%" align="center"><?=$row['note']?></td>
    </tr>
   
</table>

<b color="red">*** ราคานี้ไมรวมคาธรรมเนียมเขาชมอุทยาน ***</b>
<b color="red">*** This prive not include National park fee ***</b>

<div>
    <ul style="font-size: 15px;">
        <b>ข้อกำหนดเเละเงื่อนไข</b>
        <li>1. คุณลูกค้าต้องสำรองห้องพักล่วงหน้า 30 วันก่อนเดินทาง</li>
        <li>2. หากคุณลูกค้าต้องการเปลี่ยนแปลง หรือเลื่อนวันเดินทาง ต้องแจ้งล่วงหน้าอย่างน้อย 30 วัน ก่อนวันเดินทาง</li>
        <li>3. โปรแกรมอาจมีการเปลี่ยนแปลงตามความเหมาะสมของสภาพอากาศ</li>
        <li>4. ขอสงวนสิทธิ์ในการไม่คืนเงินลูกค้าทุกกรณี</li>
        <li>5. หากมีการปลี่ยนแปลง ราคาค่าเรือ รถ ลูกด้าต้องเพิ่มส่วนต่างตามราคาจริง</li>
        <li>6. ตามมาตรฐานของโรงแรมจะให้ทำการ Check In 14.00 น. Check Out 12.00 น. หากเกินเวลา ลูกค้าดูแลค่าใช้จ่ายเพิ่มเอง</li>
        <li>7. กรณียังไม่กำหนดวันเข้าพัก กรุณาโทรแจ้งเช็คจองห้องพักก่อนจองตั๋วเดินทาง</li>
        <li>8. หากต้องการพักเพียงคนเดียวต้องเพิ่มราคาตามเรทโรงแรมที่เลือก</li>
        <li>9. บริษัทจะรับผิดชอบตามรายละเอียดใน Voucher เท่านั้น</li>
    </ul>
</div>

<table width="100%" align="center">
    <tbody align="center">
        <tr align="center">
            <td align="center" width="50%" style="font-size: 15px; align-items: center;">คุณ <?=$row['name']?></td>
            <td align="center" width="50%" style="font-size: 15px; align-items: center;">คุณเดียร์</td>
        </tr>
        <tr align="center">
            <td align="center" width="50%" style="font-size: 15px; align-items: center;">ลูกค้า</td>
            <td align="center" width="50%" style="font-size: 15px; align-items: center;">ฝ่ายขาย</td>
        </tr>
        <tr align="center">
            <td align="center" width="50%" style="font-size: 15px; align-items: center;">Customer</td>
            <td align="center" width="50%" style="font-size: 15px; align-items: center;">Sales</td>
        </tr>
    </tbody>
</table>
 <?php $i++; }} ?>