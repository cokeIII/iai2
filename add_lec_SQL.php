<?php

require_once "connect.php";
require_once "function.php";
$id_card = $_POST["id_card"];
$course_id = $_POST["course_id"];
$sqlCheck = "select lecturer from course where course_id = '$course_id'";
$resCheck = mysqli_query($conn, $sqlCheck);
$rowCheck = mysqli_fetch_array($resCheck);
if (!empty($rowCheck["lecturer"])) {
    $lecturer = $rowCheck["lecturer"] . "," . implode(",", $id_card);
} else {
    $lecturer = implode(",", $id_card);
}
$sql = "update course set lecturer='$lecturer' where course_id = '$course_id'";
$res = mysqli_query($conn, $sql);

if ($res) {
    for ($i = 0; $i < count($id_card); $i++) {
        $sqlAlert = "insert into log_alert (
            id_card,
            course_id,
            detail,
            status,
            status_read
        ) values(
            '" . $id_card[$i] . "',
            '$course_id',
            'มีการอบใหม่',
            'l',
            ''
        )";
        mysqli_query($conn, $sqlAlert);
    }

    header("location: add_lec.php?course_id=$course_id");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
