<?php
include_once('connect.php');

// Get user input
$comments = $_POST['user_comment'];
$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];

// Load dataset from CSV file
$filename = 'dataset.csv';
$data = [];
if (($handle = fopen($filename, 'r')) !== false) {
    while (($row = fgetcsv($handle)) !== false) {
        $data[] = $row;
    }
    fclose($handle);
} else {
    die('Cannot open the file ' . $filename);
}

// Collect positive and negative words from the dataset
$positive = [];
$negative = [];
foreach ($data as $row) {
    $positive[] = strtolower($row[0]); // [good, nice, wonderful,.....]
    $negative[] = strtolower($row[1]);
}

// Count positive and negative words in user comments
$comment_words = explode(' ', $comments);  // this is nice dress; [this, is, nice, wonderful, bad, dress]
$pos_count = 0;
$neg_count = 0;
foreach ($comment_words as $word) {
    if (in_array(strtolower($word), $positive)) {
        $pos_count++;
    }
    if (in_array(strtolower($word), $negative)) {
        $neg_count++;
    }
}
if ($pos_count > $neg_count) {
    $comment_type = "positive";
} else if ($pos_count == $neg_count) {
    $comment_type = "neutral";
} else {
    $comment_type = "negative";
}

// Insert user comment into the database
$sql = "INSERT INTO reviews (id, comments, user_id, product_id, comment_type) VALUES ('', '$comments', $user_id, $product_id, '$comment_type')";
$ins = mysqli_query($con, $sql);

if ($ins) {
    // Fetch all comments for the particular product
    $sql = "SELECT comments FROM reviews WHERE  product_id='$product_id'";
    $comment_q = mysqli_query($con, $sql);

    // Collect all comments and calculate total words
    $total_words = 0;
    $all_comments = [];
    while ($row = mysqli_fetch_array($comment_q)) {
        $comment = $row['comments'];
        $all_comments[] = $comment;
        // $total_words += count(explode(' ', $comment));
    }

    // Count positive and negative words in all comments
    $pos_count_new = 0;
    $neg_count_new = 0;
    foreach ($all_comments as $comment) {
        $comment_words = explode(' ', $comment);
        foreach ($comment_words as $word) {
            if (in_array(strtolower($word), $positive)) {
                $pos_count_new++;
            }
            if (in_array(strtolower($word), $negative)) {
                $neg_count_new++;
            }
        }
    }
    // Naive Bayes Part Needs to be reviews updated on December 2023
    // total words for the sentimental analysis
    $words = $pos_count_new + $neg_count_new;
    // Calculate probabilities
    $pos_probability = ($pos_count_new / $words);
    $neg_probability = ($neg_count_new / $words);

    //naive baye's probability formula
    $pos_naive = $pos_probability * $pos_count_new ;
    $neg_naive = $neg_probability * $neg_count_new ;
    $difference_in_probability = ($pos_naive - $neg_naive) / $words;

    // Calculate rating value using probability formula
    $rating_value = abs($difference_in_probability * 5); 

    // echo $rating_value; die;

    // Limit the rating to a maximum of 5
    // $rating_value = min($rating_value, 5);

    // Update product rating in the database
    $rate_q = "UPDATE products SET rating='$rating_value' WHERE id='$product_id'";
    $rating = mysqli_query($con, $rate_q);

    if ($rating) {
        echo json_encode('You commented on the product!');
    } else {
        echo json_encode('Failed to update the rating.');
    }
} else {
    echo json_encode('Failed to insert the comment into the database.');
}
?>
