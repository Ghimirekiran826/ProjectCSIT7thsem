<?php session_start(); ?>

<?php require_once('./connect.php') ?>
<?php

if (isset($_SESSION['user_id'])) {
  $user = $_SESSION['user_id'];
  $sql = "SELECT * from users where id=$user";
  $q = mysqli_query($con, $sql);
  $user_detail = mysqli_fetch_array($q);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Thriftonic</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="shortcut icon" href="./images/Logo.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Corben:wght@400;700&family=Heebo:wght@400;500;700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/7300af8bbb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="tops.css">
  <link rel="stylesheet" href="about.css">
  <link rel="stylesheet" href="main.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
     -->
  <script src="jquery.js"></script>
  <script src="ajax.js"></script>
</head>

<body>
  <div style="position:absolute;top:4px;z-index:1111;width:100%;text-align:center;color:green">
    <?php // message for successful order placement
    echo isset($_SESSION['order_success']) ? $_SESSION['order_success'] : '';

    // session_start();
    if (isset($_SESSION['order_success'])) {
      unset($_SESSION['order_success']);
    }
    ?>

  </div>

  <!-- navbar -->
  <header class="header">
    <nav class="navbar navbar-expand-lg header-nav fixed-top border-bottom">
      <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class=" justify-content-between d-flex w-100">
            <span>
              <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="navbar-brand p-2" href="./"><img src="./images/Logo.png" class="p-2"></a>
                  <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> -->
                  </button>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cat.php?id=1">Categories</a>
                </li>
                <!-- <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
              </li> -->
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">Cart</a>
              </li> -->
              </ul>
            </span>
            <span class="d-flex align-items-center">
              <form method="get" action="result.php" class="mx-1" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                  name="query">
              </form>
              <span class="position-relative mx-3">
                <?php
                if (isset($_SESSION['user_id']) && !!$_SESSION['user_id']) {
                ?>
                  <a href="./dashboard/cart.php"><i
                      class="fa-solid fa-cart-shopping fs-3 text-green"></i></a>
                <?php
                } else {
                ?>
                  <i class="fa-solid fa-cart-shopping fs-3 text-green"></i>
                <?php
                }
                ?>
                <!-- <span class="badge bg-danger position-absolute rounded-pill" style="top:-20%;left:50%" id="count_cart"> -->
                <span class="badge bg-danger position-absolute rounded-pill" style="top:-20%;left:50%">
                  <span id="cart_counts">
                    <?php
                    $cart_item = 0;
                    if (!empty($_SESSION['user_id'])) {
                      $user = $_SESSION['user_id'];
                      $cart_sql = "SELECT count(*) as total_cart from carts where user_id='$user'";
                      $cart_q = mysqli_query($con, $cart_sql);
                      $cart_item =  mysqli_fetch_row($cart_q)[0];
                    }
                    ?>
                    <?php echo $cart_item; ?>
                  </span>
                </span>

                <!-- </span> -->
              </span>
              <?php
              if (empty($_SESSION['user_id'])) {
              ?>
                <a href="login.html">
                  <button class="btn btn-outline-success" type="button">Login</button>
                </a>
              <?php
              } else {
              ?>
                <div class="dropdown">
                  <span class="" data-bs-toggle="dropdown" data-target="#profile">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                      if (!!$user_detail['avatar']) {
                    ?>
                        <img src="<?php echo './dashboard/uploads/' . $user_detail['avatar'] ?>" alt=""
                          class="mx-2"
                          style="height:40px;width:40px;border-radius:50%;border:3px solid white; outline:3px solid silver">
                      <?php
                      } else {
                      ?>
                        <img src="./images/profile.svg" alt="" class="mx-2" style="height:40px">
                      <?php
                      }
                    } else {

                      ?>
                      <img src="./images/profile.svg" alt="" class="mx-2" style="height:40px">
                    <?php } ?>
                  </span>
                  <span id="profile" class="dropdown-menu p-2">
                    <a href="logout.php">Log Out </a> <br>
                    <a
                      href="<?php echo ($user_detail['type'] == 0) ? './dashboard/profile1.php' : './dashboard' ?>">Dashboard</a>
                  </span>
                </div>

              <?php
              }
              ?>
            </span>
          </div>
        </div>
      </div>
    </nav>
  </header>