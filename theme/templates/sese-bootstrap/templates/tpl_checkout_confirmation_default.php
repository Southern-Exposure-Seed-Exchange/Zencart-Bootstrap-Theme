<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_confirmation.<br />
 * Displays final checkout details, cart, payment and shipping info details.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 2007
 */
?>
<div class="centerColumn" id="checkoutConfirmDefault">

<div class='page-header'>
  <h1 id="checkoutPaymentHeading"><?php echo HEADING_TITLE; ?></h1>
</div><?php
echo ORDER_REVIEW;
echo BootstrapCheckout::render_checkout_progress($COWOA ? 4 : 3, $COWOA);

if ($messageStack->size('redemptions') > 0) echo $messageStack->output('redemptions');
if ($messageStack->size('checkout_confirmation') > 0) echo $messageStack->output('checkout_confirmation');
if ($messageStack->size('checkout') > 0) echo $messageStack->output('checkout');

if ($_SESSION['cart']->show_total() != 0) { ?>

<div id="checkoutBillto" class="col-sm-6 clearfix">
  <h4 id="checkoutConfirmDefaultBillingAddress"><?php
    echo HEADING_BILLING_ADDRESS;
    if (!$flagDisablePaymentAddressChange) { ?>
      <a href='<?php echo zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'); ?>'
          class='btn btn-default btn-xs pull-right'><?php echo BUTTON_EDIT_SMALL_ALT; ?></a><?php
    } ?>
  </h4>
  <address>
    <?php echo zen_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br />'); ?>
  </address>

  <?php $class =& $_SESSION['payment']; ?>

  <h4 id="checkoutConfirmDefaultPayment"><?php echo HEADING_PAYMENT_METHOD; ?></h4>
  <p id="checkoutConfirmDefaultPaymentTitle"><?php echo $GLOBALS[$class]->title; ?></p><?php
  if (is_array($payment_modules->modules)) {
    if ($confirmation = $payment_modules->confirmation()) { ?>
      <div><strong><?php echo $confirmation['title']; ?></strong></div><?php
    } ?>
    <div><?php
      for ($i = 0, $n = sizeof($confirmation['fields']); $i < $n; $i++) { ?>
        <div><strong><?php echo $confirmation['fields'][$i]['title']; ?></strong>
          <?php echo $confirmation['fields'][$i]['field']; ?></div><?php
      } ?>
    </div><?php
  } ?>
</div>

<?php
if ($_SESSION['sendto'] != false) { ?>
  <div id="checkoutShipto" class="col-sm-6 clearfix">
    <h4 id="checkoutConfirmDefaultShippingAddress"><?php echo HEADING_DELIVERY_ADDRESS; ?>
      <a href='<?php echo $editShippingButtonLink; ?>' class='btn btn-default btn-xs pull-right'>
        <?php echo BUTTON_EDIT_SMALL_ALT; ?></a></h4>

    <address>
      <?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?>
    </address><?php
    if ($order->info['shipping_method']) { ?>
      <h4 id="checkoutConfirmDefaultShipment"><?php echo HEADING_SHIPPING_METHOD; ?></h4>
      <p id="checkoutConfirmDefaultShipmentTitle"><?php echo $order->info['shipping_method']; ?></p><?php
    } ?>
  </div><?php
}

} ?>

<div class='hidden-xs clearfix'></div>
<hr />

<div class='col-sm-12 clearfix'>
  <h4 id="checkoutConfirmDefaultHeadingComments"><?php echo HEADING_ORDER_COMMENTS; ?>
    <a href='<?php echo zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'); ?>'
      class='btn btn-default btn-xs pull-right'><?php echo BUTTON_EDIT_SMALL_ALT; ?></a>
  </h4>
  <div><?php
    echo (empty($order->info['comments']) ? NO_COMMENTS_TEXT :
      nl2br(zen_output_string_protected($order->info['comments'])) .
      zen_draw_hidden_field('comments', $order->info['comments'])); ?>
  </div>
</div>
<hr />

