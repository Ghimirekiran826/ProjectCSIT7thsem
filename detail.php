<?php include_once('connect.php'); ?>
<?php
if (isset($_COOKIE['product_ids'])) {
    $product_ids_string = $_COOKIE['product_ids'];
    $product_ids = explode(',', $product_ids_string);
} else {
    $product_ids = array();
}
#add the new product ID
$get_product_id = $_GET['id'];;
$product_ids = [];
$pro_categ_q = "SELECT * from products where id = '$get_product_id'";
$pro_category_r = mysqli_query($con, $pro_categ_q);
$category_id = mysqli_fetch_array($pro_category_r)['category_id'];

array_push($product_ids, $category_id);
$product_ids_string = implode(',', $product_ids);

setcookie('product_ids', $product_ids_string, time() + 3600, '/');

?>
<?php include_once('topbar.php'); ?>
<?php
#collect details of the product
$product_id = $_GET['id'];
$sql = "SELECT pro.*, cat.name as cat_name from products pro left join categories cat on pro.category_id = cat.id  where pro.id='$product_id' ";
$details_q = mysqli_query($con, $sql);
$details = mysqli_fetch_array($details_q);

#Prepare user preferences
$user_preferences = [
    'category_id' => $details['category_id'], #Category of the current product
    'tags' => explode(',', $details['tags']), #Tags of the current product
];
# Fetch all products from the database
$all_products_sql = "SELECT * FROM products";
$all_products_result = mysqli_query($con, $all_products_sql);
$all_products = [];
while ($row = mysqli_fetch_assoc($all_products_result)) {
    $all_products[] = $row;
}
function calculate_similarity($product, $preferences)
{
    $score = 0;
    # Match category
    if ($product['category_id'] == $preferences['category_id']) {
        $score += 4;
    }
    #Match tags
    $tags = explode(',', $product['tags']);
    $score += count(array_intersect($tags, $preferences['tags']));
    return $score;
}

#Generate recommendations
function recommend_products($products, $preferences, $current_product_id)
{
    $recommendations = [];

    foreach ($products as $product) {
        #Exclude the current product from recommendations
        if ($product['id'] == $current_product_id) {
            continue;
        }
        $score = calculate_similarity($product, $preferences);
        if ($score > 0) {
            $recommendations[] = ['product' => $product, 'score' => $score];
        }
    }

    #Sort by score in descending order
    usort($recommendations, fn($a, $b) => $b['score'] - $a['score']);

    return $recommendations;
}
# Fetch recommendations
$recommendations = recommend_products($all_products, $user_preferences, $product_id);
function track_and_recommend($current_category_id, $current_product_id, $user_gender)
{
    global $con; // Database connection

    // Start session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Initialize session variables
    $_SESSION['viewed_products'] = $_SESSION['viewed_products'] ?? [];
    $_SESSION['viewed_products'][$current_product_id] = ($_SESSION['viewed_products'][$current_product_id] ?? 0) + 1;

    $_SESSION['viewed_categories'] = $_SESSION['viewed_categories'] ?? [];
    $_SESSION['viewed_categories'][$current_category_id] = ($_SESSION['viewed_categories'][$current_category_id] ?? 0) + 1;

    // Check if threshold is reached
    $threshold = 3; // Number of views to trigger recommendations
    if ($_SESSION['viewed_categories'][$current_category_id] >= $threshold) {

        // Fetch related categories
        $related_categories_sql = "
            SELECT c2.id, c2.name 
            FROM related_categories rc
            JOIN categories c2 ON rc.related_category_id = c2.id
            WHERE rc.base_category_id = $current_category_id
            AND (rc.gender = '$user_gender' OR rc.gender = 'both')
        ";
        $related_categories_result = mysqli_query($con, $related_categories_sql);
        $related_categories = mysqli_fetch_all($related_categories_result, MYSQLI_ASSOC);

        if (!empty($related_categories)) {
            // Build a list of related category IDs
            $related_category_ids = implode(',', array_column($related_categories, 'id'));

            // Fetch products from related categories
            $recommendations_sql = "
                SELECT * 
                FROM products 
                WHERE category_id IN ($related_category_ids)
                ORDER BY popularity DESC 
                LIMIT 10
            ";
            $recommendations_result = mysqli_query($con, $recommendations_sql);
            $recommendations = mysqli_fetch_all($recommendations_result, MYSQLI_ASSOC);

            // Reset session data for category views
            $_SESSION['viewed_categories'][$current_category_id] = 0;

            return $recommendations; // Return recommendations to display
        }
    }

    return []; // No recommendations yet
}
$current_category_id = $details['category_id']; // Replace with the current product category ID
$current_product_id = $details['id']; // Replace with the current product ID
$user_gender = $details['gender']; // Replace with the current user's gender (e.g., 'men', 'women')

