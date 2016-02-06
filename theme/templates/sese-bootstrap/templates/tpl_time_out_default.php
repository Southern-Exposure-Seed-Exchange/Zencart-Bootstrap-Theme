<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_time_out_default.php 6620 2007-07-17 05:52:19Z drbyte $
 */
?>
<div class="centerColumn" id="timeoutDefault">
<?php
if ($_SESSION['customer_id']) { ?>
  <div class='page-header'>
    <h1 id="timeoutDefaultHeading"><?php echo HEADING_TITLE_LOGGED_IN; ?></h1>
  </div>
  <div id="timeoutDefaultContent" class="content">
    <?php echo TEXT_INFORMATION_LOGGED_IN; ?>
  </div><?php
} else { ?>
  <div class='page-header'>
    <h1 id="timeoutDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
  </div>
  <div id="timeoutDefaultContent" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php 
  echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL'), 'post', 'class="form-horizontal"'); ?>
  <fieldset>
  <legend><?php echo HEADING_RETURNING_CUSTOMER; ?></legend>

  <div class='form-group'>
    <label class="control-label col-sm-3" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
    <div class='col-sm-9'>
      <?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="login-email-address" class="form-control"'); ?>
    </div>
  </div>

  <div class='form-group'>
    <label class="control-label col-sm-3" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
    <div class='col-sm-9'>
      <?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password') . ' id="login-password" class="form-control"'); ?>
    </div>
  </div>

  <?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>
  </fieldset>

  <div class='clearfix'>
    <div class="pull-right"><button type='submit' class='btn btn-primary'>
      <?php echo BUTTON_LOGIN_ALT; ?>
    </button></div>
    <div class="pull-left"><?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?></div>
  </div>
  </form>
<?php
} ?>
</div>
