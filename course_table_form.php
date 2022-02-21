<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .wh-card {
        width: 350px !important;
    }

    .box-table-time {
        background-color: #eef1f7;
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
    $sql = "select * from course where course_id='$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $sqlTable = "select * from time_table where course_id='$course_id'";
    $resTable = mysqli_query($conn, $sqlTable);
    ?>
    <div class="container mt-top-menu">
        <h3>จัดตาราง <?php echo $row["course_name"]; ?></h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>วัน</th>
                    <th>เวลาเริ่ม</th>
                    <th>เวลาจบ</th>
                    <th>กิจกรรม</th>
                    <th>Link เอกสาร</th>
                    <th>Link วิดีโอ (iframe)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($rowTable = mysqli_fetch_array($resTable)) {  ?>
                    <tr>
                        <td><?php echo $rowTable["days"]; ?></td>
                        <td><?php echo $rowTable["time_start"]; ?></td>
                        <td><?php echo $rowTable["time_end"]; ?></td>
                        <td><?php echo $rowTable["activity"]; ?></td>
                        <td><a target="_blank" href="<?php echo $rowTable["link_doc"]; ?>">เอกสาร</a></td>
                        <td><a target="_blank" href="video.php?time_id=<?php echo $rowTable["time_id"]; ?>">วิดีโอ</a></td>
                        <td><a class="btn btn-danger" href="del_time.php?time_id=<?php echo $rowTable["time_id"]; ?>&course_id=<?php echo $rowTable["course_id"]; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="card shadow">
            <div class="card-body">
                <button class="btn btn-primary btnAddList"><i class="fa-solid fa-plus"></i> เพิ่มรายการ</button>
                <form action="course_table_sql.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <div class="box-table-time mt-3 p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="time_course">วัน</label>
                                <input type="date" class="form-control" name="days[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">เวลา</label>
                                <input type="time" class="form-control" name="time_course_s[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">ถึง เวลา</label>
                                <input type="time" class="form-control" name="time_course_e[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">กิจกกรรม</label>
                                <input type="text" class="form-control" name="activity[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">Link เอกสาร</label>
                                <input type="text" class="form-control" name="link_doc[]">
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">Link วิดีโอ (iframe)</label>
                                <input type="text" class="form-control" name="link_video[]">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4 float-right"> เพิ่มตาราง </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(".btnAddList").click(function() {
        $(".box-table-time").append(
            '<div class="row mt-2">' +
            '<div class="col-md-2">' +
            '<label for="time_course">วัน</label>' +
            '<input type="date" class="form-control" name="days[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">เวลา</label>' +
            '<input type="time" class="form-control" name="time_course_s[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">ถึง เวลา</label>' +
            '<input type="time" class="form-control" name="time_course_e[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">กิจกกรรม</label>' +
            '<input type="text" class="form-control" name="activity[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">Link เอกสาร</label>' +
            '<input type="text" class="form-control" name="link_doc[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">Link วิดีโอ</label>' +
            '<input type="text" class="form-control" name="link_video[]" >' +
            '</div>' +
            '</div>'
        )
    })
    $(document).ready(function() {

    });
</script>