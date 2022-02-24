<?php
require_once "connect.php";
$id_card = $_POST["id_card"];
$prefix = $_POST["prefix"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$current_position = $_POST["current_position"];
$easily_contacted = $_POST["easily_contacted"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$edu_training_history = $_POST["edu_training_history"];
$work_history = $_POST["work_history"];
$experience = $_POST["experience"];
$password = md5($_POST["password"]);

$pic = $_FILES["pic"];
$pic_name = "";
if (!empty($pic["size"])) {
    $target_dir = "file_uploads/lecturer/";
    $pic_name = $id_card . "_lecturer.jpg";
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

$sql = "insert into lecturer (
    id_card,
    prefix,
    first_name,
    last_name,
    current_position,
    easily_contacted,
    phone,
    email,
    edu_training_history,
    work_history,
    experience,
    pic,
    password
) value(
    '$id_card',
    '$prefix',
    '$first_name',
    '$last_name',
    '$current_position',
    '$easily_contacted',
    '$phone',
    '$email',
    '$edu_training_history',
    '$work_history',
    '$experience',
    '$pic_name',
    '$password'
)";

$res = mysqli_query($conn, $sql);

if ($res) {
    // echo $sql;
    header("location: lecturer.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
