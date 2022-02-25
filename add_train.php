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
    ?>
    <div class="container mt-top-menu">
        <h3>เพิ่มรายการอบรม</h3>
        <div class="box-register p-5 mt-3 shadow">
            <form action="add_train_SQL.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course_name">ชื่อรายการอบรม <span class="text-danger">*</span></label>
                            <input name="course_name" type="text" class="form-control" id="course_name" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">กลุ่มเป้าหมาย <span class="text-danger">*</span></label>
                            <input name="target" type="text" class="form-control" id="target" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="number_trainees">จำนวนผู้อบรม</label>
                            <input name="number_trainees" type="number" class="form-control" id="number_trainees">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="expenses">ค่าใช้จ่าย(บาท) <span class="text-danger">*</span></label>
                            <input name="expenses" type="number" class="form-control" id="expenses" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">วันที่เริ่มการอบรม <span class="text-danger">*</span></label>
                            <input name="start_date" type="datetime-local" class="form-control" id="start_date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_date">วันที่สิ้นสุดการอบรม <span class="text-danger">*</span></label>
                            <input name="end_date" type="datetime-local" class="form-control" id="end_date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="location">สถานที่ฝึกอบรม <span class="text-danger">*</span></label>
                            <input name="location" type="text" class="form-control" id="location" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="open_applications">กำหนดการเปิดรับสมัคร <span class="text-danger">*</span></label>
                            <input name="open_applications" type="datetime-local" class="form-control" id="open_applications" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="close_applications">กำหนดการปิดรับสมัคร <span class="text-danger">*</span></label>
                            <input name="close_applications" type="datetime-local" class="form-control" id="close_applications" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_details">รายละเอียดการชำระเงิน </label>
                            <textarea name="payment_details" class="form-control" id="payment_details" cols="auto" rows="5" placeholder="รายละเอียดการชำระเงิน"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="detail">รายละเอียดเกี่ยวกับการอบรม</label>
                            <textarea class="form-control" name="detail" id="detail" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="course_file">เอกสารที่เกี่ยวข้องกับการอบรม </label>
                            <input name="course_file" type="file" class="form-control" id="course_file">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="course_type">หลักสูตร</label>
                            <select name="course_type" id="course_type" class="form-control" required>
                                <option value="">-- กรุเลือกหลักสูตร --</option>
                                <?php echo get_CourseType_opt(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pic">รูปหน้าปก</label>
                            <input name="pic" type="file" class="form-control" โ>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">เพิ่มรายการอบรม</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {

    });
</script>