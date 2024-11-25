<?php
include_once('../connect.php');
$product_id = $_GET['id'];
$ord_id = $_GET['ord_id'];
$update_product_q = "UPDATE products set status=1 where id='$product_id'";
$update_product = mysqli_query($con, $update_product_q);

$today =  date('Y-m-d');
// echo $today; die;

//product is returned today
$orders = "UPDATE orders set return_date = '$today' where id='$ord_id'";
$update_order = mysqli_query($con, $orders);


if(!$update_product_q){
    echo 'failed to update';
}

if(!$update_order){
    echo 'failed to update';
}

header('location: rent.php');

?>