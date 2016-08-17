<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_payment_address.<br />
 * Allows customer to change the billing address.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_payment_address_default.php 4852 2006-10-28 06:47:45Z drbyte $
 */
?>
<div class="centerColumn" id="checkoutPayAddressDefault">

<div class='page-header'>
  <h1 id="checkoutPayAddressDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
</div><?php

echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'),
                   'post', 'class="form-horizontal" onsubmit="return check_form_optional(checkout_address);"');

  if ($messageStack->size('checkout_address') > 0) { echo $messageStack->output('checkout_address'); } ?>

  <h2 id="checkoutPayAddressDefaultAddress"><?php echo TITLE_PAYMENT_ADDRESS; ?></h2><?php
  echo BootstrapUtils::render_address($_SESSION['customer_id'], $_SESSION['billto']); ?>
  <p class="text-info"><?php echo TEXT_SELECTED_PAYMENT_DESTINATION; ?></p><?php
  if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
    /* require template to collect address details */
    require($template->get_template_dir('tpl_modules_checkout_new_address.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') .
            '/' . 'tpl_modules_checkout_new_address.php');
  }
  if ($addresses_count > 1) { ?>
    <fieldset>
      <legend><?php echo TABLE_HEADING_NEW_PAYMENT_ADDRESS; ?></legend><?php
      require($template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base,'templates') .
              '/' . 'tpl_modules_checkout_address_book.php'); ?>
    </fieldset><?php
  }

  echo zen_draw_hidden_field('action', 'submit');
  echo BootstrapCheckout::render_continue_checkout(
    $process ? zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL') : false, true) ;
?>
</form>
</div>
