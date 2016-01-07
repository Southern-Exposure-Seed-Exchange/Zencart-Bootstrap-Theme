<?php
/**
 * product_listing module
 *
 * @package modules
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: product_listing.php 17051 2010-07-29 07:25:09Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
$show_submit = zen_run_normal();
$listing_split = new BootstrapSplitPageResults(
  $listing_sql, MAX_DISPLAY_PRODUCTS_LISTING, 'p.products_id', 'page');
$zco_notifier->notify('NOTIFY_MODULE_PRODUCT_LISTING_RESULTCOUNT', $listing_split->number_of_rows);
$how_many = 0;

$zc_col_count_description = 0;

if ($listing_split->number_of_rows > 0) {
  $rows = 0;
  $listing = $db->Execute($listing_split->sql_query);
  $extra_row = 0;
  $sese_icons = BootstrapUtils::sese_product_icons($template, $current_page_base);
  while (!$listing->EOF) {
    $rows++;
    $cur_row = sizeof($list_box_contents) - 1;

    $product_link = BootstrapProductListing::product_link($listing);
    $product_image =
      "<a href='{$product_link}'>" .  zen_image(
        DIR_WS_IMAGES . $listing->fields['products_image'],
        $listing->fields['products_name'], 0, 0, 'class="img-responsive img-center listingProductImage"') .
      '</a>';
    for ($col=0, $n=sizeof($column_list); $col < $n; $col++) {
      $lc_class = $lc_text = '';
      switch ($column_list[$col]) {
        case 'PRODUCT_LIST_NAME':
          $lc_class = 'product-name';
          $icons = BootstrapProductListing::product_icon_html($sese_icons, $listing);
          $product_description =
            zen_trunc_string(stripslashes(zen_get_products_description(
              $listing->fields['products_id'], $_SESSION['languages_id']
            )), PRODUCT_LIST_DESCRIPTION);
          $products_model = isset($listing->fields['products_model']) ?
            "<small><i>Model #: {$listing->fields['products_model']}" .
            "</i></small>\n" : '';
          $lc_text = "<h4 class='itemTitle'><a href='{$product_link}'><b>" .
            "{$listing->fields['products_name']}</b></a>{$icons}</h4>" .
            "<div class='hidden-xs listingDescription'>{$product_description}</div>\n" .
            "<div class='hidden-xs'>{$products_model}</div>" .
            "<div class='visible-xs'>{$product_image}</div>\n";
          break;
        case 'PRODUCT_LIST_PRICE':
          $lc_price = "<div class='text-center product-price'><b>" .
            zen_get_products_display_price($listing->fields['products_id']) .
            "</b></div>\n";
          $lc_text =  $lc_price;
          $the_button = BootstrapProductListing::product_cart_button(
            $listing, $product_link);
          $products_link = "<a href='{$product_link}'>" . MORE_INFO_TEXT . '</a>';
          $buy_now_button = zen_get_buy_now_button(
            $listing->fields['products_id'], $the_button, $products_link) .
            zen_get_products_quantity_min_units_display($listing->fields['products_id']);
          $lc_text .= BootstrapUtils::clean_buy_now_button(
            $buy_now_button, $product_link);
          $has_free_shipping = zen_get_show_product_switch(
            $listing->fields['products_id'], 'ALWAYS_FREE_SHIPPING_IMAGE_SWITCH') &&
            zen_get_product_is_always_free_shipping($listing->fields['products_id']);
          if ($has_free_shipping) {
            $lc_text .= TEXT_PRODUCT_FREE_SHIPPING_ICON . "<br />";
          }
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $lc_text = $listing->fields['products_quantity'];
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $lc_text = $listing->fields['products_weight'];
          break;
        case 'PRODUCT_LIST_IMAGE':
          $lc_class = 'text-center hidden-xs product-image';
          if ($listing->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
            $lc_text = '';
          } else {
            $lc_text = $product_image;
          }
          break;
      }

      if ($lc_text !== '') {
        $list_box_contents[$rows][$col] = array(
          'align' => '', 'text'  => $lc_text,
          'params' => "class='productListing-data {$lc_class}'");
      }
    }

    $listing->MoveNext();
  }
  $error_categories = false;
} else {
  $list_box_contents = array(array(array(
    'params' => 'class="productListing-data"', 'text' => TEXT_NO_PRODUCTS)));
  $error_categories = true;
}


$show_form = $how_many > 0 && PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0 &&
  $show_submit == true && $listing_split->number_of_rows > 0;
if ($show_form) {
  $form_action = zen_href_link(FILENAME_DEFAULT,
    zen_get_all_get_params(array('action')) .  'action=multiple_products_add_product');
  echo zen_draw_form('multiple_products_cart_quantity', $form_action, 'post',
    'enctype="multipart/form-data"');
}


/* Helper functions for this module */
class BootstrapProductListing
{
  /* Return the SESE Product Icon HTML for the product */
  public static function product_icon_html($product_icons, $product) {
    $icons = '';
    if ($product->fields['is_organic'] == 1) {
      $icons .= "<img src='{$product_icons['organic']['image']}' " .
        "title='{$product_icons['organic']['title']}' />";
    }
    if ($product->fields['is_heirloom'] == 1) {
      $icons .= "<img src='{$product_icons['heirloom']['image']}' " .
        "title='{$product_icons['heirloom']['title']}' />";
    }
    if ($product->fields['is_southern'] == 1) {
      $icons .= "<img src='{$product_icons['southeast']['image']}' " .
        "title='{$product_icons['southeast']['title']}' />";
    }
    if ($product->fields['is_eco'] == 1) {
      $icons .= "<img src='{$product_icons['eco']['image']}' " .
        "title='{$product_icons['eco']['title']}' />";
    }
    if ($icons !== '') {
      $icons = '<small class="vmiddle">' . $icons . '</small>';
    }
    return $icons;
  }
  /* Return a link to the product's detail page */
  public static function product_link($product) {
    if ($_GET['filter_id'] > 0) {
      $category_filter = $_GET['filter_id'];
    } else if ($_GET['cPath'] > 0) {
      $category_filter = $_GET['cPath'];
    } else {
      $category_filter = $product->fields['master_categories_id'];
    }
    $parameters = 'cPath=' . zen_get_generated_category_path_rev($category_filter) .
      '&products_id=' . $product->fields['products_id'];
    return zen_href_link(zen_get_info_page($product->fields['products_id']),
      $parameters);
  }
  /* Return the quantity & add to cart button for a product */
  public static function product_cart_button($product, $product_link) {
    global $how_many;
    $has_attributes = zen_has_product_attributes($listing->fields['products_id']);
    $hide_quantity = $product->fields['products_qty_box_status'] == 0;
    if ($has_attributes || PRODUCT_LIST_PRICE_BUY_NOW == '0') {
      $lc_button = "<a class='btn btn-default' href='{$product_link}'>" .
        MORE_INFO_TEXT . "</a>";
    } else if (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0) {
      $can_add_to_cart = zen_get_products_allow_add_to_cart(
        $product->fields['products_id']) != 'N';
      $in_stock_or_ignore_stock = $product->fields['products_quantity'] > 0 ||
        SHOW_PRODUCTS_SOLD_OUT_IMAGE == 0;
      $not_call_for_price = $listing->fields['product_is_call'] == 0;
      if (!$hide_quantity && $can_add_to_cart &&
          $not_call_for_price && $in_stock_or_ignore_stock) {
        $how_many++;
      }
      if ($hide_quantity) {
        $buy_now_link = zen_href_link(
          $_GET['main_page'],
          zen_get_all_get_params(array('action')) .  'action=buy_now&products_id=' .
          $product->fields['products_id']);
        $buy_now_button = "<button class='btn btn-primary'>" . BUTTON_BUY_NOW_ALT .
          "</button>";
        $lc_button = "<a href='{$buy_now_link}'>{$buy_now_button}</a>";
      } else {
        $add_to_cart_button = '<span class="input-group-btn">' .
          '<button class="btn btn-default" type="submit">Add</button></span>';
        $lc_button = "<div class='input-group'>" .
          "<input type='text' class='form-control' name='products_id[" .
            "{$product->fields['products_id']}]' value='0' size='4' />" .
          "{$add_to_cart_button}</div>";
      }
    } else if (PRODUCT_LIST_PRICE_BUY_NOW == '2' && !$hide_quantity) {
      $action_link = zen_href_link(zen_get_info_page($product->fields['products_id']),
        zen_get_all_get_params(array('action')) . 'action=add_product&products_id=' .
        $product->fields['products_id']);
      $buy_now_qty = zen_get_buy_now_qty($product->fields['products_id']);
      $lc_button = zen_draw_form(
        'cart_quantity', $action_link, 'post', 'enctype="multipart/form-data"') .
        '<input type="text" name="cart_quantity" value="' . $buy_now_qty . '" ' .
        'maxlength="6" size="4" />' .
        zen_draw_hidden_field('products_id', $product->fields['products_id']) .
        "<button class='btn btn-default' type='submit'>" . BUTTON_IN_CART_ALT .
        "</button></form>";
    } else {
      $action_link = zen_href_link($_GET['main_page'],
        zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' .
        $product->fields['products_id']);
      $buy_now_button = zen_image_button(BUTTON_IMAGE_BUY_NOW,
        BUTTON_BUY_NOW_ALT, 'class="listingBuyNowButton"');
      $lc_button = "<a class='btn btn-default' href='{$action_link}'>" .
        BUTTON_BUY_NOW_ALT . "</a>";
    }

    return $lc_button;
  }
}
