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
  <label class="control-label" for="email-address"><?php echo ENTRY_EMAIL_ADDRESS . BootstrapNoAccountModule::required_text(ENTRY_EMAIL_ADDRESS_TEXT); ?></label>
  <?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control" id="email-address"'); ?>
</div>
</fieldset>
<fieldset>
<legend><?php echo ENTRY_EMAIL_PREFERENCE; ?></legend>
<?php
  if (ACCOUNT_NEWSLETTER_STATUS != 0) {
    echo zen_draw_checkbox_field('newsletter', '1', $newsletter, 'id="newsletter-checkbox"') . '<label class="checkboxLabel" for="newsletter-checkbox">' . ENTRY_NEWSLETTER . '</label>' . BootstrapNoAccountModule::required_text(ENTRY_NEWSLETTER_TEXT);
  } ?>
</fieldset>
<?php
} else {
  if (ACCOUNT_COMPANY == 'true') { ?>
<fieldset>
<legend><?php echo CATEGORY_COMPANY; ?></legend>
<div class='form-group'>
  <label class="control-label col-sm-4" for="company"><?php echo ENTRY_COMPANY . BootstrapNoAccountModule::required_text(ENTRY_COMPANY_TEXT); ?></label>
  <div class='col-sm-8'>
  <?php echo zen_draw_input_field('company', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_company', '40') . ' class="form-control" id="company"'); ?>
  </div>
</div>
</fieldset>
<?php
  } ?>

<fieldset>
<legend><?php echo TABLE_HEADING_ADDRESS_DETAILS; ?></legend>
<p class="text-danger"><strong><?php echo FORM_REQUIRED_INFORMATION; ?></strong></p>

<?php
  if (ACCOUNT_GENDER == 'true') {
    echo
      '<label class="radio-inline">' .
        zen_draw_radio_field('gender', 'm', '', 'id="gender-male"') . MALE .
      '</label>' .
      '<label class="radio-inline">' .
        zen_draw_radio_field('gender', 'f', '', 'id="gender-female"') . FEMALE .
      '</label>' .
      BootstrapNoAccountModule::required_text(ENTRY_GENDER_TEXT);
  } ?>

<div class='form-group'>
<label class="control-label col-sm-4" for="firstname"><?php echo BootstrapNoAccountModule::required_text(ENTRY_FIRST_NAME_TEXT) . ENTRY_FIRST_NAME; ?></label>
<div class='col-sm-8'>
  <?php echo zen_draw_input_field('firstname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' class="form-control" id="firstname"'); ?>
</div>
</div>

<div class='form-group'>
<label class="control-label col-sm-4" for="lastname"><?php echo BootstrapNoAccountModule::required_text(ENTRY_LAST_NAME_TEXT) . ENTRY_LAST_NAME; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . ' class="form-control" id="lastname"'); ?>
</div>
</div>

<div class='form-group'>
<label class="control-label col-sm-4" for="street-address"><?php echo BootstrapNoAccountModule::required_text(ENTRY_STREET_ADDRESS_TEXT) . ENTRY_STREET_ADDRESS; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('street_address', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' class="form-control" id="street-address"'); ?>
</div>
</div>

<?php
  if (ACCOUNT_SUBURB == 'true') {
?>
<div class='form-group'>
<label class="control-label col-sm-4" for="suburb"><?php echo BootstrapNoAccountModule::required_text(ENTRY_SUBURB_TEXT). ENTRY_SUBURB; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('suburb', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' class="form-control" id="suburb"'); ?>
</div>
</div>
<?php
  }
?>

<div class='form-group'>
<label class="control-label col-sm-4" for="city"><?php echo BootstrapNoAccountModule::required_text(ENTRY_CITY_TEXT). ENTRY_CITY; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('city', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' class="form-control" id="city"'); ?>
</div></div>

<?php
  if (ACCOUNT_STATE == 'true') {
    if ($flag_show_pulldown_states == true) { ?>
      <div class='form-group'>
      <label class="control-label col-sm-4" for="stateZone" class="form-control" id="zoneLabel">
        <?php echo BootstrapNoAccountModule::required_text(ENTRY_STATE_TEXT) . ENTRY_STATE; ?>
      </label>
      <div class='col-sm-8'>
<?php echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $zone_id, 'class="form-control" id="stateZone"');
      echo '</div></div>';
    } ?>

<div class='form-group'>
<label class="control-label col-sm-4" for="state" id="stateLabel"><?php echo BootstrapNoAccountModule::required_text(ENTRY_STATE_TEXT) . ENTRY_STATE; ?></label>
<div class='col-sm-8'>
<?php
    echo zen_draw_input_field('state', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' class="form-control" id="state"');
    if ($flag_show_pulldown_states == false) {
      echo zen_draw_hidden_field('zone_id', $zone_name, ' ');
    }
?>
</div></div>
<?php
  } ?>

<div class='form-group'>
<label class="control-label col-sm-4" for="postcode"><?php echo BootstrapNoAccountModule::required_text(ENTRY_POST_CODE_TEXT). ENTRY_POST_CODE; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('postcode', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' class="form-control" id="postcode"'); ?>
</div></div>

  <div class='form-group'>
<label class="control-label col-sm-4" for="country"><?php echo BootstrapNoAccountModule::required_text(ENTRY_COUNTRY_TEXT). ENTRY_COUNTRY; ?></label>
<div class='col-sm-8'>
<?php echo zen_get_country_list('zone_country_id', $selected_country, 'class="form-control" id="country" ' . ($flag_show_pulldown_states == true ? 'onchange="update_zone(this.form);"' : '')); ?>
</div></div>
</fieldset>

<fieldset>
<legend><?php echo TABLE_HEADING_CONTACT_DETAILS; ?></legend>
<div class='form-group'>
<label class="control-label col-sm-4" for="email-address"><?php echo BootstrapNoAccountModule::required_text(ENTRY_EMAIL_ADDRESS_TEXT). ENTRY_EMAIL_ADDRESS; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control" id="email-address"'); ?>
</div></div>

<input type="hidden" name="email_format" value="TEXT" checked="checked" id="email-format-text" />

<div class='form-group'>
<label class="control-label col-sm-4" for="telephone"><?php echo BootstrapNoAccountModule::required_text(ENTRY_TELEPHONE_NUMBER_TEXT). ENTRY_TELEPHONE_NUMBER; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('telephone', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_telephone', '40') . ' class="form-control" id="telephone"'); ?>
</div></div>
<?php
  if (ACCOUNT_FAX_NUMBER == 'true') { ?>
<div class='form-group'>
<label class="control-label col-sm-4" for="fax"><?php echo BootstrapNoAccountModule::required_text(ENTRY_FAX_NUMBER_TEXT) . ENTRY_FAX_NUMBER; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('fax', '', 'class="form-control" id="fax"');
    echo "</div></div>";
  } ?>
</fieldset>

<?php
  if (ACCOUNT_NEWSLETTER_STATUS != 0) {
?>
<fieldset>
<legend><?php echo ENTRY_EMAIL_PREFERENCE; ?></legend>
<div class='form-group'>
<?php echo
    '<label class="col-sm-6 col-md-4 control-label" for="newsletter-checkbox">' .
      BootstrapNoAccountModule::required_text(ENTRY_NEWSLETTER_TEXT) . ENTRY_NEWSLETTER .
    '</label><div class="col-sm-6 col-md-8">' .
      zen_draw_checkbox_field('newsletter', '1', $newsletter, 'id="newsletter-checkbox" class="form-control"') .
    '</div>'; ?>
</div>
</fieldset>
<?php
  }

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


/* Utility functions for this template */
class BootstrapNoAccountModule
{
  /* Render the given text with markup indicating a required field */
  public static function required_text($text) {
    if (zen_not_null($text)) {
      return "<span class='text-danger'><strong>{$text}</strong></span>";
    }
    return '';
  }
}
?>
