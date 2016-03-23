<?php
/**
 * Page Template
 *
 * TODO: Cleanup, Refactor - Sorry :(
 *
 * Loaded automatically by index.php?main_page=address_book_process.<br />
 * Allows customer to add a new address book entry
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_address_book_process_default.php 2949 2006-02-03 01:09:07Z birdbrain $
 */
?>
<div class="centerColumn" id="addressBookProcessDefault"><?php
  if (!isset($_GET['delete'])) {
    echo zen_draw_form('addressbook', zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, (isset($_GET['edit']) ? 'edit=' . $_GET['edit'] : ''), 'SSL'), 'post', 'class="form-horizontal" onsubmit="return check_form(addressbook);"');
  } ?>

<div class='page-header'>
  <h1 id="addressBookProcessDefaultHeading"><?php if (isset($_GET['edit'])) { echo HEADING_TITLE_MODIFY_ENTRY; } elseif (isset($_GET['delete'])) { echo HEADING_TITLE_DELETE_ENTRY; } else { echo HEADING_TITLE_ADD_ENTRY; } ?></h1>
</div><?php
  
if ($messageStack->size('addressbook') > 0) echo $messageStack->output('addressbook');

if (isset($_GET['delete'])) { ?>
  <div class="alert alert-danger"><?php echo DELETE_ADDRESS_DESCRIPTION; ?></div>

  <address><?php echo zen_address_label($_SESSION['customer_id'], $_GET['delete'], true, ' ', '<br />'); ?></address>

  <div class='clearfix'>
    <div class="pull-right"><?php echo '<a class="btn btn-danger" href="' . zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $_GET['delete'] . '&action=deleteconfirm', 'SSL') . '">' . BUTTON_DELETE_ALT . '</a>'; ?></div>
    <div class="pull-left"><?php echo '<a class="btn btn-default" href="' . zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . BUTTON_BACK_ALT . '</a>'; ?></div>
  </div>
  <?php
} else {
/**
 * Used to display address book entry form
 */
  BootstrapForms::echo_shipping_address_form();

  if ((isset($_GET['edit']) && ($_SESSION['customer_default_address_id'] != $_GET['edit'])) || (isset($_GET['edit']) == false) ) { ?>
  <div class='form-group'>
    <label class='control-label col-sm-4' for='primary'><?php echo SET_AS_PRIMARY; ?></label>
    <div class='col-sm-8'>
      <?php echo zen_draw_checkbox_field('primary', 'on', false, ' class="form-control" id="primary"'); ?>
    </div>
  </div><?php

  } ?>

  <div class='clearfix'> <?php
    if (isset($_GET['edit']) && is_numeric($_GET['edit'])) { ?>
      <div class="pull-right"><?php
        echo zen_draw_hidden_field('action', 'update') .
              zen_draw_hidden_field('edit', $_GET['edit']) .
              "<button type='submit' class='btn btn-primary'>" . BUTTON_UPDATE_ALT . "</button>"; ?>
      </div>
        <div class="pull-left"><?php
          echo '<a class="btn btn-default" href="' . zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . BUTTON_BACK_ALT . '</a>'; ?>
        </div><?php
    } else { ?>
      <div class="pull-right"><?php
        echo zen_draw_hidden_field('action', 'process') .
             "<button type='submit' class='btn btn-primary'>" . BUTTON_SUBMIT_ALT . "</button>"; ?>
      </div>
      <div class="pull-left"><?php
        echo zen_back_link() .
             "<button type='button' class='btn btn-default'>" . BUTTON_BACK_ALT . '</button></a>'; ?>
      </div><?php
    } ?>
  </div><?php
}

if (!isset($_GET['delete'])) { echo '</form>'; }
?>


</div>
