<?php include_once('connect.php'); ?>
<?php include_once('topbar.php'); ?>
<?php
  $cat_id = $_GET['id'];
  $sql = "SELECT * from products where category_id='$cat_id' and status=1 order by id desc limit 8";
  $pro_q = mysqli_query($con, $sql);
  
  $cat = "SELECT * from categories where parent_id=0";
  $cat_q = mysqli_query($con, $cat);

?>

    <!--Breadcrumbs-->
    <section class="breadcrumb breadcrumb-bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="crumb-inner">
                      <div class="crumb-text">
                          <p>Home /  Category /</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

     <!---Side bar-->
     <section class="category mt-5">
      <div class="container">
          <div class="row m">
              <div class="col-lg-3">
                  <div>
                      <aside class="side-area product-side side-shadow mt-5">
                          <div class="side-title">
                              <h3>Categories</h3>

                          </div>
                          <div class="side-content">
                          <ul class="list m-0 p-0">                         
                            <?php
                              while($category = mysqli_fetch_array($cat_q)){
                                ?>
                                  <li class="text-capitalize  p-2">
                                    <a href="cat.php?id=<?php echo $category['id']; ?>&cat=<?php echo $category['name']; ?>">
                                    <i class="fa-solid fa-angle-right mx-2"></i>
                                      <?php echo $category['name']; ?>
                                    </a>
                                  </li>
                                <?php
                              }
                            ?>
                            <!-- <li><a href="">Bottoms</a></li>
                            <li><a href="">Formals</a></li>
                            <li><a href="">Traditionals</a></li>
                            <li><a href="">Shoes</a></li>
                            <li><a href="">Accessories</a></li> -->
                          </ul>
                            
                          </div>
                      </aside>
                  </div>
              </div>
              <div class="col-lg-9">
                  <div class="row mt-5">
                      <div class="col-lg-12">
                          <div class="product-top d-flex justify-content-between align-items-center">
                              <div class="product-sec product-item">
                                  <!-- <h2 class="my-5"><?php echo $_GET['cat'] ?></h2> -->
                              </div>
                          </div>
                      </div>
                      <?php while($product = mysqli_fetch_array($pro_q)){
                  ?>
         <div class="col-lg-4 col-sm-6 mb-2">
                 
                     <!------>
                 <a href="detail.php?id=<?php echo $product['id'] ?>">
                 <div class="product-des text-center">
                      <h5> <?php echo $product['name'] ?></h5>
                      <img src="./dashboard/uploads/<?php echo $product['image'] ?>" alt="" height="120">
                      <p>Rs <?php echo $product['price']; ?></p>
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
                  </div>
                 </a>
                  </div>
                          
                  <?php
                 }
                 ?>
                      </div>
                     
                                                  </div>
                                          <!----->
                      <div class="col-lg-12 text-center">
                          <a href=""class="product-btn">More Items</a>
                      </div> 
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--End of Sidebar-->
  
  
      
  
   
  <!-- Footer -->
<?php include_once('foot.php') ?>