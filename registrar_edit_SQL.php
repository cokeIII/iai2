<?php
require_once "connect.php";
session_start();
$id_card = $_POST["id_card"];
$prefix = $_POST["prefix"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$easily_contacted = $_POST["easily_contacted"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$pic = $_FILES["pic"];

$sqlCheck = "select pic,password from registrar where id_card = '$id_card'";
$resCheck = mysqli_query($conn, $sqlCheck);
$rowCheck = mysqli_fetch_array($resCheck);
$picOld = $rowCheck["pic"];
if (empty($password)) {
    $password = $rowCheck["password"];
}


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
} else {
    $pic_name = $picOld;
}

$sql = "update registrar set
prefix = '$prefix',
first_name = '$first_name',
easily_contacted = '$easily_contacted',
phone = '$phone',
email = '$email',
pic = '$pic_name',
password = '$password'
where id_card = '$id_card'
";

$res = mysqli_query($conn, $sql);

if ($res) {
    if ($_SESSION["status"] == "registrar") {
        header("location: registrar_form_edit.php?id_card=$id_card");
    } else if ($_SESSION["status"] == "admin") {
        header("location: registrar.php");
    }
} else {
    // echo $sql;
    header("location: error-page.php?text-error=แก้ไขรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
