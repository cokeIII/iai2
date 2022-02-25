<?php
require_once "connect.php";
$id_card = $_POST["id_card"];

$sql = "delete from registrar where id_card = '$id_card '";
$res = mysqli_query($conn, $sql);

if ($res) {
    // echo $sql;
    header("location: registrar.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=ลบรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
