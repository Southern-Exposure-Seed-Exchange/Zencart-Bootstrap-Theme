<?php
/**
 * Common Template
 *
 * outputs the html header. i,e, everything that comes before the \</head\> tag <br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: html_header.php 15761 2010-03-31 19:31:27Z drbyte $
 */
/** Load the module for generating page meta-tags */
require(DIR_WS_MODULES . zen_get_module_directory('meta_tags.php'));
/** Output main page HEAD tag and related headers/meta-tags, etc */
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<title itemprop="name"><?php echo META_TAG_TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
<meta name="keywords" content="<?php echo META_TAG_KEYWORDS; ?>" />
<meta name="description" content="<?php echo META_TAG_DESCRIPTION; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="author" content="Southern Exposure Seed Exchange" />
<?php
$robots_page_exclusion = defined('ROBOTS_PAGES_TO_SKIP') &&
  in_array($current_page_base, explode(",", constant('ROBOTS_PAGES_TO_SKIP')));
if ($robots_page_exclusion || $current_page_base == 'down_for_maintenance' ||
    $robotsNoIndex === true) { ?>
  <meta name="robots" content="noindex, nofollow" />
<?php } ?>
<?php if (defined('FAVICON')) { ?>
  <link rel="icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<?php } ?>

<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ); ?>" />
<?php if (isset($canonicalLink) && $canonicalLink != '') { ?>
  <link itemprop="url" rel="canonical" href="<?php echo $canonicalLink; ?>" />
<?php } ?>

<link rel="stylesheet" href="<?php echo DIR_WS_TEMPLATE . "css/lightbox.min.css" ?>" />
<link rel="stylesheet" href="<?php echo DIR_WS_TEMPLATE . "css/sese.css" ?>" />

<!-- Favicons using realfavicongenerator.net -->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=7kngOalP4w">
<link rel="icon" type="image/png" href="/favicon-32x32.png?v=7kngOalP4w" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png?v=7kngOalP4w" sizes="16x16">
<link rel="manifest" href="/manifest.json?v=7kngOalP4w">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=7kngOalP4w" color="#03a600">
<link rel="shortcut icon" href="/favicon.ico?v=7kngOalP4w">
<meta name="theme-color" content="#ffffff">

<script type="text/javascript" src="<?php echo DIR_WS_TEMPLATE . "js/jquery.min.js" ?>"></script>
<script async type="text/javascript" src="<?php echo DIR_WS_TEMPLATE . "js/bootstrap.min.js" ?>"></script>
<script async type="text/javascript" src="<?php echo DIR_WS_TEMPLATE . "js/lightbox.min.js" ?>"></script>
<script async type="text/javascript" src="<?php echo DIR_WS_TEMPLATE . "js/sese.js" ?>"></script>
<?php
/* Override the page_directory if we are on the Retail Stores EZ-Page */
if ($current_page_base == 'page' && isset($ezpage_id) && (int)$ezpage_id == 17) {
  $page_directory = 'includes/modules/pages/retail_stores';
}

/** Load all page-specific jscript_*.js files from modules/pages/PAGENAME,
  * alphabetically */
$directory_array = $template->get_template_part($page_directory, '/^jscript_/', '.js');
while(list ($key, $value) = each($directory_array)) {
  $js_include_path = "{$page_directory}/{$value}";
  echo "<script type='text/javascript' src='{$js_include_path}'></script>\n";
}
/** Include content from all page-specific jscript_*.php files from
  * modules/pages/PAGENAME, alphabetically. */
$directory_array = $template->get_template_part($page_directory, '/^jscript_/');
while(list ($key, $value) = each($directory_array)) {
  require("{$page_directory}/{$value}"); echo "\n";
}

if (GOOGLE_ANALYTICS_TRACKING_TYPE == "Asynchronous") {
  require($template->get_template_dir('google_analytics.php', DIR_WS_TEMPLATE,
      $current_page_base, 'google_analytics') . '/google_analytics.php');
}
?>


</head>
<?php // NOTE: Blank line following is intended: ?>

