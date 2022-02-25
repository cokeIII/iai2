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

    ?>
    <div class="container mt-top-menu">
        <div class="card">
            <div class="card-body">
                <h3>เจ้าหน้าที่</h3>
                <hr>
                <form action="registrar_add_SQL.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>รหัสบัตรประชาชน</strong></label>
                            <input class="form-control" type="text" name="id_card" id="id_card" required>
                        </div>
                        <div class="col-md-3">
                            <label><strong>คำนำหน้า</strong></label>
                            <select class="form-control" name="prefix" id="prefix" required>
                                <option value="">-</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label><strong>ชื่อ</strong></label>
                            <input class="form-control" name="first_name" id="first_name" required>
                        </div>
                        <div class="col-md-3">
                            <label><strong>สกุล</strong></label>
                            <input class="form-control" name="last_name" id="last_name" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label><strong>สถานที่ที่สามารถติดต่อได้สะดวก</strong></label>
                            <input class="form-control" type="text" name="easily_contacted" id="easily_contacted" required>
                        </div>
                        <div class="col-md-3">
                            <label><strong>โทรศัพท์มือถือ</strong></label>
                            <input class="form-control" type="text" name="phone" id="phone" required>
                        </div>
                        <div class="col-md-3">
                            <label><strong>E-mail</strong></label>
                            <input class="form-control" type="text" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label><strong>รูปประจำตัว</strong></label>
                            <input class="form-control" type="file" name="pic" id="pic">
                        </div>
                        <div class="col-md-3">
                            <label><strong>รหัสผ่าน</strong></label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">เพิ่มรายการ</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {

    });
</script>