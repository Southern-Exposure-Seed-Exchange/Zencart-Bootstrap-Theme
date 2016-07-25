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
  <div id="indexProductListCatDescription" class="content"><?php echo $current_categories_description;  ?></div><?php
}

// Render the Sort Dropdown
if (isset($disp_order_default)) {
  echo '<div class="clearfix"><div class="pull-right">' .
      BootstrapUtils::render_page_count_links() . '</div><div class="pull-left">';
  require($template->get_template_dir('/tpl_modules_listing_display_order.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_listing_display_order.php');
  echo '</div></div>';
}

/**
 * require the code for listing products
 */
require($template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_listing.php');

// Show the Icon Legend
// TODO: Replace with Text Version
echo '<div class="hidden-xs col-sm-8 col-sm-offset-2">' . BootstrapIndexProductList::product_icon_legend() . '</div>';

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


<?php
class BootstrapIndexProductList
{
    public static function product_icon_legend() {
        global $template, $current_page;
        $product_icons = BootstrapUtils::sese_product_icons($template, $current_page);
        $content = "<ul class='media-list'>";
        foreach ($product_icons as $icon) {
            $content .=
                "<li class='media'>" .
                    "<div class='media-left media-middle'>" .
                        "<img class='media-object' src='{$icon['image']}' alt='{$icon['title']}' title='{$icon['description']}'>" .
                    "</div>" .
                    "<div class='media-body'>{$icon['description']}</div>" .
                "</li>";
        }
        $content .= "</ul>";
        return $content;
    }
}
?>
