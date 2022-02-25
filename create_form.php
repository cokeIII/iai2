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
    $sql = "select * from create_form where course_id='$course_id'";
    $res = mysqli_query($conn, $sql);
    $count = 0;
    ?>
    <div class="container mt-top-menu">
        <?php echo "<h1>".getNameCourse($course_id)."</h1>"?>
        <div class="card">
            <div class="card-body">
                <h3>สร้างฟอร์ม</h3>
                <hr>
                <form action="create_form_SQL.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <?php while ($row = mysqli_fetch_array($res)) {
                        $count++ ?>
                        <div class="row">
                            <div class="col-md-5">
                                <label><strong><?php echo $count; ?>. หัวข้อ/คำถาม</strong></label>
                                <input class="form-control" type="text" name="topic[]" value="<?php echo $row["topic"]; ?>">
                            </div>
                            <div class="col-md-6">
                                <label><strong>ใส่ตัวเลือกแบบเลื่อนลงโดยใช้เครื่องหมาย , คั่นระหว่างตัวเลือก</strong></label>
                                <input class="form-control" type="text" name="opt[]" value="<?php echo $row["opt"]; ?>" placeholder="ตัวเลือกที่1,ตัวเลือกที่2,ตัวเลือกที่3">
                            </div>
                            <div class="col-md-1">
                                <a href="create_form_del.php?no=<?php echo $count; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-danger btnDelForm mt-4"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                    <?php for ($i = $count; $i < 5; $i++) { ?>
                        <div class="row">
                            <div class="col-md-5">
                                <label><strong><?php echo $i + 1; ?>. หัวข้อ/คำถาม</strong></label>
                                <input class="form-control" type="text" name="topic[]" value="<?php echo $row["topic"]; ?>">
                            </div>
                            <div class="col-md-6">
                                <label><strong>ใส่ตัวเลือกแบบเลื่อนลงโดยใช้เครื่องหมาย , คั่นระหว่างตัวเลือก</strong></label>
                                <input class="form-control" type="text" name="opt[]" value="<?php echo $row["opt"]; ?>" placeholder="ตัวเลือกที่1,ตัวเลือกที่2,ตัวเลือกที่3">
                            </div>
                            <div class="col-md-1">
                                <a href="create_form_del.php?no=<?php echo $i + 1; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-danger btnDelForm mt-4"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary mt-3 float-right">เพิ่มแบบฟอร์ม</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {});
</script>