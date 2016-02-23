<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_success.<br />
 * Displays confirmation details after order has been successfully processed.
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * Modified for COWOA by JT of GTI_Custom
 */
?>
<div id="checkoutSuccess">

<div class='page-header'>
  <h1 id="checkoutSuccessHeading"><?php echo HEADING_TITLE; ?></h1>
</div><?php

if($_SESSION['COWOA']) { $COWOA=TRUE; }
echo BootstrapCheckout::render_checkout_progress($COWOA ? 5 : 4, $COWOA);

if (DEFINE_CHECKOUT_SUCCESS_STATUS >= 1 and DEFINE_CHECKOUT_SUCCESS_STATUS <= 2) { ?>
  <div id="checkoutSuccessMainContent" class="content"><?php
    /* require the html_defined text for checkout success */
    require($define_page); ?>
  </div><?php
} ?>

<h4 id="checkoutSuccessOrderNumber">
  <?php echo TEXT_YOUR_ORDER_NUMBER . $zv_orders_id; ?>
</h4><?php

if (isset($_SESSION['payment_method_messages']) && $_SESSION['payment_method_messages'] != '') { ?>
  <div class="content">
    <?php echo $_SESSION['payment_method_messages']; ?>
  </div><?php
}

// only show when there is a GV balance (Sam edit: do not show for COWOA
// customers, and send redemption code via email)
if ($customer_has_gv_balance) {
  if ($COWOA) {
    BootstrapCheckoutSuccess::send_gift_certificate_email();
  } else {
    //they have a gv in their cart, and are not a COWOA customer, so show the box (Sam) ?>
    <div id="sendSpendWrapper" class='clearfix'><?php
      require($template->get_template_dir(
          'tpl_modules_send_or_spend.php', DIR_WS_TEMPLATE, $current_page_base, 'templates'
        ) . '/tpl_modules_send_or_spend.php'); ?>
    </div><?php
  }
}

