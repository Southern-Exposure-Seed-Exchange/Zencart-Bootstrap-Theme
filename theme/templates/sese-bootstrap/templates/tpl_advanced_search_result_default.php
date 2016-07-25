<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=advanced_search_result.<br />
 * Displays results of advanced search
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_advanced_search_result_default.php 4182 2006-08-21 02:11:37Z ajeh $
 * Included changes for advanced_search_plus v1.0 by iniebla  2009-10-30 00:00:00
 */
?>
<div class="centerColumn" id="advSearchResultsDefault">

<h1 id="advSearchResultsDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php

//================================ Begin of Advanced Search Plus
if ($found_products_ad == true) {
  if ($found_ezpages) { ?>
    <p><a href='?<?php echo $_SERVER['QUERY_STRING']; ?>#infopages'>Information Page Search Results</a> are at bottom of page.</p><?php
  } ?>
  <h3>Product Search Results:</h3><?php
  if (isset($disp_order_default)) {
    echo '<div class="clearfix"><div class="pull-right">' .
      BootstrapUtils::render_page_count_links() . '</div><div class="pull-left">';
    require($template->get_template_dir('/tpl_modules_listing_display_order.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_listing_display_order.php');
    echo '</div></div>';
  }
  /* Collate and display products from advanced search results */
  require($template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_listing.php');
} else {
   echo TEXT_DISPLAY_NOT_FOUND_IN_PRODUCTS . "<br \>";
}

if ($found_ezpages) {
  echo '<div id="infopages">';
  require($template->get_template_dir('tpl_modules_advanced_search_ezpages.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_advanced_search_ezpages.php');
  echo "</div>";
} else {
  echo '<div id="infopages">'; ?>
  <h3 id="advSearchResultsDefaultHeading"><?php echo TEXT_DISPLAY_FOUND_EZPAGES; ?></h3> <?php
  echo TEXT_DISPLAY_NOT_FOUND_IN_EZPAGES." <br \>";
  echo "</div>";
} ?>

<p class='clearfix'>
  <span class="pull-left"><?php echo '<a class="btn btn-default" href="' . zen_href_link(FILENAME_ADVANCED_SEARCH, zen_get_all_get_params(array('sort', 'page', 'x', 'y')), 'NONSSL', true, false) . '">' . BUTTON_BACK_ALT . '</a>'; ?></span>
</p>

</div>
