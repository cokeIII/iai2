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
        <div class="row mt-top-menu">
            <div class="col-md-4">
                <h3>Log in</h3>
                <form id="form-login" action="login_SQL.php" method="post">
                    <div class="color-primary p-5 mt-3 shadow">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">รหัสบัตรประชาชน </label>
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="passwordLogin">รหัสผ่าน </label>
                                    <input name="passwordLogin" type="password" class="form-control" id="passwordLogin" placeholder="Enter password" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-orange float-right">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h3>Sign Up</h3>
                <div class="box-register p-5 mt-3 shadow">
                    <form id="form-regis" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_card">รหัสบัตรประชาชน <span class="text-danger">*</span></label>
                                    <input name="id_card" type="text" class="form-control" id="id_card" placeholder="Enter รหัสบัตรประชาชน" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-MAIL <span class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter E-MAIL" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">PASSWORD <span class="text-danger">*</span></label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Enter PASSWORD" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">PASSWORD AGAIN <span class="text-danger">*</span></label>
                                    <input name="passwordAgain" type="password" class="form-control" id="passwordAgain" placeholder="Enter PASSWORD" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="prefix">คำนำหน้าชื่อ<span class="text-danger">*</span></label>
                                    <select name="prefix" id="prefix" class="form-control" required>
                                        <option value="">กรุณาเลือก</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name_th">ชื่อ (ภาษาไทย) <span class="text-danger">*</span></label>
                                    <input name="first_name_th" type="text" class="form-control" id="first_name_th" placeholder="Enter ชื่อ (ภาษาไทย)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name_th">นามสกุล (ภาษาไทย) <span class="text-danger">*</span></label>
                                    <input name="last_name_th" type="text" class="form-control" id="last_name_th" placeholder="Enter นามสกุล (ภาษาไทย)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">ชื่อ (ภาษาอังกฤษ) <span class="text-danger">*</span></label>
                                    <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter ชื่อ (ภาษาอังกฤษ)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">นามสกุล (ภาษาอังกฤษ) <span class="text-danger">*</span></label>
                                    <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter นามสกุล (ภาษาอังกฤษ)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                    <input name="phone" type="number" class="form-control" id="phone" placeholder="Enter เบอร์โทรศัพท์" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">วันเกิด <span class="text-danger">*</span></label>
                                    <input name="birthday" type="date" class="form-control" id="birthday" placeholder="Enter วันเกิด" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education_level">ระดับการศึกษา <span class="text-danger">*</span></label>
                                    <select name="education_level" id="education_level" class="form-control" required>
                                        <option value="">กรุณาเลือก</option>
                                        <option value="ม.3">ม.3</option>
                                        <option value="ม.6">ม.6</option>
                                        <option value="ปวส.">ปวส.</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="major">สาขาวิชา <span class="text-danger">*</span></label>
                                    <input name="major" type="text" class="form-control" id="major" placeholder="Enter สาขาวิชา" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_experience">ประสบการณ์ทำงาน (ปี) <span class="text-danger">*</span></label>
                                    <input name="work_experience" type="number" id="work_experience" class="form-control" id="work experience" placeholder="Enter ประสบการณ์ทำงาน (ปี)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="organization">ชื่อบริษัท/องค์กร <span class="text-danger">*</span></label>
                                    <input name="organization" type="text" class="form-control" id="organization" placeholder="Enter สาขาวิชา" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry">อุตสาหกรรม <span class="text-danger">*</span></label>
                                    <select name="industry" id="industry" class="form-control" required>
                                        <?php echo  get_industry_opt(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_position">ตำแหน่งงาน <span class="text-danger">*</span></label>
                                    <select name="job_position" id="job_position" class="form-control" required>
                                        <?php echo  get_job_position_opt(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">แผนก/ฝ่าย <span class="text-danger">*</span></label>
                                    <select name="department" id="department" class="form-control" required>
                                        <?php echo  get_department_opt(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-orange float-right">สมัครสมาชิก</button>
                    </form>
                </div>
                <hr>
            </div>
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
                        }else if(result == "admin"){
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
        $(document).on('submit', '#form-regis', function() {
            event.preventDefault()
            var formData = {
                'id_card':$('#id_card').val(),
                'email':$('#email').val(),
                'password':$('#password').val(),
                'prefix':$('#prefix').val(),
                'first_name_th':$('#first_name_th').val(),
                'last_name_th':$('#last_name_th').val(),
                'first_name':$('#first_name').val(),
                'last_name':$('#last_name').val(),
                'phone':$('#phone').val(),
                'birthday':$('#birthday').val(),
                'education_level':$('#education_level').val(),
                'major':$('#major').val(),
                'work_experience':$('#work_experience').val(),
                'organization':$('#organization').val(),
                'industry':$('#industry').val(),
                'job_position':$('#job_position').val(),
                'department':$('#department').val()
            }
            console.log(formData)
            if (!Script_checkID($("#id_card").val())) {
                return Swal.fire({
                    // position: 'top-end',
                    icon: 'error',
                    title: 'รหัสบัตรประชาชนไม่ถูกต้อง',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            if ($("#password").val() == $("#passwordAgain").val()) {

                $.ajax({
                    type: "POST",
                    url: "regis_SQL.php",
                    data: formData,
                    success: function(result) {
                        if (result == "OK") {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'สมัครสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#form-regis").trigger("reset");
                        } else {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'error',
                                title: 'สมัครไม่สำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    // position: 'top-end',
                    icon: 'error',
                    title: 'รหัสผ่านไม่ตรงกัน',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    });

    function Script_checkID(id) {
        if (!IsNumeric(id)) return false;
        if (id.substring(0, 1) == 0) return false;
        if (id.length != 13) return false;
        for (i = 0, sum = 0; i < 12; i++)
            sum += parseFloat(id.charAt(i)) * (13 - i);
        if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
        return true;
    }

    function IsNumeric(input) {
        var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
        return (RE.test(input));
    }
</script>