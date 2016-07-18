<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_info.<br />
 * Displays details of a typical product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_info_display.php 5369 2006-12-23 10:55:52Z drbyte $
 */
?>
<div class="centerColumn clearfix" id="productGeneral">

<div class='page-header'>
<h1><?php echo $products_name . BootstrapProductInfo::sese_icons(); ?></h1>
</div>

<?php
/** Start the Add-to-Cart form */
echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']),
  zen_get_all_get_params(array('action')) . 'action=add_product'), 'post',
  'enctype="multipart/form-data"') . "\n";

if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>

<div class='clearfix'>
<div id='product-info-block' class='pull-left col-xs-12 col-sm-4 col-md-5 col-lg-5'>
<?php /** Display the product's main image */
if (zen_not_null($products_image)) {
  require($template->get_template_dir('/tpl_modules_main_product_image.php',
    DIR_WS_TEMPLATE, $current_page_base, 'templates') .
    '/tpl_modules_main_product_image.php');
} ?>
</div>
<div class='pull-right col-sm-4 col-md-3 col-lg-2'>
<!-- Price and Cart Panel -->
<div class='panel panel-default'>
<div id="productPrices" class="productGeneral panel-body">
<?php
echo BootstrapProductInfo::price();
if (CUSTOMERS_APPROVAL != 3 or TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM != '') {
  echo BootstrapProductInfo::add_to_cart();
}
echo BootstrapProductInfo::free_shipping(); ?>
</div>
</div>

</div>  <!-- .pull-left -->

<div id="productDescription" class="productGeneral">
<?php if ($products_description != '') {
  echo stripslashes($products_description);
  echo BootstrapProductInfo::details_list();
} ?>
</div>

</div>  <!-- .clearfix -->


<?php
/** Display the Product's additional images */
require($template->get_template_dir('/tpl_modules_additional_images.php',
  DIR_WS_TEMPLATE, $current_page_base,'templates') .
  '/tpl_modules_additional_images.php');

/** Display the Category Name & Description */
echo BootstrapProductInfo::category();

/** Display the Also Purchased block */
require($template->get_template_dir('tpl_modules_also_purchased_products.php',
  DIR_WS_TEMPLATE, $current_page_base,'templates') .
  '/tpl_modules_also_purchased_products.php');
?>

</form>
</div>


<?php
/* Helper functions for the Product Info Display Template */
class BootstrapProductInfo
{
  /* Render the Organic, Heirloom, etc. Icons for the Product */
  public static function sese_icons() {
    global $products_is_organic, $products_is_heirloom, $products_is_southern,
           $products_is_eco;
    global $template, $current_page_base;
    $product_icons = BootstrapUtils::sese_product_icons($template, $current_page_base);
    $icon_order = array(
      $products_is_organic, $products_is_heirloom, $products_is_southern, $products_is_eco
    );

    $content = '';
    $index = 0;
    foreach ($product_icons as $icon) {
      if ($icon_order[$index]) {
        $content .= "<img src='{$icon['image']}' title='{$icon['title']}'>";
      }
      $index++;
    }
    return $content;
  }

  /* Render the Price */
  public static function price() {
    global $show_onetime_charges_description, $flag_show_product_info_starting_at;
    global $_GET;
    $one_time_text = '';
    if ($show_onetime_charges_description == 'true') {
      $one_time_text = ' <div> Your Price: ' . TEXT_ONETIME_CHARGE_SYMBOL .
        TEXT_ONETIME_CHARGE_DESCRIPTION . '</div>';
    }
    $base_price_text = '';
    if (zen_has_product_attributes_values((int)$_GET['products_id']) &&
        $flag_show_product_info_starting_at == 1) {
      $base_price_text = TEXT_BASE_PRICE;
    }
    $display_price = zen_get_products_display_price((int)$_GET['products_id']);
    return '<h4 id="product-price" class="text-center">' .
      $one_time_text . $base_price_text . $display_price . '</h4>';
  }

