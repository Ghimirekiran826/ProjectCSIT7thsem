<section class="mx-3 my-5">
    <h2 class="text-center py-3">You may like</h2>
    <div class="container">
        <div class="you-may-like-slider row ">
            <?php
            // Fetch related categories and products
            function get_related_products($current_category_id, $con, $limit = 10)
            {
                // Query to fetch related categories
                $related_categories_sql = "
                   SELECT base_category_id FROM `related_categories` WHERE `related_category_id`  = $current_category_id
                ";

                $related_categories_result = mysqli_query($con, $related_categories_sql);

                if (!$related_categories_result || mysqli_num_rows($related_categories_result) === 0) {
                    return []; // No related categories found
                }
                $related_category_ids = [];
                while ($row = mysqli_fetch_assoc($related_categories_result)) {
                    $related_category_ids[] = $row['base_category_id'];
                }

                $related_category_ids_string = implode(',', $related_category_ids);

                #Fetch products from related categories
                $products_sql = "
                    SELECT * 
                    FROM products 
                    WHERE category_id IN ($related_category_ids_string)
                    ORDER BY ID DESC 
                    LIMIT $limit
                ";
                $products_result = mysqli_query($con, $products_sql);

                if (!$products_result || mysqli_num_rows($products_result) === 0) {
                    return []; // No related products found
                }

                // Fetch all products as an array
                //updated
                $related_products = [];
                while ($product = mysqli_fetch_assoc($products_result)) {
                    $related_products[] = $product;
                }

                return $related_products;
            }

            // Get related products for the current category
            $related_products = get_related_products($current_category_id, $con);

            if (!empty($related_products)) {
                $count = 0;
                foreach ($related_products as $item) {
                    if ($count >= 10) break; // Limit to a maximum of 10 products
                    $count++;
            ?>
                    <div class="recommended-item text-center col-sm-2" style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 8px; box-shadow: 0px 4px 6px
                        rgba(0, 0, 0, 0.1); display: inline-block;">
                        <a href="detail.php?id=<?php echo $item['id']; ?>" style="text-decoration: none; color: inherit;">
                            <!-- Image -->
                            <div>
                                <img src="<?php echo './dashboard/uploads/' . $item['image']; ?>"
                                    alt="<?php echo $item['name']; ?>"
                                    style="height:150px; object-fit: cover; border-radius: 5px;">
                            </div>
                            <!-- Product Details -->
                            <div style="padding: 5px 0;">
                                <h5 style="margin: 5px 0; font-size: 1.1rem; font-weight: 500;"><?php echo $item['name']; ?>
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
                echo "<p class='text-center'>No recommended products found. Please check back later!</p>";
            }
            ?>
        </div>
    </div>
</section>