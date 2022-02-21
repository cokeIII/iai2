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
    ?>
    <div class="container mt-top-menu">
        <h3>รายการอบรม</h3>
        <table id="list_course" class="table table-striped">
            <thead>
                <th>ลำดับ</th>
                <th>ชื่อรายการ</th>
                <th>วันที่อบรม</th>
                <th>สถานที่</th>
                <th></th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {

        $('#list_course').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "bDestroy": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 30,
            "scrollX": true,
            "ajax": {
                "url": "ajax.php",
                "type": "POST",
                "data": function(d) {
                    d.act = "get_course"
                }
            },
            'processing': true,
            "columns": [{
                    "data": "no"
                },
                {
                    "data": "course_name"
                },
                {
                    "data": "start_end_date"
                },
                {
                    "data": "location"
                },
                {
                    "data": "btnTable"
                }
            ],
            "language": {
                'processing': '<img src="img/tenor.gif" width="80">',
                "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
                "zeroRecords": "ไม่มีข้อมูล",
                "info": "กำลังแสดงข้อมูล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "search": "ค้นหา:",
                "infoEmpty": "ไม่มีข้อมูลแสดง",
                "infoFiltered": "(ค้นหาจาก _MAX_ total records)",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "หน้าต่อไป",
                    "previous": "หน้าก่อน"
                }
            }
        });

    });
</script>