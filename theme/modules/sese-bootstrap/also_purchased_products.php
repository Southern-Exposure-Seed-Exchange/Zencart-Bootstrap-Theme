<?php
/**
 * also_purchased_products.php
 *
 * @package modules
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: also_purchased_products.php 5369 2006-12-23 10:55:52Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
if (isset($_GET['products_id']) && SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS > 0 && MIN_DISPLAY_ALSO_PURCHASED > 0) {

  $also_purchased_products = $db->Execute(sprintf(
    SQL_ALSO_PURCHASED, (int)$_GET['products_id'], (int)$_GET['products_id']));

  $num_products_ordered = $also_purchased_products->RecordCount();

  $row = 0;
  $col = 0;
  $list_box_contents = array();
  $title = '';

  // show only when 1 or more and equal to or greater than minimum set in admin
  if ($num_products_ordered > 0 && $num_products_ordered >= MIN_DISPLAY_ALSO_PURCHASED) {
    while (!$also_purchased_products->EOF) {
      $also_purchased_products->fields['products_name'] = zen_get_products_name(
        $also_purchased_products->fields['products_id']);

      $product_link = zen_href_link(
        zen_get_info_page($also_purchased_products->fields['products_id']),
        'products_id=' . $also_purchased_products->fields['products_id']);
      $show_image = $also_purchased_products->fields['products_image'] != '' ||
        PRODUCTS_IMAGE_NO_IMAGE_STATUS != 0;
      if ($show_image) {
        $product_image = zen_image(DIR_WS_IMAGES .
          $also_purchased_products->fields['products_image'],
          $also_purchased_products->fields['products_name'],
          SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'class="img-responsive img-center"');
        $text = "<a class='thumbnail' href='{$product_link}'>{$product_image}" .
            "{$also_purchased_products->fields['products_name']}</a>";
      } else {
        $text = "<a href='{$product_link}'>" .
          "{$also_purchased_products->fields['products_name']}</a>";
      }

      $list_box_contents[$row][$col] = array(
        'params' => 'class="' . BootstrapUtils::$thumbnail_grid_classes . '"',
        'text' => $text,
      );

      $col ++;
      if ($col > (SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS - 1)) {
        $col = 0;
        $row ++;
      }
      $also_purchased_products->MoveNext();
    }

    $title = '<h3 class="centerBoxHeading">' . TEXT_ALSO_PURCHASED_PRODUCTS . '</h3>';
    $zc_show_also_purchased = true;
  }
}
?>
