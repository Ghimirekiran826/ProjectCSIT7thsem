<?php include_once('./connect.php'); ?>
<?php
if(isset($_GET['query'])){
    $query = $_GET['query'];
    $produts_q = "SELECT * from products where name like '%$query%' or tags like '%$query%' or details like '%$query%' order by rating desc";
    $products = mysqli_query($con, $produts_q);
    // print_r(mysqli_fetch_array($products)); die;
}
  
?>
<?php include_once('topbar.php') ?>

<div class="container mt-5 py-5">
    <h2>Search Results for</h2>
    <small><?php echo $_GET['query'] ?></small>
    <?php if(isset($_GET['query'])){ 
        if(mysqli_num_rows($products) > 0){?>
    <div class="d-flex justify-content-center flex-wrap">
    <?php foreach($products as $product){
      ?>
      
        <div class="col-4 text-center">
        <a href="detail.php?id=<?php echo $product['id'] ?>">
          <img src="dashboard/uploads/<?php echo $product['image'] ?>" style="height:240px; width:auto">
          <h5><?php echo $product['name'] ?></h5>
            <p><?php
                    if($product['rating'] == 0 ){
                    for($i=0;$i<5;$i++):
                    ?>
                        <i class="fa-regular fa-star text-warning"></i>
                    <?php
                    endfor;
                }
            if($product['rating']>0){
                    for($i=0;$i<intval($product['rating']);$i++):
                    ?>
                    <i class="fa-solid fa-star text-warning"></i>
                        <?php
                    endfor;
                    for($i=0;$i<(5-intval($product['rating']));$i++):
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
     }
     else {
        echo 'nothing found';
     }
    }
    else{
        echo 'no reult';
    }
    ?>
    </div>
</div>