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
    $sql = "select * from course";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <table id="course_all" class="table table-striped" width="100%">
                    <thead>
                        <th>ชื่อรายการอบรม</th>
                        <th>รายละเอียด</th>
                        <th>วันเวลา</th>
                        <th>รายชื่อผู้เข้าอบรม</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td width="45%"><?php echo $row["course_name"]; ?></td>
                                <td><a href="detail_course.php?course_id=<?php echo $row["course_id"]; ?>" class="">รายละเอียด</a></td>
                                <td><?php echo "เริ่ม " . $row["start_date"] . "<br> ถึง " . $row["end_date"]; ?></td>
                                <td><a href="list_name_course.php?course_id=<?php echo $row["course_id"]; ?>">ดูรายชื่อ</a></td>
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
        $("#course_all").DataTable({
            "scrollX": true
        });
    });
</script>