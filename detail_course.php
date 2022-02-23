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
    $id_card = "";
    $status = "";
    if (!empty($_SESSION["id_card"])) {
        $id_card = $_SESSION["id_card"];
        $status = $_SESSION["status"];
    }
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
                        <?php if (!empty($_SESSION["id_card"])) { ?>
                            <form action="course_regis.php" method="post" class="col-md-4">
                                <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                                <button class="btn btn-primary btn-lg" type="submit" course_id="<?php echo $row["course_id"]; ?>">ลงทะเบียน</button>
                            </form>
                        <?php } ?>
                        <div class="box mt-3 p-1">
                            <?php echo DateTimeDiff($row["start_date"], $row["end_date"]) . " ชั่วโมง "; ?><i class="fa-solid fa-clock-rotate-left float-right"></i>
                            <hr>
                            ผู้ลงทะเบียน <?php echo countPerson($row["course_id"]); ?><i class="fa-solid fa-user-pen float-right"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>ตารางเวลา</h3>
                <?php
                $sqlTable = "select * from time_table where course_id='$course_id'";
                $resTable = mysqli_query($conn, $sqlTable);

                ?>
                <table id="timeTable" class=" table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>วัน</th>
                            <th>เวลาเริ่ม</th>
                            <th>เวลาจบ</th>
                            <th>กิจกรรม</th>
                            <th>Link เอกสาร</th>
                            <th>Link วิดีโอ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rowTable = mysqli_fetch_array($resTable)) {  ?>
                            <tr>
                                <td><?php echo $rowTable["days"]; ?></td>
                                <td><?php echo $rowTable["time_start"]; ?></td>
                                <td><?php echo $rowTable["time_end"]; ?></td>
                                <td><?php echo $rowTable["activity"]; ?></td>
                                <td><?php if (!empty($rowTable["link_doc"])) {
                                        if (checkPass($id_card, $course_id) == "confirmed" || checkPass($id_card, $course_id) == "pass" || checkPass($id_card, $course_id) == "nopass" || $status == "admin") { ?>
                                            <a class="linkDoc" target="_blank" time_id="<?php echo $rowTable["time_id"]; ?>" href="<?php echo $rowTable["link_doc"]; ?>">เอกสาร</a>
                                    <?php }
                                    } ?>
                                </td>
                                <td><?php if (!empty($rowTable["link_video"])) {
                                        if (checkPass($id_card, $course_id) == "confirmed" || checkPass($id_card, $course_id) == "pass" || checkPass($id_card, $course_id) == "nopass" || $status == "admin") { ?>
                                            <a target="_blank" href="video.php?time_id=<?php echo $rowTable["time_id"]; ?>&course_id=<?php echo $course_id; ?>">วิดีโอ</a>
                                    <?php }
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#timeTable").DataTable({
            "scrollX": true
        });
        $(".linkDoc").click(function() {
            $.ajax({
                type: "POST",
                url: "log_user_SQL.php",
                data: {
                    time_id: $(this).attr('time_id'),
                    id_card: '<?php echo $id_card; ?>',
                    status: '<?php echo checkPass($id_card, $course_id); ?>',
                    detail: 'เปิดเอกสาร',
                },
                success: function(result) {

                }
            });
        })
    });
</script>