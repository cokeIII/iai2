<?php
require_once "connect.php";

session_start();
$id_card = $_SESSION["id_card"];
$course_id = $_POST["course_id"];

$sqlCheck = "select * from create_form where course_id = '$course_id'";
$resCheck = mysqli_query($conn, $sqlCheck);
$numCheck = mysqli_num_rows($resCheck);
if ($numCheck > 0) {
    header("location: create_form_user.php?course_id=$course_id");
} else {
    $sql = "insert into course_regis 
    (
        `course_id`, 
        `id_card`, 
        `status`
    ) values (
        '$course_id',
        '$id_card',
        'wait'
    )
    ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        if ($_SESSION["status"] != "user") {
            header("location: list_train_regis_admin.php");
        } else {
            header("location: list_train_regis.php");
        }
    } else {
        echo $sql;
        header("location: error-page.php?text-error=ลงทะเบียนผิดพลาด กรุณาลองใหม่อีกครั้ง");
    }
}
