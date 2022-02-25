<?php
header('Content-Type: text/html; charset=UTF-8');
require_once "connect.php";
$targetDir = "file_uploads/bullhorn/";
$allowTypes = array('jpg', 'png', 'jpeg', 'svg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
$fileNames = array_filter($_FILES['pic_path']['name']);
$topic = $_POST["topic"];
$detail = $_POST["detail"];
if (!empty($fileNames)) {
    foreach ($_FILES['pic_path']['name'] as $key => $val) {
        // File upload path 
        $fileName = basename($_FILES['pic_path']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server 
            if (move_uploaded_file($_FILES["pic_path"]["tmp_name"][$key], $targetFilePath)) {
                // Image db insert sql 

            } else {
                $errorUpload .= $_FILES['pic_path']['name'][$key] . ' | ';
            }
        } else {
            $errorUploadType .= $_FILES['pic_path']['name'][$key] . ' | ';
        }
    }
    $sql = "insert into public_relations (topic,pic_path,detail) value('$topic','" . json_encode($fileNames) . "','$detail')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo header("location: bullhorn.php");
    } else {
        echo $sql;
    }
}
