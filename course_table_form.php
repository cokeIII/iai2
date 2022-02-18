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
    ?>
    <div class="container mt-top-menu">
        <h3>จัดตาราง <?php echo $row["course_name"]; ?></h3>
        <div class="card shadow">
            <div class="card-body">
                <button class="btn btn-primary btnAddList"><i class="fa-solid fa-plus"></i> เพิ่มรายการ</button>
                <form action="course_table_sql.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <div class="box-table-time mt-3 p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="time_course">เวลา</label>
                                <input type="time" class="form-control" name="time_course_s[]" id="time_course">
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">ถึง เวลา</label>
                                <input type="time" class="form-control" name="time_course_e[]" id="time_course">
                            </div>
                            <div class="col-md-4">
                                <label for="time_course">กิจกกรรม</label>
                                <input type="text" class="form-control" name="activity[]" id="activity">
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">Link เอกสาร</label>
                                <input type="text" class="form-control" name="link_doc[]" id="link_doc">
                            </div>
                            <div class="col-md-2">
                                <label for="time_course">Link วิดีโอ</label>
                                <input type="text" class="form-control" name="link_video[]" id="link_video">
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
            '<label for="time_course">เวลา</label>' +
            '<input type="time" class="form-control" name="time_course_s[]" id="time_course">' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">ถึง เวลา</label>' +
            '<input type="time" class="form-control" name="time_course_e[]" id="time_course">' +
            '</div>' +
            '<div class="col-md-4">' +
            '<label for="time_course">Link เอกสาร</label>' +
            '<input type="text" class="form-control" name="link_doc[]" id="link_doc">' +
            '</div>' +
            '<div class="col-md-4">' +
            '<label for="time_course">Link วิดีโอ</label>' +
            '<input type="text" class="form-control" name="link_video[]" id="link_video">' +
            '</div>' +
            '</div>'
        )
    })
    $(document).ready(function() {

    });
</script>