<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=account_history_info.<br />
 * Displays information related to a single specific order
 *
 * TODO: Clean Up, Seperate, Refactor - I'm sorry :/
 *
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_history_info_default.php 6247 2007-04-21 21:34:47Z wilt $
 */
?>
<div class="centerColumn" id="accountHistInfo">

<div class='page-header'><h1>
    <?php echo sprintf(HEADING_ORDER_NUMBER, $_GET['order_id']); ?>
    <small><?php echo zen_date_short($order->info['date_purchased']); ?></small>
</h1></div>

<address>
<b>Southern Exposure Seed Exchange</b><br/>
P.O. Box 460<br/>
Mineral, VA 23117<br/>
<abbrev title="Email">E:</abbrev>
  <a href="mailto:gardens@southernexposure.com?subject=SESE Order <?php echo $_GET[order_id]; ?>">
    gardens@southernexposure.com</a><br/>
<abbrev title="Phone">P:</abbrev> 540-894-9480<br/>
<abbrev title="Fax">F:</abbrev> 540-266-1021
</address>

<table class='table table-condensed table-striped'
       summary="Itemized listing of previous order, includes number ordered, items and prices">
  <thead>
    <tr class="tableHeading">
        <th scope="col" id="myAccountQuantity"><?php echo HEADING_QUANTITY; ?></th>
        <th scope="col" id="myAccountProducts"><?php echo HEADING_PRODUCTS; ?></th><?php
        if (sizeof($order->info['tax_groups']) > 1) { ?>
          <th scope="col" class='text-right' id="myAccountTax"><?php echo HEADING_TAX; ?></th><?php
        } ?>
        <th scope="col" class='text-right' id="myAccountTotal"><?php echo HEADING_TOTAL; ?></th>
    </tr>
  </thead>
  <tbody><?php
    for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) { ?>
      <tr>
        <td class="accountQuantityDisplay"><?php echo  $order->products[$i]['qty'] . QUANTITY_SUFFIX; ?></td>
        <td class="accountProductDisplay"><?php echo  $order->products[$i]['name'];
          if ((isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
            echo '<ul id="orderAttribsList">';
            for ($j = 0, $n2 = sizeof($order->products[$i]['attributes']); $j < $n2; $j++) {
              echo '<li>' . $order->products[$i]['attributes'][$j]['option'] . TEXT_OPTION_DIVIDER . nl2br(zen_output_string_protected($order->products[$i]['attributes'][$j]['value'])) . '</li>';
            }
            echo '</ul>';
          } ?>
        </td><?php
        if (sizeof($order->info['tax_groups']) > 1) { ?>
          <td class="accountTaxDisplay text-right"><?php
            echo zen_display_tax_value($order->products[$i]['tax']) . '%' ?>
          </td><?php
        } ?>
        <td class="accountTotalDisplay text-right"><?php
          echo $currencies->format(zen_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']);
          if ($order->products[$i]['onetime_charges'] != 0) {
            echo '<br />' . $currencies->format(zen_add_tax($order->products[$i]['onetime_charges'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']);
          } ?>
        </td>
      </tr><?php
    } ?>
    <tr><td colspan="42">&nbsp;</td></tr>
  </tbody>
  <tfoot><?php
    $footer_col_span = sizeof($order->info['tax_groups']) > 1 ? 3 : 2;
    for ($i=0, $n=sizeof($order->totals); $i<$n; $i++) { ?>
      <tr>
        <th class='text-right' colspan="<?php echo $footer_col_span; ?>">
          <?php echo $order->totals[$i]['title']; ?>
        </th>
        <td class='text-right'><?php echo $order->totals[$i]['text']; ?></td>
      </tr><?php
    } ?>
  </tfoot>
</table>


<?php
/**
 * Used to display any downloads associated with the cutomers account
 */
if (DOWNLOAD_ENABLED == 'true') {
  require($template->get_template_dir('tpl_modules_downloads.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_downloads.php');
}



/**
 * Used to loop thru and display order status information
 */
if (sizeof($statusArray)) { ?>
  <table class='table table-condensed table-striped' summary="Table contains the date, order status and any comments regarding the order">
    <caption><h2 id="orderHistoryStatus"><?php echo HEADING_ORDER_HISTORY; ?></h2></caption>
    <thead>
      <tr class="tableHeading">
        <th scope="col" id="myAccountStatusDate"><?php echo TABLE_HEADING_STATUS_DATE; ?></th>
        <th scope="col" id="myAccountStatus"><?php echo TABLE_HEADING_STATUS_ORDER_STATUS; ?></th>
        <th scope="col" id="myAccountStatusComments"><?php echo TABLE_HEADING_STATUS_COMMENTS; ?></th>
      </tr>
    </thead>
    <tbody><?php
      foreach ($statusArray as $statuses) { ?>
        <tr>
          <td><?php echo zen_date_short($statuses['date_added']); ?></td>
          <td><?php echo $statuses['orders_status_name']; ?></td>
          <td><?php echo (empty($statuses['comments']) ? '&nbsp;' : nl2br(zen_output_string_protected($statuses['comments']))); ?></td>
        </tr><?php
      } ?>
    </tbody>
  </table><?php
} ?>

<div id="myAccountShipInfo" class="col-sm-6"><?php
  if ($order->delivery != false) { ?>
    <h3><?php echo HEADING_DELIVERY_ADDRESS; ?></h3>
    <address><?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?></address><?php
  }

  if (zen_not_null($order->info['shipping_method'])) { ?>
    <h4><?php echo HEADING_SHIPPING_METHOD; ?></h4>
    <div><?php echo $order->info['shipping_method']; ?></div><?php
  } else { ?>
    <div>WARNING: Missing Shipping Information - Please Contact Customer Service</div><?php
  } ?>
</div>

<div id="myAccountPaymentInfo" class="col-sm-6">
  <h3><?php echo HEADING_BILLING_ADDRESS; ?></h3>
  <address><?php
    echo zen_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br />'); ?>
  </address>

  <h4><?php echo HEADING_PAYMENT_METHOD; ?></h4>
  <div><?php echo $order->info['payment_method']; ?></div>
</div>


</div>
