<?php 
include_once('../connect.php');




?>
<?php include('top.php'); ?>
<?php
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

//for parent category
$products_q = "SELECT car.*, car.id as cart_id, pro.*, pro.id as pro_id from carts car left join products pro on car.product_id = pro.id where car.user_id='$user_id' order by car.id desc ";
$product = mysqli_query($con, $products_q);
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
         
            <div class="col-md-12">
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Cart List</h3>
                </div>
                    <table class="table table-striped w-100 text-capitalize" id="dataTable">
                        <thead>
                            <tr>
                                <th>sn</th>
                                <th>name</th>
                                <th>price</th>
                                <th>image</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($product as $key => $item){
                                ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo $item['price']; ?></td>
                                        <td><img src="./uploads/<?php echo $item['image']; ?>" alt="" height="48"></td>
                                        <td>
                                       <a href="delete_cart.php?id=<?php echo $item['cart_id']; ?>" class="text-danger">Delete</a>
                                       <a href="buy_cart.php?id=<?php echo $item['pro_id'] ?>" class="text-primary">Buy now</a>
                                        </td>
                                        
                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
            <!-- /.card -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
<script>
  document.getElementById('dataTable').DataTable()
</script>
  <?php include('foot.php'); ?>