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
} else if ($_POST["act"] == "changePassAdmin") {
    $id_card = $_POST["id_card"];
    $new_password = md5($_POST["new_password"]);
    $sql = "update users set password = '$new_password' where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "success";
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
} else if ($_POST["act"] == "get_course") {
    $sql = "select * from course";
    $i = 0;

    $techlist["data"][$i]["no"] = "ไม่มีข้อมูล";
    $techlist["data"][$i]["course_name"] = "";
    $techlist["data"][$i]["start_end_date"] = "";
    $techlist["data"][$i]["location"] = "";
    $techlist["data"][$i]["btnTable"] = "";
    $techlist["data"][$i]["btnLecturer"] = "";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $techlist["data"][$i]["no"] = $i + 1;
        $techlist["data"][$i]["course_name"] = $row["course_name"];
        $techlist["data"][$i]["start_end_date"] = "เริ่ม " . $row["start_date"] . "<br> จบ" . $row["end_date"];
        $techlist["data"][$i]["location"] = $row["location"];
        $techlist["data"][$i]["btnTable"] = '<a href="course_table_form.php?course_id=' . $row["course_id"] . '"><button class="btn btn-primary btnTable" course_id="' . $row["course_id"] . '">จัดตาราง</button></a>';
        $techlist["data"][$i]["btnLecturer"] = '<a href="add_lec.php?course_id=' . $row["course_id"] . '" class="btn btn-info btnLecturer">เพิ่มวิทยากร</a>';
        $i++;
    }
    echo json_encode($techlist, JSON_UNESCAPED_UNICODE);
} else if ($_POST["act"] == "get_course_lec") {
    $id_card = $_POST["id_card"];
    $sql = "select * from course ";
    $i = 0;

    $techlist["data"][$i]["no"] = "ไม่มีข้อมูล";
    $techlist["data"][$i]["course_name"] = "";
    $techlist["data"][$i]["start_end_date"] = "";
    $techlist["data"][$i]["location"] = "";
    $techlist["data"][$i]["btnTable"] = "";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        if (in_array($id_card, explode(",", $row["lecturer"]))) {
            $techlist["data"][$i]["no"] = $i + 1;
            $techlist["data"][$i]["course_name"] = $row["course_name"];
            $techlist["data"][$i]["start_end_date"] = "เริ่ม " . $row["start_date"] . "<br> จบ" . $row["end_date"];
            $techlist["data"][$i]["location"] = $row["location"];
            $techlist["data"][$i]["btnTable"] = '<a href="course_table_form.php?course_id=' . $row["course_id"] . '"><button class="btn btn-primary btnTable" course_id="' . $row["course_id"] . '">จัดตาราง</button></a>';
            $i++;
        }
    }
    echo json_encode($techlist, JSON_UNESCAPED_UNICODE);
}