// Call the function to get recommendations
$recommendations_maylike = track_and_recommend($current_category_id, $current_product_id, $user_gender);

#time calculation
function timeConverter($date)
{
    // $date = "2023-02-08 03:20:30";
    $today = date('Y-m-d h:i:s');
    $result = 0;
    $differ = abs(strtotime($today) - strtotime($date));
    echo ($differ / 1000) . "<br>";
    if ($differ < 60) { //seconds
        $result = 'few seconds ago';
    } else if ($differ < 60 * 60) { //minutes
        $result = intval($differ / 60) . " mins ago";
    } else if ($differ < 60 * 60 * 24) { //hours
        $result = intval($differ / (60 * 60)) . " hours ago";
    } else if ($differ < 60 * 60 * 24 * 30) { //days
        $result = intval($differ / (60 * 60 * 24)) . " days ago";
    } else if ($differ < 60 * 60 * 24 * 30 * 12) { //months
        $result = intval($differ / (60 * 60 * 30 * 24)) . " months ago";
    }
    return $result;
}


$pro = $_GET['id'];

$sql = "SELECT * from reviews where product_id='$pro'";
$comment_q = mysqli_query($con, $sql);

//probaility error

if (empty(mysqli_fetch_array($comment_q))) {
    echo 'no reviews';
}

// }
// echo bayes();die;

