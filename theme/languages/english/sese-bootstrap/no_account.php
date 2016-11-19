<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright Joseph Schilz
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 2007
 */

define('NAVBAR_TITLE', 'Billing Information');

define('HEADING_TITLE', '');

define('TEXT_ORIGIN_LOGIN', 'If you have an account with us, you may login at the <a href="%s"><u>Login Page</u></a>.');
define('TEXT_LEGEND_HEAD', 'Create a New Account');
define('TEXT_MORE', 'For a limited time, new customers receive a coupon good for 10% off any order.  You will receive this coupon immediately after you have created your account, and it may be used on your first order.<br /><br />To begin creating a new account, please enter your account details below.');

// greeting salutation
define('EMAIL_SUBJECT', 'Welcome to ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Dear Mr. %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Dear Ms. %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Dear %s' . "\n\n");

// First line of the greeting
define('EMAIL_WELCOME', 'Thanks for creating an account with <strong><a href="http://www.southernexposure.com">' . STORE_NAME . "</a></strong>. When you're signed in, you can:\n");
define('EMAIL_SEPARATOR', '--------------------');
define('EMAIL_COUPON_INCENTIVE_HEADER', 'Congratulations! To make your next visit to our online shop a more rewarding experience, listed below are details for a Discount Coupon created just for you!' . "\n\n");
// your Discount Coupon Description will be inserted before this next define
define('EMAIL_COUPON_REDEEM', 'To use the Discount Coupon, enter the ' . TEXT_GV_REDEEM . ' code during checkout:  <strong>%s</strong>' . "\n\n");

define('EMAIL_GV_INCENTIVE_HEADER', 'Just for stopping by today, we have sent you a ' . TEXT_GV_NAME . ' for %s!' . "\n");
define('EMAIL_GV_REDEEM', 'The ' . TEXT_GV_NAME . ' ' . TEXT_GV_REDEEM . ' is: %s ' . "\n\n" . 'You can enter the ' . TEXT_GV_REDEEM . ' during Checkout, after making your selections in the store. ');
define('EMAIL_GV_LINK', ' Or, you may redeem it now by following this link: ' . "\n");
// GV link will automatically be included before this line

define('EMAIL_GV_LINK_OTHER','Once you have added the ' . TEXT_GV_NAME . ' to your account, you may use the ' . TEXT_GV_NAME . ' for yourself, or send it to a friend!' . "\n\n");

define('EMAIL_TEXT', "<ul><li>Check out faster</li>\n<li>Keep products in your cart as long as you like</li>\n<li><a href='https://www.southernexposure.com/index.php?main_page=address_book'>Store multiple addresses</a></li>\n<li><a href='https://www.southernexposure.com/index.php?main_page=account_history'>View your order history</a></li>\n<li><a href='https://www.southernexposure.com/index.php?main_page=account_password'>Change your password</a></li>");
define('EMAIL_CONTACT', 'If you have questions, you can email us at <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">'. STORE_OWNER_EMAIL_ADDRESS ." </a>, or call us at 540-894-9480.\n\n");
define('EMAIL_GV_CLOSURE','Sincerely,' . "\n\n" . STORE_OWNER . "\nStore Owner\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'.HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n");

// email disclaimer - this disclaimer is separate from all other email disclaimers
define('EMAIL_DISCLAIMER_NEW_CUSTOMER', 'This email address was given to us by you or by one of our customers. If you did not signup for an account, or feel that you have received this email in error, please send an email to %s ');

define('TABLE_HEADING_CONTACT_DETAILS', 'Contact Details');

define('TITLE_CONTINUE_CHECKOUT_PROCEDURE', '');
define('TEXT_CONTINUE_CHECKOUT_PROCEDURE', '');

define('EMAIL_TEXT_COWOA', ' A Legitiment E-Mail Address is Required to retrieve your order');


?>
