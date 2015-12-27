<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_product_listing.php 3241 2006-03-22 04:27:27Z ajeh $
 */
include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING));

$pagination_text = $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS);
$pagination_buttons = TEXT_RESULT_PAGE . ' ' .
  $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS,
    zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page')));
$has_rows = $listing_split->number_of_rows > 0;
$show_top_pagination = $has_rows &&
  ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'));
$show_bottom_pagination = $has_rows &&
  ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'));
?>
<div id="productListing">

<?php if ($show_top_pagination) { ?>
<div id="productsListingListingTopLinks" class="navSplitPagesLinks clearfix">
  <div id="productsListingTopNumber" class="navSplitPagesResult pull-left">
    <?php echo $pagination_text; ?>
  </div>
  <div class='pull-right'><?php echo $pagination_buttons; ?></div>
</div>
<?php
} ?>

<?php
// Display the products table
require($template->get_template_dir(
  'tpl_tabular_display.php', DIR_WS_TEMPLATE, $current_page_base,'common') .
  '/tpl_tabular_display.php');

if ($show_bottom_pagination) { ?>
<div id="productsListingListingBottomLinks" class="navSplitPagesLinks clearfix">
  <div id="productsListingBottomNumber" class="navSplitPagesResult pull-left">
    <?php echo $pagination_text; ?>
  </div>
  <div class='pull-right'><?php echo $pagination_buttons; ?></div>
</div>
<?php
} ?>

</div>  <!-- #productListing -->

<?php
// Close the Add to Cart form
if ($show_form) {
  echo "</form>";
} ?>
