<?php
require_once "connect.php";

$id_card = $_POST["id_card"];
$sql="delete from users where id_card = '$id_card'";
$res = mysqli_query($conn,$sql);

if($res){
    header("location: list_user.php");
} else {
    header("location: error-page.php?text-error=ลบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
}