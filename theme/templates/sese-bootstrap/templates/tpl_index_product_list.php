<?php
/**
 * Page Template
 *
 * Loaded by main_page=index<br />
 * Displays product-listing when a particular category/subcategory is selected for browsing
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_index_product_list.php 15589 2010-02-27 15:03:49Z ajeh $
 */
?>
<div class="centerColumn" id="indexProductList">

<div class='page-header clearfix'>
  <?php
  if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS == 'true') {
    // Render the Category's Image
    if ($categories_image = zen_get_categories_image($current_category_id)) { ?>
      <div id="categoryImgListing" class="categoryImg pull-left">
        <?php echo zen_image(DIR_WS_IMAGES . $categories_image, '', '', '60', 'class="img-responsive"'); ?>
      </div>
  <?php
    }
  } ?>
  <h1 id="productListHeading" class='pull-left'><?php echo $breadcrumb->last(); ?></h1>
</div>


<?php
// Render the Category's Description
if ($current_categories_description != '') {
?>
  <div id="indexProductListCatDescription" class="content"><?php echo $current_categories_description;  ?></div>
<?php } ?>

<?php /*
  // TODO: Replace alpha filter with all products sort
  $check_for_alpha = $listing_sql;
  $check_for_alpha = $db->Execute($check_for_alpha);

  if ($do_filter_list || ($check_for_alpha->RecordCount() > 0 && PRODUCT_LIST_ALPHA_SORTER == 'true')) {
  $form = zen_draw_form('filter', zen_href_link(FILENAME_DEFAULT), 'get') . '<label class="inputLabel">' .TEXT_SHOW . '</label>';
  echo $form;
  echo zen_draw_hidden_field('main_page', FILENAME_DEFAULT);
  echo zen_hide_session_id();
  if (!$getoption_set) {
    echo zen_draw_hidden_field('cPath', $cPath);
  }
  if (isset($_GET['typefilter']) && $_GET['typefilter'] != '') echo zen_draw_hidden_field('typefilter', $_GET['typefilter']);
  echo zen_draw_hidden_field('sort', $_GET['sort']);
  if ($do_filter_list) {
    echo zen_draw_pull_down_menu('filter_id', $options, (isset($_GET['filter_id']) ? $_GET['filter_id'] : ''), 'onchange="this.form.submit()"');
  }
  require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER));
?>
</form>
<?php
  }
  // TODO: END alpha filter code */


/**
 * require the code for listing products
 */
require($template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_listing.php');

// Show the Icon Legend
// TODO: Find out if should remove
echo '<div class="hidden-xs"><center><img src="images/icons/key.png" /></center></div>';

// Handle Invalid Category
if ($error_categories == true) {
  // Verify Category Doesn't Exist, Set to None if So
  $check_category = $db->Execute("select categories_id from " . TABLE_CATEGORIES . " where categories_id='" . $cPath . "'");
  if ($check_category->RecordCount() == 0) {
    $new_products_category_id = '0';
    $cPath= '';
  }
}
?>

</div>  <!-- .centerColumn -->
