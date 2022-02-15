<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    require_once "function.php";
    ?>
</head>
<style>
    .wh-card {
        width: 350px !important;
    }
</style>

<body class="bg-grays">
    <?php require_once "menu.php"; ?>
    <div class="container">
        <div class="mt-top-menu">
            <h3 class="text-center">Log in</h3>
            <form id="form-login">
                <div class="row justify-content-center">
                    <div class="color-primary p-5 mt-3 shadow col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">รหัสบัตรประชาชน </label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="passwordLogin">รหัสผ่าน </label>
                                    <input type="password" class="form-control" id="passwordLogin" placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-orange float-right">เข้าสู่ระบบ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#form-login', function() {
            event.preventDefault()
            $.ajax({
                type: "POST",
                url: "login_SQL.php",
                data: {
                    username: $("#username").val(),
                    passwordLogin: $("#passwordLogin").val()
                },
                success: function(result) {
                    if (result == "user") {
                        window.location.href = 'index.php'
                    } else if (result == "admin") {
                        window.location.href = 'index.php'
                    } else {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'เข้าสู่ระบบไม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        })

    });
</script>