?>
<!-- Details -->
<section id="prodetails" class="row my-4">

    <div class="pro-image my-5 text-center col-6">
        <img src="<?php echo 'dashboard/uploads/' . $details['image'] ?>" style="height:480px"
            class="img-fluid mt-5 px-2" id="" alt="<?php echo $details['tags'] ?>"><br>
        <span><b>Rating:</b> <?php
                                // echo $details['rating']; die;
                                if ($details['rating'] == 0) {
                                    for ($i = 0; $i < 5; $i++):
                                ?>
                    <i class="fa-regular fa-star text-warning"></i>
                <?php
                                    endfor;
                                }
                                if ($details['rating'] > 0) {
                                    for ($i = 0; $i < intval($details['rating']); $i++):
                ?>
                    <i class="fa-solid fa-star text-warning"></i>
                <?php
                                    endfor;
                                    for ($i = 0; $i < (5 - intval($details['rating'])); $i++):
                ?>
                    <i class="fa-regular fa-star text-warning"></i>
            <?php
                                    endfor;
                                }
            ?></span>
    </div>

    <div class="pro-detail col-6" style="margin-top: 50px;position:relative;">

        <div class="cart-detail" style="position:absolute;right:0;top:100px;width:40%;" id="cart_box">
            <?php
            // echo $_SESSION['user_role']; die;
            if (isset($_SESSION['user_id'])) {
                // if(!!empty($_SESSION['user_id'])){
                $user = $_SESSION['user_id'];
                $cart_sql = "SELECT 
                car.user_id, 
                SUM(pro.price) as total_cart_price, 
                COUNT(car.product_id) as cart_counter 
             FROM carts car 
             LEFT JOIN products pro ON pro.id = car.product_id 
             WHERE car.user_id = '$user' 
             GROUP BY car.user_id";

                $cart_q = mysqli_query($con, $cart_sql);

                // Check if there are cart items before accessing them
                if ($cart_q && mysqli_num_rows($cart_q) > 0) {
                    $cart_item = mysqli_fetch_array($cart_q);
                } else {
                    $cart_item = [
                        'cart_counter' => 0,
                        'total_cart_price' => 0,
                    ];
                }


            ?>
                <span class="w-100 text-center text-light bg-green d-flex px-1">
                    Cart Items
                </span>
                <ul class="mx-1 px-1">
                    <li class="d-flex justify-content-between bg-light py-2">
                        <span>Items</span>
                        <span><?php echo $cart_item['cart_counter']; ?></span>
                    </li>
                    <li class="d-flex justify-content-between py-2">
                        <span>Total Cost</span>
                        <span><?php echo $cart_item['total_cart_price']; ?></span>
                    </li>
                    <li class="d-flex justify-content-between py-2 bg-light">
                        <span>Pay via</span>
                        <span>Khalti</span>
                    </li>
                    <li class="d-flex justify-content-center py-2">
                        <a href="./dashboard/cart.php" class="bg-green w-50 text-light text-center">View Detail</a>
                    </li>
                </ul>

        </div>
    <?php
            }
            // }
    ?>
    <h6>Home / <a href="cat.php?id=<?php echo $details['category_id']; ?>"><?php echo $details['cat_name'] ?></a>
    </h6>
    <div id="cart_msg" style="font-weight:bold;color:green"></div>
    <div style="display: flex;justify-content: space-between;width: 100%;align-items: center;">

        <span style="display: flex;">
            <h4 class="text-capitalize"><?php echo $details['name'] ?></h4>
        </span>

    </div>
    <h2>NRs. <?php echo $details['price'] ?> /-</h2>
    <!-- <select>
            <option>Choose</option>
            <option>Buy</option>
            <option>Rent</option>
        </select> -->
    <?php
    if (empty($_SESSION['user_id'])) {
    ?>
        <a href="login.php">
            <button class="button1 btn btn-sm">
                Buy Now
            </button>
        </a>
        <a href="login.php">
            <button class="button1 btn btn-sm">
                Rent Now
            </button>
        </a>
        <a href="login.php">
            <button class="button1 btn btn-sm">Add to cart </button>
        </a>
    <?php
    } else {
    ?>
        <a href="order.php?id=<?php echo $details['id'] ?>&type=buy">
            <button class="button1 btn btn-sm">
                Buy Now
            </button>
        </a>
        <a href="order.php?id=<?php echo $details['id'] ?>&type=rent">
            <button class="button1 btn btn-sm">
                Rent Now
            </button>
        </a>
        <?php if (!empty($_SESSION['user_id'])) {
        ?>
            <button class="button1 btn btn-sm" role="button" data-product-id="<?php echo $details['id'] ?>"
                style="padding:4px;" id="add_to_cart">Add to cart </button>
        <?php
        } ?>
    <?php
    }
    ?>
    <h4>Product Details</h4>
    <span>
        <?php echo $details['details'] ?>
    </span>
    <br>
    <?php
    //if user is logged in comment on product
    if (empty($_SESSION['user_id'])) {
    } else {
    ?>
        <form method="post" onsubmit="return(comments())">
            <div id="green" style="color:green;font-weight:bold;">
            </div>
            <div class="form-group d-inline-flex mt-5">

                <img src="<?php echo userAvatar($_SESSION['user_id'], $con);  ?>" alt="" class="mx-1"
                    style="height:40px;width:40px;border-radius:50%;border:2px solid white; outline:2px solid silver">
                <input class="form-control col-9" name="user_comment" type="text" placeholder="Comment..."
                    id="user_comment">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" id="product_id" name="product_id" value="<?php echo $_GET['id']; ?>">
                <button name="comment">Comment</button>
            </div>
        </form><?php
            }
                ?>
    <div id="comment_list">
        <?php
        // echo "<br> the +ve prob is ".$pos_probability." and -ve prob is ".$neg_probability;
        ?>
        <details class="mt-3" style="max-height:400px;overflow-y:scroll">
            <summary><b>View Comments</b></summary>
            <?php
            $sql = "SELECT * from reviews where product_id='$product_id' order by id desc limit 12";
            $pro = mysqli_query($con, $sql);

            ?>
            <!-- comments list -->
            <?php if (!empty($pro)) {
                foreach ($pro as $item):
            ?>
                    <div class="form-group mt-2 d-flex justify-content-between">
                        <span class="col-9 d-inline-flex ">
                            <img src="<?php echo userAvatar($item['user_id'], $con); ?>" alt="" class="mx-1"
                                style="height:40px;width:40px;border-radius:50%;border:2px solid white; outline:2px solid silver">
                            <div class="border-0 d-flex align-items-center px-2"><?php echo $item['comments']; ?>
                                <span>(<?php echo $item['comment_type']; ?>)</span>
                            </div>
                        </span>
                        <span class="col-3 d-flex align-items-center">
                            <i><span class="text-muted"><?php
                                                        echo ($item['date']);
                                                        ?></span></i>
                        </span>
                    </div>
            <?php endforeach;
            } else {
                echo "No comments!";
            }
            ?>
        </details>
    </div>

    </div>

