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
// $Id: popup_search_help.php 2471 2005-11-29 01:14:18Z drbyte $
//

define('HEADING_SEARCH_HELP', 'Search Help');
define('TEXT_SEARCH_HELP', '<div class="col-sm-12"><p>Keywords may be separated by AND and/or OR statements for greater control of the search results.</p><p>For example, <span style="text-decoration:underline;">turnip AND greens</span> would generate a result set that contains both words. However, for <u>turnip OR greens</u>, the result set returned would contain both or either words (turnip, greens, and turnip greens).</p><p>Exact matches can be searched for by enclosing keywords in double-quotes.</p><p>For example, <span style="text-decoration:underline">"cherokee purple tomato"</span> would give results that contain the exact phrase, "Cherokee Purple Tomato."</p><p>Brackets can be used for further control on the result set.</p><p>For example, <span style="text-decoration:underline;">tomato and (brandywine or cherry or "cherokee purple")</span>.</p></div>');
define('TEXT_CLOSE_WINDOW', '<span class="pseudolink">Close Window</span> [x]');

?>
