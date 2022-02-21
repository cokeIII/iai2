
<?php
require_once "connect.php";
$course_id = $_GET["course_id"];
$time_id = $_GET["time_id"];
$sql = "delete from time_table where time_id = '$time_id'";

$res = mysqli_query($conn, $sql);


if ($res) {
    header("location: course_table_form.php?course_id=$course_id");
} else {
    header("location: error-page.php?text-error=ลบรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
