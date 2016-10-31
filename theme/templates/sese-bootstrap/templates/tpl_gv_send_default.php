<?php
/**
 * Page Template
 *
 * Template used to collect/display details of sending a GV to a friend from own GV balance. <br />
 *
 * TODO: Clean Up, Refactor
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_gv_send_default.php 5924 2007-02-28 08:25:15Z drbyte $
 */


class BootstrapGVSend
{
    public static function balance_section() {
      global $gv_current_balance, $gv_result;
      $heading = "<h3>" . TEXT_AVAILABLE_BALANCE . "</h3>";
      $balance = "<p>" . TEXT_BALANCE_IS . "{$gv_current_balance}</p>";
      if ($gv_result->fields['amount'] > 0 && $_GET['action'] == 'doneprocess') {
        $send_link = zen_href_link(FILENAME_GV_SEND, '', 'SSL', false);
        $continue_link = zen_href_link(FILENAME_DEFAULT, '', 'SSL', false);
        $send_another = "<p>" . TEXT_SEND_ANOTHER . "</p>" .
          "<div class='clearfix'>" .
            "<a href='{$continue_link}' class='btn btn-default pull-right'>" .
              BUTTON_CONTINUE_ALT . "</a>" .
            "<a href='{$send_link}' class='btn btn-primary pull-left'>" .
              BUTTON_SEND_ANOTHER_ALT . "</a>" .
          "</div>";
      }
      return "<div>{$heading}{$balance}{$send_another}</div>";
    }
}
?>
<div class="centerColumn" id="gvSendDefault">

<?php
if ($_GET['action'] == 'doneprocess') {
?>
<!--BOF GV sent success-->

<div class='page-header'><h1 id="gvSendDefaultHeadingDone"><?php echo HEADING_TITLE_COMPLETED; ?></h1></div>

<div class="alert alert-success"><?php echo TEXT_SUCCESS; ?></div>

<?php echo BootstrapGVSend::balance_section(); ?>

<!--EOF GV sent success -->
<?php
}
if ($_GET['action'] == 'send' && !$error) {
?>
<!--BOF GV send confirm -->

<div class='page-header'><h1 id="gvSendDefaultHeadingConfirm"><?php echo HEADING_TITLE_CONFIRM_SEND; ?></h1></div>
<?php echo BootstrapGVSend::balance_section(); ?>
<hr />

<form action="<?php echo zen_href_link(FILENAME_GV_SEND, 'action=process', 'SSL', false); ?>" method="post">

<div id="gvSendDefaultMainMessage" class="content"><?php echo sprintf(MAIN_MESSAGE, $currencies->format($_POST['amount'], false), $_POST['to_name'], $_POST['email']); ?></div>

<p id="gvSendDefaultMessageSecondary" class="content"><?php echo sprintf(SECONDARY_MESSAGE, $_POST['to_name'], $currencies->format($_POST['amount'], false), $send_name); ?></p>
<?php
    if ($_POST['message']) {
?>

<div id="gvSendDefaultMessagePersonal" class="content"><?php echo sprintf(PERSONAL_MESSAGE, $send_firstname); ?></div>

<p id="gvSendDefaultMessage" class="content"><?php echo stripslashes($_POST['message']); ?></p>
<?php
    }

    echo zen_draw_hidden_field('to_name', stripslashes($_POST['to_name'])) . zen_draw_hidden_field('email', $_POST['email']) . zen_draw_hidden_field('amount', $gv_amount) . zen_draw_hidden_field('message', stripslashes($_POST['message']));
?>

<br />
<p class='clearfix'>
  <button type='submit' class='btn btn-primary pull-right'>
    <?php echo BUTTON_CONFIRM_SEND_ALT; ?>
  </button>
  <input type='submit' class='btn btn-default pull-left' name='edit' value='Edit' />
  <!-- These hidden fields are required because ZenCart expects the Edit button
       to have a type of 'image' instead of 'submit'. -->
  <input type='hidden' name='edit.x' /><input type='hidden' name='edit.y' />
</p>

</form>
<br class="clearBoth" />

<div class="advisory"><?php echo EMAIL_ADVISORY_INCLUDED_WARNING . '<br />' . str_replace('-----', '', EMAIL_ADVISORY); ?></div>
<!--EOF GV send confirm -->
<?php
} elseif ($_GET['action']=='' || $error) {
?>
<!--BOF GV send-->
<div class='page-header'><h1 id="gvSendDefaultHeadingSend"><?php echo HEADING_TITLE; ?></h1></div>

<?php echo BootstrapGVSend::balance_section(); ?>
<hr />
<div id="gvSendDefaultMainContent" class="content"><?php echo HEADING_TEXT; ?></div>
<br class="clearBoth" />
<?php if ($messageStack->size('gv_send') > 0) echo $messageStack->output('gv_send'); ?>

<form action="<?php echo zen_href_link(FILENAME_GV_SEND, 'action=send', 'SSL', false); ?>" method="post">

<fieldset>
<div class='form-group'>
<label class="inputLabel" for="to-name"><?php echo ENTRY_NAME . BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL); ?></label>
<?php echo zen_draw_input_field('to_name', $_POST['to_name'], 'size="40" class="form-control" id="to-name"');?>
</div>

<div class='form-group'>
<label class="inputLabel" for="email-address"><?php echo ENTRY_EMAIL . BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL); ?></label>
<?php echo zen_draw_input_field('email', $_POST['email'], 'size="40" class="form-control" id="email-address"'); if ($error) echo $error_email; ?>
</div>

<div class='form-group'>
<label class="inputLabel" for="amount"><?php echo ENTRY_AMOUNT . BootstrapForms::required_text(ENTRY_REQUIRED_SYMBOL); ?></label>
<?php echo zen_draw_input_field('amount', $_POST['amount'], 'class="form-control" id="amount"', 'text', false); if ($error) echo $error_amount; ?>
</div>

<div class='form-group'>
<label for="message-area"><?php echo ENTRY_MESSAGE; ?></label>
<?php echo zen_draw_textarea_field('message', 50, 10, stripslashes($_POST['message']), 'class="form-control" id="message-area"'); ?>
</div>

</fieldset>

<p class='clearfix'>
  <button type='submit' class='btn btn-primary pull-right'>
    <?php echo BUTTON_REVIEW_ALT; ?>
  </button>
  <button type='button' class='btn btn-default pull-left'>
    <?php echo zen_back_link() . BUTTON_BACK_ALT . '</a>'; ?>
  </button>
</p>


</form>

<div class="advisory"><?php echo EMAIL_ADVISORY_INCLUDED_WARNING . "<br />" . str_replace('-----', '', EMAIL_ADVISORY); ?></div>
<?php
}
?>
<!--EOF GV send-->
</div>
