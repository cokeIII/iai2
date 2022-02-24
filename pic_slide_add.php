<?php
require_once "connect.php";
$targetDir = "file_uploads/img_slide/";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
$fileNames = array_filter($_FILES['pic_slide']['name']);
if (!empty($fileNames)) {
    foreach ($_FILES['pic_slide']['name'] as $key => $val) {
        // File upload path 
        $fileName = basename($_FILES['pic_slide']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server 
            if (move_uploaded_file($_FILES["pic_slide"]["tmp_name"][$key], $targetFilePath)) {
                // Image db insert sql 
                $sql = "insert into pic_slide (pic_path) value('$fileName')";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    echo header("location: bullhorn.php");
                } else {
                    echo $sql;
                }
            } else {
                $errorUpload .= $_FILES['pic_slide']['name'][$key] . ' | ';
            }
        } else {
            $errorUploadType .= $_FILES['pic_slide']['name'][$key] . ' | ';
        }
    }
}
