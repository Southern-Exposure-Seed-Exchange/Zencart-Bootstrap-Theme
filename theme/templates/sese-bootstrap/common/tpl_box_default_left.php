<?php
/**
 * Common Template - tpl_box_default_left.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_left.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
  $panel_id = str_replace('_', '-', $box_id );
  $heading_id = $panel_id . 'Heading';
  $show_heading = $title !== '';
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div class="panel panel-default" id="<?php echo $panel_id; ?>">
<?php if ($show_heading) { ?>
  <div class='panel-heading text-center'>
    <h3 class="panel-title" id="<?php echo $heading_id; ?>"><b>
      <?php echo $title; ?>
    </b></h3>
  </div>
<?php } ?>
  <div class='panel-body'>
    <?php echo $content; ?>
  </div>
</div>
<!--// eof: <?php echo $box_id; ?> //-->
