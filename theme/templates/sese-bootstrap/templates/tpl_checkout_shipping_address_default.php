<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_shipping_adresss.<br />
 * Allows customer to change the shipping address.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_shipping_address_default.php 4852 2006-10-28 06:47:45Z drbyte $
 */
?>
<div class="centerColumn" id="checkoutShipAddressDefault">

<div class='page-header'>
  <h1 id="checkoutShipAddressDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
</div>

<?php
echo zen_draw_form(
  'checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'),
  'post', 'class="form-horizontal" onsubmit="return check_form_optional(checkout_address);"');

  if ($messageStack->size('checkout_address') > 0) { echo $messageStack->output('checkout_address'); }

  if ($process == false || $error == true) { ?>
    <h2 id="checkoutShipAddressDefaultAddress"><?php echo TITLE_SHIPPING_ADDRESS; ?></h2>
    <address><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br />'); ?></address><?php
    if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
      /* require template to display new address form */
      require($template->get_template_dir('tpl_modules_checkout_new_address.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_new_address.php');
    }
    if ($addresses_count > 1) { ?>
      <fieldset>
        <legend><?php echo TABLE_HEADING_ADDRESS_BOOK_ENTRIES; ?></legend>
        <?php require($template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base,'templates') .
                      '/' . 'tpl_modules_checkout_address_book.php'); ?>
      </fieldset><?php
     }
  } ?>

<div class='clearfix'>
  <div class="pull-right"><?php echo zen_draw_hidden_field('action', 'submit') ?>
    <button type='submit' class='btn btn-primary'><?php echo BUTTON_CONTINUE_ALT; ?></button></div>
  <p class="pull-left"><?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE;
    if ($process == true) { ?>
        <?php echo '<a class="btn btn-default" href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL') . '">' .
          BUTTON_BACK_ALT . '</a>';
    } ?>
  </p>
</div>

</form>
</div>
