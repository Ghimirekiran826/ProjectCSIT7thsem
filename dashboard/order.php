<?php
include_once('../connect.php');
include('top.php');
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

//for all categories
switch($user_role){
    case 'admin':
        $sql = "SELECT pro.*, ord.*, user.name as buyer, ship.address as shipping
        from orders ord 
        left join products pro on ord.product_id=pro.id
        left join users user on ord.user_id=user.id
        left join shippings ship on ord.shipping_id=ship.id
        where ord.type='buy'";
        break;
    case 'seller':
        $sql = "SELECT pro.*, ord.*, user.name as buyer, ship.address as shipping
        from orders ord 
        left join products pro on ord.product_id=pro.id
        left join users user on ord.user_id=user.id
        left join shippings ship on ord.shipping_id=ship.id
        where ord.type='buy' and pro.user_id='$user_id'";
        break;
    default: 
        $sql = "SELECT pro.*, ord.*, user.name as seller, ship.address as shipping
        from orders ord 
        left join products pro on ord.product_id=pro.id
        left join users user on ord.user_id=user.id
        left join shippings ship on ord.shipping_id=ship.id
        where ord.type='buy' and ord.user_id='$user_id'";
}

    // $order_q = "SELECT pro.*, usr.*, ord.date as order_date, pro.name as product, usr.name as user from orders ord left join users usr on ord.user_id = usr.id  left join products pro on ord.product_id = pro.id where  $where order by ord.id desc";
   
    $orders = mysqli_query($con, $sql);
 

 ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
                <div class="">
                    <h3 class="bg-success text-light w-100 p-2">Orders</h3>
                </div>
                    <table class="table table-striped w-100 ">
                        <thead>
                            <tr class="text-capitalize">
                                <th>date</th>
                                <th>user</th>
                                <th>product</th>
                                <th>seller</th>
                                <th>address</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($items=mysqli_fetch_array($orders)){
                               
                                ?>
                                    <tr class="">
                                        <td><?php echo $items["date"]; ?></td>
                                        <td><?php echo (isset($items['buyer'])) ? $items['buyer'] : 'self' ?></td>
                                        <td><?php echo $items['name']; ?></td>
                                        <td><?php echo (isset($items['seller'])) ? $items['seller'] : 'self' ?></td>
                                        <td><?php echo $items['shipping']; ?></td>
                                        <td><?php echo $items['price']; ?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                            <tr class="text-right"><td colspan="5"> <a href="">View All</a></td></tr>
                        </tbody>
                    </table>
            </div>
            <!-- /.card -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

  <?php include('foot.php'); ?>