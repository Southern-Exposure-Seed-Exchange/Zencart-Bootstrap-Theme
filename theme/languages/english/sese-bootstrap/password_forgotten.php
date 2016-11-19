<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: password_forgotten.php 3086 2006-03-01 00:40:57Z drbyte $
 */

define('NAVBAR_TITLE_1', 'Login');
define('NAVBAR_TITLE_2', 'Password Forgotten');

define('HEADING_TITLE', 'Forgotten Password');

define('TEXT_MAIN', 'Enter your email address below and we\'ll send you an email message containing your new password.');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Error: The Email Address was not found in our records; please try again.');

define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - New Password');
define('EMAIL_PASSWORD_REMINDER_BODY', 'A new password was requested for your Southern Exposure account. Your new password is:' . "\n\n" . '%s' . "\n\nCut and paste this case-sensitive password into our <a href='https://www.southernexposure.com/index.php?main_page=login'>Login page</a>. Once you are logged, we encourage you to change it by going to our <a href='https://www.southernexposure.com/index.php?main_page=account_password'>Change Password page</a> in the My Account section.");

define('SUCCESS_PASSWORD_SENT', 'A new password has been sent to your email address.');
?>
