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
    $id_card = "";
    if (!empty($_POST["id_card"])) {
        $id_card = $_POST["id_card"];
    }
    $sql = "select *,cr.status as crStatus from course_regis cr
    inner join course c on c.course_id = cr.course_id 
    where cr.id_card = '$id_card' and cr.status = 'pass'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-5">
                        <form action="cer_form.php" method="post" class="mt-2">
                            <div class="input-group">
                                <input type="search" name="id_card" class="form-control rounded" placeholder="รหัสบัตรประชาชน" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <table id="cer" class="table table-striped mt-3" width="100%">
                    <thead>
                        <th>ชื่อรายการอบรม</th>
                        <th>วันเวลา</th>
                        <th>สถานะ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) {
                            $status = checkPass($id_card, $row["course_id"]) ?>
                            <tr>
                                <td width="45%"><?php echo $row["course_name"]; ?></td>
                                <td><?php echo "เริ่ม " . $row["start_date"] . "<br> ถึง " . $row["end_date"]; ?></td>
                                <td><?php echo ($status == "pass" ? "<span class='text-success'>ผ่าน</span>" : ($status == "confirmed" ? "เข้าร่วมการอบรม" : "<span class='text-danger'>ไม่ผ่าน</span>")); ?></td>
                                <td><button class="reportCer btn btn-primary" id_card="<?php echo $id_card; ?>" course_id="<?php echo $row["course_id"]; ?>">พิมพ์ใบวุฒิบัตร</button></td>
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
        $("#cer").DataTable({
            "scrollX": true
        });
        $(".reportCer").click(function() {
            let id_card = $(this).attr('id_card')
            let course_id = $(this).attr('course_id')
            $.redirect('report_cer.php', {
                'id_card': id_card,
                'course_id': course_id
            }, "POST", "_blank");
        })
    });
</script>