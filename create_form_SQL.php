
<?php
require_once "connect.php";

$course_id = $_POST["course_id"];
$topic = $_POST["topic"];
$opt = $_POST["opt"];

$i = 0;
foreach ($topic as $key => $value) {

    $sql = "replace into create_form (
        course_id,
        no,
        topic,
        opt
    )value(
        '" . $course_id . "',
        '" . ($i + 1) . "',
        '" . $topic[$i] . "',
        '" . $opt[$i] . "'
    )";
    if (!empty($value)) {
        $res = mysqli_query($conn, $sql);
    }
    $i++;
    echo $sql . "<br>";
}

if ($res) {
    // echo $sql;
    header("location: create_form.php?course_id=$course_id");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=สร้างฟอร์มไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}
