<?php
/*
	Quick Orders for Zen Cart - Add products to cart by inserting model number and quantity

	This program is subject to the Gnu General Public License version 2 (dated June 1991)

	A copy of the license should have been included with this package; see license.txt
	The license is also available at: http://www.gnu.org/copyleft/gpl.html
*/

define('NAVBAR_TITLE_1', 'Quick Order');
// define('NAVBAR_TITLE_2', 'Order Online');

define('HEADING_TITLE', 'Quick Ordering by Item Number');

define('TEXT_QO_MODEL', '');
define('TEXT_QO_QTY', 'Quantity');
define('TEXT_QO_NAME_MODEL', 'Item Number');

define('ERROR_AT_LEAST_ONE_INPUT', 'Please enter an Item number and quantity to add to shopping cart.');
define('ERROR_QUANTITY_MUST_BE_INTEGER', 'Quantity must be a numerical integer value.');
define('ERROR_NOT_VALID_MODEL_NUMBER', 'Invalid Item number: %s');
define('ERROR_NOT_VALID_MODEL_NUMBER_SUGGEST_ALTERNATES', 'Invalid Item number: %s<br />Were you looking for one of the following?');
define('ERROR_SOLD_OUT', 'Sorry, this item is currently sold out.');

define('QO_ERROR_LOGIN_TO_PROCEED', 'You need to be logged in to proceed.');
define('QO_ERROR_CANNOT_PROCEED', 'We\'re sorry, but you can\'t use this ordering form at this time. If you have any questions, feel free to <a href="%s">contact us</a>.<br />Additional info: %s');
define('QO_UNKNOWN_ERROR', 'Unknown error - please <a href="%s">contact us</a> and tell us what happened, so we can provide you with better services.');

?>
