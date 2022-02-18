<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<style>
    .wh-card {
        width: 350px !important;
    }

    .hide-data {
        visibility: hidden;
        display: none;
    }
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    require_once "function.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_SESSION["id_card"];
    $sql = "select * from course 
    where course_id not in(
        select course_id from course_regis
        where  id_card = '$id_card'
    ) and status != 'off'";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-top-menu">
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
                            <div class="key hide-data"><?php echo $row["target"]; ?></div>
                            <div class="key hide-data"><?php echo $row["number_trainees"]; ?></div>
                            <div class="key hide-data"><?php echo $row["expenses"]; ?></div>
                            <div class="key hide-data"><?php echo $row["start_date"]; ?></div>
                            <div class="key hide-data"><?php echo $row["end_date"]; ?></div>
                            <div class="key hide-data"><?php echo $row["location"]; ?></div>
                            <div class="key hide-data"><?php echo $row["payment_details"]; ?></div>

                            <h5 class="card-title key"><?php echo $row["course_name"]; ?></h5>
                            <div class="row">
                                <a href="detail_course.php" class="btn btn-info col-md-4">รายละเอียด</a>
                                <form action="course_regis.php" method="post" class="col-md-4">
                                    <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                                    <button class="btn btn-primary" type="submit" course_id="<?php echo $row["course_id"]; ?>">ลงทะเบียน</button>
                                </form>
                            </div>

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
    });
</script>