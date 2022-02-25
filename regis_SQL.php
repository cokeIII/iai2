<?php
require_once "connect.php";

$id_card = $_POST["id_card"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$first_name_th = $_POST["first_name_th"];
$last_name_th = $_POST["last_name_th"];
$prefix = $_POST["prefix"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$phone = $_POST["phone"];
$birthday = $_POST["birthday"];
$education_level = $_POST["education_level"];
$major = $_POST["major"];
$work_experience = $_POST["work_experience"];
$organization = $_POST["organization"];
$industry = $_POST["industry"];
$job_position = $_POST["job_position"];
$department = $_POST["department"];
$pic = $_FILES["pic"];
$pic_name = "";
if (!empty($pic["size"])) {
    $target_dir = "file_uploads/user/";
    $pic_name = $id_card . ".jpg";
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
$sql = "insert into users (
    id_card,
    email,
    password,
    first_name_th,
    last_name_th,
    prefix,
    first_name,
    last_name,
    phone,
    birthday,
    education_level,
    major,
    work_experience,
    organization,
    industry,
    job_position,
    department,
    status,
    pic
) value(
    '$id_card',
    '$email',
    '$password',
    '$first_name_th',
    '$last_name_th',
    '$prefix',
    '$first_name',
    '$last_name',
    '$phone',
    '$birthday',
    '$education_level',
    '$major',
    '$work_experience',
    '$organization',
    '$industry',
    '$job_position',
    '$department',
    'user',
    '$pic_name'
)";
$res = mysqli_query($conn, $sql);
if ($res) {
    echo "OK";
    $sqlAlert = "insert into log_alert (
        id_card,
        detail,
        status,
        status_read
    ) values(
        '$id_card',
        'สมัครสมาชิกใหม่',
        'r',
        ''
    )";
    mysqli_query($conn, $sqlAlert);
} else {
    echo $sql;
}