  /* Render the Add to Cart button and Quantity input */
  public static function add_to_cart() {
    global $flag_show_product_info_in_cart_qty, $products_qty_box_status;
    global $products_quantity_order_max, $_GET, $display_qty;
    $button = '';
    $show_qty_in_cart  = $flag_show_product_info_in_cart_qty == 1 &&
      $_SESSION['cart']->in_cart($_GET['products_id']);
    if ($show_qty_in_cart) {
      $cart_quantity = $_SESSION['cart']->get_quantity($_GET['products_id']);
      $button .= '<p class="text-center" id="in-cart-text"><small>' .
        PRODUCTS_ORDER_QTY_TEXT_IN_CART .  $cart_quantity . '</small></p>';
    }

    $submit_button = '<button type="submit" class="btn btn-primary">' .
      BUTTON_IN_CART_ALT . '</button>';

    $hide_quantity_input = $products_qty_box_status == 0 ||
      $products_quantity_order_max == 1;
    if ($hide_quantity_input) {
      // Default to a quantity of 1
      $button .= $submit_button . zen_draw_hidden_field('cart_quantity', 1) .
        zen_draw_hidden_field('products_id', (int)$_GET['products_id']);
    } else {
      $quantity = zen_get_buy_now_qty($_GET['products_id']);
      $min_quantity = zen_get_products_quantity_min_units_display(
        (int)$_GET['products_id']);
      $hidden = zen_draw_hidden_field('products_id', (int)$_GET['products_id']);
      $button .= <<<HTML
<div class='input-group'>
  <input class='form-control' type='text' name='cart_quantity' value='{$quantity}'
         maxlength='6' size='3' />
  <span class='input-group-btn'>{$submit_button}</span>
</div> {$min_quantity} {$hidden}
HTML;
    }

    $display_button = zen_get_buy_now_button($_GET['products_id'], $button);
    $display_button = BootstrapUtils::clean_buy_now_button(
      $display_button, '');
    if ($display_button != '' || $display_qty != '') {
      return "<div id='cart-add'>{$display_qty} {$display_button}</div>";
    }
  }

  /* Render the Free Shipping button */
  public static function free_shipping() {
    global $products_id_current, $flag_show_product_info_free_shipping;
    $show_button = zen_get_product_is_always_free_shipping($products_id_current) &&
      $flag_show_product_info_free_shipping;
    if ($show_button) {
      return "<div id='free-shipping-icon'>" . TEXT_PRODUCT_FREE_SHIPPING_ICON .
        "</div>";
    }
  }

  /* Render the Product's details list */
  public static function details_list() {
    global $flag_show_product_info_model, $products_model;
    global $flag_show_product_info_weight, $products_weight;
    global $flag_show_product_info_quantity;
    $details = array(
      array(
        'display' => $flag_show_product_info_model == 1 && $products_model != '',
        'text' => TEXT_PRODUCT_MODEL . $products_model,
      ),
      array(
        'display' => $flag_show_product_info_weight == 1 && $products_weight != 0,
        'text' => TEXT_PRODUCT_WEIGHT .  $products_weight,
      ),
      array(
        'display' => $flag_show_product_info_quantity == 1,
        'text' => $products_quantity . TEXT_PRODUCT_QUANTITY,
      ),
    );
    $no_details = empty(array_filter(
      $details, function($x) { return $x['display']; }));
    if ($no_details) { return ''; }

    $content = '<ul class="list-unstyled">';
    foreach ($details as $detail) {
      if ($detail['display']) { $content .= "<li>{$detail['text']}</li>\n"; }
    }
    return $content . '</ul>';
  }

  /* Render the Category heading & description */
  public static function category() {
    global $db, $current_category_id, $_SESSION, $categories;
    // Grab the category description
    $sql = "SELECT categories_description
            FROM " . TABLE_CATEGORIES_DESCRIPTION . "
            WHERE categories_id= :categoriesID
            AND language_id = :languagesID";

    $sql = $db->bindVars($sql, ':categoriesID', $current_category_id, 'integer');
    $sql = $db->bindVars($sql, ':languagesID', $_SESSION['languages_id'], 'integer');
    $result = $db->Execute($sql);

    $description = '';
    if ($result->RecordCount() > 0) {
      $description = $result->fields['categories_description'];
    }

    if ($description !== '') {
      return "<div><h3>{$categories->fields['categories_name']}</h3>" .
        "<div>{$description}</div></div>";
    }
  }
}
?>
