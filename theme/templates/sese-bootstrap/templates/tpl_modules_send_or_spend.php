<?php
/**
 * Module Template
 *
 * Template stub used to display Gift Certificates box
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_send_or_spend.php 2987 2006-02-07 22:30:30Z drbyte $
 */

include(DIR_WS_MODULES . zen_get_module_directory('send_or_spend.php')); ?>

<h4><?php echo BOX_HEADING_GIFT_VOUCHER; ?></h4>
<p><?php echo TEXT_SEND_OR_SPEND; ?></p>
<p class="pull-right">
  <a href='<?php echo zen_href_link(FILENAME_GV_SEND, '', 'SSL'); ?>' class='btn btn-default'>
    <?php echo BUTTON_SEND_A_GIFT_CERT_ALT; ?>
  </a>
</p>
<p><?php echo  TEXT_BALANCE_IS . $customer_gv_balance; ?></p>
