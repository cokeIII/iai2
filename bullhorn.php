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

    $sql = "select * from pic_slide";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>ตั้งค่ารูปสไลด์</h3>
                        <hr>
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalSlide">เพิ่มข้อมูล</button>
                        <table id="slide" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th>วันที่ลง</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                    <tr>
                                        <td><?php echo $row["time_stamp"]; ?></td>
                                        <td><a target="_blank" href="file_uploads/img_slide/<?php echo $row["pic_path"]; ?>">ดูรูปภาพ</a></td>
                                        <td><button pic_id="<?php echo $row["pic_id"]; ?>" class="btnDelSlide btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 border-left">
                        <h3>ตั้งค่าประชาสัมพันธ์</h3>
                        <hr>
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalBullhorn">เพิ่มข้อมูล</button>
                        <table id="bullhorn" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th>หัวข้อ</th>
                                    <th>รายละเอียด</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlBull = "select * from public_relations";
                                $resBull = mysqli_query($conn, $sqlBull);
                                while ($rowBull = mysqli_fetch_array($resBull)) { ?>
                                    <tr>
                                        <td><?php echo $rowBull["topic"]; ?></td>
                                        <td><button class="btn btn-info btnPicPath" topic="<?php echo $rowBull["topic"]; ?>" detail="<?php echo $rowBull["detail"]; ?>" pic_path='<?php echo $rowBull["pic_path"]; ?>'>รายละเอียด</button></td>
                                        <td><button pub_id="<?php echo $rowBull["pub_id"]; ?>" class="btnDelBullhorn btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
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
<!-- Modal -->
<div class="modal fade" id="modalSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSlideLabel">ตั้งค่ารูปสไลด์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pic_slide_add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">
                            <h4>เพิ่มรูปภาพ(เลือกได้มากกว่า 1 รูป)</h4>
                        </label>
                        <input class="form-control" type="file" name="pic_slide[]" multiple accept="image/*" />
                    </div>
                    <button type="submit" class="btn btn-primary">เพิ่มรูป</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalBullhorn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBullhornLabel">ตั้งค่าประชาสัมพันธ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="bullhorn_SQL.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="topic">
                            <h4>หัวข้อ</h4>
                        </label>
                        <input class="form-control" type="text" name="topic" id="topic" required>
                    </div>
                    <div class="form-group">
                        <label for="pic_path">
                            <h4>
                                เพิ่มรูปภาพ(เลือกได้มากกว่า 1 รูป)
                            </h4>
                        </label>
                        <input class="form-control" type="file" name="pic_path[]" multiple accept="image/*" required />
                    </div>
                    <div class="form-group">
                        <label for="detail">
                            <h4>รายละเอียด</h4>
                        </label>
                        <textarea class="form-control" name="detail" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">เพิ่มข้อมูล</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade " id="picBull" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="picBullLabel">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="picBullShow">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $(".btnPicPath").click(function() {
            let pic_path = JSON.parse($(this).attr("pic_path"))
            let detail = $(this).attr("detail")
            let topic = $(this).attr("topic")
            $res = '<h3>' + topic + '</h3>' + '<hr>' + detail + '<hr><div class="row">';
            pic_path.forEach(element => {
                $res +=
                    '<div class="col-md-4">' +
                    '<img class="d-block w-100" src="file_uploads/bullhorn/' + element + '">' +
                    '</div>'
            });
            $res += '</div>';
            $("#picBullShow").html($res)
            $('#picBull').modal('show');
        })
        $("#slide").DataTable({
            "scrollX": true
        });
        $("#bullhorn").DataTable({
            "scrollX": true
        });
        $(".btnDelSlide").click(function() {
            let pub_id = $(this).attr("pub_id")
            Swal.fire({
                title: 'ลบรูปภาพ ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('pic_slide_del.php', {
                        'pub_id': pub_id,
                    });
                }
            })
        })
        $(".btnDelBullhorn").click(function() {
            let pub_id = $(this).attr("pub_id")
            Swal.fire({
                title: 'ลบข่าวประชาสัมพัธ์ ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('bullhorn_del.php', {
                        'pub_id': pub_id,
                    });
                }
            })
        })
    });
</script>