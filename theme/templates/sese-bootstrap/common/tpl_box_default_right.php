<?php
/**
 * Common Template - tpl_box_default_right.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_right.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
  $panel_id = str_replace('_', '-', $box_id );
  $heading_id = $panel_id . 'Heading';
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div class="col-sm-4" id="<?php echo $panel_id; ?>">
  <h3 id="<?php echo $heading_id; ?>"><?php echo $title; ?></h3>
  <?php echo $content; ?>
</div>
<!--// eof: <?php echo $box_id; ?> //-->
