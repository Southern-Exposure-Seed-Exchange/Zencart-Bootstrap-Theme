<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2008 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: meta_tags.php 10330 2008-10-10 20:14:32Z drbyte $
 */

// page title
define('TITLE', 'Southern Exposure Seed Exchange');

// Site Tagline
define('SITE_TAGLINE', 'Saving the Past for the Future');

// Custom Keywords
define('CUSTOM_KEYWORDS', 'heirloom seeds, organic seeds, heirloom tomatoes, seed saving, vegetable garden layout, companion planting chart, native gardens, wild flower seeds, vegetable seeds, Asian vegetable seeds, hot pepper seeds, non hybrid seeds, survival seeds, starting tomato seeds indoors, heritage seeds, growing zones in north America, window flower boxes, garden hand tool, greenhouse seed, best vegetable garden, best flowers for garden, best flowers for cutting garden, heirloom flower seeds, perennial flower seeds, perennial seeds, indeterminate tomatoes, heirloom tomato seeds, garlic growing, flower garden seeds, potato seeds, design your own garden, staking tomato plants, tomatoes early, cherry tomato seeds, canning fresh tomatoes, canning tomatoes how to, transplanting tomatoes, mulch types, types of mulch, coffee grounds for plants, herb garden design, indoor herb gardening, how to grow tomatoes from seed, zinnia seeds, tomato disease identification, tomatoes diseases, tomato diseases, tomato pests, tomatoes diseases, tomato worms, pruning tomatoes, watering tomatoes');

// Home Page Only:
  define('HOME_PAGE_META_DESCRIPTION', 'Our Cooperatively-Run Business Offers over 700 Varieties of Heirloom & Organic Garden Seeds.');
  define('HOME_PAGE_META_KEYWORDS', 'heirloom seeds, organic seeds, heirloom tomatoes, seed saving, vegetable garden layout, companion planting chart, native gardens, wild flower seeds, vegetable seeds, Asian vegetable seeds, hot pepper seeds, non hybrid seeds, survival seeds, starting tomato seeds indoors, heritage seeds, growing zones in north America, window flower boxes, garden hand tool, hand garden tools, greenhouse seed, best vegetable garden, best flowers for garden, best flowers for cutting garden, heirloom flower seeds, perennial flower seeds, perennial seeds, indeterminate tomatoes, heirloom tomato seeds, garlic growing, flower garden seeds, potato seeds, design your own garden, designing a garden, staking tomato plants, tomatoes early, cherry tomato seeds, canning fresh tomatoes, canning tomatoes how to, transplanting tomatoes, mulch types, types of mulch, coffee grounds for plants, herb garden design, indoor herb gardening, how to grow tomatoes from seed, zinnia seeds, tomato disease identification, tomato pests, tomatoes diseases, tomato worms, pruning tomatoes, watering tomatoes');

  // NOTE: If HOME_PAGE_TITLE is left blank (default) then TITLE and SITE_TAGLINE will be used instead.
  define('HOME_PAGE_TITLE', ''); // usually best left blank


// EZ-Pages meta-tags.  Follow this pattern for all ez-pages for which you desire custom metatags. Replace the # with ezpage id.
// If you wish to use defaults for any of the 3 items for a given page, simply do not define it.
// (ie: the Title tag is best not set, so that site-wide defaults can be used.)
// repeat pattern as necessary
  define('META_TAG_DESCRIPTION_EZPAGE_#','');
  define('META_TAG_KEYWORDS_EZPAGE_#','');
  define('META_TAG_TITLE_EZPAGE_#', '');

// Per-Page meta-tags. Follow this pattern for individual pages you wish to override. This is useful mainly for additional pages.
// replace "page_name" with the UPPERCASE name of your main_page= value, such as ABOUT_US or SHIPPINGINFO etc.
// repeat pattern as necessary
  define('META_TAG_DESCRIPTION_page_name','');
  define('META_TAG_KEYWORDS_page_name','');
  define('META_TAG_TITLE_page_name', '');

// Review Page can have a lead in:
  define('META_TAGS_REVIEW', 'Reviews: ');

// separators for meta tag definitions
// Define Primary Section Output
  define('PRIMARY_SECTION', ' : ');

// Define Secondary Section Output
  define('SECONDARY_SECTION', ' ');

// Define Tertiary Section Output
  define('TERTIARY_SECTION', ', ');

// Define divider ... usually just a space or a comma plus a space
  define('METATAGS_DIVIDER', ' ');

// Define which pages to tell robots/spiders not to index
// This is generally used for account-management pages or typical SSL pages, and usually doesn't need to be touched.
  define('ROBOTS_PAGES_TO_SKIP','login,logoff,create_account,account,account_edit,account_history,account_history_info,account_newsletters,account_notifications,account_password,address_book,advanced_search,advanced_search_result,checkout_success,checkout_process,checkout_shipping,checkout_payment,checkout_confirmation,cookie_usage,create_account_success,contact_us,download,download_timeout,customers_authorization,down_for_maintenance,password_forgotten,time_out,unsubscribe,info_shopping_cart,popup_image,popup_image_additional,product_reviews_write,ssl_check');


// favicon setting
// There is usually NO need to enable this unless you need to specify a path and/or a different filename
//  define('FAVICON','favicon.ico');

// EZ-PAGE OVERRIDES
  define('META_TAG_DESCRIPTION_EZPAGE_15', 'Our commitment to seed biodiversity means we have a strict non-GMO policy, preferring open-pollinated varieties.');
  define('META_TAG_DESCRIPTION_EZPAGE_18', 'We are a worker-owned cooperative offering over 700 varieties of organic, heirloom, & ecologically-grown vegetable, flower, herb, grain, and cover crop seeds.');
  define('META_TAG_DESCRIPTION_EZPAGE_21', 'Common questions about organic & heirloom seeds, seed-saving, and orders.');
  define('META_TAG_DESCRIPTION_EZPAGE_40', 'We give workshops and presentations on seed saving, heirloom gardening, and seed growing as a farm enterprise, host seed swaps and variety tastings, & distribute seed saving resources.');
  define('META_TAG_DESCRIPTION_EZPAGE_41', 'Check out our library of seed-saving and growing guides for vegetables, herbs, flowers, and seasonals.');
  define('META_TAG_DESCRIPTION_EZPAGE_138', 'We work with Certified Organic, Certified Naturally Grown, and ecologically-oriented farmers through the mid-Atlantic region and beyond.');
?>
