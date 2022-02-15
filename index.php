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
    <?php require_once "menu.php"; ?>
    <div class="container mt-top-menu">
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <img class=" " src="img/slide1.jpg" alt="First slide" height="300" width="auto">
                </div>
                <div class="carousel-item">
                    <img class=" " src="img/slide2.jpg" alt="Second slide" height="300" width="auto">
                </div>
                <div class="carousel-item">
                    <img class=" " src="img/slide3.jpg" alt="Third slide" height="300" width="auto">
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
        <div class="slider regular demo ">
            <div class="card wh-card">
                <img class="card-img-top" src="img/t1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">รายการอบรม 1</h5>
                    <a href="#" class="btn btn-primary">รายละเอียด</a>
                </div>
            </div>
            <div class="card wh-card">
                <img class="card-img-top" src="img/t1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">รายการอบรม 2</h5>
                    <a href="#" class="btn btn-primary">รายละเอียด</a>
                </div>
            </div>
            <div class="card wh-card">
                <img class="card-img-top" src="img/t1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">รายการอบรม 3</h5>
                    <a href="#" class="btn btn-primary">รายละเอียด</a>
                </div>
            </div>
            <div class="card wh-card">
                <img class="card-img-top" src="img/t1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">รายการอบรม 4</h5>
                    <a href="#" class="btn btn-primary">รายละเอียด</a>
                </div>
            </div>
        </div>
        <hr>
        <h4><strong>ประชาสัมพันธ์</strong></h4>
        <div class="card">
            <div class="card-body shadow">
                <div class="row mt-3 border shadow">
                    <div class="col-md-4 text-center p-2">
                        <img src="img/p1.JPG" alt="" width="360" height="230" class="rounded">
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
        $('.demo').slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            variableWidth: false,

        });
    });
</script>