<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: gv_send.php 3421 2006-04-12 04:16:14Z drbyte $
 */

define('HEADING_TITLE', 'Send ' . TEXT_GV_NAME);
define('HEADING_TITLE_CONFIRM_SEND', 'Send ' . TEXT_GV_NAME . ' Confirmation');
define('HEADING_TITLE_COMPLETED', TEXT_GV_NAME . ' Sent');
define('NAVBAR_TITLE', 'Send ' . TEXT_GV_NAME);
define('EMAIL_SUBJECT', 'Message from ' . STORE_NAME);
define('HEADING_TEXT','Please enter the name, email address and amount of the ' . TEXT_GV_NAME . ' you wish to send. For more information, please see our <a href="' . zen_href_link(FILENAME_GV_FAQ, '', 'NONSSL').'">' . GV_FAQ . '.</a>');
define('ENTRY_NAME', 'Recipient\'s Name:');
define('ENTRY_EMAIL', 'Recipient Email:');
define('ENTRY_MESSAGE', 'Your Message:');
define('ENTRY_AMOUNT', 'Amount to Send:');
define('ERROR_ENTRY_TO_NAME_CHECK', 'We did not get the Recipient\'s Name. Please fill it in below. ');
define('ERROR_ENTRY_AMOUNT_CHECK', 'The ' . TEXT_GV_NAME . ' amount does not appear to be correct. Please try again.');
define('ERROR_ENTRY_EMAIL_ADDRESS_CHECK', 'Is the email address correct? Please try again.');
define('MAIN_MESSAGE', 'You are about to send a ' . TEXT_GV_NAME . ' worth %s to %s,  whose email address is %s. If these details are not correct, you may edit your message by clicking the <strong>edit</strong> button.<br /><br />The message you are sending is:<br /><br />');
define('SECONDARY_MESSAGE', 'Dear %s,<br /><br />' . 'You have been sent a ' . STORE_NAME . " " . TEXT_GV_NAME . ' worth %s by %s.');
define('PERSONAL_MESSAGE', '%s says:');
define('TEXT_SUCCESS', 'Congratulations, your ' . TEXT_GV_NAME . ' has been sent.');
define('TEXT_SEND_ANOTHER', 'Would you like to send another ' . TEXT_GV_NAME . '?');
define('TEXT_AVAILABLE_BALANCE',  'Gift Certificate Account');

define('EMAIL_GV_TEXT_SUBJECT', 'A gift from %s');
define('EMAIL_SEPARATOR', '--------------------------------------------------------------------------------------------------');
define('EMAIL_GV_TEXT_HEADER', 'Congratulations, You have received a ' . TEXT_GV_NAME . ' worth %s');
define('EMAIL_GV_FROM', '%s has sent you a  ' . TEXT_GV_NAME . '.');
define('EMAIL_GV_MESSAGE', 'with a message saying: ');
define('EMAIL_GV_SEND_TO', 'Hi, %s');
define('EMAIL_GV_REDEEM', 'To redeem this ' . TEXT_GV_NAME . ', please login and click on the link below. Or cut and paste the ' . TEXT_GV_REDEEM . ': %s  into the "Redeem" box under "online gift certificates" at checkout. This will add funds to your account. Then, to use the gift certificate in placing an order, enter the amount you wish to use in the "Apply Amount" box. If you have questions, contact us at gardens@southernexposure.com or 540-894-9480. Enjoy!');
define('EMAIL_GV_LINK', '');
define('EMAIL_GV_VISIT', ' or visit ');
define('EMAIL_GV_ENTER', ' and enter the ' . TEXT_GV_REDEEM . ' ');
define('EMAIL_GV_FIXED_FOOTER', '');
define('EMAIL_GV_SHOP_FOOTER', '');

//the following are for COWOA customers getting the redemption code sent automatically at checkout (Sam)
define('EMAIL_GV_AUTO_AMOUNT', 'Thank You for purchasing a ' . TEXT_GV_NAME . ' worth <strong>%s</strong>.<br /><br />');
define('EMAIL_GV_AUTO_CODE', 'To deliver this online gift certificate you will need to send the recipient this code: %s.  This '. TEXT_GV_NAME . ' can only be redeemed through our online store and they will need to log in or create an account to do so.  You might want to include a link to our Online Gift Certificate FAQ and redemption page at <a href="'. HTTP_SERVER .'/gv_faq.html">'. HTTP_SERVER .'/gv_faq.html</a>.');
define('EMAIL_GV_AUTO_SUBJECT', 'Gift Voucher Code from Southern Exposure Seed Exchange');
?>
