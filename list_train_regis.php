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
    $id_card = $_SESSION["id_card"];
    $sql = "select *,cr.status as crstatus from course_regis cr
    inner join course c on c.course_id = cr.course_id
    where  cr.id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <table id="course_regis" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>ชื่อรายการอบรม</th>
                            <th>รายละเอียด</th>
                            <th>วันที่</th>
                            <th>สถานะ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td width="45%"><?php echo $row["course_name"]; ?></td>
                                <td><a href="detail_course.php?course_id=<?php echo $row["course_id"]; ?>" class="">รายละเอียด</a></td>
                                <td><?php echo $row["time_stamp"]; ?></td>
                                <td><?php echo 
                                (checkPass($id_card, $row["course_id"]) == "pass" ? "<span class='text-success'>ผ่าน</span>" : 
                                (checkPass($id_card, $row["course_id"]) == "confirmed" ? "เข้าร่วมการอบรม" : 
                                (checkPass($id_card, $row["course_id"]) == "wait"?"<span class='text-warning'>รอการยืนยัน</span>":"<span class='text-danger'>ไม่ผ่าน</span>"))); ?></td>
                                <td>
                                    <?php if ($row["crstatus"] == "wait") {
                                        echo '<button class="btn btn-danger btnCanCourse" course_id="' . $row["course_id"] . '">ยกเลิก</button>';
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
        $("#course_regis").DataTable({
            "scrollX": true
        });
        $(".btnCanCourse").click(function() {
            let course_id = $(this).attr("course_id")
            Swal.fire({
                title: 'ต้องการยกเลิกรายการใช่หรือไม่ ?',
                showCancelButton: true,
                confirmButtonText: 'ยกเลิก',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('course_cancle.php', {
                        'course_id': course_id
                    });
                }
            })
        })
    });
</script>