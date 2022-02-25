
<?php
require_once "connect.php";

$course_id = $_GET["course_id"];
$no = $_GET["no"];

$sql = "delete from create_form where no='$no' and course_id='$course_id '";
$res = mysqli_query($conn,$sql);

if ($res) {
    // echo $sql;
    header("location: create_form.php?course_id=$course_id");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=ลบคำถามไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
