<?php
/**
 * index category_row.php
 *
 * Prepares the content for displaying a category's sub-category listing in grid format.
 * Once the data is prepared, it calls the standard tpl_list_box_content template for display.
 *
 * @package page
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: category_row.php 4084 2006-08-06 23:59:36Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
$title = '';
$num_categories = $categories->RecordCount();

$row = 0;
$col = 0;
$list_box_contents = '';
if ($num_categories > 0) {

  while (!$categories->EOF) {
    if (!$categories->fields['categories_image']) {
      !$categories->fields['categories_image'] = 'pixel_trans.gif';
    }
    $cPath_new = zen_get_path($categories->fields['categories_id']);

    // strip out 0_ from top level cats
    $cPath_new = str_replace('=0_', '=', $cPath_new);

    $category_link = zen_href_link(FILENAME_DEFAULT, $cPath_new);
    $category_image = zen_image(
      DIR_WS_IMAGES . $categories->fields['categories_image'],
      $categories->fields['categories_name'],
      0, 0, 'class="img-responsive img-center"');

    $list_box_contents[$row][$col] = array(
      'params' => "class='" . BootstrapUtils::$thumbnail_grid_classes . "'",
      'text' => "<a href='{$category_link}'>{$category_image}" .
        "<p>{$categories->fields['categories_name']}</p></a>");

    $col ++;
    if ($col > (MAX_DISPLAY_CATEGORIES_PER_ROW -1)) {
      $col = 0;
      $row ++;
    }
    $categories->MoveNext();
  }
}
?>
