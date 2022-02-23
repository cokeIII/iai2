<?php
require_once "connect.php";
session_start();
$id_card = $_SESSION["id_card"];
$time_id = $_POST["time_id"];
$detail = $_POST["detail"];
$status = $_POST["status"];
if ($status != "pass") {
    $sql = "insert into log_user 
    (id_card,time_id,detail) 
    values('$id_card','$time_id','$detail')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "ok";
    } else {
        echo $sql;
    }
}
