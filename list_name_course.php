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
    $sql = "select * from course_regis r
    inner join users u on u.id_card = r.id_card
    where r.course_id = '$course_id' and r.status = 'confirmed'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <h1><?php echo getNameCourse($course_id); ?></h1>
        <div class="card">
            <div class="card-body">
                <table id="list_name" class="table table-striped">
                    <thead>
                        <th>รหัสบัตรประชาชน</th>
                        <th>ชื่อ-สกุล</th>
                        <th>ชื่อบริษัท/องค์กร</th>
                        <th>ประวัติการเข้าอบรม</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo $row["id_card"]; ?></td>
                                <td><?php echo $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"]; ?></td>
                                <td><?php echo $row["organization"]; ?></td>
                                <td><a href="log_user.php?id_card=<?php echo $row["id_card"]; ?>&course_id=<?php echo $course_id; ?>">ดูประวัติ</a></td>
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
        $("#list_name").DataTable();
    });
</script>