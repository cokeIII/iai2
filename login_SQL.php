<?php
require_once "connect.php";
session_start();
$username = $_POST["username"];
$password = md5($_POST["passwordLogin"]);
$status =  $_POST["status"];
if ($status == "user" || $status == "admin") {
    $sql = "select * from users where id_card = '$username' and password = '$password'";
    $res = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($res);

    if ($numrow > 0) {
        $row = mysqli_fetch_array($res);
        $_SESSION["id_card"] = $row["id_card"];
        $_SESSION["username"] = $row["first_name_th"] . " " . $row["last_name_th"];
        $_SESSION["status"] = $row["status"];
        if ($row["status"] == "user") {
            echo "user";
        } else if ($row["status"] == "admin") {
            echo "admin";
        }
    } else {
        echo "";
    }
} else if ($status == "lecturer") {
    $sql = "select * from lecturer where id_card = '$username' and password = '$password'";
    $res = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($res);

    if ($numrow > 0) {
        $row = mysqli_fetch_array($res);
        $_SESSION["id_card"] = $row["id_card"];
        $_SESSION["username"] = $row["first_name"] . " " . $row["last_name"];
        $_SESSION["status"] = "lecturer";
        echo "lecturer";
    } else {
        echo $sql;
    }
} else if ($status == "registrar") {
    $sql = "select * from registrar where id_card = '$username' and password = '$password'";
    $res = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($res);

    if ($numrow > 0) {
        $row = mysqli_fetch_array($res);
        $_SESSION["id_card"] = $row["id_card"];
        $_SESSION["username"] = $row["first_name"] . " " . $row["last_name"];
        $_SESSION["status"] = "registrar";
        echo "registrar";
    } else {
        echo $sql;
    }
}
