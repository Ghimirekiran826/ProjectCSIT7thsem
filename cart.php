<?php
session_start();
include_once('connect.php');

$product_id = $_POST['product_id'];
$user = $_SESSION['user_id'];
// echo $user; die;
$check_cart_q = "SELECT * from carts where user_id = $user and product_id='$product_id'";
$check_cart = mysqli_query($con, $check_cart_q);
if (mysqli_num_rows($check_cart) > 0) {
    echo "Items already added to cart!";
    return;
}

$ins = "INSERT into carts(user_id,product_id) values('$user', '$product_id')";
$insert = mysqli_query($con, $ins);

if (!$insert) {
    echo "failed" . mysqli_error($con);
} else {
    echo "Cart items added!";
}
