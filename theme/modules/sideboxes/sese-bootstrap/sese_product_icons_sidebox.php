<?php
/** The SESE Product Icons Sidebox shows the Organic, Heirloom,
 * Ecologically-Grown and Suited-for-Southeast Icons */
$show_sese_product_icons_sidebox = true;
if ($show_sese_product_icons_sidebox === true) {
  $product_icons_template = 'tpl_sese_product_icons_sidebox.php';
  require($template->get_template_dir(
    $product_icons_template, DIR_WS_TEMPLATE, $current_page_base, 'sideboxes'
  ) .  '/' . $product_icons_template);
  $title = BOX_HEADING_SESE_PRODUCT_ICONS_SIDEBOX;
  $left_corner = $right_corner = $right_arrow = false;
  require($template->get_template_dir(
    $column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common'
  ) .  '/' . $column_box_default);
}
?>
