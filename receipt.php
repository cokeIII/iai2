<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    require_once "function.php";

    ?>
</head>
<style>
    .wh-card {
        width: 350px !important;
    }
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_SESSION["id_card"];
    $sql = "select * from bank where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <div class="row mt-top-menu justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>รับใบเสร็จ</h3>
                        <hr>
                        <table id="bank" class="table table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>ชื่อหลักสูตรอบรม</th>
                                    <th>วันเวลาส่งหลักฐาน</th>
                                    <th>หลักฐาน</th>
                                    <th>ใบเสร็จ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo getNameCourse($row["course_id"]); ?></td>
                                        <td><?php echo $row["time_stamp"]; ?></td>
                                        <td><a target="_blank" href="file_uploads/bank/<?php echo $row["evidence"]; ?>" alt="">ดูหลักฐาน</a></td>
                                        <td><?php echo (empty($row["receipt"]) ? "ยังไม่ได้รับใบเสร็จ" : '<a target="_blank" href="file_uploads/receipt/' . $row["receipt"] . '" alt="">ดูใบเสร็จ</a>'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#bank").DataTable({
            "scrollX": true
        });
    });
</script>