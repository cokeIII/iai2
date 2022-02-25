<?php

require_once "connect.php";
require_once "function.php";
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
$detail = $_POST["detail"];
$pic = $_FILES["pic"];
$dateTime = date("Ymdhisa");

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
}
$sql = "insert into course
( 
    `course_name`, 
    `target`, 
    `number_trainees`, 
    `expenses`, 
    `start_date`, 
    `end_date`, 
    `location`, 
    `open_applications`, 
    `close_applications`, 
    `payment_details`, 
    `course_file`, 
    `course_type`, 
    `pic`,
    `status`,
    `detail`
    ) values (
    '$course_name',
    '$target',
    '$number_trainees',
    '$expenses',
    '$start_date',
    '$end_date',
    '$location',
    '$open_applications',
    '$close_applications',
    '$payment_details',
    '$course_file_name',
    '$course_type',
    '$pic_name',
    'on',
    '$detail'
)
";

$res = mysqli_query($conn, $sql);

if ($res) {
    header("location: list_train_admin.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
