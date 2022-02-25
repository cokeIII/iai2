<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .wh-card {
        height: 150px !important;
    }

    /* only on non-mobile */
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    require_once "function.php";
    $sql_course = "select * from course 
        where status != 'off'";
    $res = mysqli_query($conn, $sql_course);
    ?>
    <div class="container mt-top-menu">
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner text-center">
                <?php
                $sqlSlide = "select * from pic_slide";
                $resSlide = mysqli_query($conn, $sqlSlide);
                $i = 0;
                while ($rowSlide = mysqli_fetch_array($resSlide)) {
                ?>
                    <div class="carousel-item <?php echo ($i == 0 ? "active" : ""); ?>">
                        <img class="d-block w-100" src="file_uploads/img_slide/<?php echo $rowSlide["pic_path"]; ?>" />
                    </div>
                <?php $i++;
                } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <hr>
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top text-center mb-2">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa-solid fa-circle-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>

            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <?php
                $i = 0;
                $num = mysqli_num_rows($res);
                while ($row = mysqli_fetch_array($res)) {
                    if ($i % 4 == 0) {
                ?>
                        <div class="carousel-item active">
                        <?php }
                        ?>
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top wh-card" src="file_uploads/img/<?php echo $row["pic"] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title text-truncate" data-toggle="tooltip" data-placement="top" title="<?php echo $row["course_name"]; ?>"><?php echo $row["course_name"]; ?></h4>
                                    <p class="card-text text-truncate" ><?php echo $row["detail"]; ?></p>
                                    <a href="detail_course.php?course_id=<?php echo $row["course_id"]; ?>" class="btn btn-primary">รายละเอียด</a>
                                </div>
                            </div>
                        </div>
                        <?php $i++;
                        if ($i % 4 == 0 || $i == $num) { ?>
                        </div>
                <?php }
                    } ?>
                <!--/.Second slide-->
            </div>
            <!--/.Slides-->
        </div>
        <!--/.Carousel Wrapper-->
        <hr>
        <h4><strong>ประชาสัมพันธ์</strong></h4>
        <div class="card">
            <div class="card-body shadow">
                <?php
                $sqlBull = "select * from public_relations";
                $resBull = mysqli_query($conn, $sqlBull);
                while ($rowBull = mysqli_fetch_array($resBull)) {
                ?>
                    <div class="row mt-3 border shadow">
                        <div class="col-md-4 text-center p-2">
                            <img src="file_uploads/bullhorn/<?php echo json_decode($rowBull["pic_path"])[0]; ?>" alt="" class="d-block w-100">
                        </div>
                        <div class="col-md-8 p-2">
                            <h4>
                                <strong>
                                    <a class="btnDetail" id="<?php echo $rowBull["pub_id"]; ?>" topic="<?php echo $rowBull["topic"]; ?>" detail="<?php echo $rowBull["detail"]; ?>" pic_path='<?php echo $rowBull["pic_path"]; ?>' href="#<?php echo $rowBull["pub_id"]; ?>">
                                        <?php echo $rowBull["topic"]; ?>
                                    </a>
                                </strong>
                            </h4>
                            <div class="row mt-4">
                                <i class="fa-solid fa-clock ml-3"> <?php echo $rowBull["time_stamp"]; ?></i>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
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
        $(".btnDetail").click(function() {
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

    });
</script>