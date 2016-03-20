<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=account_history.<br />
 * Displays all customers previous orders
 *
 * TODO: Cleanup, Refactor - Sorry :(
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_history_default.php 2580 2005-12-16 07:31:21Z birdbrain $
 */

$history_split = new BootstrapSplitPageResults($history_query_raw, MAX_DISPLAY_ORDER_HISTORY);
?>
<div class="centerColumn" id="accountHistoryDefault">

<div class='page-header'>
  <h1 id="accountHistoryDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
</div><?php

if ($accountHasHistory === true) {
  foreach ($accountHistory as $history) { ?>

    <fieldset class='clearfix'>
      <legend><?php echo TEXT_ORDER_NUMBER . $history['orders_id']; ?></legend>
      <div>
      </div>
      <div>
        <div class="col-sm-7" >
          <span class='visible-xs'><strong><?php echo TEXT_ORDER_STATUS; ?></strong><span class='text-info'><?php echo $history['orders_status_name']; ?></span></span>
          <?php echo '<strong>' . TEXT_ORDER_DATE . '</strong> ' . zen_date_long($history['date_purchased']) . '<br /><strong>' . $history['order_type'] . '</strong> ' . zen_output_string_protected($history['order_name']); ?>
          <br />
          <?php echo '<strong>' . TEXT_ORDER_PRODUCTS . '</strong> ' . $history['product_count'] . '<br /><strong>' . TEXT_ORDER_COST . '</strong> ' . strip_tags($history['order_total']); ?>
        </div>
        <div class="col-sm-5 text-center">
          <span class='hidden-xs'><strong><?php echo TEXT_ORDER_STATUS; ?></strong><span class='text-info'><?php echo $history['orders_status_name']; ?></span></span>
          <br />
          <a class='btn btn-lg btn-primary'
             href="<?php echo zen_href_link(FILENAME_ACCOUNT_HISTORY_INFO, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'order_id=' . $history['orders_id'], 'SSL'); ?>">
            <?php echo BUTTON_VIEW_SMALL_ALT; ?>
          </a>
        </div>
      </div>
    </fieldset><?php
  } ?>
  <div class="navSplitPagesLinks clearfix">
    <div class="navSplitPagesResult pull-left">
      <?php echo $history_split->display_count(TEXT_DISPLAY_NUMBER_OF_ORDERS); ?>
    </div>
    <div class="pull-right"><?php
        echo TEXT_RESULT_PAGE . ' ' . $history_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?>
    </div>
  </div><?php
} else { ?>
  <p class="text-center">
    <?php echo TEXT_NO_PURCHASES; ?>
  </p><?php
} ?>

<div class='clearfix'>
  <p class="pull-left">
    <a class='btn btn-default'
       href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>">
      <?php echo BUTTON_BACK_ALT; ?>
    </a>
  </p>
</div>

</div>
