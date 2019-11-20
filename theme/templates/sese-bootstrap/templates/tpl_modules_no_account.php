<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=create_account.<br />
 * Displays Create Account form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2007 Joseph Schilz
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 20077
 */
?>

<?php if ($messageStack->size('no_account') > 0) echo $messageStack->output('no_account'); ?>

<?php

  if (DISPLAY_PRIVACY_CONDITIONS == 'true') {
?>
<fieldset>
<legend><?php echo TABLE_HEADING_PRIVACY_CONDITIONS; ?></legend>
<div class="information"><?php echo TEXT_PRIVACY_CONDITIONS_DESCRIPTION;?></div>
<div class='form-group'>
  <label class="control-label col-sm-4" for="privacy"><?php echo TEXT_PRIVACY_CONDITIONS_CONFIRM;?></label>
  <div class='col-sm-8'>
    <?php echo zen_draw_checkbox_field('privacy_conditions', '1', false, 'id="privacy" class="form-control"');?>
  </div>
</div>
</fieldset>
<?php
  }
?>
<!-- COWOA - Check Cart to see if money is owed or free products only -->
<?php
 if ($_SESSION['cart']->show_total() == 0 and COWOA_EMAIL_ONLY == 'true') {
?>
<!-- COWOA - Cart Totals are Zero, so just ask for e-mail address -->
<fieldset>
<legend><?php echo TABLE_HEADING_CONTACT_DETAILS; ?></legend>
<div class='form-control'>
  <label class="control-label" for="email-address"><?php echo ENTRY_EMAIL_ADDRESS . BootstrapForms::required_text(ENTRY_EMAIL_ADDRESS_TEXT); ?></label>
  <?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control" id="email-address"'); ?>
</div>
</fieldset>
<fieldset>
<legend><?php echo ENTRY_EMAIL_PREFERENCE; ?></legend>
<?php
  if (ACCOUNT_NEWSLETTER_STATUS != 0) {
    echo zen_draw_checkbox_field('newsletter', '1', $newsletter, 'id="newsletter-checkbox"') . '<label class="checkboxLabel" for="newsletter-checkbox">' . ENTRY_NEWSLETTER . '</label>' . BootstrapForms::required_text(ENTRY_NEWSLETTER_TEXT);
  } ?>
</fieldset>
<?php
} else {
  if (ACCOUNT_COMPANY == 'true') { ?>
<fieldset>
<legend><?php echo CATEGORY_COMPANY; ?></legend>
<div class='form-group'>
  <label class="control-label col-sm-4" for="company"><?php echo ENTRY_COMPANY . BootstrapForms::required_text(ENTRY_COMPANY_TEXT); ?></label>
  <div class='col-sm-8'>
  <?php echo zen_draw_input_field('company', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_company', '40') . ' class="form-control" id="company"'); ?>
  </div>
</div>
</fieldset>
<?php
  } ?>

<fieldset>
  <legend><?php echo TABLE_HEADING_ADDRESS_DETAILS; ?></legend>
  <?php BootstrapForms::echo_shipping_address_form(); ?>
</fieldset>

<fieldset>
<legend><?php echo TABLE_HEADING_CONTACT_DETAILS; ?></legend>
<div class='form-group'>
<label class="control-label col-sm-4" for="email-address"><?php echo BootstrapForms::required_text(ENTRY_EMAIL_ADDRESS_TEXT). ENTRY_EMAIL_ADDRESS; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control" id="email-address"'); ?>
</div></div>

<input type="hidden" name="email_format" value="TEXT" checked="checked" id="email-format-text" />

<div class='form-group'>
<label class="control-label col-sm-4" for="telephone"><?php echo BootstrapForms::required_text(ENTRY_TELEPHONE_NUMBER_TEXT). ENTRY_TELEPHONE_NUMBER; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('telephone', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_telephone', '40') . ' class="form-control" id="telephone"'); ?>
</div></div>
<?php
  if (ACCOUNT_FAX_NUMBER == 'true') { ?>
<div class='form-group'>
<label class="control-label col-sm-4" for="fax"><?php echo BootstrapForms::required_text(ENTRY_FAX_NUMBER_TEXT) . ENTRY_FAX_NUMBER; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('fax', '', 'class="form-control" id="fax"');
    echo "</div></div>";
  } ?>
</fieldset>

<?php

  if (CUSTOMERS_REFERRAL_STATUS == 2) { ?>
<fieldset>

<legend><?php echo TABLE_HEADING_REFERRAL_DETAILS; ?></legend>
<div class='form-group'>
<label class="control-label col-sm-4" for="customers_referral"><?php echo ENTRY_CUSTOMERS_REFERRAL; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('customers_referral', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_referral', '15') . ' class="form-control" id="customers_referral"'); ?>
</div></div>
</fieldset>
<?php
  }

}


?>
