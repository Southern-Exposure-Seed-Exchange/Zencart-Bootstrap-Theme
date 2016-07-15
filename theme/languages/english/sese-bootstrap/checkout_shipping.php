<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: J_Schilz for Integrated COWOA - 14 April 2007
 */
if($_SESSION['COWOA']) $COWOA=TRUE;

define('NAVBAR_TITLE_1', 'Checkout');
define('NAVBAR_TITLE_2', 'Shipping Method');

if($COWOA)
define('HEADING_TITLE', '');
else
define('HEADING_TITLE', '');


define('TABLE_HEADING_SHIPPING_ADDRESS', 'Shipping Address');
define('TEXT_CHOOSE_SHIPPING_DESTINATION', '');
define('TITLE_SHIPPING_ADDRESS', 'Shipping Information');

define('TABLE_HEADING_SHIPPING_METHOD', '');
define('TEXT_CHOOSE_SHIPPING_METHOD', 'Please select the preferred shipping method to use on this order.');
define('TITLE_PLEASE_SELECT', 'Please Select');
define('TEXT_ENTER_SHIPPING_INFORMATION', 'This is currently the only shipping method available to use on this order.');
define('TITLE_NO_SHIPPING_AVAILABLE', 'Not Available At This Time');
define('TEXT_NO_SHIPPING_AVAILABLE','<span class="alert">Sorry, we are not shipping to your region at this time.</span><br />Please contact us for alternate arrangements.');

define('TABLE_HEADING_COMMENTS', 'Special Instructions or Comments About Your Order');
define('TEXT_PRE_COMMENT_FIELD', '');
define('TEXT_EXTRA_SHIPPING', 'You will be emailed a tracking number when your order has shipped.');

if($COWOA)
define('TITLE_CONTINUE_CHECKOUT_PROCEDURE', '');
else
define('TITLE_CONTINUE_CHECKOUT_PROCEDURE', '');
define('TEXT_CONTINUE_CHECKOUT_PROCEDURE', '');

// when free shipping for orders over $XX.00 is active
  define('FREE_SHIPPING_TITLE', 'Free Shipping');
  define('FREE_SHIPPING_DESCRIPTION', 'Free shipping for orders over %s');
?>
