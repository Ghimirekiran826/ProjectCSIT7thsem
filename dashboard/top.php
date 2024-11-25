<?php session_start(); ?>
<?php


ob_start();
  require_once('../connect.php');
  // check authentication
  if(!isset($_SESSION['user_id'])){
    header('location: ../index.php');
  }
?>
<?php
 $user_id = $_SESSION['user_id'];
  $sql="SELECT * from users where id=$user_id";
  $user_q = mysqli_query($con, $sql);
  $user = mysqli_fetch_array($user_q);
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thrift Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/datatable.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="./dist/css/style.css">
  <script src="https://kit.fontawesome.com/7300af8bbb.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="index.php" class="nav-link">Dashboard</a> -->
        <a href="<?php echo ($_SESSION['user_role'] == 0) ? 'profile1.php' : 'index.php' ?>" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home Page</a>
      </li>
    </ul>
 <!-- Small boxes (Stat box) -->
 <!-- /.navbar -->
 
   
  </nav>
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-light">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-light">
      <span style="display:flex;justify-content:space-around;align-items:center">
      <img src="../images/Logo.png" height="48" alt="AdminLTE Logo" class="" style="opacity: .8">
      <span class="brand-text font-weight-light text-capitalize">
        <?php echo ($user['type']==0) ? 'user' : $user['type']; ?>
        <br>
        
      </span>
      </span>
    </a>
    <p style="text-align:center;text-transform:capitalize"><b>
        <?php
          echo $user['name'];
        ?>
        </b></p>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize"> <?php echo $user['name']; ?>e</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control bg-light form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar bg-green">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php 
              if($user['type'] == 'seller' || $user['type'] == 'admin'):
            ?>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                <i class="fa-solid fa-cookie-bite mx-2"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order.php" class="nav-link">
                
                  <p> <i class="fa-solid fa-folder-plus mx-2"></i> Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rent.php" class="nav-link">
                <i class="fa-solid fa-retweet mx-2"></i>
                  <p>Rents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sales.php" class="nav-link">
                <i class="fa-solid fa-hand-holding-dollar mx-2"></i>
                  <p>Sales</p>
                </a>
              </li>
              <?php endif; ?>
            <?php 
              if($user['type'] == 'admin'):
            ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Settings
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                <i class="fa-solid fa-list-check mx-2"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php
            if($user['type'] == '0'):
              ?>
              <li class="nav-item">
                <a href="profile1.php" class="nav-link">
                
                  <p> <i class="fas fa-user-circle mx-2"></i> My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order.php" class="nav-link">
                
                  <p> <i class="fa-solid fa-folder-plus mx-2"></i> Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rent.php" class="nav-link">
                <i class="fa-solid fa-retweet mx-2"></i>
                  <p>Rents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cart.php" class="nav-link">
                <i class="fa-solid fa-cart-shopping mx-2"></i>
                  <p>Carts</p>
                </a>
              </li>
             
              <?php
            endif;
          ?>
           <li class="nav-item bg-success">
                <a href="../logout.php" class="nav-link">
                <i class="fa-solid fa-right-from-bracket mx-2"></i>
                  <p>Logout</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-success">Welcome!</h1>
            
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
        <?php
            if(($_SESSION['user_role'] == 0)){
              $today =  date('Y-m-d');
              $expired = 0;
              $check_rent_items_q = "SELECT * from orders where type='rent' and user_id='$user_id' and days > 0 and return_date is NULL";
              $check_rent_items = mysqli_query($con, $check_rent_items_q);
              while($rents =mysqli_fetch_array($check_rent_items)){
                if($rents>0){
                  // echo $rents['days'];
                  $exp_date = date_add(date_create($rents['date']), date_interval_create_from_date_string($rents['days']." days"));
                  // echo date_format($exp_date, 'Y-m-d');
                  if($today > date_format($exp_date, 'Y-m-d')){
                    $expired = 1;
                    // return ;
                  }
                }
              };

              if($expired == 1){
                ?>
                 <div id="alert" class=" p-3 text-primary d-flex justify-content-between items-center">
                 <i class="fa-solid fa-triangle-exclamation text-warning px-2 mt-1"></i>  We request you to return the product to the company due to expiry of rented days!
                </div>
                <?php
              }
             
              ?>
               
              <?php
            }
            ?>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->