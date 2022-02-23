<?php
require_once "connect.php";
$course_id = $_POST["course_id"];
$cer_min = $_POST["cer_min"];
$cer_max = $_POST["cer_max"];
$cer_pic = $_FILES["cer_pic"];

$sqlOldFile = "select cer_pic from course where course_id = '$course_id'";
$resOldFile = mysqli_query($conn, $sqlOldFile);
$rowOldFile = mysqli_fetch_array($resOldFile);
$pic_old = $rowOldFile["cer_pic"];


if (!empty($cer_pic["size"])) {
    $target_dir = "file_uploads/cer/";
    $pic_name = $course_id . "_cer.jpg";
    $target_file = $target_dir . $pic_name;
    $uploadOk = 1;
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($cer_pic["tmp_name"], $target_file)) {
        } else {
            header("location: error-page.php?text-error=อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
            return;
        }
    }
} else {
    $pic_name = $pic_old;
}


$sql = "update course set
cer_min = '$cer_min',
cer_max = '$cer_max',
cer_pic = '$pic_name'
where course_id = '$course_id'
";

$res = mysqli_query($conn, $sql);

if ($res) {
    // echo $sql;
    header("location: cer_set_from.php?course_id=" . $course_id);
} else {
    // echo $sql;
    header("location: error-page.php?text-error=แก้ไขรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
