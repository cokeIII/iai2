<?php
require_once "connect.php";

$id_card = $_POST["id_card"];
$course_id = $_POST["course_id"];
$pic = $_FILES["evidence"];

$pic_name = "";
if (!empty($pic["size"])) {
    $target_dir = "file_uploads/bank/";
    $pic_name = basename($pic['name']);
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

$sql = "insert into bank (id_card,course_id,evidence) value('$id_card','$course_id','$pic_name')";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("location: error-page.php?text-error=บันทึกหลักฐานไว้แล้ว รับใบเสร็จได้โดยการเข้าสู่ระบบ");
} else {
    echo $sql;
}
