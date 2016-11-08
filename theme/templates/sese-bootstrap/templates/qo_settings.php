<?php
/*
	Quick Orders for Zen Cart - Add products to cart by inserting model number and quantity

	This program is subject to the Gnu General Public License version 2 (dated June 1991)

	A copy of the license should have been included with this package; see license.txt
	The license is also available at: http://www.gnu.org/copyleft/gpl.html
*/

// how many empty model input fields shall we display?
define('QO_INPUT_ROWS', 15);

// require that product models must be case-sensitive? if so, set this to true (boolean)
define('QO_MODELS_MUST_BE_CASE_SENSITIVE', false);

// how many similar matches should be displayed when user enters invalid product model? 0 = no limit
define('QO_SIMILAR_MATCHES_LIMIT', 0);

/*
	order similar matches by column
	must be a column in the products (p.) or products_description (pd.) table, otherwise you'll get a SQL error
	example use:
			* 'pd.products_name ASC' or simply 'pd.products_name' orders by product names ascendingly
			* 'p.products_model DESC' orders by product models descendingly
	you should always use either "p." or "pd." to say which table the column belongs to, otherwise you may encounter errors
	for people who know SQL: this string will be inserted right into the "ORDER BY" part of the query
	set to empty string ('') or any non-string value if not used
*/
define('QO_SIMILAR_MATCHES_ORDER_BY', false);

// uncomment the proper instance of the array $qo_model_array

	// add the product model numbers you want to display here -
	/*
	$qo_model_array = array(
		'some_model',
		'another_model',
		'yet_another_model',
		'and_so_on'
		);
	*/

	// this one will display all your products
	// $qo_model_array = array('all');

	// this one will not display any pre-selected products
	$qo_model_array = array();

////

// if you have thousands of products and have selected to display all products on the quick order page, let's limit that a bit, shall we?
// set to boolean false for no limit - generally not a very good idea
$qo_products_limit = 250;

?>
