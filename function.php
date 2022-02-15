<?php
require_once "connect.php";

function get_industry_opt(){
    global $conn;
    $data ='<option value="">กรุณาเลือก</option>';    
    $sql = "select * from industry";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
        $data.='<option value="'.$row["id"].'">'.$row["name"].'</option>';
    }

    return $data;
}

function get_job_position_opt(){
    global $conn;
    $data ='<option value="">กรุณาเลือก</option>';    
    $sql = "select * from job_position";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
        $data.='<option value="'.$row["id"].'">'.$row["name"].'</option>';
    }

    return $data;
}

function get_department_opt(){
    global $conn;
    $data ='<option value="">กรุณาเลือก</option>';    
    $sql = "select * from department";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
        $data.='<option value="'.$row["id"].'">'.$row["name"].'</option>';
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


