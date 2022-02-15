<?php
require_once "connect.php";

$course_id = $_POST["course_id"];

$sql = "delete from course where course_id = '$course_id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("location: list_train_admin.php");
} else {
    header("location: error-page.php?text-error=ลบรายการผิดพลาด กรุณาลองใหม่อีกครั้ง");
}
