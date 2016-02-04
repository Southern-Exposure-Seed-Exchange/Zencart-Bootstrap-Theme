<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=create_account.<br />
 * Displays Create Account form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 2007
 */
?>
<div id="createAcctDefault">

<div class='page-header'><h1><?php echo NAVBAR_TITLE; ?></h1></div>


<h4><?php echo BootstrapNoAccount::login_text(); ?></h4>


<!-- Checkout Progress -->
<div class='row text-center order-steps'>
  <div class='col-sm-2 col-sm-offset-1 text-primary'>
    <?php echo BootstrapUtils::glyphicon('arrow-down'); ?><br />
    <?php echo TEXT_ORDER_STEPS_BILLING; ?>
  </div>
  <div class='col-sm-2'><br /><?php echo TEXT_ORDER_STEPS_1; ?></div>
  <div class='col-sm-2'><br /><?php echo TEXT_ORDER_STEPS_2; ?></div>
  <div class='col-sm-2'><br /><?php echo TEXT_ORDER_STEPS_3; ?></div>
  <div class='col-sm-2'><br /><?php echo TEXT_ORDER_STEPS_4; ?></div>
</div>
<div class='row'><div class='col-sm-10 col-sm-offset-1'><div class='progress'>
  <div class='progress-bar' role='progressbar' aria-valuenow='20'
       aria-valuemin='0' aria-valuemax='100' style='width:20%;'></div>
</div></div></div>

<?php
echo zen_draw_form('no_account', zen_href_link(FILENAME_NO_ACCOUNT, '', 'SSL'),
  'post', 'onsubmit="return check_form(no_account);" class="form-horizontal"');
echo zen_draw_hidden_field('action', 'process');
echo zen_draw_hidden_field('email_pref_html', 'email_format'); ?>


<?php require($template->get_template_dir(
  'tpl_modules_no_account.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') .
  '/tpl_modules_no_account.php'); ?>

<div class='col-sm-12 clearfix'>
  <div class="pull-right form-group">
    <button type='submit' class='btn btn-primary'><?php echo BUTTON_CONTINUE_ALT; ?></button>
  </div>
  <p class="pull-left"><strong><?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE; ?></strong></p>
</div>


</form>
</div>

<?php
/* Utiltiy Functions for this template */
class BootstrapNoAccount
{
  /* Return text with a link allowing the user to login instead */
  public static function login_text() {
    return sprintf(TEXT_ORIGIN_LOGIN,
      zen_href_link(FILENAME_LOGIN, zen_get_all_get_params(array('action')), 'SSL')
    );
  }
}

?>
