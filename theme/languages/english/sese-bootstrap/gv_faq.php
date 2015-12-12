<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: gv_faq.php 4155 2006-08-16 17:14:52Z ajeh $
//

define('NAVBAR_TITLE', TEXT_GV_NAME . ' FAQ');
define('HEADING_TITLE', TEXT_GV_NAME . ' FAQ');

define('TEXT_INFORMATION', '<a name="Top"></a>
  <a href="'.zen_href_link(FILENAME_GV_FAQ,'faq_item=1','NONSSL').'">Purchasing ' . TEXT_GV_NAMES . '</a><br />
  <a href="'.zen_href_link(FILENAME_GV_FAQ,'faq_item=2','NONSSL').'">How to send ' . TEXT_GV_NAMES . '</a><br />
  <a href="'.zen_href_link(FILENAME_GV_FAQ,'faq_item=3','NONSSL').'">Buying with ' . TEXT_GV_NAMES . '</a><br />
  <a href="'.zen_href_link(FILENAME_GV_FAQ,'faq_item=4','NONSSL').'">Redeeming ' . TEXT_GV_NAMES . '</a><br />
  <a href="'.zen_href_link(FILENAME_GV_FAQ,'faq_item=5','NONSSL').'">When problems occur</a><br />
');
switch ($_GET['faq_item']) {
  case '1':
define('SUB_HEADING_TITLE','Purchasing ' . TEXT_GV_NAMES);
define('SUB_HEADING_TEXT',' Gift certificates are purchased in $1 increments.  When placing an
order that includes a gift certificate for someone else, specify the
number of $1 units you would like to buy.  Type this number in the
quantity box as you add the gift certificate units to your cart.  Pay
for them, along with any other items, using the store\'s standard
payment method(s). Once purchased, the Gift Certificate units will be
added to your personal Online Gift Certificate Account, if you have an account with our store, otherwise, the redemption code will be emailed to you.');
  break;
  case '2':
define('SUB_HEADING_TITLE','How to Send ' . TEXT_GV_NAMES);
define('SUB_HEADING_TEXT','If you have an account with us, you can send a ' . TEXT_GV_NAME . ' by going to our Send Online
Gift Certificate Page.  When you have an online gift certificate
balance, the link to this page will show up in your shopping cart and
on this FAQ page.  If you don\'t yet have an account with us, you can create one, redeem the code you recieved in an email with you purchased the '. TEXT_GV_NAME .', and then the link to send an email will appear. When you send an Online Gift Certificate, include
the following:<br />
- The name of the recipient of the Online Gift Certificate you are sending.<br />
- The e-mail address of the recipient of the Online Gift Certificate you
- are sending.<br />
- The amount you want to send. (Note that you can send less than is in
your Online Gift Certificate Account; the rest will remain in your
account.)<br />
- A short message which will appear in the e-mail to the recipient.');
  break;
  case '3':
  define('SUB_HEADING_TITLE','Buying with ' . TEXT_GV_NAMES);
  define('SUB_HEADING_TEXT','You must use a store account to pay for items with a '. TEXT_GV_NAME .', so begin by logging in or creating a new account. If you have funds in your Online Gift Certificate Account, you can use
those funds to purchase other items in our store. At the checkout
stage, an extra box will appear. Enter the amount to apply from the
funds in your Online Gift Certificate Account. Please note, you will
still have to select another payment method if there is not enough in
your Online Gift Certificate Account to cover the cost of your
purchase. If you have more funds in your Online Gift Certificate
Account than the total cost of your purchase, the balance will be left
in your Online Gift Certificate Account for the future.');
  break;
  case '4':
  define('SUB_HEADING_TITLE','Redeeming ' . TEXT_GV_NAMES);
  define('SUB_HEADING_TEXT','If you receive an Online Gift Certificate by e-mail, it will say who
sent you the Online Gift Certificate, and possibly have a short
message from them.   If the e-mail was sent directly from our store, it will also contain the Online Gift
Certificate Redemption Code. Save this e-mail. You can now redeem the
Online Gift Certificate in either of two ways.<br /><br />
1. By clicking on the link contained within the e-mail. This will take
you to the store\'s Redeem Online Gift Certificate page. You will be
requested to log in or create an account. Then the Online
Gift Certificate will be validated and added to your Online Gift
Certificate Account so that you can use it as you\'d like.<br /><br />
2. If you have an account with us, or create one during the checkout process, on the page that asks you to select a
payment method, there will be a box to enter a Redemption Code. Cut
and paste the Redemption Code from the e-mail here, and click the
Redeem button. The code will be validated and the amount will be added
to your Online Gift Certificate Account to use as you\'d like.');
  break;
  case '5':
  define('SUB_HEADING_TITLE','When problems occur.');
  define('SUB_HEADING_TEXT','If you have trouble with the Online Gift Certificate System, please
contact us at gardens@southernexposure.com. Please include as much
information as you can in the e-mail.  For example, if you have
trouble redeeming an Online Gift Certificate, the following
information would be helpful to us in fixing the problem:<br />
- Your name and zip code<br />
- The name and zip code of the person who sent you the Gift Certificate<br />
- The code you were sent<br />
- Whether you cut and pasted the code, clicked the link from the e-mail,
or tried both ways<br />
- What error message or other sign told you there was an issue with the
Gift Certificate');
  break;
  default:
  define('SUB_HEADING_TITLE','');
  define('SUB_HEADING_TEXT','Please choose from one of the questions above.');

  }

  define('TEXT_GV_REDEEM_INFO', 'Please enter your ' . TEXT_GV_NAME . ' redemption code: ');
  define('TEXT_GV_REDEEM_ID', 'Redemption Code:');
?>
