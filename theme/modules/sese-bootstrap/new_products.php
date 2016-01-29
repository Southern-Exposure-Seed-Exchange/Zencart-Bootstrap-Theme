<?php
/**
 * new_products.php module
 *
 * @package modules
 * @copyright Copyright 2003-2008 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: new_products.php 8730 2008-06-28 01:31:22Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

$categories_products_id_list = '';
$list_of_products = '';
$new_products_query = '';

$display_limit = zen_get_new_date_range();

$filter_manufacturer = $manufacturers_id > 0 && $_GET['filter_id'] == 0;
$no_category = !isset($new_products_category_id) || $new_products_category_id == '0';
if ($filter_manufacturer || $no_category) {
  $new_products_query = "
    select distinct p.products_id, p.products_image, p.products_tax_class_id,
                    pd.products_name, p.products_date_added, p.products_price,
                    p.products_type, p.master_categories_id
    from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
    where p.products_id = pd.products_id
      and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
      and p.products_status = 1 " . $display_limit;
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list(
    ($filter_manufacturer ?
      zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath
    ), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    $list_of_products = join(', ', array_keys($productsInCategory));
    $new_products_query = "
      select distinct p.products_id, p.products_image, p.products_tax_class_id,
                      pd.products_name, p.products_date_added, p.products_price,
                      p.products_type, p.master_categories_id
      from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
      where p.products_id = pd.products_id
        and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
        and p.products_status = 1
        and p.products_id in (" . $list_of_products . ")";
  }
}

if ($new_products_query != '') {
  $new_products = $db->ExecuteRandomMulti(
    $new_products_query, MAX_DISPLAY_NEW_PRODUCTS);
}

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = $new_products_query == '' ? 0 : $new_products->RecordCount();

if ($num_products_count > 0) {
  $params = 'class="' . BootstrapUtils::$thumbnail_grid_classes . ' text-center"';

  while (!$new_products->EOF) {
    $product_id = $new_products->fields['products_id'];
    if (!isset($productsInCategory[$product_id])) {
      $productsInCategory[$product_id] = zen_get_generated_category_path_rev(
        $new_products->fields['master_categories_id']);
    }
    $product_link = zen_href_link(zen_get_info_page($product_id),
      "cPath={$productsInCategory[$product_link]}&products_id={$product_id}");
    $product_image = '';
    $product_image_path = $new_products->fields['products_image'];
    if ($product_image_path != '' || PRODUCTS_IMAGE_NO_IMAGE_STATUS != 0) {
      $product_image = zen_image(
        DIR_WS_IMAGES . $product_image_path, $new_products->fields['products_name'],
        IMAGE_PRODUCT_NEW_WIDTH, IMAGE_PRODUCT_NEW_HEIGHT);
      $product_image = "<a href='{$product_link}'>{$product_image}</a>";
    }
    $product_name =
      "<a href='{$product_link}'>{$new_products->fields['products_name']}</a>";
    $products_price = zen_get_products_display_price($product_id);
    $list_box_contents[$row][$col] = array(
      'params' => $params,
      'text' => "{$product_image}<br />{$product_name}<br />{$products_price}");

    $col ++;
    if ($col > (SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS - 1)) {
      $col = 0;
      $row ++;
    }
    $new_products->MoveNextRandom();
  }

  if ($no_category) {
    $title = '<h3>' . sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')) . '</h3>';
  } else {
    $category_title = zen_get_categories_name((int)$new_products_category_id);
    $category_title = $category_title != '' ? ' - ' . $category_title : '';
    $title = '<h3>' . sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')) .
      $category_title . '</h3>';
  }
  $zc_show_new_products = true;
}
?>
