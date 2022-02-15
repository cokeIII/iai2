<?php
require_once "connect.php";
header('Content-Type: text/html; charset=UTF-8');

if ($_POST["act"] == "changePass") {
    $id_card = $_POST["id_card"];
    $old_password = md5($_POST["old_password"]);
    $new_password = md5($_POST["new_password"]);
    $sqlCheck = "select password from users where id_card = '$id_card'";
    $resCheck = mysqli_query($conn, $sqlCheck);
    $rowCheck = mysqli_fetch_array($resCheck);
    if ($rowCheck["password"] == $old_password) {
        $sql = "update users set password = '$new_password' where id_card = '$id_card'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "success";
        } else {
            echo "fail";
        }
    } else {
        echo "fail";
    }
} else if ($_POST["act"] == "changePassEmp") {
    $id_card = $_POST["id_card"];
    $new_password = md5($_POST["new_password"]);
    $sql = "update users set password = '$new_password' where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "success";
    } else {
        echo "fail";
    }
}
