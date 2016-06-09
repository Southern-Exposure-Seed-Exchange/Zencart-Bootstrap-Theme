<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_header = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_header.php 4813 2006-10-23 02:13:53Z drbyte $
 */
?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
  echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo htmlspecialchars($_GET['info_message']);
} else {

}
?>


<?php
/* Show the Site Header and Navigation */
if (!isset($flag_disable_header) || !$flag_disable_header) { ?>

<!-- Site Header -->
<div class='container'>
  <div id='site-header' class='row clearfix'>
    <div class='col-sm-8 col-md-6'>
      <div class='media'>
        <a href='/'><img id='site-logo' class='pull-left' alt='SESE Logo'
             src="<?php echo DIR_WS_TEMPLATE . "img/logos/sese.png"; ?>" /></a>
        <div id='site-title' class='media-body'>
          <h1 class='media-heading'><a href='/'><?php echo TITLE; ?></a></h1>
        </div>
      </div>
    </div>
    <div class='col-sm-4 col-md-6 hidden-xs'>
      <div class='clearfix'>
        <ul class='pull-right text-right quick-links'>
          <?php BootstrapHeader::quick_links(); ?>
        </ul>
      </div>
      <div class='clearfix'>
        <div class='pull-right quick-search'>
          <?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Site Navigation -->
<nav class='navbar navbar-default'>
  <div class='container'>
    <div class='navbar-header'>
      <!-- Mobile Menu Icon -->
      <button class='navbar-toggle collapsed' type='button' data-toggle='collapse'
              data-target='#category-navbar' aria-expanded='false'>
        <span class='sr-only'>Toggle Navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <!-- Search Icon -->
      <button class='navbar-toggle collapsed' type='button' data-toggle='collapse'
              data-target='#search-navbar' aria-expanded='false'>
        <?php echo BootstrapUtils::glyphicon('search', "Toggle Search Menu"); ?>
      </button>
      <!-- Shopping Cart Icon -->
      <a class='btn btn-default collapsed navbar-toggle' type='button'
         href="<?php echo zen_href_link(FILENAME_SHOPPING_CART); ?>">
        <?php echo BootstrapUtils::glyphicon('shopping-cart', HEADER_TITLE_CART_CONTENTS); ?>
      </a>
    </div>

    <!-- Category Nav Menu -->
    <div id='category-navbar' class='collapse navbar-collapse'>
      <ul class='nav navbar-nav'>
<?php
/* Use the root categories for the top level nav, with dropdowns for the first
 * level of sub-categories */
$root_categories = BootstrapNavMenu::root_and_child_categories();
foreach ($root_categories as $root_category) {
  $root_url = BootstrapUtils::category_url(array($root_category['id']));
  if (count($root_category['children']) === 0) {
    /* Direct Link */ ?>
  <li <?php if ($root_category['active']) echo "class='active'" ?>>
    <a href="<?php echo $root_url; ?>">
      <?php echo $root_category['name']; ?>
    </a>
  </li>
<?php
  } else {
    /* Dropdown Menu & Link */ ?>
    <li class='dropdown <?php if ($root_category['active']) echo 'active'; ?>'>
    <a href="<?php echo $root_url; ?>" class='dropdown-toggle' data-toggle='dropdown'
       role='button' aria-haspopup='true' aria-expanded='false'>
      <?php echo $root_category['name']; ?> <span class='caret'></span>
    </a>
    <ul class='dropdown-menu'>
    <?php foreach ($root_category['children'] as $child) {
      $subcategory_url = BootstrapUtils::category_url(array($root_category['id'], $child['id'])); ?>
      <li <?php if ($child['active']) echo 'class="active"'; ?>>
        <a href="<?php echo $subcategory_url; ?>"><?php echo $child['name']; ?></a>
      </li>
    <?php } ?>
    </ul>
  </li>
<?php
  } ?>
<?php
} ?>
        <!-- Mobile-only Nav Links -->
        <?php BootstrapHeader::quick_links("visible-xs"); ?>
      </ul>
    </div>

    <!-- Search Menu -->
    <!-- TODO: Add menu for searching on collapsed screens, should be hidden otherwise -->
  </div>
</nav>

<div id="headerWrapper">
  <?php if (HEADER_SALES_TEXT != '') { ?>
    <!-- TODO: Move below site header search box? -->
    <div id="taglineWrapper">
        <div id="tagline"><?php echo HEADER_SALES_TEXT;?></div>
    </div>
  <?php } ?>

  <?php require($template->get_template_dir('tpl_modules_categories_tabs.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_categories_tabs.php'); ?>
</div> <!-- headerWrapper -->
<?php }

class BootstrapHeader
{
  public static function quick_links($extra_class) { ?>
    <li class='<?php echo $extra_class; ?>'><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . 'index.php?main_page=quick_order">'; ?>Quick Order</a></li><?php
    if (($_SESSION['customer_id']) && (!$_SESSION['COWOA']=='True')) { ?>
      <li class='<?php echo $extra_class; ?>'><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li><?php
    }

    if ($_SESSION['cart']->count_contents() != 0) { ?>
      <li class='<?php echo $extra_class; ?>'><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>">
        <?php echo HEADER_TITLE_CART_CONTENTS . " (<small>" . $_SESSION['cart']->count_contents() . "</small>)"; ?>
      </a></li><?php
    }
    if (($_SESSION['customer_id']) /*&& (!$_SESSION['COWOA']=='True')*/) { ?>
      <li class='<?php echo $extra_class; ?>'><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li><?php
    } else {
      if (STORE_STATUS == '0') { ?>
        <li class='<?php echo $extra_class; ?>'><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li> <?php
      }
    }
  }
}

?>
