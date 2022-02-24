<?php
require_once "connect.php";
$course_id = trim($_POST["course_id"]);
$id_card = $_POST["id_card"];

$sqlCheck = "select lecturer from course where course_id = '$course_id'";
$resCheck = mysqli_query($conn, $sqlCheck);
$rowCheck = mysqli_fetch_array($resCheck);
if (!empty($rowCheck["lecturer"])) {
    $arr = explode(",", $rowCheck["lecturer"]);
    if (($key = array_search($id_card, $arr)) !== false) {
        unset($arr[$key]);
    }
    $lecturer = implode($arr);
} else {
    $lecturer = "";
}

$sql = "update course set lecturer='$lecturer' where course_id = '$course_id'";

$res = mysqli_query($conn, $sql);


if ($res) {
    header("location: add_lec.php?course_id=$course_id");
} else {
    header("location: error-page.php?text-error=ลบรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
