<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>

</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    require_once "function.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_SESSION["id_card"];
    $course_id = $_GET["course_id"];
    $sql = "select * from course where course_id='$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <h3><?php echo $row["course_name"] ?></h3>
                <hr>
                <form action="cer_SQL.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cer_min">
                                    <h5>หมายเลขวุฒิบัตรเริ่มต้น</h5>
                                </label>
                                <input class="form-control" type="number" name="cer_min" id="cer_min" value="<?php echo $row["cer_min"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cer_max">
                                    <h5>หมายเลขวุฒิบัตรสิ้นสุด</h5>
                                </label>
                                <input class="form-control" type="number" name="cer_max" id="cer_max" value="<?php echo $row["cer_max"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cer_pic">
                                    <h5>ภาพวุฒิบัติ <?php echo (!empty($row["cer_pic"]) ? "<a target='_blank' href='file_uploads/cer/" . $row["cer_pic"] . "'>ดูภาพ</a>" : ""); ?></h5>
                                </label>
                                <input class="form-control" type="file" name="cer_pic" id="cer_max" value="<?php echo $row["cer_max"]; ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#course_all").DataTable({
            "scrollX": true
        });
    });
</script>