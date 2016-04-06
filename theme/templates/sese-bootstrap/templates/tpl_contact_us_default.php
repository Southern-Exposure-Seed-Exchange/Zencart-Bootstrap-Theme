<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=contact_us.<br />
 * Displays contact us page form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_contact_us_default.php 16307 2010-05-21 21:50:06Z wilt $
 */
?>
<div class="centerColumn" id="contactUsDefault">

<?php echo zen_draw_form('contact_us', zen_href_link(FILENAME_CONTACT_US, 'action=send'), 'post', 'class="form-horizontal"'); ?>

<?php if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>
<address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php } ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<p class="mainContent text-success"><?php echo TEXT_SUCCESS; ?></p>

<p class='clearfix'>
  <span class='btn btn-default pull-left'><?php echo zen_back_link() . BUTTON_BACK_ALT . '</a>'; ?></span>
</p>

<?php
  } else {
?>

<?php if (DEFINE_CONTACT_US_STATUS >= '1' and DEFINE_CONTACT_US_STATUS <= '2') { ?>
<div id="contactUsNoticeContent" class="content">
<?php
/**
 * require html_define for the contact_us page
 */
  require($define_page);
?>
</div>
<?php } ?>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

<fieldset id="contactUsForm">
<legend><?php echo HEADING_TITLE; ?></legend>
<p class="text-danger"><strong><?php echo FORM_REQUIRED_INFORMATION; ?></strong></p>

<?php
// show dropdown if set
    if (CONTACT_US_LIST !='') { ?>
<label class="control-label col-sm-4" for="send-to"><?php echo BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL) . SEND_TO_TEXT; ?></label>
<?php echo zen_draw_pull_down_menu('send_to',  $send_to_array, 0, 'class="form-control" id="send-to"');
    } ?>

<div class='form-group'>
<label class="control-label col-sm-4" for="contactname"><?php echo BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL) . ENTRY_NAME; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('contactname', $name, ' size="40" class="form-control" id="contactname"'); ?>
</div>
</div>

<div class='form-group'>
<label class="control-label col-sm-4" for="email-address"><?php echo BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL) . ENTRY_EMAIL; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_input_field('email', ($email_address), ' size="40" class="form-control" id="email-address"'); ?>
</div>
</div>

<div class='form-group'>
<label class="control-label col-sm-4" for="enquiry"><?php echo BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL) . ENTRY_ENQUIRY; ?></label>
<div class='col-sm-8'>
<?php echo zen_draw_textarea_field('enquiry', '30', '7', $enquiry, 'class="form-control" id="enquiry"'); ?>
</div>
</div>

</fieldset>

<p class='clearfix'>
  <button class='btn btn-primary pull-right' type='submit'><?php echo BUTTON_SEND_ALT; ?></button>
  <span class='btn btn-default pull-left'><?php echo zen_back_link() . BUTTON_BACK_ALT . '</a>'; ?></span>
</p>
<?php
  }
?>
</form>
</div>
