<?php
require_once "connect.php";

$pic_id = $_POST["pic_id"];
$sql="delete from pic_slide where pic_id = '$pic_id'";
$res = mysqli_query($conn,$sql);

if($res){
    echo $sql;
    // header("location: bullhorn.php");
} else {
    header("location: error-page.php?text-error=ลบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}