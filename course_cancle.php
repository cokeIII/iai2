<?php

require_once "connect.php";

session_start();
$id_card = $_SESSION["id_card"];
$course_id = $_POST["course_id"];

$sql = "delete from course_regis where course_id = '$course_id' and id_card = '$id_card'";
$res = mysqli_query($conn, $sql);

if ($res) {
    if ($_SESSION["status"] != "user") {
        header("location: list_train_regis_admin.php");
    } else {
        header("location: list_train_regis.php");
    }
} else {
    header("location: error-page.php?text-error=ยกเลิกรายการผิดพลาด กรุณาลองใหม่อีกครั้ง");
}
