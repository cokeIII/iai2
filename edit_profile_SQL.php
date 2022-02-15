<?php
require_once "connect.php";

$id_card = $_POST["id_card"];
$email = $_POST["email"];
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

$sql = "update users set
email = '$email',
first_name_th = '$first_name_th',
last_name_th = '$last_name_th',
prefix = '$prefix',
first_name = '$first_name',
last_name = '$last_name',
phone = '$phone',
birthday = '$birthday',
education_level = '$education_level',
major = '$major',
work_experience = '$work_experience',
organization = '$organization',
industry = '$industry',
job_position = '$job_position',
department = '$department'
where id_card = '$id_card'
";
$res = mysqli_query($conn, $sql);
if ($res) {
    echo "OK";
} else {
    echo $sql;
}
