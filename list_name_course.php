<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .bg-red {
        background-color: #fc6d6d;
    }
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
    where r.course_id = '$course_id' and r.status != 'wait'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <h1><?php echo getNameCourse($course_id); ?></h1>
        <div class="card">
            <div class="card-body">
                <table id="list_name" class="table" width="100%">
                    <thead>
                        <tr>
                            <th>รหัสบัตรประชาชน</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ชื่อบริษัท/องค์กร</th>
                            <th>เปอร์เซ็นการเข้าร่วม</th>
                            <th>สถานะ</th>
                            <th>ประวัติการเข้าอบรม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                            $dataTime = checkTime($row["id_card"], $course_id);

                        ?>
                            <tr>
                                <td><?php echo $row["id_card"]; ?></td>
                                <td><?php echo $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"]; ?></td>
                                <td><?php echo $row["organization"]; ?></td>
                                <td class="<?php echo checkColor($dataTime); ?>"><?php echo calPercent($row["id_card"], $row["course_id"]) . ' %'; ?></td>
                                <td><?php echo (checkPass($id_card, $course_id) == "pass" ? "<span class='text-success'>ผ่าน</span>" : (checkPass($id_card, $course_id) == "confirmed" ? "เข้าร่วมการอบรม" : "<span class='text-danger'>ไม่ผ่าน</span>")); ?></td>
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
        $("#list_name").DataTable({
            "scrollX": true
        });
    });
</script>
<?php
function checkColor($dataTime)
{
    foreach ($dataTime as $key => $value) {
        if ($dataTime[$key]['doc'] == 'bg-red') {
            return 'bg-red';
        } else if ($dataTime[$key]['video'] == 'bg-yellow') {
            return 'bg-red';
        } else if ($dataTime[$key]['video'] == 'bg-red') {
            return 'bg-red';
        }
    }
    return "";
}
?>