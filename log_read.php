<?php
require_once "connect.php";

$id_card = $_POST["id_card"];
$log_id = $_POST["log_id"];
$status = $_POST["status"];
if ($status == "r") {
    $sqlR = "select * from log_alert where log_id = '$log_id'";
    $resR = mysqli_query($conn, $sqlR);
    $rowR = mysqli_fetch_array($resR);
    if (!empty($rowR["status_read"])) {
        $status_read = $rowR["status_read"] . "," . $id_card;
    } else {
        $status_read = $id_card;
    }
    $sql = "update log_alert set status_read='$status_read' where log_id = '$log_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "OK";
    } else {
        echo $sql;
    }
} else if ($status == "l") {
    $sql = "update log_alert set status_read='$id_card' where log_id = '$log_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "OK";
    } else {
        echo $sql;
    }
}
