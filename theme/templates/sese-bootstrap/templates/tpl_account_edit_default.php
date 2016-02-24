<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=account_edit.<br />
 * View or change Customer Account Information
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_edit_default.php 3848 2006-06-25 20:33:42Z drbyte $
 * @copyright Portions Copyright 2003 osCommerce
 */
?>
<div class="centerColumn" id="accountEditDefault">

<div class='page-header'><h1><?php echo NAVBAR_TITLE_2; ?></h1></div><?php

echo zen_draw_form(
  'account_edit', zen_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'), 'post',
  'onsubmit="return check_form(account_edit);" class="form-horizontal" class="form-control"');

echo zen_draw_hidden_field('action', 'process'); ?>

<?php if ($messageStack->size('account_edit') > 0) echo $messageStack->output('account_edit'); ?>

<fieldset>
  <legend><?php echo HEADING_TITLE; ?></legend>
  <div class="text-danger"><strong><?php echo FORM_REQUIRED_INFORMATION; ?></strong></div><?php

  if (ACCOUNT_GENDER == 'true') { ?>
    <div class='form-group'><?php
      echo BootstrapForms::required_text(ENTRY_GENDER_TEXT) .
        zen_draw_radio_field('gender', 'm', $male, 'id="gender-male" class="form-control"') .
        '<label class="radioButtonLabel" for="gender-male">' . MALE . '</label>' .
        zen_draw_radio_field('gender', 'f', $female, 'id="gender-female" class="form-control"') .
        '<label class="radioButtonLabel" for="gender-female">' . FEMALE . '</label>'; ?>
    </div><?php
  } ?>

<div class='form-group'>
  <label class="control-label col-sm-4" for="firstname">
    <?php echo BootstrapForms::required_text(ENTRY_FIRST_NAME_TEXT) . ENTRY_FIRST_NAME; ?></label>
  <div class='col-sm-8'>
    <?php echo zen_draw_input_field('firstname', $account->fields['customers_firstname'], 'id="firstname" class="form-control"'); ?>
  </div>
</div>

<div class='form-group'>
  <label class="control-label col-sm-4" for="lastname">
    <?php echo BootstrapForms::required_text(ENTRY_LAST_NAME_TEXT) . ENTRY_LAST_NAME; ?></label>
  <div class='col-sm-8'>
    <?php echo zen_draw_input_field('lastname', $account->fields['customers_lastname'], 'id="lastname" class="form-control"'); ?>
  </div>
</div><?php

if (ACCOUNT_DOB == 'true') { ?>
  <div class='form-group'>
    <label class="control-label col-sm-4" for="dob">
      <?php echo BootstrapForms::required_text(ENTRY_DATE_OF_BIRTH_TEXT) . ENTRY_DATE_OF_BIRTH; ?></label>
    <div class='col-sm-8'>
      <?php echo zen_draw_input_field('dob', zen_date_short($account->fields['customers_dob']), 'id="dob" class="form-control"'); ?>
    </div>
  </div><?php
} ?>

<div class='form-group'>
  <label class="control-label col-sm-4" for="email-address">
    <?php echo BootstrapForms::required_text(ENTRY_EMAIL_ADDRESS_TEXT) . ENTRY_EMAIL_ADDRESS; ?></label>
  <div class='col-sm-8'>
    <?php echo zen_draw_input_field('email_address', $account->fields['customers_email_address'], 'id="email-address" class="form-control"'); ?>
  </div>
</div>

<div class='form-group'>
  <label class="control-label col-sm-4" for="telephone">
    <?php echo BootstrapForms::required_text(ENTRY_TELEPHONE_NUMBER_TEXT) . ENTRY_TELEPHONE_NUMBER; ?></label>
  <div class='col-sm-8'>
    <?php echo zen_draw_input_field('telephone', $account->fields['customers_telephone'], 'id="telephone" class="form-control"'); ?>
  </div>
</div>

<div class='form-group'>
  <label class="control-label col-sm-4" for="fax">
    <?php echo BootstrapForms::required_text(ENTRY_FAX_NUMBER_TEXT) . ENTRY_FAX_NUMBER; ?></label>
  <div class='col-sm-8'>
    <?php echo zen_draw_input_field('fax', $account->fields['customers_fax'], 'id="fax" class="form-control"'); ?>
  </div>
</div><?php

if (CUSTOMERS_REFERRAL_STATUS == 2 and $customers_referral == '') { ?>
  <div class='form-group'>
    <label class="control-label col-sm-4" for="customers-referral">
      <?php echo ENTRY_CUSTOMERS_REFERRAL; ?></label>
    <div class='col-sm-8'>
      <?php echo zen_draw_input_field('customers_referral', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_referral', 15), 'id="customers-referral" class="form-control"'); ?>
    </div>
  </div><?php
}

if (CUSTOMERS_REFERRAL_STATUS == 2 and $customers_referral != '') { ?>
  <div class='form-group'>
    <label for="customers-referral-readonly"><?php echo ENTRY_CUSTOMERS_REFERRAL; ?></label>
    <div class='col-sm-8'>
      <?php echo $customers_referral . zen_draw_hidden_field('customers_referral', $customers_referral, 'id="customers-referral-readonly" class="form-control"'); ?>
    </div>
  </div><?php
} ?>
</fieldset>


<div class='clearfix'>
  <a href='<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>' class='btn btn-default pull-left'>
    <?php echo BUTTON_BACK_ALT; ?></a>
  <button type='submit' class='btn btn-primary pull-right'>
    <?php echo BUTTON_UPDATE_ALT; ?>
  </button>
</div>

</form>
</div>
