<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=account_password.<br />
 * Allows customer to change their password
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_password_default.php 2896 2006-01-26 19:10:56Z birdbrain $
 */
?>
<div class="centerColumn" id="accountPassword">

<div class='page-header'><h1><?php echo NAVBAR_TITLE_2; ?></h1></div><?php

echo zen_draw_form(
    'account_password', zen_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'),
    'post', 'onsubmit="return check_form(account_password);" class="form-horizontal"'
  ) .  zen_draw_hidden_field('action', 'process'); ?>

<fieldset>
  <p class='text-danger'><strong><?php echo FORM_REQUIRED_INFORMATION; ?></strong></p><?php
  if ($messageStack->size('account_password') > 0) { echo $messageStack->output('account_password'); } ?>

  <div class='form-group'>
    <label class="control-label col-sm-4" for="password-current"><?php
      echo BootstrapForms::required_text(ENTRY_PASSWORD_CURRENT_TEXT) . ENTRY_PASSWORD_CURRENT; ?>
    </label>
    <div class='col-sm-8'><?php
      echo zen_draw_password_field('password_current','','id="password-current" class="form-control"'); ?>
    </div>
  </div>

  <div class='form-group'>
    <label class="control-label col-sm-4" for="password-new"><?php
      echo BootstrapForms::required_text(ENTRY_PASSWORD_NEW_TEXT) . ENTRY_PASSWORD_NEW; ?>
    </label>
    <div class='col-sm-8'><?php
      echo zen_draw_password_field('password_new','','id="password-new" class="form-control"'); ?>
    </div>
  </div>

  <div class='form-group'>
    <label class="control-label col-sm-4" for="password-confirm"><?php
      echo BootstrapForms::required_text(ENTRY_PASSWORD_CONFIRMATION_TEXT) . ENTRY_PASSWORD_CONFIRMATION; ?>
    </label>
    <div class='col-sm-8'><?php
      echo zen_draw_password_field('password_confirmation','','id="password-confirm" class="form-control"'); ?>
    </div>
  </div>
</fieldset>

<div class='clearfix'>
  <div class="pull-right"><button type='submit' class='btn btn-primary'>
    <?php echo BUTTON_SUBMIT_ALT; ?>
  </button></div>
  <div class="pull-left">
    <a href='<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>' class='btn btn-default'>
      <?php echo BUTTON_BACK_ALT; ?>
    </a>
  </div>
</div>

</form>

</div>