</section>

<!-- Related Products -->
<!-- Recommended Products -->
<!-- Recommended Products -->
<section class="mx-3 my-5">
    <h2 class="text-center py-3">Recommended Products</h2>
    <div class="container">
        <div class="owl-carousel">
            <?php
            if (!empty($recommendations)) {
                $count = 0; // Add a counter to limit the total number of items displayed in the slider
                foreach ($recommendations as $recommendation) {
                    if ($count >= 10) break; // Limit to a maximum of 10 products in the slider
                    $item = $recommendation['product'];
                    $count++;
            ?>
                    <div class="recommended-item text-center w-100"
                        style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);  display: inline-block;">
                        <a href="detail.php?id=<?php echo $item['id']; ?>" style="text-decoration: none; color: inherit;">
                            <!-- Image -->
                            <div>
                                <img src="<?php echo './dashboard/uploads/' . $item['image']; ?>"
                                    alt="<?php echo $item['name']; ?>"
                                    style=" height:200px;object-fit: cover; border-radius: 5px; margin-bottom: 10px;">
                            </div>
                            <!-- Product Details -->
                            <div style="padding: 5px 0;">
                                <h5 style=" margin: 5px 0; font-size: 1.1rem; font-weight: 500;">
                                    <?php echo $item['name']; ?>
                                </h5>
                                <p style="margin: 5px 0; color: #333; font-weight: bold;">Price: NRs.
                                    <?php echo $item['price']; ?>
                                </p>
                                <div class="rating" style="margin: 5px 0;">
                                    <?php
                                    for ($i = 0; $i < intval($item['rating']); $i++) {
                                        echo '<i class="fa-solid fa-star text-warning"></i>';
                                    }
                                    for ($i = intval($item['rating']); $i < 5; $i++) {
                                        echo '<i class="fa-regular fa-star text-warning"></i>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                // Fallback message if no recommendations are available
                echo "<p class='text-center'>No recommended products found. Please check back later!</p>";
            }
            ?>
        </div>
    </div>
</section>

<!--  Products you may like -->

<?php include_once('youmaylike.php') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Include Slick Slider CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Initialize Slider -->
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: false,
                    loop: true
                }
            }
        })

    });
</script>





<?php
function userAvatar($id, $con)
{
    $user_q = "SELECT * from  users  where id=$id";
    $user = mysqli_query($con, $user_q);

    $avatar = mysqli_fetch_array($user)['avatar'];
    if (!!$avatar) {
        return 'dashboard/uploads/' . $avatar;
    } else {
        return './images/user.jpg';
    }
}
?>

<!-- Footer -->
<?php include_once('foot.php') ?>

<script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");
    smallimg[0].onclick = function() {
        MainImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function() {
        MainImg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function() {
        MainImg.src = smallimg[2].src;
    }
    smallimg[2].onclick = function() {
        MainImg.src = smallimg[3].src;
    }
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<script>
    //comment via ajax
    function comments() {
        var user_comment = document.getElementById('user_comment').value;
        var user_id = document.getElementById('user_id').value;
        var product_id = document.getElementById('product_id').value;

        if (user_comment == "") {
            document.getElementById('green').innerHTML = "Empty comment!";
        } else {

            $.ajax({
                url: 'comment.php',
                type: 'POST',
                data: {
                    user_id,
                    user_comment,
                    product_id
                },
                success: function(res) {
                    // alert('test');
                    document.getElementById('green').innerHTML = res;
                    $("#comment_list").load(" #comment_list");
                    document.getElementById('user_comment').value = "";
                    // console.log(JSON.parse(res))
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }

        return false;
    }
</script>
<script>
    // cart items
    var add_to_cart = document.getElementById('add_to_cart');
    add_to_cart.addEventListener('click', function() {
            var product_id = add_to_cart.getAttribute('data-product-id');
            // alert(product_id);
            $.ajax({
                url: 'cart.php',
                type: 'post',
                data: {
                    product_id
                },
                success: function(res) {
                    alert(res);
                    $("#cart_counts").load(" #cart_counts");
                    $("#cart_box").load(" #cart_box");

                },
                error: function() {

                }
            })
        }) <
        script >
        $('.owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
</script>
</script>
</body>

</html>