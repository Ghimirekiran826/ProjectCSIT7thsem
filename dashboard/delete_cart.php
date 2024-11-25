<?php session_start(); ?>
<?php include_once('../connect.php'); ?>
<?php
    $cart_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE from carts where id='$cart_id'";
    $insert = mysqli_query($con, $sql);

    if(!$insert){
        echo 'error'.mysqli_error($con);
    }
    else{
        header('location: cart.php');
    }
?>