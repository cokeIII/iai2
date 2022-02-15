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
    $sql = "select * from course";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
        <a href="add_train.php"><button class="btn btn-primary mb-3">เพิ่มรายการ</button></a>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <input type="search" class="form-control rounded mt-2" placeholder="Search" aria-label="Search" id="cardsearchinput" />
                </div>
            </div>
        </div>
        <div id="carddata">
            <div class="row">
                <?php while ($row = mysqli_fetch_array($res)) { ?>
                    <div class="card wh-card col-md-3.5 m-1 card-data">
                        <img class="card-img-top" src="file_uploads/img/<?php echo $row["pic"] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title key"><?php echo $row["course_name"]; ?></h5>
                            <a href="#" class="btn btn-primary">รายละเอียด</a>
                            <a href="edit_train.php?course_id=<?php echo $row["course_id"]; ?>" class="btn btn-warning">แก้ไข</a>
                            <button type="button" course_id="<?php echo $row["course_id"]; ?>" class="btn btn-danger btnDelCourse">ลบ</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $("#carddata").searcher({
            itemSelector: ".card-data",
            textSelector: ".key",
            inputSelector: "#cardsearchinput",
            toggle: function(item, containsText) {
                // use a typically jQuery effect instead of simply showing/hiding the item element
                if (containsText)
                    $(item).fadeIn();
                else
                    $(item).fadeOut();
            }
        });
        $(".btnDelCourse").click(function() {
            let course_id = $(this).attr("course_id")
            Swal.fire({
                title: 'ต้องการลบรายการใช่หรือไม่ ?',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('del_train.php', {
                        'course_id': course_id
                    });
                }
            })
        })
    });
</script>