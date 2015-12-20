<?php
/**
 * Common Template - tpl_columnar_display.php
 *
 * This file is used for generating tabular output where needed, based on the supplied array of table-cell contents.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_columnar_display.php 3157 2006-03-10 23:24:22Z drbyte $
 */
# Number of items to show per screen size
$items_in_large_screen = 6;
$items_in_medium_screen = 4;
$items_in_small_screen = 2;

if ($title) {
  echo $title;
}
if (is_array($list_box_contents) > 0 ) {
  $item_number = 0;
  echo '<div class="row">';
  for ($row=0; $row < sizeof($list_box_contents); $row++) {
    for ($col=0; $col < sizeof($list_box_contents[$row]); $col++) {
      # Signify New Rows for Screen Sizes
      if ($item_number % $items_in_large_screen === 0) {
        echo '<div class="clearfix visible-lg-block"></div>';
      }
      if ($item_number % $items_in_medium_screen === 0) {
        echo '<div class="clearfix visible-md-block"></div>';
      }
      if ($item_number % $items_in_small_screen === 0) {
        echo '<div class="clearfix visible-sm-block visible-xs-block"></div>';
      }

      # Display the Item
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) {
        $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
      }
      if (isset($list_box_contents[$row][$col]['text'])) {
        echo '<div' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</div>' . "\n";
      }
      $item_number++;
    }
  }
  echo '</div>';
}

?>
