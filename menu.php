<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light color-primary fixed-top">
  <a class="navbar-brand" href="#">IAI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Home <span class="sr-only">(current)</span></a>
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
        <?php } else if ($_SESSION["status"] == "registrar") { ?>

        <?php } else if ($_SESSION["status"] == "lecturer") { ?>

        <?php } else if ($_SESSION["status"] == "admin") { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-graduation-cap"></i> อบรม
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="list_train_admin.php"> <i class="fa-solid fa-clipboard-list"></i> รายการอบรม</a>
              <a class="dropdown-item" href="list_train_regis_admin.php"> <i class="fa-solid fa-clipboard-list"></i> รายการที่ลงทะเบียน</a>
            </div>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if (empty($_SESSION["status"])) { ?>
        <a href="regis_form.php"><button class="btn bg-light my-2 my-sm-0" type="button">สมัคร</button></a>
        <a href="login_form.php"><button class="btn bg-orange my-2 my-sm-0 ml-3" type="button">เข้าสู่ระบบ</button></a>
      <?php } else { ?>
        <?php echo '<a href="profile.php">' . $_SESSION["username"] . '</a>' ?>
        <a href="logout.php"><button class="btn bg-orange my-2 my-sm-0 ml-3" type="button">ออกจากระบบ</button></a>
      <?php } ?>
    </form>
  </div>
</nav>