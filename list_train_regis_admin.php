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
    $sql = "select *,cr.status as crstatus from course_regis cr
    inner join course c on c.course_id = cr.course_id
    ";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <table id="course_regis">
            <thead>
                <th>ชื่อรายการอบรม</th>
                <th>วันที่</th>
                <th>สถานะ</th>
                <th></th>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td width="50%"><?php echo $row["course_name"]; ?></td>
                        <td><?php echo $row["time_stamp"]; ?></td>
                        <td><?php echo $row["crstatus"]; ?></td>
                        <td>
                            <?php if ($row["crstatus"] == "wait") {
                                echo '<button class="btn btn-success btnCanCourse" course_id="' . $row["course_id"] . '">ยืนยัน</button>';
                                echo '<button class="btn btn-danger btnCanCourse ml-1" course_id="' . $row["course_id"] . '">ยกเลิก</button>';
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#course_regis").DataTable();
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