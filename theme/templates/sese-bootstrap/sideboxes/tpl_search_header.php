<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_search_header.php 9755 2008-09-19 19:47:22Z ajeh $
 */
  $content = "<div itemscope itemtype='http://schema.org/WebSite'>";
  $content .= "<meta itemprop='url' content='" . HTTP_SERVER . "' />";
  $content .= zen_draw_form('quick_find_header', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get', 'itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction"');
  $content .= "<meta itemprop='target' content='" . HTTP_SERVER . "?search_in_description=1&keyword={keyword}' />";
  $content .= zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
  $content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();

  $content .= "<div class='input-group'>";
  $content .= zen_draw_input_field('keyword', '', 'class="form-control" itemprop="query-input" required') .
    '<span class="input-group-btn"><button class="btn btn-primary" type="submit">' . HEADER_SEARCH_BUTTON . '</button></span>';
  $content .= "</div>";

  $search_url = zen_href_link(FILENAME_ADVANCED_SEARCH);
  $content .= "<div class='text-right'>" .
    "<small><a href='{$search_url}'>Advanced Search</a></small></div>";

  $content .= "</form></div>";
?>
