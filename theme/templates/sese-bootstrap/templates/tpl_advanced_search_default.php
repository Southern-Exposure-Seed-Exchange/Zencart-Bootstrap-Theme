<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=advanced_search.<br />
 * Displays options fields upon which a product search will be run
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_advanced_search_default.php 14545 2009-10-09 15:04:33Z ajeh $
 */
?>
<div class="centerColumn" id="advSearchDefault">

<?php echo zen_draw_form('advanced_search', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get', 'onsubmit="return check_form(this);"') . zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('main_page', FILENAME_ADVANCED_SEARCH_RESULT); ?>

<h1 id="advSearchDefaultHeading" class="clearfix">
  <?php echo HEADING_TITLE_1 . '<div class="pull-right"><small><a href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_SEARCH_HELP) . '\')">' . TEXT_SEARCH_HELP_LINK . '</a></small></div>'; ?>
</h1>

<?php if ($messageStack->size('search') > 0) echo $messageStack->output('search'); ?>

<fieldset>
<legend><?php echo HEADING_SEARCH_CRITERIA; ?></legend>
<div class="text-center">
  <div class="form-group">
  <?php echo zen_draw_input_field('keyword', '', 'class="form-control" placeholder="Keywords..."'); ?>
  <label class="checkbox" for="search-in-description"><?php echo zen_draw_checkbox_field('search_in_description', '1', $sData['search_in_description'], 'id="search-in-description"') . TEXT_SEARCH_IN_DESCRIPTION; ?></label>
  </div>
</div>
</fieldset>

<div class="clearfix">
<fieldset class="pull-right col-sm-6">
<legend><?php echo ENTRY_PRICE_RANGE; ?></legend>
  <div class="form-group">
    <?php echo zen_draw_input_field('pfrom', $sData['pfrom'], 'class="form-control" placeholder="' . ENTRY_PRICE_FROM . '"'); ?>
  </div>
  <div class="form-group">
    <?php echo zen_draw_input_field('pto', $sData['pto'], 'class="form-control" placeholder="' . ENTRY_PRICE_TO . '"'); ?>
  </div>
</fieldset>

<div class='pull-left col-sm-6'>
<fieldset>
    <legend><?php echo ENTRY_FILTER_TYPE; ?></legend>
    <label><?php echo zen_draw_checkbox_field('organic', 1) . ' <img src="images/icons/organic-certified.png" height="13px" width="16px"> Organic'; ?></label><br />
    <label><?php echo zen_draw_checkbox_field('heirloom', 1) . ' <img src="images/icons/heirloom.png" height="20px" width="16px"> Heirloom'; ?></label><br />
    <label><?php echo zen_draw_checkbox_field('midatlantic', 1) . ' <img src="images/icons/southern.png" height="16px" width="16px"> Mid-Atlantic'; ?></label><br />
    <label><?php echo zen_draw_checkbox_field('ecological', 1) . ' <img src="images/icons/eco.png" height="17px" width="16px"> Ecologically Grown'; ?></label>
</fieldset>
<br />
<fieldset>
  <legend><?php echo ENTRY_CATEGORIES; ?></legend>
  <div class="form-group text-center">
    <?php echo zen_draw_pull_down_menu('categories_id', zen_get_categories(array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES)), '0' ,'', '1'), $sData['categories_id'], 'class="form-control"'); ?>
    <label class="checkbox" for="inc-subcat"><?php echo zen_draw_checkbox_field('inc_subcat', '1', $sData['inc_subcat'], 'id="inc-subcat"') . ENTRY_INCLUDE_SUBCATEGORIES; ?></label>
  </div>
</fieldset>
</div>
</div>

<p class="clearfix">
<span class="pull-right"><button type="submit" class="btn btn-primary"><?php echo BUTTON_SEARCH_ALT; ?></button></span>
<span class="pull-left"><?php echo zen_back_link() . "<span class='btn btn-default' type='none'>" . BUTTON_BACK_ALT . '</span></a>'; ?></span>
</p>

</form>
</div>
