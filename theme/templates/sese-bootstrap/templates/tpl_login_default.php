<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_login_default.php 15881 2010-04-11 16:32:39Z wilt $
 */
?>
<div id="loginDefault">

<div class='page-header'>
  <h1 id="loginDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
</div>

<?php
if ($messageStack->size('login') > 0) echo $messageStack->output('login');


if ( USE_SPLIT_LOGIN_MODE == 'True' || $ec_button_enabled) { ?>
  <div class='clearfix'>
  <!--BOF PPEC split login- DO NOT REMOVE-->
  <fieldset class="floatingBox col-sm-6">
    <legend><?php echo HEADING_NEW_CUSTOMER_SPLIT; ?></legend>
    <p><?php echo TEXT_NEW_CUSTOMER_POST_INTRODUCTION_SPLIT; ?></p>
    <?php echo zen_draw_form('create', zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL')); ?>
    <button type='submit' name='registrationButton' class='btn btn-primary'>
      <?php echo BUTTON_CREATE_ACCOUNT_ALT; ?>
    </button>
    </form>
  </fieldset>

  <fieldset class="floatingBox col-sm-6">
    <legend><?php echo HEADING_RETURNING_CUSTOMER_SPLIT; ?></legend>
    <p><?php echo TEXT_RETURNING_CUSTOMER_SPLIT; ?></p>
    <?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL'), 'post', 'id="loginForm"'); ?>
    <?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>

    <div class='form-group'>
      <label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
      <?php echo zen_draw_input_field('email_address', '', 'size="40" id="login-email-address" class="form-control"'); ?>
    </div>

    <div class='form-group'>
      <label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
      <?php echo zen_draw_password_field('password', '', 'size="40" id="login-password" class="form-control"'); ?>
    </div>

    <button type='submit' class='btn btn-primary'><?php echo BUTTON_LOGIN_ALT; ?></button>
    <div><small>
      <?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a><br />'; ?>
      <a href="https://www.southernexposure.com/seedracks/ourstore/">Trying to log in to your wholesale account?</a>
    </div></small>
    </form>
  </fieldset>
  <!--EOF PPEC split login- DO NOT REMOVE-->
  <!-- BOF COWOA --><?php
  if ($_SESSION['cart']->count_contents() > 0 && COWOA_STATUS == 'true') { ?>
    <div class='col-sm-12'><fieldset>
      <legend>Checkout Without Account</legend>
      <p><?php echo TEXT_RATHER_COWOA; ?></p>
      <a href="<?php echo zen_href_link(FILENAME_NO_ACCOUNT, '', 'SSL'); ?>" class='btn btn-primary'>
      <?php echo BUTTON_CONTINUE_ALT; ?></a>
    </fieldset></div><?php
  } ?>
  <!-- EOF COWOA -->
  </div>
<?php } else { ?>
  <!--BOF normal login-->
<?php
  if ($_SESSION['cart']->count_contents() > 0) { ?>
    <div class="advisory"><?php echo TEXT_VISITORS_CART; ?></div><?php
  }
  echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL'), 'post', 'id="loginForm"');
  echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>
  <fieldset>
  <legend><?php echo HEADING_RETURNING_CUSTOMER; ?></legend>

  <div class='form-group'>
    <label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
    <?php echo zen_draw_input_field('email_address', '',
      zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') .
      ' id="login-email-address" class="form-control"'); ?>
  </div>

  <div class='form-group'>
    <label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
    <?php echo zen_draw_password_field('password', '',
      zen_set_field_length(TABLE_CUSTOMERS, 'customers_password') .
      ' id="login-password" class="form-control"'); ?>
  </div>
  </fieldset>

  <button type='submit' class='btn btn-primary'><?php echo BUTTON_LOGIN_ALT; ?></button>
  <p><small>
    <?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
  </small></p>
  </form>

<?php
  echo zen_draw_form('create_account',
    zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'), 'post',
    'onsubmit="return check_form(create_account);" id="createAccountForm"');
  echo zen_draw_hidden_field('action', 'process');
  echo zen_draw_hidden_field('email_pref_html', 'email_format'); ?>
  <fieldset>
    <legend><?php echo HEADING_NEW_CUSTOMER; ?></legend>
    <div class="information"><?php echo TEXT_NEW_CUSTOMER_INTRODUCTION; ?></div><?php
    require($template->get_template_dir(
      'tpl_modules_create_account.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') .
      '/tpl_modules_create_account.php'); ?>
  </fieldset>
  <button type='submit' class='btn btn-primary'><?php echo BUTTON_SUBMIT_ALT; ?></button>
  </form>
  <!--EOF normal login-->
<?php } ?>

</div>
