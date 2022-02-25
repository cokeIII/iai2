<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<style>
  .dropdown-menu {
    width: 300px !important;
    height: auto !important;
  }
</style>
<nav class="navbar navbar-dark navbar-expand-lg navbar-light color-primary fixed-top">
  <a class="navbar-brand" href="#">IAI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
      </li>
      <?php if (!empty($_SESSION["status"])) { ?>
        <?php if ($_SESSION["status"] == "user") { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-graduation-cap"></i> อบรม
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="list_train.php"> <i class="fa-solid fa-clipboard-list"></i> รายการอบรม</a>
              <a class="dropdown-item" href="list_train_regis.php"> <i class="fa-solid fa-clipboard-list"></i> รายการที่ลงทะเบียน</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receipt.php"><i class="fa-solid fa-receipt"></i> รับใบเสร็จ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cer_form.php"><i class="fa-solid fa-certificate"></i> รับใบวุฒิบัตร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bank.php"><i class="fa-solid fa-money-check-dollar"></i> แจ้งการชำระเงิน</a>
          </li>
        <?php } else if ($_SESSION["status"] == "registrar") { ?>

        <?php } else if ($_SESSION["status"] == "lecturer") { ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="course_table_lec.php">
              <i class="fa-solid fa-table"></i> จัดการตารางอบรม
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="all_course_lec.php">
              <i class="fa-solid fa-user-check"></i> ตรวจสอบการเข้าอบรม
            </a>
          </li>
        <?php } else if ($_SESSION["status"] == "admin") { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-graduation-cap"></i> อบรม
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="list_train_admin.php"> <i class="fa-solid fa-clipboard-list"></i> รายการอบรม</a>
              <a class="dropdown-item" href="list_train_regis_admin.php"> <i class="fa-solid fa-clipboard-list"></i> รายการที่ลงทะเบียน</a>
              <a class="dropdown-item" href="course_table.php"> <i class="fa-solid fa-table"></i> จัดการตารางอบรม</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="all_course.php">
              <i class="fa-solid fa-user-check"></i> การเข้าอบรม
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_course_cer.php"><i class="fa-solid fa-certificate"></i> ตั้งค่าใบวุฒิบัตร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bullhorn.php"><i class="fa-solid fa-bullhorn"></i> ประชาสัมพันธ์</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-user-group"></i> เจ้าหน้าที่ & ผู้ใช้
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="list_user.php"> <i class="fa-solid fa-user"></i> ผู้ใช้งาน</a>
              <a class="dropdown-item" href="registrar.php"> <i class="fa-solid fa-user"></i> เจ้าหน้าที่ทะเบียน</a>
              <a class="dropdown-item" href="lecturer.php"> <i class="fa-solid fa-user"></i> วิทยากร</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receipt_admin.php"><i class="fa-solid fa-receipt"></i> ใบเสร็จ</a>
          </li>
        <?php } ?>
      <?php } ?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if (empty($_SESSION["status"])) { ?>
        <a href="regis_form.php"><button class="btn bg-light my-2 my-sm-0" type="button">สมัคร</button></a>
        <a href="login_form.php"><button class="btn bg-orange my-2 my-sm-0 ml-3" type="button">เข้าสู่ระบบ</button></a>
      <?php } else { ?>
        <?php
        if ($_SESSION["status"] == "admin" || $_SESSION["status"] == "user") {
          echo '<a href="profile.php">' . $_SESSION["username"] . '</a>';
        } else if ($_SESSION["status"] == "lecturer") {
          echo '<a href="lecturer_form_edit.php?id_card=' . $_SESSION["id_card"] . '">' . $_SESSION["username"] . '</a>';
        }
        ?>
        <?php
        $sumNoti = 0;
        $id_card = $_SESSION["id_card"];
        $sqlNoti = "select * from log_alert where status = 'u'";
        $status_user = $_SESSION["status"];
        if ($status_user == "registrar") {
          $sqlNoti = "select * from log_alert where status = 'r'";
        } else if ($status_user == "lecturer") {
          $sqlNoti = "select * from log_alert where status = 'l' and id_card = '$id_card'";
        } else if ($status_user == "admin") {
          $sqlNoti = "select * from log_alert where status = 'r'";
        }
        require_once "connect.php";
        require_once "function.php";

        $resNoti = mysqli_query($conn, $sqlNoti);

        ?>
        <ul class="navbar-nav mr-auto">

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge count-alert"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
              <span class="dropdown-item dropdown-header"><?php echo $sumNoti; ?> การแจ้งเตือน</span>
              <div class="dropdown-divider"></div>
              <?php
              $noRead = 0;
              $arrRead = array();
              while ($rowNoti = mysqli_fetch_array($resNoti)) {
                $arrRead = explode(",", $rowNoti["status_read"]);

                if (!in_array($id_card, $arrRead)) {
                  $noRead++;
                  if ($noRead <= 8) {
                    if ($status_user == "admin" || $status_user == "registrar") {
              ?>
                      <a status="<?php echo $rowNoti["status"]; ?>" id_card="<?php echo $rowNoti["id_card"]; ?>" id="<?php echo $rowNoti["log_id"]; ?>" href="#<?php echo $rowNoti["log_id"]; ?>" class="dropdown-item read">
                        <i class="fas fa-envelope mr-2"></i> <?php echo getNameUser($rowNoti["id_card"]) . "<br>" . $rowNoti["detail"]; ?>
                        <span class="float-right text-muted text-sm"><?php echo $rowNoti["time_stamp"]; ?></span>
                      </a>
                      <div class="dropdown-divider mt-4"></div>
                    <?php } else if ($status_user == "lecturer") { ?>
                      <a status="<?php echo $rowNoti["status"]; ?>" course_name="<?php echo getNameCourse($rowNoti["course_id"]); ?>" id_card="<?php echo $rowNoti["id_card"]; ?>" course_id="<?php echo $rowNoti["course_id"]; ?>" id="<?php echo $rowNoti["log_id"]; ?>" href="#<?php echo $rowNoti["log_id"]; ?>" class="dropdown-item read">
                        <i class="fas fa-envelope mr-2"></i> <?php echo getNameCourse($rowNoti["course_id"]) . "<br>" . $rowNoti["detail"]; ?>
                        <span class="float-right text-muted text-sm"><?php echo $rowNoti["time_stamp"]; ?></span>
                      </a>
                      <div class="dropdown-divider mt-4"></div>
              <?php }
                  }
                }
              }
              ?>
              <div class="dropdown-divider mt-5"></div>
              <a href="log_all_list.php" class="dropdown-item dropdown-footer">ดูทั้งหมด</a>
            </div>
          </li>
        </ul>
        <a href="logout.php"><button class="btn bg-orange my-2 my-sm-0 ml-3" type="button">ออกจากระบบ</button></a>
      <?php } ?>
    </form>
  </div>
</nav>
<script>
  $(document).ready(function() {
    $(".count-alert").html('<?php echo (empty($noRead) ? "" : $noRead); ?>')
    $(".read").click(function() {
      let log_id = $(this).attr("id")
      let id_card = $(this).attr("id_card")
      let status = $(this).attr("status")
      let course_name = $(this).attr("course_name")
      let id_card_user = '<?php echo (empty($id_card) ? "" : $id_card); ?>'

      $.ajax({
        type: "POST",
        url: "log_read.php",
        data: {
          log_id: log_id,
          id_card: id_card_user,
          status: status
        },
        success: function(result) {
          console.log(status)
          if (status == "a" || status == "r") {
            $.redirect('list_user.php', {
              'id_card': id_card,
            });
          } else if (status == "l") {
            $.redirect('course_table_lec.php', {
              'course_name': course_name,
            });
          }
        }
      });
    })
  })
</script>