<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_payment.<br />
 * Displays the allowed payment modules, for selection by customer.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 2007
 */
echo $payment_modules->javascript_validation(); ?>

<div class="centerColumn" id="checkoutPayment">

<div class='page-header'>
  <h1 id="checkoutPaymentHeading"><?php echo NAVBAR_TITLE_2; ?></h1>
</div><?php
echo zen_draw_form('checkout_payment', zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'),
                   'post', ($flagOnSubmit ? 'class="form-horizontal" onsubmit="return check_form();"' : ''));

echo BootstrapCheckout::render_checkout_progress($COWOA ? 3 : 2, $COWOA);

if ($messageStack->size('redemptions') > 0) { echo $messageStack->output('redemptions'); }
if ($messageStack->size('checkout') > 0) { echo $messageStack->output('checkout'); }
if ($messageStack->size('checkout_payment') > 0) { echo $messageStack->output('checkout_payment'); }

if (DISPLAY_CONDITIONS_ON_CHECKOUT == 'true') { ?>
  <fieldset>
    <legend><?php echo TABLE_HEADING_CONDITIONS; ?></legend>
    <p><?php echo TEXT_CONDITIONS_DESCRIPTION;?></p>
    <div class='form-group'>
      <label class="control-label col-sm-4" for="conditions"><?php echo TEXT_CONDITIONS_CONFIRM; ?></label>
      <div class='col-sm-8'>
        <?php echo  zen_draw_checkbox_field('conditions', '1', false, 'id="conditions"');?>
      </div>
    </div>
  </fieldset><?php
} ?>

<h2 id="checkoutPaymentHeadingAddress"><?php echo TITLE_BILLING_ADDRESS; ?></h2>

<div id="checkoutBillto" class="clearfix"><?php
  if (MAX_ADDRESS_BOOK_ENTRIES >= 2) { ?>
    <div class="pull-right">
      <a href="<?php echo zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'); ?>" class='btn btn-default'>
        <?php echo BUTTON_CHANGE_ADDRESS_ALT; ?>
      </a>
    </div><?php
  }
  echo BootstrapUtils::render_address($_SESSION['customer_id'], $_SESSION['billto']); ?>
  <p class='text-center text-info'><?php echo TEXT_SELECTED_BILLING_DESTINATION; ?></p>
</div><?php

if (MODULE_ORDER_TOTAL_INSTALLED) { ?>
<fieldset id="checkoutOrderTotals">
  <legend id="checkoutPaymentHeadingTotal"><?php echo TEXT_YOUR_TOTAL; ?></legend>
  <div class='clearfix'><?php
    $order_totals = $order_total_modules->process();
    $order_total_modules->output(); ?>
  </div>
</fieldset><?php
}

$selection = $order_total_modules->credit_selection();
if (sizeof($selection) > 0) {
  for ($i=0, $n=sizeof($selection); $i < $n; $i++) {
    if ($_GET['credit_class_error_code'] == $selection[$i]['id']) { ?>
      <div class="messageStackError"><?php echo zen_output_string_protected($_GET['credit_class_error']); ?></div><?php
    }
    for ($j=0, $n2=sizeof($selection[$i]['fields']); $j < $n2; $j++) { ?>
      <fieldset>
        <legend><?php echo $selection[$i]['module']; ?></legend><?php
        if(!($COWOA && $selection[$i]['module'] == MODULE_ORDER_TOTAL_GV_TITLE)) {
          echo "<p>" . $selection[$i]['redeem_instructions'] . "</p>"; ?>
          <div class="gvBal"><?php echo $selection[$i]['checkbox']; ?></div>
          <div class='form-group'>
            <label class="control-label col-sm-4"<?php echo ($selection[$i]['fields'][$j]['tag']) ? ' for="'.$selection[$i]['fields'][$j]['tag'].'"': ''; ?>><?php
              echo $selection[$i]['fields'][$j]['title']; ?></label>
            <div class='col-sm-8 credit-selection-input'><?php
              echo $selection[$i]['fields'][$j]['field']; ?>
            </div>
          </div><?php
        } else {
          echo '<a href="'. zen_href_link(FILENAME_GV_FAQ,'faq_item=4','NONSSL') . '">' .
            'Redeeming ' . TEXT_GV_NAMES . '</a><br />';
        } ?>
      </fieldset><?php
    }
  }
} ?>

