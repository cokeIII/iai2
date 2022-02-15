<?php
require_once "connect.php";
session_start();
$username = $_POST["username"];
$password = md5($_POST["passwordLogin"]);

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
