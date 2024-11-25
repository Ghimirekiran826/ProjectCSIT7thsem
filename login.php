<?php
include_once('connect.php');
session_start(); // Start the session at the beginning

// Collect data from the form
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$cart_item = isset($_POST['cart_item']) ? $_POST['cart_item'] : '';

// Define delimiters for cart items
$delimiters = ['|', '[', ',', ']', ' '];
$new_item = str_replace($delimiters, $delimiters[0], $cart_item);

// Function to add cart items to the database
$addCart = function ($product_id) use ($con) {
    $user_id = $_SESSION['user_id']; // Use the active user ID from the session
    $ins = "INSERT INTO carts (user_id, product_id) VALUES ('$user_id', '$product_id')";
    $insert = mysqli_query($con, $ins);

    if (!$insert) {
        // Debug cart insertion error
        echo "Failed to add cart items: " . mysqli_error($con);
        exit(); // Stop execution on error
    }
};

// Validate user credentials
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$check = mysqli_query($con, $sql);

if (!$check) {
    // Debug query error
    echo "Query failed: " . mysqli_error($con);
    exit();
}

if (mysqli_num_rows($check) == 1) {
    // User exists, fetch user data
    $user = mysqli_fetch_assoc($check);

    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_role'] = $user['type'];

    // Add cart items to the database
    foreach (explode($delimiters[0], $new_item) as $product_id) {
        $id = str_replace('"', '', $product_id);
        if (!empty($id)) {
            $addCart(intval($id));
        }
    }

    // Redirect based on user role
    if ($_SESSION['user_role'] == 0) {
        header('Location: dashboard/profile1.php');
    } else {
        header('Location: dashboard/index.php');
    }
    exit();
} else {
    // If login fails, set an error message
    $_SESSION['login_error'] = "Login failed! Please enter the correct email and password.";
    header('Location: login.html');
    exit();
}
