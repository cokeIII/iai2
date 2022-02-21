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
    $id_card = $_GET["id_card"];
    $course_id = $_GET["course_id"];
    $sql = "select * from time_table where course_id = '$course_id' order by days,time_start";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <h1><?php echo getNameCourse($course_id); ?></h1>
        <div class="card">
            <div class="card-body">
                <h3>ประวัติการเข้ากิจกรรมของ <?php echo getNameUser($id_card); ?></h3>
                <table id="log_user" class="table table-striped">
                    <thead>
                        <th>วันเวลากิจกรรม</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>วันเวลาที่เข้าดูเอกสาร</th>
                        <th>วันเวลาที่เข้าดูวิดีโอ</th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo "วัน " . $row["days"] . "<br>เวลา " . $row["time_start"] . " ถึง " . $row["time_end"]; ?></td>
                                <td><?php echo $row["activity"]; ?></td>
                                <td><?php echo checkDoc($id_card, $row["time_id"]); ?></td>
                                <td><?php echo checkVideo($id_card, $row["time_id"]); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <hr>
                <button class="btn btn-danger float-right ml-2">ไม่ผ่านการอบรม</button>
                <button class="btn btn-success float-right">ผ่านการอบรม</button>

            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#log_user").DataTable();
    });
</script>

<?php
function checkDoc($id_card, $time_id)
{
    $ret = "";
    global $conn;
    $sql = "select * from log_user 
        where id_card='$id_card' 
        and time_id='$time_id' 
        and detail='เปิดเอกสาร'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $ret = $row["time_stamp"];
    return $ret;
}
function checkVideo($id_card, $time_id)
{
    $ret = "";
    global $conn;
    $sql = "select * from log_user 
        where id_card='$id_card' 
        and time_id='$time_id' 
        and detail='ดูวิดีโอ'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $ret = $row["time_stamp"];
    return $ret;
}
?>