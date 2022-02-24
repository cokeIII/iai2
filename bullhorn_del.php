<?php
require_once "connect.php";

$pub_id = $_POST["pub_id"];

$sql = "delete from public_relations where pub_id = '$pub_id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("location: bullhorn.php");
} else {
    header("location: error-page.php?text-error=ลบรายการผิดพลาด กรุณาลองใหม่อีกครั้ง");
}
