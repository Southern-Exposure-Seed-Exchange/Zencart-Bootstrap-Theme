<?php
/** The Contact Us Sidebox Shows the Contact Information for the Business */
$show_contact_us_sidebox = true;
if ($show_contact_us_sidebox === true) {
  $contact_us_template = 'tpl_contact_us_sidebox.php';
  require($template->get_template_dir(
    $contact_us_template, DIR_WS_TEMPLATE, $current_page_base, 'sideboxes'
  ) .  '/' . $contact_us_template);
  $title = BOX_HEADING_CONTACT_US_SIDEBOX;
  $title_link = FILENAME_CONTACT_US;
  $left_corner = $right_corner = $right_arrow = false;
  require($template->get_template_dir(
    $column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common'
  ) .  '/' . $column_box_default);
}

?>
