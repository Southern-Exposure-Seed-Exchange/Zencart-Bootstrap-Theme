<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_shipping.<br />
 * Displays allowed shipping modules for selection by customer.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 2007
 */
?>
<div class="centerColumn" id="checkoutShipping">

<?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) .
           zen_draw_hidden_field('action', 'process'); ?>

<div class='page-header'><h1><?php echo NAVBAR_TITLE_2; ?></h1></div>

<?php if ($messageStack->size('checkout_shipping') > 0) echo $messageStack->output('checkout_shipping'); ?>

<?php echo BootstrapCheckout::render_checkout_progress($COWOA ? 2 : 1, $COWOA); ?>

<h2 id="checkoutShippingHeadingAddress"><?php echo TITLE_SHIPPING_ADDRESS; ?></h2>

<div class='clearfix'>
  <div id="checkoutShipto">
    <?php if ($displayAddressEdit) { ?>
      <div class="pull-right">
        <a href='<?php echo $editShippingButtonLink; ?>' class='btn btn-default'>
        <?php echo BUTTON_CHANGE_ADDRESS_ALT; ?></a></div>
    <?php }
    echo BootstrapUtils::render_address($_SESSION['customer_id'], $_SESSION['sendto']); ?>
  </div>
  <p class='text-center text-info'><?php echo TEXT_CHOOSE_SHIPPING_DESTINATION; ?></p>
</div>

<?php
  if (zen_count_shipping_modules() > 0) {
    if (zen_not_null(TABLE_HEADING_SHIPPING_METHOD)) { ?>
      <h2 id="checkoutShippingHeadingMethod"><?php echo TABLE_HEADING_SHIPPING_METHOD; ?></h2><?php
    }
    $sese_only_one_shipping_zone = false;
    if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) { ?>
      <div id="checkoutShippingContentChoose" class="important">
        <?php echo TEXT_CHOOSE_SHIPPING_METHOD; ?></div><?php
    } elseif ($free_shipping == false) {
      $sese_only_one_shipping_zone = true;
    }
    if ($free_shipping == true) { ?>
      <div id="freeShip" class="important" >
        <?php echo FREE_SHIPPING_TITLE . '&nbsp;' . $quotes[$i]['icon']; ?>
      </div>
      <div id="defaultSelected">
        <?php echo
          sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) .
          zen_draw_hidden_field('shipping', 'free_free'); ?></div><?php
    } else {
      $radio_buttons = 0;
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) { ?>
        <fieldset>
          <legend>
            <?php echo $quotes[$i]['module'] . '&nbsp;';
            if (isset($quotes[$i]['icon']) && zen_not_null($quotes[$i]['icon'])) { echo $quotes[$i]['icon']; } ?>
          </legend><?php
          if (isset($quotes[$i]['error'])) { ?>
            <div><?php echo $quotes[$i]['error']; ?></div><?php
          } else {
            $quote_id = $quotes[$i]['id'];
            for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
              $method_id = $quotes[$i]['methods'][$j]['id'];
              $checked = ($quote_id . $method_id == $_SESSION['shipping']['id']) ?
                'true' : 'false';
              $method_cost = $quotes[$i]['methods'][$j]['cost']; ?>
              <div class='clearfix'>
                <div class="pull-right"><strong><?php
                  if (($n > 1) || ($n2 > 1)) {
                    echo $currencies->format(zen_add_tax($method_cost, (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0)));
                  } else {
                    echo $currencies->format(zen_add_tax($method_cost, $quotes[$i]['tax'])) .
                         zen_draw_hidden_field('shipping', $quote_id . '_' . $method_id);
                  } ?>
                </strong></div>
                <div class='form-group'>
                  <label for="ship-<?php echo $quote_id . '-' . $method_id; ?>" class="checkbox-inline" ><?php
                    echo zen_draw_radio_field(
                      'shipping', $quote_id . '_' . $method_id, $checked, 'id="ship-'. $quote_id . '-' . $method_id . '"');
                    echo $quotes[$i]['methods'][$j]['title']; ?>
                  </label>
                </div>
              </div><?php
              $radio_buttons++;
            }
          }
          if ($sese_only_one_shipping_zone === true) { ?>
            <p class='text-info text-center' id="checkoutShippingContentChoose"><strong>
              <?php echo TEXT_ENTER_SHIPPING_INFORMATION; ?>
            </strong></p><?php
          } ?>
        </fieldset><?php
      }
    }
  } else { ?>
    <h2 id="checkoutShippingHeadingMethod"><?php echo TITLE_NO_SHIPPING_AVAILABLE; ?></h2>
    <div id="checkoutShippingContentChoose" class="important"><?php echo TEXT_NO_SHIPPING_AVAILABLE; ?></div><?php
  } ?>
  <fieldset class="shipping" id="comments">
    <legend><?php echo TABLE_HEADING_COMMENTS; ?></legend>
    <div class='form-group'>
      <?php echo zen_draw_textarea_field('comments', '45', '3', '', 'class="form-control"'); ?>
    </div>
  </fieldset>

  <p class='text-center'><b><?php echo TEXT_EXTRA_SHIPPING; ?></b></p>

  <?php echo BootstrapCheckout::render_continue_checkout(); ?>

</form>
</div>
