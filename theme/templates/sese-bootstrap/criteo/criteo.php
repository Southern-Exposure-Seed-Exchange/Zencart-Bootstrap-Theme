<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type='text/javascript'>
    // Determine site type based on window width
    var windowWidth = $(window).width();
    var deviceType = null;
    if (windowWidth <= 480) {
        deviceType = "m";
    } else if (windowWidth <= 768) {
        deviceType = "t";
    } else {
        deviceType = "d";
    }
    <?php
    // Get & Hash the Customers Email
    if (isset($_SESSION['customer_id'])) {
        $sql = "select customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$_SESSION['customer_id'] . "'";
        $result = $db->Execute($sql);
        $customers_email_address = md5(strtolower(trim($result->fields['customers_email_address'])));
    } else {
        $customers_email_address = "";
    }

    $is_homepage = ($current_page == 'index' && (!isset($_GET['cPath'])));
    $is_listing = ($current_page == 'index' && isset($_GET['cPath'])) ||
        ($current_page == 'advanced_search_result');
    $is_product = $current_page == 'product_info';
    $is_cart = $current_page == 'shopping_cart';
    $is_success = $current_page == 'checkout_success';

    // Build array of products for listing
    if ($is_listing) {
        $listing_split = new BootstrapSplitPageResults(
            $listing_sql, 3, 'p.products_id', 'page');
        $listing = $db->Execute($listing_split->sql_query);
        if (!$listing->EOF) {
            $product_ids = array();
            for ($i = 0; $i < 3; $i++) {
                array_push($product_ids, $listing->fields['products_id']);
                $listing->MoveNext();
            }
            $criteo_product_ids = '"' . implode($product_ids, '", "') . '"';
        }
    }

    // Build array of items for cart
    if ($is_cart) {
        $cart_items = array();
        foreach ($productArray as $cart_product) {
            $cart_product_id = $cart_product['id'];
            $cart_product_price = str_replace('$', '', $cart_product['productsPriceEach']);
            $cart_product_quantity = $_SESSION['cart']->contents[$cart_product_id]['qty'];
            array_push($cart_items,
                "{ id: \"{$cart_product_id}\", price: {$cart_product_price}, quantity: {$cart_product_quantity} }\n");
        }
        $criteo_cart_items = implode($cart_items, ",");
    }

    // Build array of items for success
    if ($is_success) {
        $sql = "select products_id, products_price, products_quantity from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$zv_orders_id . "'";
        $result = $db->Execute($sql);
        $success_items = array();
        while (!$result->EOF) {
            $success_id = $result->fields['products_id'];
            $success_price = $result->fields['products_price'];
            $success_quantity = $result->fields['products_quantity'];
            array_push($success_items,
                "{ id: \"{$success_id}\", price: {$success_price}, quantity: {$success_quantity} }\n");
            $result->MoveNext();
        }
        $criteo_success_items = implode($success_items, ",");
    }

    // Push Data to Criteo if logged in & appropriate page
    if ($is_homepage || $is_listing || $is_cart || $is_success) { ?>
        window.criteo_q = window.criteo_q || [];
        window.criteo_q.push(
            { event: "setAccount", account: 40290 },
            { event: "setEmail", email: "<?php echo $customers_email_address; ?>" },
            { event: "setSiteType", type: deviceType },
            <?php if ($is_homepage) { ?>
                { event: "viewHome" }
            <?php } else if ($is_listing) { ?>
                { event: "viewList", item: [<?php echo $criteo_product_ids; ?>] }
            <?php } else if ($is_product) { ?>
                { event: "viewItem", item: "<?php echo $_GET['products_id']; ?>" }
            <?php } else if ($is_cart) { ?>
                { event: "viewBasket", item: [<?php echo "\n" . $criteo_cart_items; ?>] }
            <?php } else if ($is_success) { ?>
                { event: "trackTransaction", id: "<?php echo $zv_orders_id; ?>",
                  item: [<?php echo "\n" . $criteo_success_items; ?>] }
            <?php }
            ?>
        );
    <?php } ?>
</script>

