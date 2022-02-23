<?php
require_once "connect.php";
$id_card = $_POST["id_card"];
$status = $_POST["status"];
$course_id = $_POST["course_id"];
$sql = "update course_regis 
set status='$status' 
where id_card='$id_card' and course_id = '$course_id'
";
$res = mysqli_query($conn, $sql);
if ($res) {
    echo "OK";
} else {
    echo $sql;
}
