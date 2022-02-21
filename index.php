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
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/download.svg" alt="Third slide">
                </div>
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
                                    <h4 class="card-title text-truncate"><?php echo $row["course_name"]; ?></h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                        card's content.</p>
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
                <div class="row mt-3 border shadow">
                    <div class="col-md-4 text-center p-2">
                        <img src="img/p1.JPG" alt="" class="d-block w-100">
                    </div>
                    <div class="col-md-8 p-2">
                        <h4>
                            <strong>
                                <a href="#">
                                    รมว.สุชาติ มอบกรมพัฒนาฝีมือแรงงาน จับมือเครือข่ายเทรนช่างแอร์แก้โลกร้อน
                                </a>
                            </strong>
                        </h4>
                        <div class="row mt-4">
                            <i class="fa-solid fa-clock ml-3"> 12 ก.พ. 2565</i>
                        </div>
                    </div>
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

    });
</script>