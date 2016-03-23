<?php
/**
 * Page Template
 *
 * TODO: Cleanup, refactor - Sorry :(
 *
 * Loaded automatically by index.php?main_page=adress_book.<br />
 * Allows customer to manage entries in their address book
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_address_book_default.php 5369 2006-12-23 10:55:52Z drbyte $
 */
?>
<div class="centerColumn" id="addressBookDefault">

<div class='page-header'><h1 id="addressBookDefaultHeading"><?php echo HEADING_TITLE; ?></h1></div>

<?php if ($messageStack->size('addressbook') > 0) echo $messageStack->output('addressbook'); ?>

<h2 id="addressBookDefaultPrimary"><?php echo PRIMARY_ADDRESS_TITLE; ?></h2>
<address class="col-sm-6"><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['customer_default_address_id'], true, ' ', '<br />'); ?></address>
<p class="col-sm-6"><?php echo PRIMARY_ADDRESS_DESCRIPTION; ?></p>
<div class='clearfix hidden-xs'></div>


<fieldset>
  <legend><?php echo ADDRESS_BOOK_TITLE; ?></legend>
  <p><?php echo sprintf(TEXT_MAXIMUM_ENTRIES, MAX_ADDRESS_BOOK_ENTRIES); ?></p><?php
  /**
  * Loop through and display address book entries
  */
    $index = 0;
    foreach ($addressArray as $addresses) {
  ?>
  <div class='col-md-6'>
    <h3 class="addressBookDefaultName"><?php echo zen_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']); ?><?php if ($addresses['address_book_id'] == $_SESSION['customer_default_address_id']) echo '&nbsp;' . PRIMARY_ADDRESS ; ?></h3>

    <div class='clearfix'>
      <address class='pull-left'><?php echo zen_address_format($addresses['format_id'], $addresses['address'], true, ' ', '<br />'); ?></address>
      <div class="pull-right text-right">
        <?php echo '<p><a class="btn btn btn-default btn-adjacent" href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL') . '">' . BUTTON_EDIT_SMALL_ALT . '</a>' .
        '<a class="btn btn btn-danger" href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL') . '">' . BUTTON_DELETE_SMALL_ALT . '</a></p>'; ?>
      </div>
    </div>
  </div>
  <?php
      $index++;
    }
  ?>
</fieldset>

<p class='clearfix'>
  <div class='pull-left'><?php
    echo '<a class="btn btn-default" href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . BUTTON_BACK_ALT . '</a>'; ?>
  </div><?php
  if (zen_count_customer_address_book_entries() < MAX_ADDRESS_BOOK_ENTRIES) {
    echo '<div class="pull-right">';
    echo '<a class="btn btn-primary" href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL') . '">' . BUTTON_ADD_ADDRESS_ALT . '</a>';
    echo '</div>';
  } ?>
</p>


</div>
