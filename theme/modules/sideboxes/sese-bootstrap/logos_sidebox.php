<?php
/** The Logos Sidebox shows Payment, Social & Partner Logo Images & Links */
$show_logos_sidebox = true;
if ($show_logos_sidebox === true) {
  $logos_template = 'tpl_logos_sidebox.php';
  require($template->get_template_dir(
    $logos_template, DIR_WS_TEMPLATE, $current_page_base, 'sideboxes'
  ) .  '/' . $logos_template);
  $title = BOX_HEADING_LOGOS_SIDEBOX;
  $left_corner = $right_corner = $right_arrow = false;
  require($template->get_template_dir(
    $column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common'
  ) .  '/' . $column_box_default);
}

?>
