<?php
/**
 * Page Template
 *
 * Loaded by main_page=index<br />
 * Displays category/sub-category listing<br />
 * Uses tpl_index_category_row.php to render individual items
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_index_categories.php 4678 2006-10-05 21:02:50Z ajeh $
 */
?>
<div class="centerColumn" id="indexCategories">

<?php if ($show_welcome == true) { ?>
<div class='page-header text-center'>
<h1 id="indexCategoriesHeading"><?php echo TEXT_GREETING_GUEST; ?></h1>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php } ?>
</div> <!-- .page-header -->

<?php
if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP == 'true') {
  // categories_image
  if ($categories_image = zen_get_categories_image($current_category_id)) {
?>
<div id="categoryImgListing" class="categoryImg">
<?php echo zen_image(DIR_WS_IMAGES . $categories_image, '',
  SUBCATEGORY_IMAGE_TOP_WIDTH, SUBCATEGORY_IMAGE_TOP_HEIGHT); ?>
</div>
<?php
  }
} // categories_image
?>

<?php
// categories_description
    if ($current_categories_description != '') {
?>
<div id="categoryDescription" class="catDescContent"><?php echo $current_categories_description;  ?></div>
<?php } // categories_description ?>

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<div id="indexCategoriesMainContent" class="content">
<?php /** require the html_define for the index/categories page */
  include($define_page); ?>
</div>
<?php } ?>

<?php } else { ?>
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
  <h1 id="indexCategoriesHeading" class='pull-left'><?php echo $breadcrumb->last(); ?></h1>
</div>  <!-- .page-header -->
<?php }
if ($current_categories_description != '') { ?>
<div id="categoryDescription" class="catDescContent">
  <?php echo $current_categories_description; ?>
</div>
<?php }

if (PRODUCT_LIST_CATEGORY_ROW_STATUS != 0) {
  // display subcategories
  require($template->get_template_dir(
    'tpl_modules_category_row.php', DIR_WS_TEMPLATE, $current_page_base,'templates') .
    '/tpl_modules_category_row.php');
}
?>
</div>
