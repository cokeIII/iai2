<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .wh-card {
        width: 350px !important;
    }
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    require_once "function.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $course_id = $_GET["course_id"];
    $sql = "select * from course where course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div class="container mt-top-menu">
        <h3>แก้ไขรายการอบรม</h3>
        <div class="box-register p-5 mt-3 shadow">
            <form action="edit_train_SQL.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $course_id; ?>" name="course_id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course_name">ชื่อรายการอบรม <span class="text-danger">*</span></label>
                            <input value="<?php echo $row["course_name"]; ?>" name="course_name" type="text" class="form-control" id="course_name" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">กลุ่มเป้าหมาย <span class="text-danger">*</span></label>
                            <input value="<?php echo $row["target"]; ?>" name="target" type="text" class="form-control" id="target" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="number_trainees">จำนวนผู้อบรม <span class="text-danger">*</span></label>
                            <input value="<?php echo $row["number_trainees"]; ?>" name="number_trainees" type="number" class="form-control" id="number_trainees" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="expenses">ค่าใช้จ่าย(บาท) <span class="text-danger">*</span></label>
                            <input value="<?php echo $row["expenses"] ?>" name="expenses" type="number" class="form-control" id="expenses" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">วันที่เริ่มการอบรม <span class="text-danger">*</span></label>
                            <input value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['start_date'])) ?>" name="start_date" type="datetime-local" class="form-control" id="start_date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_date">วันที่สิ้นสุดการอบรม <span class="text-danger">*</span></label>
                            <input value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['end_date'])) ?>" name="end_date" type="datetime-local" class="form-control" id="end_date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="location">สถานที่ฝึกอบรม <span class="text-danger">*</span></label>
                            <input value="<?php echo $row["location"]; ?>" name="location" type="text" class="form-control" id="location" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="open_applications">กำหนดการเปิดรับสมัคร <span class="text-danger">*</span></label>
                            <input value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['open_applications'])); ?>" name="open_applications" type="datetime-local" class="form-control" id="open_applications" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="close_applications">กำหนดการปิดรับสมัคร <span class="text-danger">*</span></label>
                            <input value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['close_applications'])); ?>" name="close_applications" type="datetime-local" class="form-control" id="close_applications" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_details">รายละเอียดการชำระเงิน </label>
                            <textarea name="payment_details" class="form-control" id="payment_details" cols="auto" rows="5" placeholder="รายละเอียดการชำระเงิน">
                                <?php echo $row["payment_details"]; ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>เอกสารที่เกี่ยวข้องกับการอบรม : <u><?php echo (empty($row["course_file"]) ? "" : "<a href='file_uploads/" . $row["course_file"] . "' target='_blank'>ดูเอกสาร</a>") ?></u></h5>
                            <input name="course_file" type="file" class="form-control" id="course_file">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="course_file">หลักสูตร</label>
                            <select name="course_type" id="course_type" class="form-control" required>
                                <option value="">-- กรุเลือกหลักสูตร --</option>
                                <?php echo get_CourseType_opt(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>รูปหน้าปก : <u><?php echo (empty($row["pic"]) ? "" : "<a href='file_uploads/img/" . $row["pic"] . "' target='_blank'>ดูรูปภาพ</a>") ?></u></h5>
                            <input name="pic" type="file" class="form-control" โ>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning float-right">แก้ไขรายการอบรม</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#course_type").val('<?php echo $row["course_type"]; ?>')
    });
</script>