<fieldset>
  <legend><?php echo TABLE_HEADING_PAYMENT_METHOD; ?></legend><?php
  if (SHOW_ACCEPTED_CREDIT_CARDS != '0') {
    if (SHOW_ACCEPTED_CREDIT_CARDS == '1') {
      echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled();
    }
    if (SHOW_ACCEPTED_CREDIT_CARDS == '2') {
      echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled('IMAGE_');
    }
  }

  $selection = $payment_modules->selection();

  if (sizeof($selection) > 1) { ?>
    <p class="important"><?php echo TEXT_SELECT_PAYMENT_METHOD; ?></p><?php
  } elseif (sizeof($selection) == 0) { ?>
    <p class="important"><?php echo TEXT_NO_PAYMENT_OPTIONS_AVAILABLE; ?></p> <?php
  }

  $radio_buttons = 0;
  for ($i=0, $n=sizeof($selection); $i < $n; $i++) {
    $selection_id = $selection[$i]['id'];
    if (sizeof($selection) > 1) {
      if (empty($selection[$i]['noradio'])) {
        echo zen_draw_radio_field(
          'payment', $selection_id, $selection_id == $_SESSION['payment'],
          'id="pmt-' . $sqlite_last_insert_rowid . '"');
      }
    } else {
      echo zen_draw_hidden_field('payment', $selection_id);
    } ?>
    <label for="pmt-<?php echo $selection_id; ?>" class="radioButtonLabel"><?php echo $selection[$i]['module']; ?></label><?php
    if (defined('MODULE_ORDER_TOTAL_COD_STATUS') && MODULE_ORDER_TOTAL_COD_STATUS == 'true' and $selection[$i]['id'] == 'cod') { ?>
      <p><?php echo TEXT_INFO_COD_FEES; ?></p><?php
    }

    if (isset($selection[$i]['error'])) { ?>
      <div><?php echo $selection[$i]['error']; ?></div><?php
    } elseif (isset($selection[$i]['fields']) && is_array($selection[$i]['fields'])) { ?>
      <div class="ccinfo"><?php
        for ($j=0, $n2=sizeof($selection[$i]['fields']); $j < $n2; $j++) { ?>
          <div class='form-group'>
            <label <?php echo (isset($selection[$i]['fields'][$j]['tag']) ? 'for="'.$selection[$i]['fields'][$j]['tag'] . '" ' : ''); ?>class="control-label col-sm-4"><?php
              echo $selection[$i]['fields'][$j]['title']; ?></label>
            <div class='col-sm-8'>
              <?php echo $selection[$i]['fields'][$j]['field']; ?>
            </div>
          </div><?php
        } ?>
      </div><?php
    }
    $radio_buttons++;
  } ?>
</fieldset>

<fieldset>
  <legend><?php echo TABLE_HEADING_COMMENTS; ?></legend>
  <div class='form-group'>
    <?php echo zen_draw_textarea_field('comments', '45', '3', '~*~*#', 'class="form-control"'); ?>
  </div>
</fieldset>

<div class='clearfix'>
  <p class="pull-right">
    <button type='submit' class='btn btn-primary'
            onclick="<?php echo 'submitFunction(' . zen_user_has_gv_account($_SESSION['customer_id']) . ',' . $order->info['total'] . ')'; ?>">
      <?php echo BUTTON_CONTINUE_ALT;?></button>
  </p>
  <p class="pull-left"><strong><?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE; ?></strong>
    <?php echo TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?></p>
</div>

</form>
</div>
