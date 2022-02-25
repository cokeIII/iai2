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
    <?php
    require_once "menu.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_SESSION["id_card"];
    $sql = "select * from users where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $prefix = $row["prefix"];
    $education_level = $row["education_level"];
    $industry = $row["industry"];
    $job_position = $row["job_position"];
    $department = $row["department"];
    ?>
    <div class="container">
        <div class="row mt-top-menu justify-content-center">
            <div class="col-md-8">
                <h3>Profile</h3>
                <div class="box-register p-5 mt-3 shadow">
                    <form id="form-regis" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <img class="img-thumbnail shadow mb-2" width="250" height="250" src="file_uploads/user/<?php echo (empty($row["pic"]) ? "user.png" : $row["pic"]); ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_card">รหัสบัตรประชาชน <span class="text-danger">*</span></label>
                                    <input name="id_card" type="text" class="form-control" id="id_card" placeholder="Enter รหัสบัตรประชาชน" required readonly value="<?php echo $row["id_card"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-MAIL <span class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter E-MAIL" required value="<?php echo $row["email"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning" id="btnChangePass">แก้ไขรหัสผ่าน</button>
                            </div>
                            <div class="col-md-3 mt-2">
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
                                    <input name="first_name_th" type="text" class="form-control" id="first_name_th" placeholder="Enter ชื่อ (ภาษาไทย)" required value="<?php echo $row["first_name_th"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name_th">นามสกุล (ภาษาไทย) <span class="text-danger">*</span></label>
                                    <input name="last_name_th" type="text" class="form-control" id="last_name_th" placeholder="Enter นามสกุล (ภาษาไทย)" required value="<?php echo $row["last_name_th"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">ชื่อ (ภาษาอังกฤษ) <span class="text-danger">*</span></label>
                                    <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter ชื่อ (ภาษาอังกฤษ)" required value="<?php echo $row["first_name"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">นามสกุล (ภาษาอังกฤษ) <span class="text-danger">*</span></label>
                                    <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter นามสกุล (ภาษาอังกฤษ)" required value="<?php echo $row["last_name"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                    <input name="phone" type="number" class="form-control" id="phone" placeholder="Enter เบอร์โทรศัพท์" required value="<?php echo $row["phone"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">วันเกิด <span class="text-danger">*</span></label>
                                    <input name="birthday" type="date" class="form-control" id="birthday" placeholder="Enter วันเกิด" required value="<?php echo $row["birthday"]; ?>">
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
                                    <input name="major" type="text" class="form-control" id="major" placeholder="Enter สาขาวิชา" required value="<?php echo $row["major"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_experience">ประสบการณ์ทำงาน (ปี) <span class="text-danger">*</span></label>
                                    <input name="work_experience" type="number" id="work_experience" class="form-control" id="work experience" placeholder="Enter ประสบการณ์ทำงาน (ปี)" required value="<?php echo $row["work_experience"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="organization">ชื่อบริษัท/องค์กร <span class="text-danger">*</span></label>
                                    <input name="organization" type="text" class="form-control" id="organization" placeholder="Enter สาขาวิชา" required value="<?php echo $row["organization"]; ?>">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pic">รูปประจำตัว</label>
                                    <input type="file" name="pic" id="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning float-right">แก้ไข</button>
                    </form>
                </div>
                <hr>
            </div>
        </div>
    </div>
</body>
<div class="modal" tabindex="-1" role="dialog" id="changePass">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>รหัสผ่านเดิม</h5>
                <div class="input-group input-group-outline my-3">
                    <input type="password" name="old_password" id="old_password" class="form-control">
                </div>
                <h5>รหัสผ่านใหม่</h5>
                <div class="input-group input-group-outline my-3">
                    <input type="password" name="new_password" id="new_password" class="form-control">
                </div>
                <h5>ยืนยันรหัสผ่านใหม่</h5>
                <div class="input-group input-group-outline my-3">
                    <input type="password" name="c_new_password" id="c_new_password" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitPass">เปลี่ยนรหัสผ่าน</button>
            </div>
        </div>
    </div>
</div>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        let prefix = '<?php echo $prefix; ?>'
        let education_level = '<?php echo $education_level; ?>'
        let industry = '<?php echo $industry; ?>'
        let job_position = '<?php echo $job_position; ?>'
        let department = '<?php echo $department; ?>'
        $("#prefix").val(prefix)
        $("#education_level").val(education_level)
        $("#industry").val(industry)
        $("#job_position").val(job_position)
        $("#department").val(department)
        $(document).on("click", "#btnChangePass", function() {
            $('#changePass').modal('show');
        })
        $(document).on('click', '#submitPass', function() {
            if ($('#new_password').val() == $('#c_new_password').val()) {
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {
                        id_card: $("#id_card").val(),
                        old_password: $('#old_password').val(),
                        new_password: $('#new_password').val(),
                        act: 'changePass'
                    },
                    success: function(result) {
                        console.log(result)
                        if (result == "success") {
                            $('.modal').modal('hide')
                            $('#old_password').val("")
                            $('#new_password').val("")
                            $('#c_new_password').val("")
                            Swal.fire({
                                title: 'success',
                                text: 'เปลี่ยนรหัสผ่านสำเร็จ',
                                icon: 'success',
                                confirmButtonText: 'ปิด'
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'เปลี่ยนรหัสผ่านไม่สำเร็จ',
                                icon: 'error',
                                confirmButtonText: 'ปิด'
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'รหัสผ่านใหม่ไม่ตรงกัน',
                    icon: 'error',
                    confirmButtonText: 'ปิด'
                })
            }

        })

        $(document).on('submit', '#form-regis', function() {
            event.preventDefault()
            // var formData = {
            //     'id_card': $('#id_card').val(),
            //     'email': $('#email').val(),
            //     'prefix': $('#prefix').val(),
            //     'first_name_th': $('#first_name_th').val(),
            //     'last_name_th': $('#last_name_th').val(),
            //     'first_name': $('#first_name').val(),
            //     'last_name': $('#last_name').val(),
            //     'phone': $('#phone').val(),
            //     'birthday': $('#birthday').val(),
            //     'education_level': $('#education_level').val(),
            //     'major': $('#major').val(),
            //     'work_experience': $('#work_experience').val(),
            //     'organization': $('#organization').val(),
            //     'industry': $('#industry').val(),
            //     'job_position': $('#job_position').val(),
            //     'department': $('#department').val()
            // }
            var formData = new FormData(this)
            if (!Script_checkID($("#id_card").val())) {
                return Swal.fire({
                    // position: 'top-end',
                    icon: 'error',
                    title: 'รหัสบัตรประชาชนไม่ถูกต้อง',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            $.ajax({
                type: "POST",
                url: "edit_profile_SQL.php",
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
                    } else {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'สมัครไม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
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