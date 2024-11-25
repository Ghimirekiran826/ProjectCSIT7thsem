<?php
include_once('./connect.php');

?>
<?php include_once('topbar.php') ?>
<link rel="stylesheet" href="main.css">


<div class="card-title mt-5">
    <h1>Your Cart List</h1>
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
    <h1>Recommended Products</h1>
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