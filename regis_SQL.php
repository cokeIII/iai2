<?php
require_once "connect.php";

$id_card = $_POST["id_card"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$first_name_th = $_POST["first_name_th"];
$last_name_th = $_POST["last_name_th"];
$prefix = $_POST["prefix"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$phone = $_POST["phone"];
$birthday = $_POST["birthday"];
$education_level = $_POST["education_level"];
$major = $_POST["major"];
$work_experience = $_POST["work_experience"];
$organization = $_POST["organization"];
$industry = $_POST["industry"];
$job_position = $_POST["job_position"];
$department = $_POST["department"];

$sql = "insert into users (
    id_card,
    email,
    password,
    first_name_th,
    last_name_th,
    prefix,
    first_name,
    last_name,
    phone,
    birthday,
    education_level,
    major,
    work_experience,
    organization,
    industry,
    job_position,
    department,
    status
) value(
    '$id_card',
    '$email',
    '$password',
    '$first_name_th',
    '$last_name_th',
    '$prefix',
    '$first_name',
    '$last_name',
    '$phone',
    '$birthday',
    '$education_level',
    '$major',
    '$work_experience',
    '$organization',
    '$industry',
    '$job_position',
    '$department',
    'user'
)";
$res = mysqli_query($conn,$sql);
if($res){
    echo "OK";
} else {
    echo $sql;
}