<div class='col-sm-12 clearfix'>
  <h4 id="checkoutConfirmDefaultHeadingCart"><?php echo HEADING_PRODUCTS; ?>
    <a href='<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'SSL'); ?>'
       class='btn btn-default btn-xs pull-right'><?php echo BUTTON_EDIT_SMALL_ALT; ?></a>
  </h4><?php

  if ($flagAnyOutOfStock) {
    if (STOCK_ALLOW_CHECKOUT == 'true') { ?>
      <div class="messageStackError"><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></div><?php
    } else { ?>
      <div class="messageStackError"><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></div><?php
    }
  } ?>
  <table id="cartContentsDisplay" class='table table-condensed table-striped'>
    <thead><tr class="cartTableHeading">
      <th scope="col" class='text-right' id="ccQuantityHeading"><?php echo TABLE_HEADING_QUANTITY; ?></th>
      <th scope="col" id="ccProductsHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th><?php
      // If there are tax groups, display the tax columns for price breakdown
      if (sizeof($order->info['tax_groups']) > 1) { ?>
        <th scope="col" class='text-right' id="ccTaxHeading"><?php echo HEADING_TAX; ?></th><?php
      } ?>
      <th scope="col" class='text-right' id="ccTotalHeading"><?php echo TABLE_HEADING_TOTAL; ?></th>
    </tr></thead>
    <tbody><?php
      // now loop thru all products to display quantity and price
      for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) { ?>
        <tr class="<?php echo $order->products[$i]['rowClass']; ?>">
          <td  class="cartQuantity text-right"><?php echo $order->products[$i]['qty']; ?>&nbsp;x</td>
          <td class="cartProductDisplay"><?php
            echo $order->products[$i]['name'];
            echo $stock_check[$i];
            // if there are attributes, loop thru them and display one per line
            $product_has_attributes = isset($order->products[$i]['attributes']) &&
              sizeof($order->products[$i]['attributes']) > 0;
            if ($product_has_attributes) {
              echo '<ul class="cartAttribsList">';
              for ($j = 0, $n2 = sizeof($order->products[$i]['attributes']); $j < $n2; $j++) { ?>
                <li><?php
                  echo $order->products[$i]['attributes'][$j]['option'] . ': ' .
                  nl2br($order->products[$i]['attributes'][$j]['value']); ?></li><?php
              }
              echo '</ul>';
            } ?>
          </td><?php
          // display tax info if exists
          if (sizeof($order->info['tax_groups']) > 1) { ?>
            <td class="cartTotalDisplay text-right">
              <?php echo zen_display_tax_value($order->products[$i]['tax']); ?>%</td><?php
          } ?>
          <td class="cartTotalDisplay text-right"><?php
            echo $currencies->display_price(
              $order->products[$i]['final_price'], $order->products[$i]['tax'],
              $order->products[$i]['qty']);
            if ($order->products[$i]['onetime_charges'] != 0 ) {
              echo '<br /> ' .
                $currencies->display_price($order->products[$i]['onetime_charges'],
                  $order->products[$i]['tax'], 1);
            } ?>
          </td>
        </tr><?php
      } ?>
    </tbody>
  </table>
  <hr /><?php

  if (MODULE_ORDER_TOTAL_INSTALLED) {
    $order_totals = $order_total_modules->process(); ?>
    <div id="orderTotals"><?php $order_total_modules->output(); ?></div><?php
  } ?>
</div>


<?php
echo zen_draw_form(
  'checkout_confirmation', $form_action_url, 'post',
  'id="checkout_confirmation" onsubmit="submitonce();"');

  if (is_array($payment_modules->modules)) { echo $payment_modules->process_button(); } ?>
  <div class='clearfix'></div>
  <hr />
  <p class='text-center text-danger'>
    <strong>Please review your order, then place it by clicking "Confirm the Order"
    below.<br /> After placing the order, you will not be able to change it.</strong>
  </p>

  <div class='clearfix col-xs-12'>
    <p class='pull-right'><button type='submit' name='btn_submit' id='btn_submit' class='btn btn-success'>
      <?php echo BUTTON_CONFIRM_ORDER_ALT; ?></button></p>
    <div class="pull-left">
      <?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
    </div>
  </div>
</form>

</div>
