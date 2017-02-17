<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_password_forgotten_default.php 3712 2006-06-05 20:54:13Z drbyte $
 */
?>
<div class="centerColumn" id="passwordForgotten">
<?php echo zen_draw_form('password_forgotten', zen_href_link(FILENAME_PASSWORD_FORGOTTEN, 'action=process', 'SSL')); ?>

<?php if ($messageStack->size('password_forgotten') > 0) echo $messageStack->output('password_forgotten'); ?>

<fieldset>
<legend><?php echo HEADING_TITLE; ?></legend>

<p id="passwordForgottenMainContent" class="content"><?php echo TEXT_MAIN; ?></p>

<p class='text-danger'><strong><?php echo FORM_REQUIRED_INFORMATION; ?></strong></p>
<br class="clearBoth" />

<div class='form-group'>
  <label for="email-address"><?php echo (zen_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="text-danger">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>': '') . ENTRY_EMAIL_ADDRESS; ?></label>
  <?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control" id="email-address"') ; ?>
</div>
</fieldset>

<p class='clearfix'>
  <span class="pull-right"><input type="submit" name="submit" class="btn btn-primary" value="<?php echo BUTTON_SUBMIT_ALT; ?>" /></span>
  <span class="pull-left"><?php echo zen_back_link() . "<span class='btn btn-default'>" . BUTTON_BACK_ALT . '</span></a>'; ?></span>
</p>

</form>
</div>
