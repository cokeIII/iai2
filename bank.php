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
    ?>
    <div class="container mt-top-menu">
        <div class="card shadow">
            <div class="card-body p-5">
                <h3>แจ้งการชำระเงิน</h3>
                <hr>
                <form action="bank_SQL.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label>รหัสบัตรประชาชนที่สมัคร</label>
                            <input class="form-control" type="text" name="id_card" id="id_card" required>
                        </div>
                        <div class="col-md-6">
                            <label>เลือกหลักสูตรอบรมที่สมัคร</label>
                            <select class="form-control" name="course_id" id="course_id" required>
                                <option value="">-</option>
                                <?php
                                $sql = "select * from course";
                                $res = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($res)) {
                                ?>
                                    <option value="<?php echo $row["course_id"] ?>"><?php echo $row["course_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>หลักฐานการชำระเงิน</label>
                            <input class="form-control" type="file" name="evidence" id="evidence">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 float-right">แจ้งการชำระเงิน</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>

</script>