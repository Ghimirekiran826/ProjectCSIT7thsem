<?php
include_once('./connect.php');

//for parent category
$category_q = "SELECT * from categories where parent_id=0";
$categories = mysqli_query($con, $category_q);

function categoryProduct($id, $con)
{
  $produts_q = "SELECT * from products where category_id='$id' and status=1 order by id asc limit 3";
  $products = mysqli_query($con, $produts_q);
  while ($pro = mysqli_fetch_array($products)) {
?>
    <div class="d-flex cat_products">
      <a href="detail.php?id=<?php echo $pro['id'] ?>">
        <img src="dashboard/uploads/<?php echo $pro['image'] ?>" alt="" style="height:200px; width:auto">
        <span class="text-center">
          <h5><?php echo $pro['name'] ?></h5>
          <p>
            <?php
            if ($pro['rating'] == 0) {
              for ($i = 0; $i < 5; $i++):
            ?>
                <i class="fa-regular fa-star text-warning"></i>
              <?php
              endfor;
            }
            if ($pro['rating'] > 0) {
              for ($i = 0; $i < intval($pro['rating']); $i++):
              ?>
                <i class="fa-solid fa-star text-warning"></i>
              <?php
              endfor;
              for ($i = 0; $i < (5 - intval($pro['rating'])); $i++):
              ?>
                <i class="fa-regular fa-star text-warning"></i>
            <?php
              endfor;
            }
            ?>
          </p>
          <p>Rs.<?php echo $pro['price'] ?></p>
        </span>
      </a>
    </div>
  <?php
  }
  ?>
  <div class="d-flex cat_products align-items-center">
    <a href="cat.php?id=<?php echo $id ?>">
      <span class="text-center fs-5">
        View All <i class="fa-solid fa-angles-right text-green"></i>
      </span>
    </a>
  </div>
<?php

}


// recent products
$produts_q = "SELECT * from products where status=1 order by rand() limit 8";
$products = mysqli_query($con, $produts_q);


?>
<?php include_once('topbar.php') ?>
<link rel="stylesheet" href="main.css">

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade mt-5 " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
      aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
      aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/banner/1.jpg" class="d-block w-100" style="width:100%; height: 640px;" alt="banner1">
      <div class="carousel-caption d-none d-md-block" style="top:10%;left:50%">
        <h2>Buy or Rent Fashion!</h2>
        <p>We are pleased to announce that we offer both the buying and renting items to make your day looks
          elegant</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/banner/2.jpg" class="d-block w-100" style="width:100%; height: 640px;" alt="banner2">
      <div class="carousel-caption d-none d-md-block text-dark" style="top:40%;left:-30%">
        <h2>Cover up with beauty</h2>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/banner/3.jpg" class="d-block w-100" style="width:100%; height: 640px;" alt="banner3">
      <div class="carousel-caption d-none d-md-block text-green">
        <h2>Winter Jackets</h2>
        <p>Get the fluffiest jacket this Winter</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<!-- Category Section -->
<section id="Collection mt-5" class=" bg-light">
  <div class="card-title mt-5">
    <h1>Our Collections</h1>
  </div>

  <div class="row d-flex">
    <ul class="nav nav-pills mb-3 justify-content-center gap-2" id="pills-tab" role="tablist">
      <?php
      foreach ($categories as $key => $cat) {
      ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?php echo ($key == 0) ? 'active' : '' ?> text-capitalize" id="pills-home-tab"
            data-bs-toggle="pill" data-bs-target="#pills-<?php echo $cat['id']; ?>" type="button" role="tab"
            aria-controls="pills-home" aria-selected="true"><?php echo $cat['name']; ?></button>
        </li>
      <?php
      }
      ?>
    </ul>
    <div class="tab-content " id="pills-tabContent">
      <?php
      foreach ($categories as $key => $cat) {
      ?>
        <div class="tab-pane fade show <?php echo ($key == 0) ? 'active' : '' ?>" id="pills-<?php echo $cat['id']; ?>"
          role="tabpanel" aria-labelledby="pills-<?php echo $cat['id']; ?>-tab" tabindex="0">
          <div class="d-flex justify-content-center gap-5">
            <?php categoryProduct($cat['id'], $con) ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Recommended Products -->
<?php
// if(User+_logged_in){
//   recommended table query
// }else{

//   $product_ids_string = $_COOKIE['product_ids'];
//   $product_ids = explode(',', $product_ids_string);
// }

if (isset($_COOKIE['product_ids'])) {
  $product_ids_string = $_COOKIE['product_ids'];
  $product_ids = explode(',', $product_ids_string);
  $sql_recom = "SELECT * FROM products WHERE category_id IN ($product_ids_string) and status=1 ORDER BY RAND() LIMIT 4";
} else {
  $sql_recom = "SELECT * FROM products where status=1 ORDER BY RAND() LIMIT 4";
}


$products_recom = mysqli_query($con, $sql_recom);

// print_r($products);


?>

<div class="card-title mt-5">
  <h1>For You</h1>
</div>
<div class="row mx-2 d-flex justify-content-center">
  <?php foreach ($products_recom as $index => $product) {
  ?>

    <div class="col-4 text-center">
      <a href="detail.php?id=<?php echo $product['id'] ?>">
        <img src="dashboard/uploads/<?php echo $product['image'] ?>" style="height:360px; width:auto">
        <h5><?php echo $product['name'] ?></h5>
        <p><?php
            if ($product['rating'] == 0) {
              for ($i = 0; $i < 5; $i++):
            ?>
              <i class="fa-regular fa-star text-warning"></i>
            <?php
              endfor;
            }
            if ($product['rating'] > 0) {
              for ($i = 0; $i < intval($product['rating']); $i++):
            ?>
              <i class="fa-solid fa-star text-warning"></i>
            <?php
              endfor;
              for ($i = 0; $i < (5 - intval($product['rating'])); $i++):
            ?>
              <i class="fa-regular fa-star text-warning"></i>
          <?php
              endfor;
            }
          ?>
        </p>
        <p>Rs.<?php echo $product['price'] ?></p>
      </a>

    </div>
  <?php
    if ($index == 3) break;
  }
  ?>
</div>

<!-- Latest Products -->
<div class="card-title mt-5">
  <h1>Latest Products</h1>
</div>
<div class="row mx-2 d-flex justify-content-center">
  <?php foreach ($products as $product) {
  ?>

    <div class="col-4 text-center">
      <a href="detail.php?id=<?php echo $product['id'] ?>">
        <img src="dashboard/uploads/<?php echo $product['image'] ?>" style="height:360px; width:auto">
        <h5><?php echo $product['name'] ?></h5>
        <p><?php
            if ($product['rating'] == 0) {
              for ($i = 0; $i < 5; $i++):
            ?>
              <i class="fa-regular fa-star text-warning"></i>
            <?php
              endfor;
            }
            if ($product['rating'] > 0) {
              for ($i = 0; $i < intval($product['rating']); $i++):
            ?>
              <i class="fa-solid fa-star text-warning"></i>
            <?php
              endfor;
              for ($i = 0; $i < (5 - intval($product['rating'])); $i++):
            ?>
              <i class="fa-regular fa-star text-warning"></i>
          <?php
              endfor;
            }
          ?>
        </p>
        <p>Rs.<?php echo $product['price'] ?></p>
      </a>

    </div>
  <?php
  }
  ?>
</div>
<?php include_once('foot.php') ?>