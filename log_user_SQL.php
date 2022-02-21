<?php
require_once "connect.php";
session_start();
$id_card = $_SESSION["id_card"];
$time_id = $_POST["time_id"];
$detail = $_POST["detail"];
$sql = "insert into log_user 
(id_card,time_id,detail) 
values('$id_card','$time_id','$detail')";

$res = mysqli_query($conn, $sql);

if ($res) {
    echo "ok";
} else {
    echo $sql;
}
