<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_products_all_default.php 2603 2005-12-19 20:22:08Z wilt $
 */
?>
<div class="centerColumn" id="allProductsDefault">

<?php
  require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_LISTING_DISPLAY_ORDER));
  $restrict = '';
  $title = 'All Products';
  $ttitle = '';
  if ($_GET['organic'] == 1) {
    $restrict .= "AND i.is_organic = 1";
    $ttitle .= 'Organic ';
  }
  if ($_GET['heirloom'] == 1) {
    $restrict .= " AND i.is_heirloom = 1";
    $ttitle .= 'Heirloom ';
  }
  if ($_GET['southern'] == 1) {
    $restrict .= " AND i.is_southern = 1";
    $ttitle .= 'Southern ';
  }
  if ($_GET['small-grower'] == 1) {
    $restrict .= " AND i.is_eco = 1";
  }
  if ($_GET['bulk'] == 1) {
    $restrict .= " AND char_length(p.products_model) = 6 AND left(p.products_model, 1) < 8";
    $ttitle .= 'Bulk ';
  }

  if ($_GET['small-grower'] == 1) {
    $title = 'All Seeds from Small Farms in our Grower Network';
  } else {
    $title = 'All ' . $ttitle . 'Products';
  }

  $list_box_contents = array();
  $listing_sql = "SELECT p.products_type, p.products_id, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id,
                                    p.products_date_added, p.products_model, p.products_quantity, p.products_weight, p.product_is_call,
                                    p.product_is_always_free_shipping, p.products_qty_box_status,
                                    p.master_categories_id, i.products_id, i.is_organic, i.is_heirloom, i.is_southern, i.is_eco
                             FROM " . TABLE_PRODUCTS . " p, sese_products_icons i, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                             WHERE p.products_status = 1
                             AND p.products_id = pd.products_id
                             AND p.products_id = i.products_id
                             AND pd.language_id = :languageID " . $restrict . $order_by;

  $listing_sql = $db->bindVars($listing_sql, ':languageID', $_SESSION['languages_id'], 'integer');
  $column_list = array('PRODUCT_LIST_IMAGE', 'PRODUCT_LIST_NAME', 'PRODUCT_LIST_PRICE');



?>

<div class='page-header'><h1 id="allProductsDefaultHeading"><?php echo $title; ?></h1></div>

<?php
echo '<div class="clearfix"><div class="pull-right">' .
  BootstrapUtils::render_page_count_links() . '</div><div class="pull-left">';
require($template->get_template_dir('/tpl_modules_listing_display_order.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_listing_display_order.php');
echo '</div></div>';
?>

<br class="clearBoth" />

<?php
/**
 * display the new products
 */
require($template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_listing.php'); ?>


</form>

</div>
