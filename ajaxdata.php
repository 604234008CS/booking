<?php
require 'connectdb.php';
$page = $_GET['page'];
if ($page == "checkprice") {

    $id =  $_GET['id'];

    $sql = "SELECT * FROM tb_roomtype where id_resort = '$id'";
    $query = mysqli_query($con, $sql);
    $arr = array();
    while ($results11 = mysqli_fetch_array($query)) {
        array_push($arr, $results11);
    }
    echo json_encode($arr);

    // echo json_encode('ok');
} else if ($page == "edit") {
    $id = $_GET['name'];

    $sql = "SELECT * FROM tb_resort INNER JOIN tb_roomtype ON tb_resort.id=tb_roomtype.id_resort WHERE tb_resort.resort_name = '$id'";
    $query = mysqli_query($con, $sql);
    $arr = array();
    while ($results = mysqli_fetch_array($query)) {
        array_push($arr, $results);
    }
    echo json_encode($arr);
}
