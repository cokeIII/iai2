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
    $mode = "";
    if ($_SESSION["status"] == 'admin') {
        $mode = "r";
    } else if ($_SESSION["status"] == 'registrar') {
        $mode = "r";
    } else if ($_SESSION["status"] == 'lecturer') {
        $mode = "l";
    } else {
        $mode = "u";
    }
    $sql = "select * from log_alert where status = '$mode' order by time_stamp desc";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <h3>การแจ้งเตือน</h3>
                <table id="list_log" class="table table-striped" width="100%">
                    <thead>
                        <th>รหัสบัตรประชาชน</th>
                        <th>ชื่อ-สกุล</th>
                        <th>รายละเอียด</th>
                        <th>วันเวลาที่สมัคร</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                            $arrRead = explode(",", $row["status_read"]);
                            $log_id = $row["log_id"];
                            if (!in_array($id_card, $arrRead)) {
                                if (!empty($arrRead[0])) {
                                    $status_read = json_encode($arrRead) . "," . $id_card;
                                } else {
                                    $status_read = $id_card;
                                }
                                $sqlLog = "update log_alert set status_read = '$status_read' where log_id = '$log_id'";
                                mysqli_query($conn, $sqlLog);
                        ?>
                                <tr>
                                    <td><?php echo $row["id_card"]; ?></td>
                                    <td><?php echo getNameUser($row["id_card"]); ?></td>
                                    <td><?php echo $row["detail"]; ?></td>
                                    <td><?php echo $row["time_stamp"]; ?></td>
                                </tr>
                        <?php }
                        } ?>
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
        $("#list_log").DataTable({
            "scrollX": true
        });
    });
</script>