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

    html {
        overflow: auto;
    }

    html,
    body,
    div,
    iframe {
        margin: 0px;
        padding: 0px;
        height: 100%;
        border: none;
    }

    iframe {
        display: block;
        width: 100%;
        border: none;
        overflow-y: auto;
        overflow-x: hidden;
    }

    body {
        margin: 0;
    }
</style>

<body class="bg-grays">
    <?php
    require_once "menu.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_SESSION["id_card"];
    $time_id = $_GET["time_id"];
    $sql = "select * from time_table where time_id = '$time_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div class="container mt-top-menu">
        <?php echo $row["link_video"]; ?>
    </div>
</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "log_user_SQL.php",
            data: {
                time_id: '<?php echo $time_id; ?>',
                id_card: '<?php echo $id_card; ?>',
                detail: 'ดูวิดีโอ',
            },
            success: function(result) {

            }
        });
    })
</script>