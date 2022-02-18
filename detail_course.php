<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .wh-card {
        width: 350px !important;
    }

    .color-detail {
        background-color: #a1c2f0;
    }

    .box {
        width: 100%;
        height: auto;
        background-color: #eef1f7;
        color: rgb(36, 36, 71);
        border-radius: 10px;
        font-size: 24px;
    }
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    require_once "function.php";
    $course_id = $_GET["course_id"];
    $sql = "select * from course where course_id ='$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div class="container mt-top-menu">
        <h1><?php echo $row["course_name"] ?></h1>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <img src="file_uploads/img/<?php echo $row["pic"] ?>" alt="" class="img-fluid" height="450">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="color-detail"><strong>กลุ่มเป้าหมาย</strong> : <?php echo $row["target"] ?></h5>
                                <h5><strong>จำนวนผู้อบรม</strong> : <?php echo $row["number_trainees"] ?></h5>
                                <h5 class="color-detail"><strong>ค่าใช้จ่าย(บาท)</strong> : <?php echo $row["expenses"] ?></h5>
                                <h5><strong>วันที่เริ่มการอบรม</strong> : <?php echo $row["start_date"] ?></h5>
                                <h5 class="color-detail"><strong>วันที่สิ้นสุดการอบรม</strong> : <?php echo $row["end_date"] ?></h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="color-detail"><strong>สถานที่ฝึกอบรม</strong> : <?php echo $row["location"] ?></h5>
                                <h5><strong>กำหนดการเปิดรับสมัคร</strong> : <?php echo $row["open_applications"] ?></h5>
                                <h5 class="color-detail"><strong>กำหนดการปิดรับสมัคร</strong> : <?php echo $row["close_applications"] ?></h5>
                                <h5><strong>รายละเอียดการชำระเงิน</strong> : <?php echo $row["payment_details"] ?></h5>
                                <h5 class="color-detail"><strong>เอกสารที่เกี่ยวข้องกับการอบรม</strong> : <u><?php echo (empty($row["course_file"]) ? "" : "<a href='file_uploads/" . $row["course_file"] . "' target='_blank'>ดูเอกสาร</a>") ?></u></h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <form action="course_regis.php" method="post" class="col-md-4">
                            <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                            <button class="btn btn-primary btn-lg" type="submit" course_id="<?php echo $row["course_id"]; ?>">ลงทะเบียน</button>
                        </form>
                        <div class="box mt-3 p-1">
                            <?php echo DateTimeDiff($row["start_date"], $row["end_date"]) . " ชั่วโมง "; ?><i class="fa-solid fa-clock-rotate-left float-right"></i>
                            <hr>
                            ผู้ลงทะเบียน <?php echo countPerson($row["course_id"]); ?><i class="fa-solid fa-user-pen float-right"></i>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {

    });
</script>