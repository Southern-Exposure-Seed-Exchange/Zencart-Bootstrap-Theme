<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=create_account.<br />
 * Displays Create Account form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_create_account.php 4822 2006-10-23 11:11:36Z drbyte $
 */
?>

<?php if ($messageStack->size('create_account') > 0) echo $messageStack->output('create_account'); ?>
<strong class="text-danger"><?php echo FORM_REQUIRED_INFORMATION; ?></strong>
<br class="clearBoth" />

<?php
  if (DISPLAY_PRIVACY_CONDITIONS == 'true') { ?>
    <fieldset>
    <legend><?php echo TABLE_HEADING_PRIVACY_CONDITIONS; ?></legend>
    <div class="information"><?php echo TEXT_PRIVACY_CONDITIONS_DESCRIPTION;?></div>
    <?php echo zen_draw_checkbox_field('privacy_conditions', '1', false, 'id="privacy"');?>
    <label class="checkboxLabel" for="privacy"><?php echo TEXT_PRIVACY_CONDITIONS_CONFIRM;?></label>
    </fieldset><?php
  }

  if (ACCOUNT_COMPANY == 'true') { ?>
    <fieldset>
    <legend><?php echo CATEGORY_COMPANY; ?></legend>
    <div class="form-group">
    <label class="control-label col-sm-4" for="company"><?php echo ENTRY_COMPANY . BootstrapForms::required_text(ENTRY_COMPANY_TEXT); ?></label>
    <div class="col-sm-8">
    <?php echo zen_draw_input_field('company', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_company', '40') . ' class="form-control" id="company"'); ?>
    </div>
    </fieldset><?php
  } ?>


<fieldset>
<legend><?php echo TABLE_HEADING_ADDRESS_DETAILS; ?></legend>
<?php
  if (ACCOUNT_GENDER == 'true') {
?>
<?php echo zen_draw_radio_field('gender', 'm', '', 'id="gender-male"') . '<label class="radioButtonLabel" for="gender-male">' . MALE . '</label>' . zen_draw_radio_field('gender', 'f', '', 'id="gender-female"') . '<label class="radioButtonLabel" for="gender-female">' . FEMALE . '</label>' . (zen_not_null(ENTRY_GENDER_TEXT) ? '<span class="alert">' . ENTRY_GENDER_TEXT . '</span>': ''); ?>
<br class="clearBoth" />
<?php
  }
?>

<div class="form-group">
<label class="control-label col-sm-4" for="firstname"><?php echo ENTRY_FIRST_NAME . BootstrapForms::required_text(ENTRY_FIRST_NAME_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('firstname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' class="form-control" id="firstname"'); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="lastname"><?php echo ENTRY_LAST_NAME . BootstrapForms::required_text(ENTRY_LAST_NAME_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . ' class="form-control" id="lastname"'); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="street-address"><?php echo ENTRY_STREET_ADDRESS . BootstrapForms::required_text(ENTRY_STREET_ADDRESS_TEXT); ?></label>
<div class="col-sm-8">
  <?php echo zen_draw_input_field('street_address', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' class="form-control" id="street-address"'); ?>
  </div>
</div>

<?php
  if (ACCOUNT_SUBURB == 'true') {
?>

<div class="form-group">
<label class="control-label col-sm-4" for="suburb"><?php echo ENTRY_SUBURB . BootstrapForms::required_text(ENTRY_SUBURB_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('suburb', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' class="form-control" id="suburb"'); ?>
</div>
</div>
<?php
  }
?>

<div class="form-group">
<label class="control-label col-sm-4" for="city"><?php echo ENTRY_CITY . BootstrapForms::required_text(ENTRY_CITY_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('city', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' class="form-control" id="city"'); ?>
</div>
</div>

<?php
  if (ACCOUNT_STATE == 'true') {
    if ($flag_show_pulldown_states == true) { ?>
<div class="form-group">
<label class="control-label col-sm-4" for="stateZone" id="zoneLabel"><?php echo ENTRY_STATE . BootstrapForms::required_text(ENTRY_STATE_TEXT); ?></label>
<div class="col-sm-8">
<?php
      echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $zone_id, 'class="form-control" id="stateZone"');
    }
?>
</div>
</div>

<?php if ($flag_show_pulldown_states == true) { ?>
<br class="clearBoth" id="stBreak" />
<?php } ?>
<div class="form-group">
<label class="control-label col-sm-4" for="state" id="stateLabel"><?php echo $state_field_label . BootstrapForms::required_text(ENTRY_STATE_TEXT); ?></label>
<div class="col-sm-8">
<?php
    echo zen_draw_input_field('state', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' class="form-control" id="state"');
    if ($flag_show_pulldown_states == false) {
      echo zen_draw_hidden_field('zone_id', $zone_name, ' ');
    }
?>
</div>
</div>
<?php
  }
?>

<div class="form-group">
<label class="control-label col-sm-4" for="postcode"><?php echo ENTRY_POST_CODE . BootstrapForms::required_text(ENTRY_POST_CODE_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('postcode', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' class="form-control" id="postcode"'); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="country"><?php echo ENTRY_COUNTRY . BootstrapForms::required_text(ENTRY_COUNTRY_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_get_country_list('zone_country_id', $selected_country, 'class="form-control" id="country" ' . ($flag_show_pulldown_states == true ? 'onchange="update_zone(this.form);"' : '')); ?>
</div>
</div>
</fieldset>

<fieldset>
<legend><?php echo TABLE_HEADING_PHONE_FAX_DETAILS; ?></legend>

<div class="form-group">
<label class="control-label col-sm-4" for="telephone"><?php echo ENTRY_TELEPHONE_NUMBER . BootstrapForms::required_text(ENTRY_TELEPHONE_NUMBER_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('telephone', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_telephone', '40') . ' class="form-control" id="telephone"'); ?>
</div>
</div>

<?php
  if (ACCOUNT_FAX_NUMBER == 'true') {
?>

<div class="form-group">
<label class="control-label col-sm-4" for="fax"><?php echo ENTRY_FAX_NUMBER; ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('fax', '', 'class="form-control" id="fax"'); ?>
</div>
</div>
<?php
  }
?>
</fieldset>

<?php
  if (ACCOUNT_DOB == 'true') {
?>
<fieldset>
<legend><?php echo TABLE_HEADING_DATE_OF_BIRTH . BootstrapForms::required_text(ENTRY_DATE_OF_BIRTH_TEXT); ?></legend>
<label class="inputLabel" for="dob"><?php echo ENTRY_DATE_OF_BIRTH; ?></label>
<?php echo zen_draw_input_field('dob','', 'id="dob"'); ?>
<br class="clearBoth" />
</fieldset>
<?php
  }
?>

<fieldset>
<legend><?php echo TABLE_HEADING_LOGIN_DETAILS; ?></legend>

<div class="form-group">
<label class="control-label col-sm-4" for="email-address"><?php echo ENTRY_EMAIL_ADDRESS . BootstrapForms::required_text(ENTRY_EMAIL_ADDRESS_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control" id="email-address"'); ?>
</div>
</div>

<?php
  if ($phpBB->phpBB['installed'] == true) {
?>
<label class="inputLabel" for="nickname"><?php echo ENTRY_NICK; ?></label>
<?php echo zen_draw_input_field('nick','','id="nickname"') . (zen_not_null(ENTRY_NICK_TEXT) ? '<span class="alert">' . ENTRY_NICK_TEXT . '</span>': ''); ?>
<br class="clearBoth" />
<?php
  }
?>

<div class="form-group">
<label class="control-label col-sm-4" for="password-new"><?php echo ENTRY_PASSWORD . "<br />" . BootstrapForms::required_text(ENTRY_PASSWORD_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', '20') . ' class="form-control" id="password-new"'); ?>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4" for="password-confirm"><?php echo ENTRY_PASSWORD_CONFIRMATION . BootstrapForms::required_text(ENTRY_PASSWORD_CONFIRMATION_TEXT); ?></label>
<div class="col-sm-8">
<?php echo zen_draw_password_field('confirmation', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', '20') . ' class="form-control" id="password-confirm"'); ?>
</div>
</div>
</fieldset>

<fieldset>
<legend><?php echo ENTRY_EMAIL_PREFERENCE; ?></legend>
<?php
  if (ACCOUNT_NEWSLETTER_STATUS != 0) {
?>

<div class="form-group">
<label class="control-label col-sm-4" for="newsletter-checkbox"><?php echo ENTRY_NEWSLETTER; ?></label>
<div class="col-sm-8">
<?php echo zen_draw_checkbox_field('newsletter', '1', $newsletter, 'class="form-control" id="newsletter-checkbox"'); ?>
</div>
</div>
<?php } ?>

<?php 
/*
echo zen_draw_radio_field('email_format', 'HTML', ($email_format == 'HTML' ? true : false),'id="email-format-html"') . '<label class="radioButtonLabel" for="email-format-html">' . ENTRY_EMAIL_HTML_DISPLAY . '</label>' .  zen_draw_radio_field('email_format', 'TEXT', ($email_format == 'TEXT' ? true : false), 'id="email-format-text"') . '<label class="radioButtonLabel" for="email-format-text">' . ENTRY_EMAIL_TEXT_DISPLAY . '</label>';
*/
 ?>
<br class="clearBoth" />
</fieldset>

<?php
  if (CUSTOMERS_REFERRAL_STATUS == 2) {
?>
<fieldset>

<legend><?php echo TABLE_HEADING_REFERRAL_DETAILS; ?></legend>
<label class="inputLabel" for="customers_referral"><?php echo ENTRY_CUSTOMERS_REFERRAL; ?></label>
<?php echo zen_draw_input_field('customers_referral', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_referral', '15') . ' id="customers_referral"'); ?>
<br class="clearBoth" />
</fieldset>
<?php } ?>
