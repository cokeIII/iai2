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
        <div class="card shadow">
            <div class="card-body">
                <h3>กรุณากรอกแบฟอร์มก่อนลงทะเบียน</h3>
                <hr>
                <form action="create_form_user_SQL.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <div class="row p-3">
                        <div class="col-md-4">
                            <?php while ($row = mysqli_fetch_array($res)) { ?>
                                <input type="hidden" name="no[]" value="<?php echo $row["no"]; ?>">

                                <label class="mt-2">
                                    <h4><?php echo $row["topic"]; ?></h4>
                                </label>

                                <?php
                                $arrOpt = explode(",", $row["opt"]);
                                if (!empty($row["opt"])) {
                                ?>
                                    <select class="form-control" name="<?php echo $row["no"]; ?>">
                                        <option value="">-</option>
                                        <?php
                                        foreach ($arrOpt as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="<?php echo $row["no"]; ?>">
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-right">บันทึกข้อมูล</button>
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