<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "setHead.php";
    require_once "function.php";

    ?>
    <!-- Providers & Plugins Here -->
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
    $course_id = $_GET["course_id"];
    $sql = "select * from time_table where course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div class="container mt-top-menu">
        <!-- HTML5 Video -->
        <div class="card mt-5">
            <div class="card-body">
                <?php echo $row["link_video"];?>
            </div>
        </div>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
</script>