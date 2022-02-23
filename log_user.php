<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .box-datail {
        background-color: #ebebeb;
    }

    .bg-red {
        background-color: #fc6d6d;
    }

    .bg-yellow {
        background-color: #fcdb6d;
    }

    .bg-green {
        background-color: #8dfcad;
    }

    .bg-blue {
        background-color: #5d72e8;
    }
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    require_once "function.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_GET["id_card"];
    $course_id = $_GET["course_id"];
    $sql = "select * from time_table where course_id = '$course_id' order by days,time_start";
    $res = mysqli_query($conn, $sql);
    $dataTime = checkTime($id_card, $course_id);

    ?>
    <div class="container mt-top-menu">
        <h1><?php echo getNameCourse($course_id); ?></h1>
        <div class="card">
            <div class="card-body">
                <?php checkTime($id_card, $course_id); ?>
                <h3>ประวัติการเข้ากิจกรรมของ <span id="nameUser"><?php echo getNameUser($id_card); ?></span></h3>
                <table id="log_user" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>วันเวลากิจกรรม</th>
                            <th>ชื่อกิจกรรม</th>
                            <th>วันเวลาที่เข้าดูเอกสาร</th>
                            <th>วันเวลาที่เข้าดูวิดีโอ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo "วัน " . $row["days"] . "<br>เวลา " . $row["time_start"] . " ถึง " . $row["time_end"]; ?></td>
                                <td><?php echo $row["activity"]; ?></td>
                                <td class="<?php echo $dataTime[$row["time_id"]]['doc'];
                                            ?>"><?php echo checkDoc($id_card, $row["time_id"]); ?></td>
                                <td class="<?php echo $dataTime[$row["time_id"]]['video'];
                                            ?>"><?php echo checkVideo($id_card, $row["time_id"]); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <hr>
                <div class="box-datail p-3">
                    <h4>ผ่านกิจกรรมไปแล้ว : <span><?php echo calPercent($id_card, $course_id); ?> %</span></h4>
                    <h4>สถานะปัจจุบัน : <?php echo (checkPass($id_card, $course_id) == "pass" ? "<span class='text-success'>ผ่าน</span>" : (checkPass($id_card, $course_id) == "confirmed" ? "เข้าร่วมการอบรม" : "<span class='text-danger'>ไม่ผ่าน</span>")); ?></h4>
                </div>
                <hr>
                <button course_id="<?php echo $course_id; ?>" id_card="<?php echo $id_card; ?>" class="btnNotPass btn btn-danger float-right ml-2">ไม่ผ่านการอบรม</button>
                <button course_id="<?php echo $course_id; ?>" id_card="<?php echo $id_card; ?>" class="btnPass btn btn-success float-right">ผ่านการอบรม</button>

            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#log_user").DataTable({
            "scrollX": true
        });
        $(".btnNotPass").click(function() {
            Swal.fire({
                title: 'คุณต้องการให้ <div>' + $("#nameUser").text() + '</div> <span class="text-danger">ไม่ผ่านการอบรม</span> ?',
                text: "ตอบ ตกลง เพื่อยืนยันให้ ไม่ผ่านการอบรม",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "update_status_course.php",
                        data: {
                            id_card: $(this).attr("id_card"),
                            course_id: $(this).attr("course_id"),
                            status: "nopass"
                        },
                        success: function(result) {
                            if (result == "OK") {
                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'success',
                                    title: 'บันทึกสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'error',
                                    title: 'บันทึกไม่สำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                }
            })
        })
        $(".btnPass").click(function() {
            Swal.fire({
                title: 'คุณต้องการให้ <div>' + $("#nameUser").text() + '</div> <span class="text-success">ผ่านการอบรม</span> ?',
                text: "ตอบ ตกลง เพื่อยืนยันให้ ผ่านการอบรม",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "update_status_course.php",
                        data: {
                            id_card: $(this).attr("id_card"),
                            course_id: $(this).attr("course_id"),
                            status: "pass"
                        },
                        success: function(result) {
                            if (result == "OK") {
                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'success',
                                    title: 'บันทึกสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'error',
                                    title: 'บันทึกไม่สำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                }
            })
        })
    });
</script>