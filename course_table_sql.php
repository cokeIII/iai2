
<?php
require_once "connect.php";

$course_id = $_POST["course_id"];
$time_course_s = $_POST["time_course_s"];
$time_course_e = $_POST["time_course_e"];
$activity = $_POST["activity"];
$link_doc = $_POST["link_doc"];
$link_video = $_POST["link_video"];
$i = 0;
foreach ($time_course_s as $key => $value) {
    $sql = "insert into time_table (
        course_id,
        time_start,
        time_end,
        activity,
        link_doc,
        link_video
    )value(
        '".$course_id[$i]."',
        '".$time_course_s[$i]."',
        '".$time_course_e[$i]."',
        '".$activity[$i]."',
        '".$link_doc[$i]."',
        '".$link_video[$i]."'
    )";
    $res = mysqli_query($conn, $sql);
    $i++;
}

if ($res) {
    header("location: course_table.php");
} else {
    header("location: error-page.php?text-error=จัดตารางไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