if (DOWNLOAD_ENABLED == 'true' and !($_SESSION['COWOA'])) {
  require($template->get_template_dir('tpl_modules_downloads.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_downloads.php');
}

if(!($_SESSION['COWOA'])) { ?>
  <p id="checkoutSuccessOrderLink"><?php echo TEXT_SEE_ORDERS;?></p><?php
} ?>

<p id="checkoutSuccessContactLink"><?php echo TEXT_CONTACT_STORE_OWNER;?></p>

<h4 id="checkoutSuccessThanks" class="centeredContent"><?php echo TEXT_THANKS_FOR_SHOPPING; ?></h4>

<div id="checkoutSuccessLogoff" class='clearfix'><?php
  // Kill session if COWOA customer at checkout success
  if ($_SESSION['COWOA'] and COWOA_LOGOFF == 'true') {
    zen_session_destroy();
  } else { ?>
    <p class="pull-right">
      <a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>" class='btn btn-primary'>
        <?php echo BUTTON_LOG_OFF_ALT; ?>
      </a>
    </p><?php
    if (isset($_SESSION['customer_guest_id'])) {
      echo TEXT_CHECKOUT_LOGOFF_GUEST;
    } elseif (isset($_SESSION['customer_id'])) {
      echo TEXT_CHECKOUT_LOGOFF_CUSTOMER;
    }
  } ?>
</div>

</div>


<?php
/* Helper functions for this template */
class BootstrapCheckoutSuccess
{
  /* This is pre-existing code from our previous template, I only cleaned it up.
   *
   * Generate and send the redemption code email (Sam)
   */
  public static function send_gift_certificate_email() {
    global $db, $error, $messageStack, $mail, $gv_current_balance, $gv_amount;
    require_once('includes/classes/http_client.php');
    require('includes/languages/english/gv_send.php');

    // verify no timeout has occurred on the send or process
    if (!$_SESSION['customer_id']) {
      zen_redirect(zen_href_link(FILENAME_TIME_OUT));
    }

    // if the customer is not logged on, redirect them to the login page (for
    // cowoa customers, just a check the session is good)
    if (!$_SESSION['customer_id']) {
      $_SESSION['navigation']->set_snapshot();
      zen_redirect(zen_href_link(FILENAME_LOGIN, '', 'SSL'));
    }

    require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

    // extract sender's name+email from database, since logged-in customer is the one who is sending this GV email
    $account_query = "SELECT customers_firstname, customers_lastname, customers_email_address
                      FROM " . TABLE_CUSTOMERS . "
                      WHERE customers_id = :customersID";
    $account_query = $db->bindVars($account_query, ':customersID', $_SESSION['customer_id'], 'integer');
    $account = $db->Execute($account_query);
    $send_firstname = $account->fields['customers_firstname'];
    $send_name = $send_firstname . ' ' . $account->fields['customers_lastname'];
    $send_email_address = $account->fields['customers_email_address'];

    $gv_query = "SELECT amount
                FROM " . TABLE_COUPON_GV_CUSTOMER . "
                WHERE customer_id = :customersID";

    $gv_query = $db->bindVars($gv_query, ':customersID', $_SESSION['customer_id'], 'integer');
    $gv_result = $db->Execute($gv_query);



    $gv_amount = $gv_result->fields['amount'];

    if ($currencies->value($gv_amount, true,DEFAULT_CURRENCY) > $gv_amount || $gv_amount == 0) {
      $error = true;
      $messageStack->add('gv_send', ERROR_ENTRY_AMOUNT_CHECK, 'error');
    }
    $id1 = zen_create_coupon_code($mail['customers_email_address']);
    $new_amount = 0;
    $new_db_amount = 0;
    $gv_query="UPDATE " . TABLE_COUPON_GV_CUSTOMER . "
    SET amount = '" .  $new_amount . "'
    WHERE customer_id = :customersID";

    $gv_query = $db->bindVars($gv_query, ':customersID', $_SESSION['customer_id'], 'integer');
    $db->Execute($gv_query);

    $gv_query = "INSERT INTO " . TABLE_COUPONS . " (coupon_type, coupon_code, date_created, coupon_amount)
    VALUES ('G', :couponCode, NOW(), :amount)";

    $gv_query = $db->bindVars($gv_query, ':couponCode', $id1, 'string');
    $gv_query = $db->bindVars($gv_query, ':amount', $currencies->value($gv_amount, true, DEFAULT_CURRENCY), 'currency');
    $gv = $db->Execute($gv_query);

    $insert_id = $db->Insert_ID();

    $gv_query="INSERT INTO " . TABLE_COUPON_EMAIL_TRACK . "
           (coupon_id, customer_id_sent, sent_firstname, sent_lastname, emailed_to, date_sent)
    VALUES (:insertID, :customersID, :firstname, :lastname, :email, now())";

    $gv_query = $db->bindVars($gv_query, ':insertID', $insert_id, 'integer');
    $gv_query = $db->bindVars($gv_query, ':customersID', $_SESSION['customer_id'], 'integer');
    $gv_query = $db->bindVars($gv_query, ':firstname', $send_firstname, 'string');
    $gv_query = $db->bindVars($gv_query, ':lastname', $account->fields['customers_lastname'], 'string');
    $gv_query = $db->bindVars($gv_query, ':email', $account->fields['customers_email_address'], 'string');
    $db->Execute($gv_query);

    // build email content:
    $gv_email = STORE_NAME . "\n" .
      EMAIL_SEPARATOR . "\n" .
      sprintf(EMAIL_GV_AUTO_AMOUNT, $currencies->format($gv_amount, false)) . "\n" .
      EMAIL_SEPARATOR . "\n\n";

    $gv_email .= sprintf(EMAIL_GV_AUTO_CODE, '<strong>' . $id1 . '</strong>');
    $gv_email .= "\n\n";
    $gv_email .= EMAIL_GV_SHOP_FOOTER;
    $gv_email_subject = EMAIL_GV_AUTO_SUBJECT;

    $html_msg['EMAIL_GV_SHOP_FOOTER'] =	EMAIL_GV_SHOP_FOOTER;

    // send the email
    zen_mail($send_name, $send_email_address, $gv_email_subject, nl2br($gv_email),
             STORE_NAME, EMAIL_FROM, $html_msg, 'gv_send');

    // send additional emails
    if (SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_STATUS == '1' and SEND_EXTRA_GV_CUSTOMER_EMAILS_TO !='') {
      $extra_info = email_collect_extra_info(
        ENTRY_NAME . $_POST['to_name'], ENTRY_EMAIL . $_POST['email'],
        $send_name , $account->fields['customers_email_address']);
      $html_msg['EXTRA_INFO'] = $extra_info['HTML'];
      zen_mail('', SEND_EXTRA_GV_CUSTOMER_EMAILS_TO,
        SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_SUBJECT . ' ' . $gv_email_subject,
        $gv_email . $extra_info['TEXT'], STORE_NAME, EMAIL_FROM, $html_msg,
        'gv_send_extra');
    }

    // do a fresh calculation after sending an email
    $gv_query = "SELECT amount
      FROM " . TABLE_COUPON_GV_CUSTOMER . "
      WHERE customer_id = :customersID";

    $gv_query = $db->bindVars($gv_query, ':customersID', $_SESSION['customer_id'], 'integer');
    $gv_result = $db->Execute($gv_query);
    $gv_current_balance = $currencies->format($gv_result->fields['amount']);

    // validate entries
    $gv_amount = (float)$gv_amount;
  }
}

?>
