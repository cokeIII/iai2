<?php
require_once "connect.php";
header('Content-Type: text/html; charset=UTF-8');

$id_card = $_POST["id_card"];
$course_id = $_POST["course_id"];
$pic = $_FILES["receipt"];

$pic_name = "";
if (!empty($pic["size"])) {
    $target_dir = "file_uploads/receipt/";
    $pic_name = $id_card . "_" . $course_id . ".jpg";
    $target_file = $target_dir . $pic_name;
    $uploadOk = 1;
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($pic["tmp_name"], $target_file)) {
        } else {
            header("location: error-page.php?text-error=อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
            return;
        }
    }
}

$sql = "update bank set receipt='$pic_name' where id_card='$id_card' and course_id='$course_id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    // echo $sql;
    header("location: receipt_admin.php");
} else {
    echo $sql;
}
