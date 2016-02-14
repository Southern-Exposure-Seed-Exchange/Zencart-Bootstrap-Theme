<?php
/**
 * tpl_modules_checkout_address_book.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_checkout_address_book.php 13799 2009-07-08 02:08:33Z drbyte $
 */

/* require code to get address book details */
require(DIR_WS_MODULES . zen_get_module_directory('checkout_address_book.php'));

$address_index = 0;
while (!$addresses->EOF) {
  $is_session_address = $addresses->fields['address_book_id'] == $_SESSION['sendto'];
  if ($is_session_address) {
    $params = 'id="defaultSelected" class="moduleRowSelected col-sm-6"';
  } else {
    $params = 'class="moduleRow col-sm-6"';
  } ?>
  <div <?php echo $params; ?>>
    <div class='radio'>
      <label><strong><?php
        echo zen_draw_radio_field('address', $addresses->fields['address_book_id'],
                                  $is_session_address, 'id="name-' . $addresses->fields['address_book_id'] . '"');
        echo zen_output_string_protected($addresses->fields['firstname'] . ' ' . $addresses->fields['lastname']); ?>
      </strong></label>
    </div>
    <address><?php
      echo zen_address_format(zen_get_address_format_id($addresses->fields['country_id']),
                              $addresses->fields, true, ' ', '<br />'); ?>
    </address>
  </div><?php
  if ($address_index % 2) {
    echo '<div class="clearfix hidden-xs"></div>';
  }
  $addresses->MoveNext();
  $address_index++;
} ?>
