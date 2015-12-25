<?php
/** The Subscribe Sidebox displays a form for subscribing to our newsletter. */
$show_subscribe_sidebox = true;
if ($show_subscribe_sidebox === true) {
  $subscribe_template = 'tpl_subscribe_sidebox.php';
  require($template->get_template_dir(
    $subscribe_template, DIR_WS_TEMPLATE, $current_page_base, 'sideboxes'
  ) .  '/' . $subscribe_template);
  $title = BOX_HEADING_SUBSCRIBE_SIDEBOX;
  $left_corner = $right_corner = $right_arrow = false;
  require($template->get_template_dir(
    $column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common'
  ) .  '/' . $column_box_default);
}

?>
