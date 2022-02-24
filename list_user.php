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
    $search = "";
    if (!empty($_POST["id_card"])) {
        $search = $_POST["id_card"];
    }
    $sql = "select * from users where status!= 'admin'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <h3>รายชื่อสมาชิก</h3>
                <table id="list_user" class="table table-striped" width="100%">
                    <thead>
                        <th>รหัสบัตรประชาชน</th>
                        <th>ชื่อ-สกุล</th>
                        <th>ชื่อบริษัท/องค์กร</th>
                        <th>วันเวลาที่สมัคร</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo $row["id_card"]; ?></td>
                                <td><?php echo $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"]; ?></td>
                                <td><?php echo $row["organization"]; ?></td>
                                <td><?php echo $row["time_stamp"]; ?></td>
                                <td><a class="btn btn-warning" href="profile_admin.php?id_card=<?php echo $row["id_card"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><button id_card="<?php echo $row["id_card"]; ?>" class="btn btn-danger btnDelUser"><i class="fa-solid fa-trash-can"></i></button></td>
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
        $("#list_user").DataTable({
            "scrollX": true,
            "oSearch": {
                "sSearch": '<?php echo $search;?>'
            }
        });

        $(".btnDelUser").click(function() {
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ต้องการลบรายการ ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('user_del.php', {
                        'id_card': id_card,
                    });
                }
            })
        })
    });
</script>