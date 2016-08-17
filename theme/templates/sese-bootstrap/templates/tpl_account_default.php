<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=account.<br />
 * Displays previous orders and options to change various Customer Account settings
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_default.php 4086 2006-08-07 02:06:18Z ajeh $
 */
?>

<div class="centerColumn" id="accountDefault">

<div class='page-header'>
  <h1 id="accountDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
</div><?php

if ($messageStack->size('account') > 0) echo $messageStack->output('account');

if (zen_count_customer_orders() > 0) { ?>
  <div class='clearfix'>
  <h2 class='text-center'><?php echo OVERVIEW_PREVIOUS_ORDERS; ?></h2>
  <table class='table table-condensed table-striped' id="prevOrders">
    <thead><tr>
      <th scope="col"><?php echo TABLE_HEADING_DATE; ?></th>
      <th scope="col"><?php echo TABLE_HEADING_ORDER_NUMBER; ?></th>
      <th scope="col"><?php echo TABLE_HEADING_SHIPPED_TO; ?></th>
      <th scope="col"><?php echo TABLE_HEADING_STATUS; ?></th>
      <th scope="col" class='text-right'><?php echo TABLE_HEADING_TOTAL; ?></th>
      <th scope="col" class='text-center'><?php echo TABLE_HEADING_VIEW; ?></th>
    </tr></thead>
    <tbody><?php
      foreach($ordersArray as $orders) { ?>
        <tr>
          <td><?php echo zen_date_short($orders['date_purchased']); ?></td>
          <td><?php echo TEXT_NUMBER_SYMBOL . $orders['orders_id']; ?></td>
          <td><address>
            <?php echo zen_output_string_protected($orders['order_name']) . '<br />' . $orders['order_country']; ?>
          </address></td>
          <td><?php echo $orders['orders_status_name']; ?></td>
          <td class='text-right'><?php echo $orders['order_total']; ?></td>
          <td class='text-center'>
            <a href='<?php echo zen_href_link(FILENAME_ACCOUNT_HISTORY_INFO,
                                              'order_id=' . $orders['orders_id'], 'SSL'); ?>'
               class='btn btn-xs btn-default'>
              <?php echo BUTTON_VIEW_SMALL_ALT; ?>
            </a>
          </td>
        </tr><?php
      } ?>
    </tbody>
  </table>
  <small class='pull-right'><a class="btn btn-default"
      href='<?php echo zen_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'); ?>'>
    <?php echo OVERVIEW_SHOW_ALL_ORDERS; ?></a></small>
  </div><?php
} ?>


<div id="accountLinksWrapper" class="col-sm-6">
  <h4><?php echo MY_ACCOUNT_TITLE; ?></h4>
  <ul id="myAccountGen" class="list">
    <li><a href='<?php echo zen_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') ?>'>
      <?php echo MY_ACCOUNT_INFORMATION; ?></a></li>
    <li><a href='<?php echo zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') ?>'>
      <?php echo MY_ACCOUNT_ADDRESS_BOOK; ?></a></li>
    <li><a href='<?php echo zen_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL') ?>'>
      <?php echo MY_ACCOUNT_PASSWORD; ?></a></li>
  </ul><?php

  if (CUSTOMERS_PRODUCTS_NOTIFICATION_STATUS == '1') { ?>
    <h4><?php echo EMAIL_NOTIFICATIONS_TITLE; ?></h4>
    <ul id="myAccountNotify" class="list">
      <li><a href='<?php echo zen_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'SSL'); ?>'>
        <?php echo EMAIL_NOTIFICATIONS_PRODUCTS; ?></a></li>
    </ul><?php
  } ?>
</div><?php

// only show when there is a GV balance
if ($customer_has_gv_balance ) { ?>
  <div id="gv-balance" class="col-sm-6 clearfix"><?php
    require($template->get_template_dir(
        'tpl_modules_send_or_spend.php', DIR_WS_TEMPLATE, $current_page_base, 'templates'
      ) . '/tpl_modules_send_or_spend.php'); ?>
  </div><?php
} ?>

</div>
