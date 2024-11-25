<?php
 // hidden page for order confirmation
 include_once('connect.php');
 session_start();
 $user_id =  $_SESSION['user_id'];
 $order_id = $_SESSION['order_id'];

 $amount = $_POST['price'];
 $address = $_POST['address'];
 $payment_type = $_POST['payment_type'];
 $days = isset($_POST['days']) ? $_POST['days'] : 0;
 


 $sql = "INSERT into shippings(address) values('$address') ";
 $insert_shipping = mysqli_query($con, $sql);

 if($insert_shipping){
    $shipping_id = mysqli_insert_id($con);

    $sql1 = "INSERT into payments(user_id, type, price) values('$user_id', '$payment_type', $amount) ";
    $insert_payment = mysqli_query($con, $sql1);
    $payment_id = mysqli_insert_id($con);


    if(!$insert_payment){
        echo 'failed';
    }
    else{
        // update order
        $sql3 = "UPDATE orders set payment_id ='$payment_id', shipping_id='$shipping_id', price = '$amount', days='$days' where id='$order_id' ";
        $update_payment = mysqli_query($con, $sql3);

        //check order type
        $ord_info_q = "SELECT * from orders where id='$order_id'";
        $ord_info = mysqli_query($con, $ord_info_q);
        // echo mysqli_fetch_array($ord_info)['product_id']; die;

        if($update_payment){

            // update product for rent or buy items
            $row = mysqli_fetch_array($ord_info);
            $row_product_id=$row['product_id'];
                $update_product_q = "UPDATE products set status=0 where id='$row_product_id'";
                $update_product = mysqli_query($con, $update_product_q);
    
                if(!$update_product_q){
                    echo 'failed to update';
                }
            
           
            $_SESSION['order_success'] = "Your ordered has been placed successfully!";
            header('location: index.php');
        }
    }
 } // close shipping
 else{
    echo 'failed shipping'.mysqli_error($con);
 }

?>