<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 4821 2006-10-23 10:54:15Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
if (!isset($flag_disable_footer)) { $flag_disable_footer = false; }
?>

<?php
if (!$flag_disable_footer) {
?>
<footer>
<div class='container'>
<div class='row'>
<div class='col-sm-12 text-center'>
<?php
/* Show the Visitors IP Address */
if (SHOW_FOOTER_IP == '1') { ?>
  <div id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php } ?>


<div><?php echo FOOTER_TEXT_BODY; ?><br /></div>

</div>  <!-- .col-sm-12 -->
</div>  <!-- .row -->
</div>  <!-- .container -->
<?php
} // flag_disable_footer
?>
