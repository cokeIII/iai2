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
    $sql = "select * from lecturer";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <h3>วิทยากร</h3>
                <hr>
                <a href="lecturer_form_add.php" class="btn btn-primary mb-3">เพิ่มรายการ</a>
                <table id="lecturer_all" class="table table-striped" width="100%">
                    <thead>
                        <th>ชื่อ-สกุล</th>
                        <th>ตำแน่งปัจจุบัน</th>
                        <th>โทรศัพท์</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo $row["prefix"] . $row["first_name"] . " " . $row["last_name"]; ?></td>
                                <td><?php echo $row["current_position"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><a class="btn btn-warning" href="lecturer_form_edit.php?id_card=<?php echo $row["id_card"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><button id_card="<?php echo $row["id_card"]; ?>" class="btn btn-danger btnDelLec"><i class="fa-solid fa-trash-can"></i></button></td>
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
        $("#lecturer_all").DataTable({
            "scrollX": true
        });
        $(".btnDelLec").click(function() {
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ลบรายการ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('lecturer_del.php', {
                        'id_card': id_card,
                    });
                }
            })
        })
    });
</script>