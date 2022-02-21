<?php
require_once "connect.php";

function get_industry_opt()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from industry";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }

    return $data;
}

function get_job_position_opt()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from job_position";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }

    return $data;
}

function get_department_opt()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from department";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }

    return $data;
}

function get_CourseType_opt()
{
    global $conn;
    $opt = "";
    $sql = "select * from course_type";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["type_id"] . '">' . $row["type_name"] . '</option>';
    }
    return $opt;
}

function DateDiff($strDate1, $strDate2)
{
    return (strtotime($strDate2) - strtotime($strDate1)) /  (60 * 60 * 24);  // 1 day = 60*60*24
}
function TimeDiff($strTime1, $strTime2)
{
    return (strtotime($strTime2) - strtotime($strTime1)) /  (60 * 60); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1, $strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1)) /  (60 * 60); // 1 Hour =  60*60
}

function countPerson($course_id) {
    global $conn;
    $sql = "select count(id_card) as countPerson from course_regis where course_id='$course_id' ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["countPerson"];
}

function checkPass($id_card,$course_id){
    global $conn;
    $sql = "select * from course_regis where id_card = '$id_card' and course_id='$course_id'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["status"];
}
