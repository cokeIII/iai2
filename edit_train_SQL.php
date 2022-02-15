<?php

require_once "connect.php";
$course_id = $_POST["course_id"];
$course_name = $_POST["course_name"];
$target = $_POST["target"];
$number_trainees = $_POST["number_trainees"];
$expenses = $_POST["expenses"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$location = $_POST["location"];
$open_applications = $_POST["open_applications"];
$close_applications = $_POST["close_applications"];
$payment_details = $_POST["payment_details"];
$course_file = $_FILES["course_file"];
$course_type = $_POST["course_type"];
$pic = $_FILES["pic"];
$dateTime = date("Ymdhisa");

$sqlOldFile = "select course_file, pic from course where course_id = '$course_id'";
$resOldFile = mysqli_query($conn, $sqlOldFile);
$rowOldFile = mysqli_fetch_array($resOldFile);
$pic_old = $rowOldFile["pic"];
$course_file_old = $rowOldFile["course_file"];

if (!empty($pic["size"])) {
    $target_dir = "file_uploads/img/";
    $pic_name = $dateTime . ".jpg";
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
} else {
    $pic_name = $pic_old;
}

if (!empty($course_file["size"])) {
    $target_dir = "file_uploads/";
    $course_file_name = $dateTime . "_" . basename($course_file["name"]);
    $target_file = $target_dir . $course_file_name;
    $uploadOk = 1;
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($course_file["tmp_name"], $target_file)) {
        } else {
            header("location: error-page.php?text-error=อัพโหลดไฟล์ไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
            return;
        }
    }
} else {
    $course_file_name = $course_file_old;
}
$sql = "update course set
course_name = '$course_name',
target = '$target',
number_trainees = '$number_trainees',
expenses = '$expenses',
start_date = '$start_date',
end_date = '$end_date',
location = '$location',
open_applications = '$open_applications',
close_applications = '$close_applications',
payment_details = '$payment_details',
course_file = '$course_file_name',
course_type = '$course_type',
pic = '$pic_name'
where course_id = '$course_id'
";

$res = mysqli_query($conn, $sql);

if ($res) {
    header("location: list_train_admin.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=แก้ไขรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
