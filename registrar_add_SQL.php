<?php
require_once "connect.php";
$id_card = $_POST["id_card"];
$prefix = $_POST["prefix"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$easily_contacted = $_POST["easily_contacted"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

$pic = $_FILES["pic"];
$pic_name = "";
if (!empty($pic["size"])) {
    $target_dir = "file_uploads/registrar/";
    $pic_name = $id_card . "_registrar.jpg";
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

$sql = "insert into registrar (
    id_card,
    prefix,
    first_name,
    last_name,
    easily_contacted,
    phone,
    email,
    pic,
    password
) value(
    '$id_card',
    '$prefix',
    '$first_name',
    '$last_name',
    '$easily_contacted',
    '$phone',
    '$email',
    '$pic_name',
    '$password'
)";

$res = mysqli_query($conn, $sql);

if ($res) {
    // echo $sql;
    header("location: registrar.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
